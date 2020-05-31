<?php namespace Tests\Repositories;

use App\Models\Petrolier;
use App\Repositories\PetrolierRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PetrolierRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PetrolierRepository
     */
    protected $petrolierRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->petrolierRepo = \App::make(PetrolierRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_petrolier()
    {
        $petrolier = factory(Petrolier::class)->make()->toArray();

        $createdPetrolier = $this->petrolierRepo->create($petrolier);

        $createdPetrolier = $createdPetrolier->toArray();
        $this->assertArrayHasKey('id', $createdPetrolier);
        $this->assertNotNull($createdPetrolier['id'], 'Created Petrolier must have id specified');
        $this->assertNotNull(Petrolier::find($createdPetrolier['id']), 'Petrolier with given id must be in DB');
        $this->assertModelData($petrolier, $createdPetrolier);
    }

    /**
     * @test read
     */
    public function test_read_petrolier()
    {
        $petrolier = factory(Petrolier::class)->create();

        $dbPetrolier = $this->petrolierRepo->find($petrolier->id);

        $dbPetrolier = $dbPetrolier->toArray();
        $this->assertModelData($petrolier->toArray(), $dbPetrolier);
    }

    /**
     * @test update
     */
    public function test_update_petrolier()
    {
        $petrolier = factory(Petrolier::class)->create();
        $fakePetrolier = factory(Petrolier::class)->make()->toArray();

        $updatedPetrolier = $this->petrolierRepo->update($fakePetrolier, $petrolier->id);

        $this->assertModelData($fakePetrolier, $updatedPetrolier->toArray());
        $dbPetrolier = $this->petrolierRepo->find($petrolier->id);
        $this->assertModelData($fakePetrolier, $dbPetrolier->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_petrolier()
    {
        $petrolier = factory(Petrolier::class)->create();

        $resp = $this->petrolierRepo->delete($petrolier->id);

        $this->assertTrue($resp);
        $this->assertNull(Petrolier::find($petrolier->id), 'Petrolier should not exist in DB');
    }
}
