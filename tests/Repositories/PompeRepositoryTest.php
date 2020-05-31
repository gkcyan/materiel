<?php namespace Tests\Repositories;

use App\Models\Pompe;
use App\Repositories\PompeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PompeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PompeRepository
     */
    protected $pompeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pompeRepo = \App::make(PompeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pompe()
    {
        $pompe = factory(Pompe::class)->make()->toArray();

        $createdPompe = $this->pompeRepo->create($pompe);

        $createdPompe = $createdPompe->toArray();
        $this->assertArrayHasKey('id', $createdPompe);
        $this->assertNotNull($createdPompe['id'], 'Created Pompe must have id specified');
        $this->assertNotNull(Pompe::find($createdPompe['id']), 'Pompe with given id must be in DB');
        $this->assertModelData($pompe, $createdPompe);
    }

    /**
     * @test read
     */
    public function test_read_pompe()
    {
        $pompe = factory(Pompe::class)->create();

        $dbPompe = $this->pompeRepo->find($pompe->id);

        $dbPompe = $dbPompe->toArray();
        $this->assertModelData($pompe->toArray(), $dbPompe);
    }

    /**
     * @test update
     */
    public function test_update_pompe()
    {
        $pompe = factory(Pompe::class)->create();
        $fakePompe = factory(Pompe::class)->make()->toArray();

        $updatedPompe = $this->pompeRepo->update($fakePompe, $pompe->id);

        $this->assertModelData($fakePompe, $updatedPompe->toArray());
        $dbPompe = $this->pompeRepo->find($pompe->id);
        $this->assertModelData($fakePompe, $dbPompe->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pompe()
    {
        $pompe = factory(Pompe::class)->create();

        $resp = $this->pompeRepo->delete($pompe->id);

        $this->assertTrue($resp);
        $this->assertNull(Pompe::find($pompe->id), 'Pompe should not exist in DB');
    }
}
