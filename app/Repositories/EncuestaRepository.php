<?php

namespace App\Repositories;

use App\Models\Encuesta;
use InfyOm\Generator\Common\BaseRepository;

class EncuestaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Encuesta::class;
    }
}
