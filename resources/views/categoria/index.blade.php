@extends('layouts.main', ['activePage' => 'categorias', 'titlePage' => 'Categorias'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h3 class="card-title text-dark">Categorias</h3>
                            <p class="card-category text-dark">Categorias registradas en el sistema</p>
                        </div>

                        <div class="card-body">
                            @can('categoria.create')
                                <div class="col-12 text-right">
                                    <a href="{{ route('categorias.create') }}" class="btn btn-warning">Nueva
                                        Categoria</a>
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
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive-sm">
                                        <table class="table table-hover" id="tablecat">
                                            <thead class="text-primary">
                                                <tr>
                                                    {{-- <th>ID</th> --}}
                                                    <th class="text-center">Imagen</th>
                                                    <th>Nombre</th>
                                                    <th>Descripcion</th>
                                                    <th>Actualizado</th>
                                                    <th class="text-center">Disponible</th>
                                                    <th class="text-right">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categorias as $categoria)
                                                    <tr>
                                                        {{-- <td>{{ $categoria->id }}</td> --}}
                                                        <td>
                                                            <div class="img-container">
                                                                <img src="/img/categorias/{{ $categoria->imagen }}"
                                                                    style="width: 100px; heigth: 100px" rel="nofollow"
                                                                    alt="imagen" class="card-img-top img-fluid">
                                                            </div>
                                                        </td>
                                                        <td>{{ $categoria->nombre }}</td>
                                                        <td>{{ $categoria->descripcion }}</td>
                                                        <td>{{ $categoria->updated_at->diffForHumans() }}</td>
                                                        <td class="text-center">
                                                            @if ($categoria->activa)
                                                                <i class="material-icons text-success">check_circle</i>
                                                            @else
                                                                <i class="material-icons text-danger">cancel</i>
                                                            @endif
                                                        </td>


                                                        <td class="text-right">
                                                            <form
                                                                action="{{ route('categorias.destroy', $categoria->slug) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('¿Estas Seguro que quieres Eliminar una categoria?')">
                                                                <a class="btn btn-just-icon btn-primary"
                                                                    href="{{ route('categorias.show', $categoria->slug) }}"><i
                                                                        class="fa fa-eye"></i></a>
                                                                @can('categoria.edit')
                                                                    <a class="btn btn-just-icon btn-success"
                                                                        href="{{ route('categorias.edit', $categoria->slug) }}"><i
                                                                            class="fa fa-edit"></i></a>
                                                                @endcan
                                                                @csrf
                                                                @method('DELETE')
                                                                {{-- @can('categoria.destroy')
                                                            <button type="submit" class="btn btn-just-icon btn-danger"><i
                                                                    class="fa fa-trash"></i></button>
                                                        @endcan --}}
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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

@push('js')
    <script>
        $(document).ready(function() {
            $('#tablecat').DataTable({
                "language": {
                    "lengthMenu": "Mostrar " +
                        `<select class="custom-select custom-select-sm form-control form-control-sm text-center">
                            <option value = '10'>10</option>
                            <option value = '25'>25</option>
                            <option value = '50'>50</option>
                            <option value = '100'>100</option>
                            <option value = '-1'>Todos</option>
                        </select>` +
                        " categorias por pagina",
                    "zeroRecords": "No se encontró nada - lo siento",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                }
            });
        });
    </script>
@endpush
