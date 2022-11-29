<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('producto.index')->with([
            "productos" => Producto::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $categorias = Categoria::pluck('nombre','id');

        return view('producto.create', compact('producto', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'categoria_id' => 'required|numeric',
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
            'stock' => 'required|numeric',
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'activo' => 'required|boolean'
        ]);

        if ($request->hasFile('imagen')){
            $file = $request->imagen;
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(300, 300)->save( public_path('img/productos/' . $imageName));
            $nombre = $request->nombre;
            Producto::create([
                'categoria_id' => $request->categoria_id,
                'nombre' => $nombre,
                'slug' => Str::slug($nombre),
                'precio' => $request->precio,
                'descripcion' => $request->descripcion,
                'stock' => $request->stock,
                'imagen' => $imageName,
                'activo' => $request->activo
            ]);
            return redirect()->route('productos.index')
            ->with('success', 'Producto creado con éxito.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('producto.show')->with([
            "producto" => $producto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::pluck('nombre','id');
        return view('producto.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $this->validate($request, [
            'categoria_id' => 'required|numeric',
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
            'stock' => 'required|numeric',
            'imagen' => 'image|mimes:png,jpg,jpeg|max:2048',
            'activo' => 'required|boolean'
        ]);

        if ($request->hasFile('imagen')){
            $file = $request->imagen;
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(300, 300)->save( public_path('img/productos/' . $imageName));
            $producto->imagen = $imageName;
        }
            $nombre = $request->nombre;
            $producto->update([
                'categoria_id' => $request->categoria_id,
                'nombre' => $nombre,
                'slug' => Str::slug($nombre),
                'precio' => $request->precio,
                'descripcion' => $request->descripcion,
                'stock' => $request->stock,
                'imagen' => $producto->imagen,
                'activo' => $request->activo
            ]);
            return redirect()->route('productos.index')
            ->with([
                'success', 'Producto actualizado con éxito.'
            ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}
