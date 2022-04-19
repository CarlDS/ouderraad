<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderline;

use Illuminate\Foundation\Application as FoundationApplication;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => ['required'],
            'lname' => ['required'],
            'email' => ['required'],
            'location' => ['required']
        ]);
        $order = Order::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'contact_name' => $request->contact_name,
            'contact_grade' => $request->contact_grade,
            'location' => $request->location,
        ]);
        $amount=0;
        foreach ($request->products as $product){
            $line = Orderline::create([
                'article_id' => $product['id'],
                'quantity' => $product['quant'],
                'order_id' => $order['id'],
            ]);
            $amount += ($line->article->sell_price*$product['quant']);
        }

        $reference = $order->id.'-'.$amount.'-'.$order->contact_grade.'-00';
        $order->reference = $reference;
        $order->save();
        $this->mailconfirm($order, $amount, $reference, $request);
        return Inertia::render('TakeAway/Confirm', [
            'order' => $request,
            'amount' => $amount,
            'reference' => $reference,
            'laravelVersion' => FoundationApplication::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);

    }
    public function storenew(Request $request){
        $request->validate([
            'fname' => ['required'],
            'lname' => ['required'],
            'email' => ['required'],
            'contact_grade' => ['required'],
            'location' => ['required'],
        ]);

        $order = Order::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'contact_name' => $request->contact_name,
            'contact_grade' => $request->contact_grade,
            'location' => $request->location,
        ]);

        $amount = 0;
        foreach ($request->products as $product){
            $orderline = Orderline::create([
                'article_id' => $product['id'],
                'quantity' => $product['quantity'],
                'order_id' => $order['id'],
            ]);
            $amount += ($orderline->article->sell_price*$orderline->quantity);
        }

        $order->reference = $order->id.'-'.$amount.'-'.$order->contact_grade.'-00';
        $order->save();

        $this->confirmMail($order, $amount);
        return Inertia::render('TakeAway/Confirm', [
            'order' => $order,
            'amount' => $amount,
            'reference' => $order->reference,
            'laravelVersion' => FoundationApplication::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
    public function confirmMail($order, $amount){
        $message = '<h1>Bevestiging van je bestelling</h1>';
        $message.= '<p>Beste '.$order->fname.', </p>';
        $message .= '<p> Wij danken je van harte voor jouw bestelling. Deze bevestiging werd ook verstuurd naar '.$order->email.' Kijk zeker je spam-folder na wanneer je de mail niet onmiddelijk terugvindt. </p>';
        $message .= '<p>Om je reservatie definitief te bevestigen vragen we om een bedrag van <strong> '.$amount.' Euro </strong> over te schrijven op rekening van de school <strong>BE26 7343 5616 6629</strong>. Als mededeling geef je <strong>'.$order->reference.'</strong>. Zo kunnen wij jouw bestelling vlot verwerken.</p><p>Je bestelling kan je ophalen op 29 april, tussen 15u en 18u in ';
        if ($order->location == 'LS'){
            $message .= 'de lagere school, Mechelsevest 2.<br>';
        }
        if ($order->location =='KS'){
            $message .= 'de kleuterschool, Ridderstraat 89.<br>';
        }
        $message .= 'Denk eraan om op de dag van afhaling koeltassen mee te brengen!</p>';

        $message .= '<p>Hieronder vind je jouw bestelling nogmaals opgelijst: </p>';
        $message .= '<table class="w-full">';
        foreach ($order->orderlines as $orderline){
            $message .= '<tr><td>'.$orderline->article->name.'</td><td> x'.$orderline->quantity.'</td><td> ='.$orderline->quantity*$orderline->article->sell_price.' Euro</td><td> ('.$orderline->article->sell_price.' Euro/st)</td></tr>';
        }
        $message .= '</table>';

        $subject = 'Reservatie Take-Away Sint-Jansschool Leuven';
        $email = '<html><body>'.$message.'</body></html>';
        $to = $order->email;
        $from = 'ouderraad-sintjan@cpmdesmedt.be';
        $headers   = array();
	    $headers[] = "MIME-Version: 1.0";
	    $headers[] = "Content-type: text/html; charset=iso-8859-1";
	    $headers[] = "From: Ouderraad Sint-Jansschool <{$from}>";
	    $headers[] = "Cc: Ouderraad Sint-Jansschool <{$from}>";
	    $headers[] = "Subject: {$subject}";
	    $headers[] = "X-Mailer: PHP/".phpversion();
	    mail($to, $subject, $email, implode("\r\n", $headers));

    }

    public function mailconfirm($order, $amount, $reference, $request){

        $message = '<h1>Bevestiging van je bestelling</h1><p>Beste '.$order->fname.', </p><p> Wij dank je van harte voor jouw bestelling. Deze bevestiging werd ook verstuurd naar '.$order->email.' Kijk zeker je spam-folder na wanneer je de mail niet onmiddelijk terugvindt. </p><p>Om je reservatie definitief te bevestigen vragen we om een bedrag van <strong> '.$amount.' Euro </strong> over te schrijven op rekening van de school <strong>BE26 7343 5616 6629</strong>. Als mededeling geef je <strong>'.$reference.'</strong>. Zo kunnen wij jouw bestelling vlot verwerken.</p><p>Je bestelling kan je ophalen op 29 april, tussen 15u en 18u in de lagere school, Mechelsevest 2.<br> Denk eraan om op de dag van afhaling koeltassen mee te brengen!</p><p>Hieronder vind je jouw bestelling nogmaals opgelijst: </p>';
        $message .= '<table class="w-full">';
        foreach ($request->products as $product){
            //dd($product['name']);
            $message .= '<tr><td>'.$product['name'].'</td><td>'.$product['quantity'].'</td><td> x'.$product['price'].'euro</td><td> '.$product['quantity']*$product['price'].'</td></tr>';
        }
        $message .= '</table>';

        $subject = 'Reservatie Take-Away Sint-Jansschool Leuven';
        $email = '<html><body>'.$message.'</body></html>';
        $to = $order->email;
        $from = 'ouderraad-sintjan@cpmdesmedt.be';
        $headers   = array();
	    $headers[] = "MIME-Version: 1.0";
	    $headers[] = "Content-type: text/html; charset=iso-8859-1";
	    $headers[] = "From: Ouderraad Sint-Jansschool <{$from}>";
	    $headers[] = "Cc: Ouderraad Sint-Jansschool <{$from}>";
	    $headers[] = "Subject: {$subject}";
	    $headers[] = "X-Mailer: PHP/".phpversion();
	    mail($to, $subject, $email, implode("\r\n", $headers));
        dd($to, $subject, $email, implode("\r\n", $headers));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
