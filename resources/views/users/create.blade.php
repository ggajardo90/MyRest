@extends('layouts.main',['activePage' => 'users','titlePage' => 'Nuevo usuario'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('users.store') }}" method="post" class="form-horizontals">
                @csrf
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title text-dark">Usuarios</h4>
                        <p class="card-category text-dark">Ingresar datos</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" placeholder="Ingrese su Nombre" autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <label for="username" class="col-sm-2 col-form-label">Nombre de Usuario</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="username" placeholder="Ingrese su Nombre de Usuario" autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="email" placeholder="Ingrese su email" autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="password" placeholder="Ingrese su Password" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
