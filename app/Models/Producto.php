<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $categoria_id
 * @property $nombre
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

    static $rules = [
		'categoria_id' => 'required',
		'nombre' => 'required',
		'precio' => 'required',
		'descripcion' => 'required',
    'stock'=> 'required',
		'imagen' => 'required',
		'activo' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'productos';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['categoria_id','nombre','precio','descripcion','stock','imagen','activo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }


}
