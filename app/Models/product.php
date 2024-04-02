<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $fillable = [
        'productName',
        'description',
        'price',
        'quantity',
        'productImage',
        'category',
        'productColor',
    ];
}


