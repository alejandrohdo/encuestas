<?php

use App\Models\Encuesta;
use App\Repositories\EncuestaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EncuestaRepositoryTest extends TestCase
{
    use MakeEncuestaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EncuestaRepository
     */
    protected $encuestaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->encuestaRepo = App::make(EncuestaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEncuesta()
    {
        $encuesta = $this->fakeEncuestaData();
        $createdEncuesta = $this->encuestaRepo->create($encuesta);
        $createdEncuesta = $createdEncuesta->toArray();
        $this->assertArrayHasKey('id', $createdEncuesta);
        $this->assertNotNull($createdEncuesta['id'], 'Created Encuesta must have id specified');
        $this->assertNotNull(Encuesta::find($createdEncuesta['id']), 'Encuesta with given id must be in DB');
        $this->assertModelData($encuesta, $createdEncuesta);
    }

    /**
     * @test read
     */
    public function testReadEncuesta()
    {
        $encuesta = $this->makeEncuesta();
        $dbEncuesta = $this->encuestaRepo->find($encuesta->id);
        $dbEncuesta = $dbEncuesta->toArray();
        $this->assertModelData($encuesta->toArray(), $dbEncuesta);
    }

    /**
     * @test update
     */
    public function testUpdateEncuesta()
    {
        $encuesta = $this->makeEncuesta();
        $fakeEncuesta = $this->fakeEncuestaData();
        $updatedEncuesta = $this->encuestaRepo->update($fakeEncuesta, $encuesta->id);
        $this->assertModelData($fakeEncuesta, $updatedEncuesta->toArray());
        $dbEncuesta = $this->encuestaRepo->find($encuesta->id);
        $this->assertModelData($fakeEncuesta, $dbEncuesta->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEncuesta()
    {
        $encuesta = $this->makeEncuesta();
        $resp = $this->encuestaRepo->delete($encuesta->id);
        $this->assertTrue($resp);
        $this->assertNull(Encuesta::find($encuesta->id), 'Encuesta should not exist in DB');
    }
}
