@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Detalles del Usuario'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Usuarios</div>
                            <p class="card-category">Vista detallada del Usuario {{ $user->name }}</p>
                        </div>

                        <!--body-->

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-user">
                                        <div class="card-body ">
                                            <p class="card-text">
                                            <div class="author">
                                                <a href="#" class="d-flex">
                                                    <img src="{{ asset('/img/perfil1.png') }}" alt="image"
                                                        class="col-lg-4 ">
                                                    <h5 class="title mx-3">{{ $user->name }}</h5>
                                                </a>
                                                <br>
                                                <p class="description">
                                                    {{ $user->username }}<br>
                                                    {{ $user->email }}<br>
                                                    {{ $user->created_at }}

                                                </p>
                                            </div>
                                            </p>
                                            <div class="card-description">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ea magnam
                                                quis obcaecati quos ipsum cupiditate atque enim voluptates! Fugiat.
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-container">
                                                <a href="{{route('users.index')}}" class="btn btn-sm btn-success mr-3">Volver</a>
                                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-info mr-3">Editar</a>

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
    </div>
@endsection
