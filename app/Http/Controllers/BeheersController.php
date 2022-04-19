<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Order;
use App\Models\Orderline;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BeheersController extends Controller
{
    public function beheer(){
        $orders = Order::all();
        /* foreach ($orders as $order){
            $order->orderlines;
            foreach($order->orderlines as $orderline){
                $orderline->article;
            }

        } */
        return Inertia::render('Beheer', [
            'orders' => $orders,
            'articles' => Article::all(),
            'orderlines' => Orderline::all(),

        ]);
    }
    public function pay(Request $request){
        $order = Order::find($request->orderId);
        if($request->action == 'pay'){
            $order->payed_at = now();
        }
        else {
            $order->payed_at =null;
        }


        $order->save();

        return redirect(route('beheer'));
    }
}
