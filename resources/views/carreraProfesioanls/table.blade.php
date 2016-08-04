<table class="table table-responsive" id="carreraProfesioanls-table">
    <thead>
        <th>Nombre</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($carreraProfesioanls as $carreraProfesioanl)
        <tr>
            <td>{!! $carreraProfesioanl->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['carreraProfesioanls.destroy', $carreraProfesioanl->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('carreraProfesioanls.show', [$carreraProfesioanl->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('carreraProfesioanls.edit', [$carreraProfesioanl->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>