<table class="table table-responsive" id="carreras-table">
    <thead>
        <th>Nombre</th>
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($carreras as $carrera)
        <tr>
            <td>{!! $carrera->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['carreras.destroy', $carrera->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('carreras.show', [$carrera->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('carreras.edit', [$carrera->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>