@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h2>Hola {{ Auth::user()->name }} <small class="text-muted">Bienvenido nuevamente</small></h2>
            </div>
        </div>
    </div>
@endsection
