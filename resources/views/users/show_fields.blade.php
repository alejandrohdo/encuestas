<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{!! $user->name !!}</p>
</div>

<div class="form-group">
    {!! Form::label('email', 'Correo:') !!}
    <p>{!! $user->email !!}</p>
</div>


<div class="form-group">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    <p>{!! $user->apellidos !!}</p>
</div>


<div class="form-group">
    {!! Form::label('tipo_usuario', 'Tipo Usuario:') !!}
    <p>{!! $user->tipo_usuario !!}</p>
</div>

<div class="form-group">
    {!! Form::label('estatus', 'Estatus:') !!}
    <p>{!! $user->estatus !!}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado:') !!}
    <p>{!! $user->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Actualizado:') !!}
    <p>{!! $user->updated_at !!}</p>
</div>

