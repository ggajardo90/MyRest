<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Producto
 *
 * @property $id
 * @property $categoria_id
 * @property $nombre
 * @property $slug
 * @property $precio
 * @property $descripcion
 * @property $stock
 * @property $imagen
 * @property $activo
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Producto extends Model
{
    use HasFactory;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['categoria_id','nombre','slug','precio','descripcion','stock','imagen','activo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
