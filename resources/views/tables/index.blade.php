@extends('layouts.main', ['activePage' => 'tables', 'titlePage' => 'Mesas'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h3 class="card-title text-dark">Mesas</h3>
                            <p class="card-category text-dark">Mesas registradas en el sistema</p>
                        </div>

                        <div class="card-body">
                            @can('categoria.create')
                                <div class="col-12 text-right">
                                    <a href="{{ route('tables.create') }}" class="btn btn-warning">Nueva
                                        Mesa</a>
                                </div>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                            @endcan

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th class="text-right">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($tables as $table)
                                            <tr>
                                                <td>{{ $table->id }}</td>
                                                <td>{{ $table->name }}</td>
                                                <td>{{ $table->status }}</td>

                                                <td class="text-right">
                                                    <form action="{{ route('tables.destroy', $table->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('¿Estas Seguro que quieres Eliminar una table?')">
                                                        <a class="btn btn-just-icon btn-primary"
                                                            href="{{ route('tables.show', $table->id) }}"><i
                                                                class="fa fa-eye"></i></a>
                                                        @can('tables.edit')
                                                            <a class="btn btn-just-icon btn-success"
                                                                href="{{ route('tables.edit', $table->id) }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                        @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('tables.destroy')
                                                            <button type="submit" class="btn btn-just-icon btn-danger"><i
                                                                    class="fa fa-trash"></i></button>
                                                        @endcan
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer mr-auto">
                                {{ $tables->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
