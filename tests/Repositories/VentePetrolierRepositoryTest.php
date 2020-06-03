<?php namespace Tests\Repositories;

use App\Models\VentePetrolier;
use App\Repositories\VentePetrolierRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VentePetrolierRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VentePetrolierRepository
     */
    protected $ventePetrolierRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ventePetrolierRepo = \App::make(VentePetrolierRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vente_petrolier()
    {
        $ventePetrolier = factory(VentePetrolier::class)->make()->toArray();

        $createdVentePetrolier = $this->ventePetrolierRepo->create($ventePetrolier);

        $createdVentePetrolier = $createdVentePetrolier->toArray();
        $this->assertArrayHasKey('id', $createdVentePetrolier);
        $this->assertNotNull($createdVentePetrolier['id'], 'Created VentePetrolier must have id specified');
        $this->assertNotNull(VentePetrolier::find($createdVentePetrolier['id']), 'VentePetrolier with given id must be in DB');
        $this->assertModelData($ventePetrolier, $createdVentePetrolier);
    }

    /**
     * @test read
     */
    public function test_read_vente_petrolier()
    {
        $ventePetrolier = factory(VentePetrolier::class)->create();

        $dbVentePetrolier = $this->ventePetrolierRepo->find($ventePetrolier->id);

        $dbVentePetrolier = $dbVentePetrolier->toArray();
        $this->assertModelData($ventePetrolier->toArray(), $dbVentePetrolier);
    }

    /**
     * @test update
     */
    public function test_update_vente_petrolier()
    {
        $ventePetrolier = factory(VentePetrolier::class)->create();
        $fakeVentePetrolier = factory(VentePetrolier::class)->make()->toArray();

        $updatedVentePetrolier = $this->ventePetrolierRepo->update($fakeVentePetrolier, $ventePetrolier->id);

        $this->assertModelData($fakeVentePetrolier, $updatedVentePetrolier->toArray());
        $dbVentePetrolier = $this->ventePetrolierRepo->find($ventePetrolier->id);
        $this->assertModelData($fakeVentePetrolier, $dbVentePetrolier->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vente_petrolier()
    {
        $ventePetrolier = factory(VentePetrolier::class)->create();

        $resp = $this->ventePetrolierRepo->delete($ventePetrolier->id);

        $this->assertTrue($resp);
        $this->assertNull(VentePetrolier::find($ventePetrolier->id), 'VentePetrolier should not exist in DB');
    }
}
