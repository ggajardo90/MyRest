<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Table
 *
 * @property $id
 * @property $name
 * @property $slug
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

    protected $fillable = ["name", "slug", "status"];

    public function sales()
    {
        return $this->belongsToMany(Sale::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
