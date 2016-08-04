<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EncuestaApiTest extends TestCase
{
    use MakeEncuestaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEncuesta()
    {
        $encuesta = $this->fakeEncuestaData();
        $this->json('POST', '/api/v1/encuestas', $encuesta);

        $this->assertApiResponse($encuesta);
    }

    /**
     * @test
     */
    public function testReadEncuesta()
    {
        $encuesta = $this->makeEncuesta();
        $this->json('GET', '/api/v1/encuestas/'.$encuesta->id);

        $this->assertApiResponse($encuesta->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEncuesta()
    {
        $encuesta = $this->makeEncuesta();
        $editedEncuesta = $this->fakeEncuestaData();

        $this->json('PUT', '/api/v1/encuestas/'.$encuesta->id, $editedEncuesta);

        $this->assertApiResponse($editedEncuesta);
    }

    /**
     * @test
     */
    public function testDeleteEncuesta()
    {
        $encuesta = $this->makeEncuesta();
        $this->json('DELETE', '/api/v1/encuestas/'.$encuesta->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/encuestas/'.$encuesta->id);

        $this->assertResponseStatus(404);
    }
}
