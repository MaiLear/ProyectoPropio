<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    //Query Scope

    public function scopeValues($query, $value){
        if($value)
        return $query->where('name','unit_price','stock', 'LIKE', '%'."value". '%');
    }
}
