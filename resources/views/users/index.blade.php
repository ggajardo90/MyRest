@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Usuario'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h3 class="card-title text-dark">Usuarios</h3>
                            <p class="card-category text-dark">Usuarios registrados en el sistema.</p>
                        </div>
                        <div class="card-body">
                            <div class="col-12 text-right">
                                <a href="{{ route('users.create') }}" class="btn btn-warning">Nuevo
                                    Usuario</a>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong class="text-dark">{{ $message }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="table-responsive-sm">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre y Apellido</th>
                                            <th>Correo</th>
                                            <th>Nombre de usuario</th>
                                            <th>Rol/es</th>
                                            <th class="text-right">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>
                                                    @if (!empty($user->getRoleNames()))
                                                        @foreach ($user->getRoleNames() as $v)
                                                            {{ $v }}
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                        onsubmit="return confirm('¿Estas Seguro que deseas Eliminar un Usuario?')">
                                                        <a class="btn btn-just-icon btn-primary"
                                                            href="{{ route('users.show', $user->id) }}"><i
                                                                class="fa fa-eye"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-just-icon btn-danger"><i
                                                                class="fa fa-trash"></i></button>
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
@endsection
