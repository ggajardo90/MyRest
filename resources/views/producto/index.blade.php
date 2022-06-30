@extends('layouts.main', ['activePage' => 'productos', 'titlePage' => 'Productos'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-head card-header-warning">
                            <h4 class="card-title text-dark">Productos</h4>
                            <p class="card-category text-dark">Productos registrados en el sistema</p>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <form action="{{ route('producto.index') }}" method="GET">
                                    <div class="form-row">
                                        <div class="col-sm">
                                            <input type="text" class="form-control" placeholder="Escribe para buscar"
                                                name="texto" value="{{ $texto }}" size="50" maxlength="50">
                                        </div>
                                        <div class="col-auto">
                                            <input type="submit" class="btn btn-primary" value="buscar">
                                        </div>
                                        <div class="col-auto text-right">
                                            @can('producto.create')
                                                <a href="{{ route('productos.create') }}" class="btn btn-facebook">Nuevo
                                                    Producto</a>
                                            </div>
                                        @endcan
                                    </div>
                                </form>

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                            </div>


                            <main>
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                                    @foreach ($productos as $producto)
                                        <div class="col" style='max-width:20%'>
                                            <div class="card shadow-sm">

                                                <?php
                                                $imagen = $producto->imagen;
                                                if (!file_exists($imagen)) {
                                                    $imagen = 'img/nofoto.jpeg';
                                                }
                                                ?>
                                                <img src="<?php echo $imagen; ?>">

                                                <div class="card-body">
                                                    <!--<h5 class="card-title">{{ $producto->id }}</h5>-->
                                                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                                                    <p class="card-text">{{ $producto->categoria->nombre }}</p>
                                                    <p class="card-text">{{ $producto->descripcion }}</p>
                                                    <h4 class="card-title">${{ $producto->precio }}</h4>

                                                    <div class="d-flex justify-content-between align-items-center"
                                                        action="{ { route('productos.destroy',$producto->id) }}"
                                                        method="POST">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-primary"
                                                                href="{{ route('productos.show', $producto->id) }}"><i
                                                                    class="fa fa-fw fa-eye"></i></a>

                                                            @can('producto.edit')
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('productos.edit', $producto->id) }}"><i
                                                                        class="fa fa-fw fa-edit"></i></a>
                                                            @endcan

                                                            @method('DELETE')
                                                            @can('producto.destroy')
                                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                                        class="fa fa-fw fa-trash"></i></button>
                                                            @endcan
                                                            @csrf
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </main>
                        </div>
                        <div class="card-footer mr-auto">
                            {{-- {!! $productos->links() !!} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
