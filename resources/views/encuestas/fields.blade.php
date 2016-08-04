<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Vivienda Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vivienda', 'Vivienda:') !!}
    {!! Form::select('vivienda', ['Alquilado' => 'Alquilado', 'Propio' => 'Propio', 'Alojado' => 'Alojado'], null, ['class' => 'form-control']) !!}
</div>

<!-- Vive Con Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vive_con', 'Vive Con:') !!}
    {!! Form::select('vive_con', ['Padres' => 'Padres', 'Un familiar' => 'Un familiar', 'Vivo solo' => 'Vivo solo', 'otro' => 'otro'], null, ['class' => 'form-control']) !!}
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
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('encuestas.index') !!}" class="btn btn-default">Cancel</a>
</div>
