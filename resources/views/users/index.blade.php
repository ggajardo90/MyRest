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
                                    <h4 class="card-title text-dark">Usuarios</h4>
                                    <p class="card-category text-dark">Usuarios Registrados</p>
                                </div>
                                <div class="card-body">

                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ route('users.create') }}" class="btn btn-facebook">Nuevo
                                                Usuario</a>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>Username</th>
                                                <th>Created_at</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->id }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->username }}</td>
                                                        <td>{{ $user->created_at }}</td>
                                                        <td class="td-actions text-right">

                                                            <a class="btn btn-primary"
                                                                href="{{ route('users.show', $user->id) }}"><i
                                                                    class="fa fa-fw fa-eye"></i></a>

                                                            <form action="{{ route('users.destroy', $user->id) }}"
                                                                method="POST" style="display: inline-block;" onsubmit="return confirm('¿Estas Seguro que deseas Eliminar un Usuario?')">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger"><i
                                                                        class="fa fa-fw fa-trash"></i></button>
                                                            </form>
                                                        </td>
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
