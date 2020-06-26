<?php namespace Tests\Repositories;

use App\Models\CarburantFacture;
use App\Repositories\CarburantFactureRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CarburantFactureRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CarburantFactureRepository
     */
    protected $carburantFactureRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->carburantFactureRepo = \App::make(CarburantFactureRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_carburant_facture()
    {
        $carburantFacture = factory(CarburantFacture::class)->make()->toArray();

        $createdCarburantFacture = $this->carburantFactureRepo->create($carburantFacture);

        $createdCarburantFacture = $createdCarburantFacture->toArray();
        $this->assertArrayHasKey('id', $createdCarburantFacture);
        $this->assertNotNull($createdCarburantFacture['id'], 'Created CarburantFacture must have id specified');
        $this->assertNotNull(CarburantFacture::find($createdCarburantFacture['id']), 'CarburantFacture with given id must be in DB');
        $this->assertModelData($carburantFacture, $createdCarburantFacture);
    }

    /**
     * @test read
     */
    public function test_read_carburant_facture()
    {
        $carburantFacture = factory(CarburantFacture::class)->create();

        $dbCarburantFacture = $this->carburantFactureRepo->find($carburantFacture->id);

        $dbCarburantFacture = $dbCarburantFacture->toArray();
        $this->assertModelData($carburantFacture->toArray(), $dbCarburantFacture);
    }

    /**
     * @test update
     */
    public function test_update_carburant_facture()
    {
        $carburantFacture = factory(CarburantFacture::class)->create();
        $fakeCarburantFacture = factory(CarburantFacture::class)->make()->toArray();

        $updatedCarburantFacture = $this->carburantFactureRepo->update($fakeCarburantFacture, $carburantFacture->id);

        $this->assertModelData($fakeCarburantFacture, $updatedCarburantFacture->toArray());
        $dbCarburantFacture = $this->carburantFactureRepo->find($carburantFacture->id);
        $this->assertModelData($fakeCarburantFacture, $dbCarburantFacture->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_carburant_facture()
    {
        $carburantFacture = factory(CarburantFacture::class)->create();

        $resp = $this->carburantFactureRepo->delete($carburantFacture->id);

        $this->assertTrue($resp);
        $this->assertNull(CarburantFacture::find($carburantFacture->id), 'CarburantFacture should not exist in DB');
    }
}
