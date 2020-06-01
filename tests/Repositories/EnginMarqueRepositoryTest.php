<?php namespace Tests\Repositories;

use App\Models\EnginMarque;
use App\Repositories\EnginMarqueRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EnginMarqueRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EnginMarqueRepository
     */
    protected $enginMarqueRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->enginMarqueRepo = \App::make(EnginMarqueRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_engin_marque()
    {
        $enginMarque = factory(EnginMarque::class)->make()->toArray();

        $createdEnginMarque = $this->enginMarqueRepo->create($enginMarque);

        $createdEnginMarque = $createdEnginMarque->toArray();
        $this->assertArrayHasKey('id', $createdEnginMarque);
        $this->assertNotNull($createdEnginMarque['id'], 'Created EnginMarque must have id specified');
        $this->assertNotNull(EnginMarque::find($createdEnginMarque['id']), 'EnginMarque with given id must be in DB');
        $this->assertModelData($enginMarque, $createdEnginMarque);
    }

    /**
     * @test read
     */
    public function test_read_engin_marque()
    {
        $enginMarque = factory(EnginMarque::class)->create();

        $dbEnginMarque = $this->enginMarqueRepo->find($enginMarque->id);

        $dbEnginMarque = $dbEnginMarque->toArray();
        $this->assertModelData($enginMarque->toArray(), $dbEnginMarque);
    }

    /**
     * @test update
     */
    public function test_update_engin_marque()
    {
        $enginMarque = factory(EnginMarque::class)->create();
        $fakeEnginMarque = factory(EnginMarque::class)->make()->toArray();

        $updatedEnginMarque = $this->enginMarqueRepo->update($fakeEnginMarque, $enginMarque->id);

        $this->assertModelData($fakeEnginMarque, $updatedEnginMarque->toArray());
        $dbEnginMarque = $this->enginMarqueRepo->find($enginMarque->id);
        $this->assertModelData($fakeEnginMarque, $dbEnginMarque->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_engin_marque()
    {
        $enginMarque = factory(EnginMarque::class)->create();

        $resp = $this->enginMarqueRepo->delete($enginMarque->id);

        $this->assertTrue($resp);
        $this->assertNull(EnginMarque::find($enginMarque->id), 'EnginMarque should not exist in DB');
    }
}
