<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded = ['id'];
        protected $fillable = ['name', 'purchase_price', 'sell_price', 'stock'];

}
