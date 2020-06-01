<?php namespace Tests\Repositories;

use App\Models\Engin;
use App\Repositories\EnginRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EnginRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EnginRepository
     */
    protected $enginRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->enginRepo = \App::make(EnginRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_engin()
    {
        $engin = factory(Engin::class)->make()->toArray();

        $createdEngin = $this->enginRepo->create($engin);

        $createdEngin = $createdEngin->toArray();
        $this->assertArrayHasKey('id', $createdEngin);
        $this->assertNotNull($createdEngin['id'], 'Created Engin must have id specified');
        $this->assertNotNull(Engin::find($createdEngin['id']), 'Engin with given id must be in DB');
        $this->assertModelData($engin, $createdEngin);
    }

    /**
     * @test read
     */
    public function test_read_engin()
    {
        $engin = factory(Engin::class)->create();

        $dbEngin = $this->enginRepo->find($engin->id);

        $dbEngin = $dbEngin->toArray();
        $this->assertModelData($engin->toArray(), $dbEngin);
    }

    /**
     * @test update
     */
    public function test_update_engin()
    {
        $engin = factory(Engin::class)->create();
        $fakeEngin = factory(Engin::class)->make()->toArray();

        $updatedEngin = $this->enginRepo->update($fakeEngin, $engin->id);

        $this->assertModelData($fakeEngin, $updatedEngin->toArray());
        $dbEngin = $this->enginRepo->find($engin->id);
        $this->assertModelData($fakeEngin, $dbEngin->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_engin()
    {
        $engin = factory(Engin::class)->create();

        $resp = $this->enginRepo->delete($engin->id);

        $this->assertTrue($resp);
        $this->assertNull(Engin::find($engin->id), 'Engin should not exist in DB');
    }
}
