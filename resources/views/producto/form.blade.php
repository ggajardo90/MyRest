<div class="row">
    {{ Form::label('categoria_id', '', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{ Form::select('categoria_id', $categorias, $producto->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una categoria']) }}
        {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="row">
    {{ Form::label('nombre', '', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese nombre']) }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="row">
    {{ Form::label('precio', '', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{ Form::number('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese precio']) }}
        {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="row">
    {{ Form::label('descripcion', '', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{ Form::text('descripcion', $producto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese descripcion']) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="row">
    {{ Form::label('stock', '', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{ Form::number('stock', $producto->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese stock']) }}
        {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="row">
    {{ Form::label('imagen', '', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{ Form::file('imagen', ['accept' => 'image/*' . ($errors->has('imagen') ? ' is-invalid' : '')]) }}
        {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="row">
    {{ Form::label('activo', '', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        @if ($producto->activo == '1')
            {{ Form::radio('activo', '1', true) }} Si
            <br/>
            {{ Form::radio('activo', '0', false) }} No
        @elseif ($producto->activo == '0')
            {{ Form::radio('activo', '1', false) }} Si
            <br/>
            {{ Form::radio('activo', '0', true) }} No
        @else
            {{ Form::radio('activo', '1', true) }} Si
            <br/>
            {{ Form::radio('activo', '0', false) }} No
        @endif
        {!! $errors->first('activo', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
