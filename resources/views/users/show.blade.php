@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Detalles del Usuario'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h3 class="card-title text-dark">Usuarios</h3>
                            <p class="card-category text-dark">Vista detallada del usuario {{ $user->name }}</p>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 ml-auto mr-auto">
                                    <div class="card text-center">
                                        <div class="card-header">
                                            {{-- <img src="{{ asset('/img/faces/avatar.jpg') }}" alt="image"
                                                class="card-img-top img-fluid"> --}}
                                            <img src="/img/profile_images/{{ $user->image_path }}" alt="image"
                                                class="card-img-top img-fluid">
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title"><strong>Nombre:</strong> {{ $user->name }}</h3><br>
                                            <h4 class="card-text"><strong>Usuario:</strong> {{ $user->username }}<br>
                                                <strong>Correo:</strong> {{ $user->email }}<br>
                                                <strong>Rol:</strong>
                                                @foreach ($user->getRoleNames() as $v)
                                                    {{ $v }}
                                                @endforeach
                                            </h4><br>
                                            <p class="text-muted">Creado el: {{ $user->created_at }}</p>

                                        </div>
                                        <div class="card-footer ml-auto mr-auto">

                                            <a href="{{ route('users.index') }}" class="btn btn-info btn-sm">Volver</a>
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-success btn-sm">Editar</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
