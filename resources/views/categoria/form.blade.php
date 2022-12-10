<div class="row">
    <div class="bmd-form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">text_fields</i>
                </span>
            </div>

            <input type="text" name="nombre" class="form-control" placeholder="{{ __('Nombre de la categoria') }}"
                value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
        </div>
        @if ($errors->has('nombre'))
            <div id="nombre-error" class="error text-danger pl-3" for="nombre" style="display: block;">
                <strong>{{ $errors->first('nombre') }}</strong>
            </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="bmd-form-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">text_fields</i>
                </span>
            </div>

            <input type="text" name="descripcion" class="form-control"
                placeholder="{{ __('Descripción de la categoria') }}" value="{{ old('descripcion') }}" required
                autocomplete="descripcion" autofocus>
        </div>
        @if ($errors->has('descripcion'))
            <div id="descripcion-error" class="error text-danger pl-3" for="descripcion" style="display: block;">
                <strong>{{ $errors->first('descripcion') }}</strong>
            </div>
        @endif
    </div>
</div>

<div class="row">
    
</div>

{{-- <div class="row">
    {{ Form::label('descripcion', '', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{ Form::text('descripcion', $categoria->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese descripcion']) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div> --}}
<div class="row">
    {{ Form::label('imagen', '', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{ Form::file('imagen', ['accept' => 'image/*' . ($errors->has('imagen') ? ' is-invalid' : '')]) }}
        {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="row">
    {{ Form::label('activa', '', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        @if ($categoria->activa == '1')
            {{ Form::radio('activa', '1', true) }} Si
            <br />
            {{ Form::radio('activa', '0', false) }} No
        @elseif ($categoria->activa == '0')
            {{ Form::radio('activa', '1', false) }} Si
            <br />
            {{ Form::radio('activa', '0', true) }} No
        @else
            {{ Form::radio('activa', '1', true) }} Si
            <br />
            {{ Form::radio('activa', '0', false) }} No
        @endif
        {!! $errors->first('activa', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
