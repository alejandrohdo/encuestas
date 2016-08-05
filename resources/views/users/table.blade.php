<table class="table table-responsive" id="users-table">
    <thead>
        <th>Nombre</th>
        <th>Correo</th>      
        <th>Apellidos</th>
        <th>Tipo Usuario</th>
        <th>Estatus</th>
        <th>Fecha creacion</th>
        
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->apellidos !!}</td>
            <?php if ($user->tipo_usuario=='Administrador'): ?>
             <td><span class="btn btn-success">Administrador</span></td>                 
            <?php else: ?>
            <td><span class="btn btn-warning">Invitado</span></td>
            <?php endif ?>
            <td>{!! $user->estatus !!}</td>
            <td>{!! $user->created_at !!}</td>

            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>