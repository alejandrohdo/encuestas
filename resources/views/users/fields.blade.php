<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('email', 'Correo:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('password', 'Contrasena:') !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_usuario', 'Tipo usuario:') !!}
    {!! Form::select('tipo_usuario', ['Administrador' => 'Administrador', 'Invitado' => 'Invitado'], null, ['class' => 'form-control']) !!}
</div>

<!-- estatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatus', 'Estus:') !!}
    {!! Form::select('estatus', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancelar</a>
</div>
