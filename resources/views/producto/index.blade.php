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
                                <div class="container">
                                    <div class="row">
                                        @foreach ($productos as $producto)
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                                <div class="card">

                                                    <?php
                                                    $imagen = $producto->imagen;
                                                    if (!file_exists($imagen)) {
                                                        $imagen = 'img/noimage.png';
                                                    }
                                                    ?>
                                                    <img src="<?php echo $imagen; ?>" class="card-img-top img-fluid">

                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                                                        <p class="card-text">{{ $producto->categoria->nombre }}</p>
                                                        <p class="card-text">{{ $producto->descripcion }}</p>
                                                        <h4 class="card-title">${{ $producto->precio }}</h4>
                                                        <div class="card-footer bg-transparent border-success">
                                                            <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                                                <div class="btn-group btn-group-sm">
                                                                    <a class="btn btn-primary"
                                                                        href="{{ route('productos.show', $producto->id) }}"><i
                                                                            class="fa fa-fw fa-eye"></i></a>

                                                                    @can('producto.edit')
                                                                        <a class="btn btn-success"
                                                                            href="{{ route('productos.edit', $producto->id) }}"><i
                                                                                class="fa fa-fw fa-edit"></i></a>
                                                                    @endcan

                                                                    @method('DELETE')
                                                                    @can('producto.destroy')
                                                                        <button type="submit" class="btn btn-danger"><i
                                                                                class="fa fa-fw fa-trash"></i></button>
                                                                    @endcan
                                                                    @csrf
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
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
