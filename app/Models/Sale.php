<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id', 'quantity', 'price',
        'total', 'change', 'payment_type',
        'payment_status'
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }

    public function tables()
    {
        return $this->belongsToMany(Table::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
