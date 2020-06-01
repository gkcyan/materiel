<?php namespace Tests\Repositories;

use App\Models\EnginType;
use App\Repositories\EnginTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EnginTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EnginTypeRepository
     */
    protected $enginTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->enginTypeRepo = \App::make(EnginTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_engin_type()
    {
        $enginType = factory(EnginType::class)->make()->toArray();

        $createdEnginType = $this->enginTypeRepo->create($enginType);

        $createdEnginType = $createdEnginType->toArray();
        $this->assertArrayHasKey('id', $createdEnginType);
        $this->assertNotNull($createdEnginType['id'], 'Created EnginType must have id specified');
        $this->assertNotNull(EnginType::find($createdEnginType['id']), 'EnginType with given id must be in DB');
        $this->assertModelData($enginType, $createdEnginType);
    }

    /**
     * @test read
     */
    public function test_read_engin_type()
    {
        $enginType = factory(EnginType::class)->create();

        $dbEnginType = $this->enginTypeRepo->find($enginType->id);

        $dbEnginType = $dbEnginType->toArray();
        $this->assertModelData($enginType->toArray(), $dbEnginType);
    }

    /**
     * @test update
     */
    public function test_update_engin_type()
    {
        $enginType = factory(EnginType::class)->create();
        $fakeEnginType = factory(EnginType::class)->make()->toArray();

        $updatedEnginType = $this->enginTypeRepo->update($fakeEnginType, $enginType->id);

        $this->assertModelData($fakeEnginType, $updatedEnginType->toArray());
        $dbEnginType = $this->enginTypeRepo->find($enginType->id);
        $this->assertModelData($fakeEnginType, $dbEnginType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_engin_type()
    {
        $enginType = factory(EnginType::class)->create();

        $resp = $this->enginTypeRepo->delete($enginType->id);

        $this->assertTrue($resp);
        $this->assertNull(EnginType::find($enginType->id), 'EnginType should not exist in DB');
    }
}
