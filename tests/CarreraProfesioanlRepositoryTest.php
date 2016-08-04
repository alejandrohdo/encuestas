<?php

use App\Models\CarreraProfesioanl;
use App\Repositories\CarreraProfesioanlRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CarreraProfesioanlRepositoryTest extends TestCase
{
    use MakeCarreraProfesioanlTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CarreraProfesioanlRepository
     */
    protected $carreraProfesioanlRepo;

    public function setUp()
    {
        parent::setUp();
        $this->carreraProfesioanlRepo = App::make(CarreraProfesioanlRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCarreraProfesioanl()
    {
        $carreraProfesioanl = $this->fakeCarreraProfesioanlData();
        $createdCarreraProfesioanl = $this->carreraProfesioanlRepo->create($carreraProfesioanl);
        $createdCarreraProfesioanl = $createdCarreraProfesioanl->toArray();
        $this->assertArrayHasKey('id', $createdCarreraProfesioanl);
        $this->assertNotNull($createdCarreraProfesioanl['id'], 'Created CarreraProfesioanl must have id specified');
        $this->assertNotNull(CarreraProfesioanl::find($createdCarreraProfesioanl['id']), 'CarreraProfesioanl with given id must be in DB');
        $this->assertModelData($carreraProfesioanl, $createdCarreraProfesioanl);
    }

    /**
     * @test read
     */
    public function testReadCarreraProfesioanl()
    {
        $carreraProfesioanl = $this->makeCarreraProfesioanl();
        $dbCarreraProfesioanl = $this->carreraProfesioanlRepo->find($carreraProfesioanl->id);
        $dbCarreraProfesioanl = $dbCarreraProfesioanl->toArray();
        $this->assertModelData($carreraProfesioanl->toArray(), $dbCarreraProfesioanl);
    }

    /**
     * @test update
     */
    public function testUpdateCarreraProfesioanl()
    {
        $carreraProfesioanl = $this->makeCarreraProfesioanl();
        $fakeCarreraProfesioanl = $this->fakeCarreraProfesioanlData();
        $updatedCarreraProfesioanl = $this->carreraProfesioanlRepo->update($fakeCarreraProfesioanl, $carreraProfesioanl->id);
        $this->assertModelData($fakeCarreraProfesioanl, $updatedCarreraProfesioanl->toArray());
        $dbCarreraProfesioanl = $this->carreraProfesioanlRepo->find($carreraProfesioanl->id);
        $this->assertModelData($fakeCarreraProfesioanl, $dbCarreraProfesioanl->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCarreraProfesioanl()
    {
        $carreraProfesioanl = $this->makeCarreraProfesioanl();
        $resp = $this->carreraProfesioanlRepo->delete($carreraProfesioanl->id);
        $this->assertTrue($resp);
        $this->assertNull(CarreraProfesioanl::find($carreraProfesioanl->id), 'CarreraProfesioanl should not exist in DB');
    }
}
