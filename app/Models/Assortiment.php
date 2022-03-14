<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assortiment extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id', 'article_id', 'buy_price', 'sell_price',
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }
}
