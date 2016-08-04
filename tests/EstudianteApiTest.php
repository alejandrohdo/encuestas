<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EstudianteApiTest extends TestCase
{
    use MakeEstudianteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEstudiante()
    {
        $estudiante = $this->fakeEstudianteData();
        $this->json('POST', '/api/v1/estudiantes', $estudiante);

        $this->assertApiResponse($estudiante);
    }

    /**
     * @test
     */
    public function testReadEstudiante()
    {
        $estudiante = $this->makeEstudiante();
        $this->json('GET', '/api/v1/estudiantes/'.$estudiante->id);

        $this->assertApiResponse($estudiante->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEstudiante()
    {
        $estudiante = $this->makeEstudiante();
        $editedEstudiante = $this->fakeEstudianteData();

        $this->json('PUT', '/api/v1/estudiantes/'.$estudiante->id, $editedEstudiante);

        $this->assertApiResponse($editedEstudiante);
    }

    /**
     * @test
     */
    public function testDeleteEstudiante()
    {
        $estudiante = $this->makeEstudiante();
        $this->json('DELETE', '/api/v1/estudiantes/'.$estudiante->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/estudiantes/'.$estudiante->id);

        $this->assertResponseStatus(404);
    }
}
