<table class="table table-responsive" id="sedes-table">
    <thead>
        <th>Nombre</th>
        <th>Ubicacion</th>
        <th>Direccion</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($sedes as $sede)
        <tr>
            <td>{!! $sede->nombre !!}</td>
            <td>{!! $sede->ubicacion !!}</td>
            <td>{!! $sede->direccion !!}</td>
            <td>
                {!! Form::open(['route' => ['sedes.destroy', $sede->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sedes.show', [$sede->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sedes.edit', [$sede->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>