<?php namespace Tests\Repositories;

use App\Models\EnginKilometrage;
use App\Repositories\EnginKilometrageRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EnginKilometrageRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EnginKilometrageRepository
     */
    protected $enginKilometrageRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->enginKilometrageRepo = \App::make(EnginKilometrageRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_engin_kilometrage()
    {
        $enginKilometrage = factory(EnginKilometrage::class)->make()->toArray();

        $createdEnginKilometrage = $this->enginKilometrageRepo->create($enginKilometrage);

        $createdEnginKilometrage = $createdEnginKilometrage->toArray();
        $this->assertArrayHasKey('id', $createdEnginKilometrage);
        $this->assertNotNull($createdEnginKilometrage['id'], 'Created EnginKilometrage must have id specified');
        $this->assertNotNull(EnginKilometrage::find($createdEnginKilometrage['id']), 'EnginKilometrage with given id must be in DB');
        $this->assertModelData($enginKilometrage, $createdEnginKilometrage);
    }

    /**
     * @test read
     */
    public function test_read_engin_kilometrage()
    {
        $enginKilometrage = factory(EnginKilometrage::class)->create();

        $dbEnginKilometrage = $this->enginKilometrageRepo->find($enginKilometrage->id);

        $dbEnginKilometrage = $dbEnginKilometrage->toArray();
        $this->assertModelData($enginKilometrage->toArray(), $dbEnginKilometrage);
    }

    /**
     * @test update
     */
    public function test_update_engin_kilometrage()
    {
        $enginKilometrage = factory(EnginKilometrage::class)->create();
        $fakeEnginKilometrage = factory(EnginKilometrage::class)->make()->toArray();

        $updatedEnginKilometrage = $this->enginKilometrageRepo->update($fakeEnginKilometrage, $enginKilometrage->id);

        $this->assertModelData($fakeEnginKilometrage, $updatedEnginKilometrage->toArray());
        $dbEnginKilometrage = $this->enginKilometrageRepo->find($enginKilometrage->id);
        $this->assertModelData($fakeEnginKilometrage, $dbEnginKilometrage->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_engin_kilometrage()
    {
        $enginKilometrage = factory(EnginKilometrage::class)->create();

        $resp = $this->enginKilometrageRepo->delete($enginKilometrage->id);

        $this->assertTrue($resp);
        $this->assertNull(EnginKilometrage::find($enginKilometrage->id), 'EnginKilometrage should not exist in DB');
    }
}
