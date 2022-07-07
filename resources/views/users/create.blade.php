@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Nuevo usuario'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form class="form" method="POST" action="{{ route('users.store') }}" class="form-horizontals">
                        @csrf

                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h3 class="card-title text-dark">Usuarios</h3>
                                <p class="card-category text-dark">Ingresar datos</p>
                            </div>
                            <div class="card-body">
                                <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                        </div>

                                        <input type="text" name="name" class="form-control"
                                            placeholder="{{ __('Nombre y apellido...') }}" value="{{ old('name') }}"
                                            required autocomplete="name" autofocus>
                                    </div>
                                    @if ($errors->has('name'))
                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                            style="display: block;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>

                                <!-- Username-->
                                <div class="bmd-form-group{{ $errors->has('username') ? ' has-danger' : '' }} mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">fingerprint</i>
                                            </span>
                                        </div>

                                        <input type="text" name="username" class="form-control"
                                            placeholder="{{ __('Usuario...') }}" value="{{ old('username') }}" required
                                            autocomplete="username">
                                    </div>
                                    @if ($errors->has('username'))
                                        <div id="username-error" class="error text-danger pl-3" for="username"
                                            style="display: block;">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <!--finUsername-->
                                
                                <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">email</i>
                                            </span>
                                        </div>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="{{ __('Correo Electronico...') }}" value="{{ old('email') }}"
                                            required autocomplete="email">
                                    </div>
                                    @if ($errors->has('email'))
                                        <div id="email-error" class="error text-danger pl-3" for="email"
                                            style="display: block;">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="{{ __('Contraseña...') }}" required autocomplete="new-password">
                                    </div>
                                    @if ($errors->has('password'))
                                        <div id="password-error" class="error text-danger pl-3" for="password"
                                            style="display: block;">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div
                                    class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" placeholder="{{ __('Confirmar contraseña...') }}"
                                            required autocomplete="new-password">
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <div id="password_confirmation-error" class="error text-danger pl-3"
                                            for="password_confirmation" style="display: block;">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div
                                    class="bmd-form-group{{ $errors->has('rol_confirmation') ? ' has-danger' : '' }} mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">groups</i>
                                            </span>
                                        </div>
                                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','Small')) !!}
                                        @if ($errors->has('rol_confirmation'))
                                            <div id="rol_confirmation-error" class="error text-danger pl-3"
                                                for="rol_confirmation" style="display: block;">
                                                <strong>{{ $errors->first('rol_confirmation') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
