<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Categoria
 *
 * @property $id
 * @property $nombre
 * @property $slug
 * @property $descripcion
 * @property $imagen
 * @property $activa
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto[] $productos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Categoria extends Model
{
    use HasFactory;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','slug','descripcion','imagen','activa'];

    protected $perPage = 10;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'categoria_id', 'id');
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

}
