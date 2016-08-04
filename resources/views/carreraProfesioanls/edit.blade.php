@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            CarreraProfesioanl
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($carreraProfesioanl, ['route' => ['carreraProfesioanls.update', $carreraProfesioanl->id], 'method' => 'patch']) !!}

                        @include('carreraProfesioanls.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection