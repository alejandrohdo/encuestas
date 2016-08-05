<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Vivienda Field -->
<div class="form-group col-sm-12">
    {!! Form::label('vivienda', 'Vivienda:') !!}
    <label class="radio-inline">
        {!! Form::radio('vivienda', "Alquilado", null) !!} Alquilado
    </label>
    <label class="radio-inline">
        {!! Form::radio('vivienda', "Propio", null) !!} Propio
    </label>
    <label class="radio-inline">
        {!! Form::radio('vivienda', "Alojado", null) !!} Alojado
    </label>
</div>

<!-- Vive Field -->
<div class="form-group col-sm-12">
    {!! Form::label('vive', 'Vive:') !!}
    <label class="radio-inline">
        {!! Form::radio('vive', "Padres", null) !!} Padres
    </label>
    <label class="radio-inline">
        {!! Form::radio('vive', "Familiar", null) !!} Familiar
    </label>
    <label class="radio-inline">
        {!! Form::radio('vive', "Solo", null) !!} Solo
    </label>
</div>

<!-- Gastoestudio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gastoEstudio', 'Gastoestudio:') !!}
    {!! Form::number('gastoEstudio', null, ['class' => 'form-control']) !!}
</div>

<!-- Procedencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('procedencia', 'Procedencia:') !!}
    {!! Form::text('procedencia', null, ['class' => 'form-control']) !!}
</div>

<!-- Nota Ingreso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nota_ingreso', 'Nota Ingreso:') !!}
    {!! Form::number('nota_ingreso', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('encuestas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
