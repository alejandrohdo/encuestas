<?php

use Faker\Factory as Faker;
use App\Models\Estudiante;
use App\Repositories\EstudianteRepository;

trait MakeEstudianteTrait
{
    /**
     * Create fake instance of Estudiante and save it in database
     *
     * @param array $estudianteFields
     * @return Estudiante
     */
    public function makeEstudiante($estudianteFields = [])
    {
        /** @var EstudianteRepository $estudianteRepo */
        $estudianteRepo = App::make(EstudianteRepository::class);
        $theme = $this->fakeEstudianteData($estudianteFields);
        return $estudianteRepo->create($theme);
    }

    /**
     * Get fake instance of Estudiante
     *
     * @param array $estudianteFields
     * @return Estudiante
     */
    public function fakeEstudiante($estudianteFields = [])
    {
        return new Estudiante($this->fakeEstudianteData($estudianteFields));
    }

    /**
     * Get fake data of Estudiante
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEstudianteData($estudianteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'codigo' => $fake->word,
            'nombre' => $fake->word,
            'apellidos' => $fake->word,
            'sexo' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $estudianteFields);
    }
}
