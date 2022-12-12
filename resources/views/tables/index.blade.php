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
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong class="text-dark">{{ $message }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            @endcan

                            <table class="table table-hover table-responsive-sm">
                                <thead class="text-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th class="text-center">Disponible</th>
                                        <th class="text-right">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tables as $table)
                                        <tr>
                                            <td>{{ $table->id }}</td>
                                            <td>{{ $table->name }}</td>
                                            <td class="text-center">
                                                @if ($table->status)
                                                    <i class="material-icons text-danger">cancel</i>
                                                @else
                                                    <i class="material-icons text-success">check_circle</i>
                                                @endif
                                            </td>

                                            <td class="text-right">
                                                {{-- <a class="btn btn-just-icon btn-primary"
                                                    href="{{ route('tables.show', $table->slug) }}"><i
                                                        class="fa fa-eye"></i></a> --}}

                                                <form action="{{ route('tables.destroy', $table->slug) }}" method="POST"
                                                    onsubmit="return confirm('¿Estas Seguro que quieres Eliminar una mesa?')">
                                                    @can('tables.edit')
                                                        <a class="btn btn-just-icon btn-success"
                                                            href="{{ route('tables.edit', $table->slug) }}"><i
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
