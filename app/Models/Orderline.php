<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderline extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'article_id', 'quantity'];

    public function Order(){
        return $this->belongsTo(Order::class);
    }
    public function Article() {
        return $this->belongsTo(Article::class);
    }
}
