<div class="row">
    {{ Form::label('nombre', '', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{ Form::text('nombre', old('nombre', $categoria->nombre), ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese nombre']) }}
        {!! $errors->first('nombre', '<div class="error text-danger pl-3"><strong>:message</strong></div>') !!}
    </div>
</div>

<div class="row">
    {{ Form::label('descripcion', '', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{ Form::text('descripcion', old('nombre', $categoria->descripcion), ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese descripcion']) }}
        {!! $errors->first('descripcion', '<div class="error text-danger pl-3"><strong>:message</strong></div>') !!}
    </div>
</div>

<div class="row">
    {{ Form::label('imagen', '', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{ Form::file('imagen', ['accept' => 'image/*' . ($errors->has('imagen') ? ' is-invalid' : '')]) }}
        {!! $errors->first('imagen', '<div class="error text-danger pl-3"><strong>:message</strong></div>') !!}
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
        {!! $errors->first('activa', '<div class="error text-danger pl-3"><strong>:message</strong></div>') !!}
    </div>
</div>
