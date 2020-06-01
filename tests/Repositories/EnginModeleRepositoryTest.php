<?php namespace Tests\Repositories;

use App\Models\EnginModele;
use App\Repositories\EnginModeleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EnginModeleRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EnginModeleRepository
     */
    protected $enginModeleRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->enginModeleRepo = \App::make(EnginModeleRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_engin_modele()
    {
        $enginModele = factory(EnginModele::class)->make()->toArray();

        $createdEnginModele = $this->enginModeleRepo->create($enginModele);

        $createdEnginModele = $createdEnginModele->toArray();
        $this->assertArrayHasKey('id', $createdEnginModele);
        $this->assertNotNull($createdEnginModele['id'], 'Created EnginModele must have id specified');
        $this->assertNotNull(EnginModele::find($createdEnginModele['id']), 'EnginModele with given id must be in DB');
        $this->assertModelData($enginModele, $createdEnginModele);
    }

    /**
     * @test read
     */
    public function test_read_engin_modele()
    {
        $enginModele = factory(EnginModele::class)->create();

        $dbEnginModele = $this->enginModeleRepo->find($enginModele->id);

        $dbEnginModele = $dbEnginModele->toArray();
        $this->assertModelData($enginModele->toArray(), $dbEnginModele);
    }

    /**
     * @test update
     */
    public function test_update_engin_modele()
    {
        $enginModele = factory(EnginModele::class)->create();
        $fakeEnginModele = factory(EnginModele::class)->make()->toArray();

        $updatedEnginModele = $this->enginModeleRepo->update($fakeEnginModele, $enginModele->id);

        $this->assertModelData($fakeEnginModele, $updatedEnginModele->toArray());
        $dbEnginModele = $this->enginModeleRepo->find($enginModele->id);
        $this->assertModelData($fakeEnginModele, $dbEnginModele->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_engin_modele()
    {
        $enginModele = factory(EnginModele::class)->create();

        $resp = $this->enginModeleRepo->delete($enginModele->id);

        $this->assertTrue($resp);
        $this->assertNull(EnginModele::find($enginModele->id), 'EnginModele should not exist in DB');
    }
}
