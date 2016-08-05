<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $estudiante->id !!}</p>
</div>

<!-- Codigo Field -->
<div class="form-group">
    {!! Form::label('codigo', 'Codigo:') !!}
    <p>{!! $estudiante->codigo !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $estudiante->nombre !!}</p>
</div>

<!-- Apellidos Field -->
<div class="form-group">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    <p>{!! $estudiante->apellidos !!}</p>
</div>

<!-- Sexo Field -->
<div class="form-group">
    {!! Form::label('sexo', 'Sexo:') !!}
    <p>{!! $estudiante->sexo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Fecha registro:') !!}
    <p>{!! $estudiante->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Actualizacion:') !!}
    <p>{!! $estudiante->updated_at !!}</p>
</div>

