<?php

use Faker\Factory as Faker;
use App\Models\Encuesta;
use App\Repositories\EncuestaRepository;

trait MakeEncuestaTrait
{
    /**
     * Create fake instance of Encuesta and save it in database
     *
     * @param array $encuestaFields
     * @return Encuesta
     */
    public function makeEncuesta($encuestaFields = [])
    {
        /** @var EncuestaRepository $encuestaRepo */
        $encuestaRepo = App::make(EncuestaRepository::class);
        $theme = $this->fakeEncuestaData($encuestaFields);
        return $encuestaRepo->create($theme);
    }

    /**
     * Get fake instance of Encuesta
     *
     * @param array $encuestaFields
     * @return Encuesta
     */
    public function fakeEncuesta($encuestaFields = [])
    {
        return new Encuesta($this->fakeEncuestaData($encuestaFields));
    }

    /**
     * Get fake data of Encuesta
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEncuestaData($encuestaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'vivienda' => $fake->word,
            'vive_con' => $fake->word,
            'gastos_estudio' => $fake->word,
            'procedencia' => $fake->word,
            'nota_ingreso' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $encuestaFields);
    }
}
