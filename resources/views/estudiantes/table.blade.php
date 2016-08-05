<table class="table table-responsive" id="estudiantes-table">
    <thead>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Sexo</th>
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($estudiantes as $estudiante)
        <tr>
            <td>{!! $estudiante->codigo !!}</td>
            <td>{!! $estudiante->nombre !!}</td>
            <td>{!! $estudiante->apellidos !!}</td>
            <td>{!! $estudiante->sexo !!}</td>
            <td>
                {!! Form::open(['route' => ['estudiantes.destroy', $estudiante->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('estudiantes.show', [$estudiante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('estudiantes.edit', [$estudiante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>