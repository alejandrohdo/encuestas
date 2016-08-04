<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CarreraProfesioanlApiTest extends TestCase
{
    use MakeCarreraProfesioanlTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCarreraProfesioanl()
    {
        $carreraProfesioanl = $this->fakeCarreraProfesioanlData();
        $this->json('POST', '/api/v1/carreraProfesioanls', $carreraProfesioanl);

        $this->assertApiResponse($carreraProfesioanl);
    }

    /**
     * @test
     */
    public function testReadCarreraProfesioanl()
    {
        $carreraProfesioanl = $this->makeCarreraProfesioanl();
        $this->json('GET', '/api/v1/carreraProfesioanls/'.$carreraProfesioanl->id);

        $this->assertApiResponse($carreraProfesioanl->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCarreraProfesioanl()
    {
        $carreraProfesioanl = $this->makeCarreraProfesioanl();
        $editedCarreraProfesioanl = $this->fakeCarreraProfesioanlData();

        $this->json('PUT', '/api/v1/carreraProfesioanls/'.$carreraProfesioanl->id, $editedCarreraProfesioanl);

        $this->assertApiResponse($editedCarreraProfesioanl);
    }

    /**
     * @test
     */
    public function testDeleteCarreraProfesioanl()
    {
        $carreraProfesioanl = $this->makeCarreraProfesioanl();
        $this->json('DELETE', '/api/v1/carreraProfesioanls/'.$carreraProfesioanl->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/carreraProfesioanls/'.$carreraProfesioanl->id);

        $this->assertResponseStatus(404);
    }
}
