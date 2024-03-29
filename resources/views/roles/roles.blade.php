@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Usuario'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-head card-header-warning">
                                    <h3 class="card-title text-dark">Usuarios</h3>
                                    <p class="card-category text-dark">Usuarios Registrados</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @can('users.create')
                                            <div class="col-12 text-right">
                                                <a href="{{ route('users.create') }}" class="btn btn-facebook">Nuevo Usuario</a>
                                            </div>
                                        @endcan
                                    </div>

                                    <div class="table-responsive-sm">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <tr>
                                                    {{-- <th>ID</th> --}}
                                                    <th>Nombre</th>
                                                    <th>Correo</th>
                                                    <th>Username</th>
                                                    <th>Created_at</th>
                                                    <th class="text-right">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        {{-- <td>{{ $user->id }}</td> --}}
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->username }}</td>
                                                        <td>{{ $user->created_at }}</td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="card-footer mr-auto">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
