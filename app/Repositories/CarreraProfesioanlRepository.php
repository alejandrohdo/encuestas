<?php

namespace App\Repositories;

use App\Models\CarreraProfesioanl;
use InfyOm\Generator\Common\BaseRepository;

class CarreraProfesioanlRepository extends BaseRepository
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
        return CarreraProfesioanl::class;
    }
}
