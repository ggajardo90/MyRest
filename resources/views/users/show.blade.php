@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Detalles del Usuario'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <div class="card-title text-dark">Usuarios</div>
                            <p class="card-category text-dark">Vista detallada del usuario {{ $user->name }}</p>
                        </div>

                        <!--body-->

                        <div class="card-body">
                            <main>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-auto ">
                                            <div class="card text-center">
                                                <a href="#" class="">
                                                    <img src="{{ asset('/img/perfil1.png') }}" alt="image"
                                                        class="card-img-top col-lg-4">
                                                </a>

                                                <div class="card-body">
                                                    <h3 class="card-title">{{ $user->name }}</h3>
                                                    <p class="card-text">{{ $user->username }}<br>
                                                        {{ $user->email }}</p>
                                                    <p class="card-title">Creado el: {{ $user->created_at }}</p>


                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('users.index') }}"
                                                                class="btn btn-success mr-3">Volver</a>
                                                            <a href="{{ route('users.edit', $user->id) }}"
                                                                class="btn btn-info">Editar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
