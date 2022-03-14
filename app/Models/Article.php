<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'supplier_id',
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function assortiment(){
        return $this->hasMany(Assortiment::class);
    }
}
