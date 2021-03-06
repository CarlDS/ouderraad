<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname', 'lname', 'email', 'contact_name', 'contact_grade', 'reference','payed_at', 'collected_at', 'location'
    ];
    public function orderlines() {
        return $this->hasMany(Orderline::class);
    }
}
