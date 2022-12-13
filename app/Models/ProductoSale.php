<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id', 'quantity', 'sale_id'
    ];

    protected $table = 'producto_sale';
}
