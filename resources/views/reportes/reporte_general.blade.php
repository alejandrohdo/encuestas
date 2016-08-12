
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Reportes</h1>
    </section>
    <div class="content">
    	<div class="box-body table-responsive no-padding">
    	  <table class="table table-hover">
    	   
    	    <thead><tr>
    	      <th>DESCRIPCION</th>
    	      <th>EXPORTAR A PDF</th>
    	      <th>EXPORTAR A EXCEL</th> 
    	    </tr></thead>
    	    <tbody>
    	    <tr>
    	      <td>Reporte de alumnos que llenaron la encuesta por carreras</td>
    	      <td><a href="reportes/pdf" target="_blank" ><button class="btn btn-block btn-primary btn-xs">GENERAR</button></a></td>     
    	      <td><a href="/reportes/reporte_excel" target="_blank" ><button class="btn btn-block btn-success btn-xs">DESCARGAR</button></a></td>   
    	    </tr>
    	    <tr>
    	      <td>Reporte de alumnos que no llenaron</td>
    	      <td><a href="reportes/pdf_fechas" target="_blank" ><button class="btn btn-block btn-primary btn-xs">GENERAR</button></a></td>
    	      <td><a href="/reportes/reporte_excel" target="_blank" ><button class="btn btn-block btn-success btn-xs">DESCARGAR</button></a></td>   
    	    </tr>    	    
    	   
    	  </tbody></table>
    	</div><!-- /.box-body -->

    </div>
@endsection

