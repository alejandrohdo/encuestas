<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SedeApiTest extends TestCase
{
    use MakeSedeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSede()
    {
        $sede = $this->fakeSedeData();
        $this->json('POST', '/api/v1/sedes', $sede);

        $this->assertApiResponse($sede);
    }

    /**
     * @test
     */
    public function testReadSede()
    {
        $sede = $this->makeSede();
        $this->json('GET', '/api/v1/sedes/'.$sede->id);

        $this->assertApiResponse($sede->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSede()
    {
        $sede = $this->makeSede();
        $editedSede = $this->fakeSedeData();

        $this->json('PUT', '/api/v1/sedes/'.$sede->id, $editedSede);

        $this->assertApiResponse($editedSede);
    }

    /**
     * @test
     */
    public function testDeleteSede()
    {
        $sede = $this->makeSede();
        $this->json('DELETE', '/api/v1/sedes/'.$sede->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/sedes/'.$sede->id);

        $this->assertResponseStatus(404);
    }
}
