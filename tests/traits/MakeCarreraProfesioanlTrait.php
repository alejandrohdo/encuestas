<?php

use Faker\Factory as Faker;
use App\Models\CarreraProfesioanl;
use App\Repositories\CarreraProfesioanlRepository;

trait MakeCarreraProfesioanlTrait
{
    /**
     * Create fake instance of CarreraProfesioanl and save it in database
     *
     * @param array $carreraProfesioanlFields
     * @return CarreraProfesioanl
     */
    public function makeCarreraProfesioanl($carreraProfesioanlFields = [])
    {
        /** @var CarreraProfesioanlRepository $carreraProfesioanlRepo */
        $carreraProfesioanlRepo = App::make(CarreraProfesioanlRepository::class);
        $theme = $this->fakeCarreraProfesioanlData($carreraProfesioanlFields);
        return $carreraProfesioanlRepo->create($theme);
    }

    /**
     * Get fake instance of CarreraProfesioanl
     *
     * @param array $carreraProfesioanlFields
     * @return CarreraProfesioanl
     */
    public function fakeCarreraProfesioanl($carreraProfesioanlFields = [])
    {
        return new CarreraProfesioanl($this->fakeCarreraProfesioanlData($carreraProfesioanlFields));
    }

    /**
     * Get fake data of CarreraProfesioanl
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCarreraProfesioanlData($carreraProfesioanlFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $carreraProfesioanlFields);
    }
}
