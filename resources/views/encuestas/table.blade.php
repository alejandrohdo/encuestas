<table class="table table-responsive" id="encuestas-table">
    <thead>
        <th>Nombre</th>
        <th>Vivienda</th>
        <th>Vive</th>
        <th>Gastoestudio</th>
        <th>Procedencia</th>
        <th>Nota Ingreso</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($encuestas as $encuesta)
        <tr>
            <td>{!! $encuesta->nombre !!}</td>
            <td>{!! $encuesta->vivienda !!}</td>
            <td>{!! $encuesta->vive !!}</td>
            <td>{!! $encuesta->gastoEstudio !!}</td>
            <td>{!! $encuesta->procedencia !!}</td>
            <td>{!! $encuesta->nota_ingreso !!}</td>
            <td>
                {!! Form::open(['route' => ['encuestas.destroy', $encuesta->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('encuestas.show', [$encuesta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('encuestas.edit', [$encuesta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>