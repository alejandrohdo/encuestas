<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Carrera;
use App\Models\Estudiante;
use App\Models\Encuesta;
use App\Models\Sede;
use DB;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reportes_basicos() 
    {   
        /*reporte que calcula cuanto se recaudo al dia*/
        $date = date('Y-M-d');
        $recaudo_dia=DB::table('lavados')
            ->select(DB::raw('DAY(fecha_lavado) as dia'), DB::raw('MONTH(fecha_lavado) as mes'), DB::raw('sum(precio) as total'))
            ->groupBy(DB::raw('DAY(fecha_lavado)') )
            ->get();
        
        #REPORTE DE del auto que más veces se ha lavado
        $mas_lavado=DB::table('lavados')
            ->select(DB::raw('MONTH(fecha_lavado) as mes'), DB::raw('count(vehiculo_id) as mas_lavado, count(*)'))
            ->groupBy(DB::raw('vehiculo_id'))
            ->orderBy('fecha_lavado')
            ->havingRaw('mas_lavado> 1')
            ->get();

        /*dd($monto_entreFechas);*/
        /*SELECT sum(precio) as 'costo_total' FROM lavados WHERE fecha_lavado BETWEEN '2016-07-29' AND '2016-08-01' AND estado_lavado='lavado'*/
        /*select foo, bar, count(*) from fake group by foo,bar;*/
        /*$results = DB::select(DB::raw("SELECT MONTH(fecha_lavado) as mes, vehiculo_id FROM lavados"));*/
        /*dd($mas_lavado); */   
        /*$holl= DB::table('lavados')->count(DB::raw('DISTINCT DAY(fecha_lavado)'));
        $holaa = DB::table('lavados')->distinct('vehiculo_id')->count('vehiculo_id');*/
                /*$duplicates = DB::table('table1')
            ->select('subject', 'book_id')
            ->where('group_id', 3)
            ->groupBy('subject', 'book_id')
            ->havingRaw('COUNT(*) > 1')
            ->get();*/

        /*dd($holaa);*/        
        $view =  \View::make('pdf.reportes_basicos', compact('recaudo_dia', 'date' ))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }
    public function reporte_rango_fecha(Request $request) 
    {   
        /*REPORTE QUE CALCULA Monto recaudado entre un rango de fechas;*/
        if ($request->ajax()) {
            /*return "LLEGUE AL SERVER";
*/          /*$lavado = new Lavado;*/
            /*$lavado->$request['id']= ;*/
            /*dd('LLEGUE AL SERVER');*/
            $fecha_inicio = $request['fecha_inicio'];
            $fecha_fin = $request['fecha_fin'];

            $monto_entreFechas = DB::table('lavados')
                ->select(DB::raw('sum(precio) as Costo_entre_fechas'))
                ->whereBetween('fecha_lavado', ['fecha_inicio', 'fecha_fin'])
                ->where('estado_lavado', '=', 'Lavado')
                ->get();
            /*dd($mas_lavado);        */
            $view =  \View::make('pdf.reporte_rango_fecha', compact('monto_entreFechas'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            /*return $pdf->stream('invoice');*/
            return 'generacin correcto';
            
            /*if ($correcto) {
                # code...
                return "SE GENERARA EL PDF..!";
            }
            else
            {
             return "ERROR ...!!";   
            }*/
        }
    }
    #LLAMADO A LA PAGINA DE GENERACION DE REPORTES POR UN RANGO DE FECHAS.
    public function pdf_fechas()
    {
        return view("pdf.pdf_fechas");
    }
    public function index()
    {
        return view("reportes.reporte_general");
    }

    public function getData() 
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }

    public function crearPDF($datos,$vistaurl,$tipo)
    {

        $data = $datos;
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }
    }


    /*public function crear_reporte_porpais($tipo){

     $vistaurl="pdf.reporte_por_pais";
     $paises=Pais::all();
     
     return $this->crearPDF($paises, $vistaurl,$tipo);


    }
*/





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
