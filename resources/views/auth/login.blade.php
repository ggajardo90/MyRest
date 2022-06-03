@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('MyRest')])

@section('content')
    <div class="container" style="height: auto;">
        <div class="row align-items-center">
            <div class="col-md-9 ml-auto mr-auto mb-3 text-center">

            </div>
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-warning  text-center">
                            <h4 class="card-title text-dark"><strong>{{ __('Acceso') }}</strong></h4>
                            <div class="social-line">
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-description text-center">{{ __('Puedes iniciar sesión con tu ') }}
                                <strong>nombre de usuario o correo</strong> {{ __(' y tu contraseña') }}
                            </p>
                            <!--UserName-->
                                <div class="bmd-form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                        </div>
                                        <input type="text" name="username" class="form-control"
                                            placeholder="{{ __('Nombre de usuario o correo') }}" value="{{ old('username', '') }}" required
                                            autocomplete="username" autofocus>
                                    </div>
                                    @if ($errors->has('username'))
                                        <div id="username-error" class="error text-danger pl-3" for="username"
                                            style="display: block;">
                                            <strong>{{ $errors->first('username') }}</strong>
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
                                            placeholder="{{ __('Contraseña...') }}"
                                            value="{{ !$errors->has('password') ? '' : '' }}" required required
                                            autocomplete="current-password">
                                    </div>
                                    @if ($errors->has('password'))
                                        <div id="password-error" class="error text-danger pl-3" for="password"
                                            style="display: block;">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-check mr-auto ml-3 mt-3">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                            {{ old('remember') ? 'checked' : '' }}> {{ __('Recuerdame') }}
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                        </div>
                        <div class="card-footer justify-content-center">
                            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Acceder') }}</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-light">
                                <small>{{ __('Olvidaste tu contraseña?') }}</small>
                            </a>
                        @endif
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('register') }}" class="text-light">
                            <small>{{ __('Crea una nueva cuenta') }}</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
