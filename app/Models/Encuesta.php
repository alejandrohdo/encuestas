<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Encuesta",
 *      required={"nombre", "vivienda", "vive_con", "nota_ingreso"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="vivienda",
 *          description="vivienda",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="vive_con",
 *          description="vive_con",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="gastos_estudio",
 *          description="gastos_estudio",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="procedencia",
 *          description="procedencia",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nota_ingreso",
 *          description="nota_ingreso",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Encuesta extends Model
{
    use SoftDeletes;

    public $table = 'encuestas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'vivienda',
        'vive_con',
        'gastos_estudio',
        'procedencia',
        'nota_ingreso'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'vivienda' => 'string',
        'vive_con' => 'string',
        'gastos_estudio' => 'string',
        'procedencia' => 'string',
        'nota_ingreso' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'vivienda' => 'required',
        'vive_con' => 'required',
        'nota_ingreso' => 'required'
    ];
}
