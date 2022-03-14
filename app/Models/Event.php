<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'start', 'end', 'type', 'image',
    ];

    public function assortiment(){
        return $this->hasMany(Assortiment::class);
    }
}
