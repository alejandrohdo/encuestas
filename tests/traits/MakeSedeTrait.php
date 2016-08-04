<?php

use Faker\Factory as Faker;
use App\Models\Sede;
use App\Repositories\SedeRepository;

trait MakeSedeTrait
{
    /**
     * Create fake instance of Sede and save it in database
     *
     * @param array $sedeFields
     * @return Sede
     */
    public function makeSede($sedeFields = [])
    {
        /** @var SedeRepository $sedeRepo */
        $sedeRepo = App::make(SedeRepository::class);
        $theme = $this->fakeSedeData($sedeFields);
        return $sedeRepo->create($theme);
    }

    /**
     * Get fake instance of Sede
     *
     * @param array $sedeFields
     * @return Sede
     */
    public function fakeSede($sedeFields = [])
    {
        return new Sede($this->fakeSedeData($sedeFields));
    }

    /**
     * Get fake data of Sede
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSedeData($sedeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'ubicacion' => $fake->word,
            'direccion' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $sedeFields);
    }
}
