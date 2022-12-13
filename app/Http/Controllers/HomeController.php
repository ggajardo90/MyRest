<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;
use App\Models\Table;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with(
            [
                "tables" => Table::count(),
                "categorias" => Categoria::count(),
                "productos" => Producto::count(),
                "users" => User::count(),
                "sales" => Sale::sum('total'),
            ]
        );
    }
}
