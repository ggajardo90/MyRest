<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Table
 *
 * @property $id
 * @property $name
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto[] $productos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Table extends Model
{
    use HasFactory;

    static $rules = [
		'name' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 10;

    protected $fillable = ['name', 'status'];

    public function sales()
    {
        return $this->hasMany('App\Models\Sale', 'sale_id', 'id');
    }
}
