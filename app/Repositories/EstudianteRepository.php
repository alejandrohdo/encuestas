<?php

namespace App\Repositories;

use App\Models\Estudiante;
use InfyOm\Generator\Common\BaseRepository;

class EstudianteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'codigo',
        'nombre',
        'apellidos'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Estudiante::class;
    }
}
