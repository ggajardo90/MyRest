<div class="row">
    {{ Form::label('nombre', '', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{ Form::text('name', $table->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese nombre']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="row">
    {{ Form::label('Estado', '', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        @if ($table->status == '1')
            {{ Form::radio('status', '1', true) }} Ocupada
            <br/>
            {{ Form::radio('status', '0', false) }} Desocupada
        @elseif ($table->status == '0')
            {{ Form::radio('status', '1', false) }} Ocupada
            <br/>
            {{ Form::radio('status', '0', true) }} Desocupada
        @else
            {{ Form::radio('status', '1', true) }} Ocupada
            <br/>
            {{ Form::radio('status', '0', false) }} Desocupada
        @endif
        {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
