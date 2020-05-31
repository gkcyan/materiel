<?php namespace Tests\Repositories;

use App\Models\Pompiste;
use App\Repositories\PompisteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PompisteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PompisteRepository
     */
    protected $pompisteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pompisteRepo = \App::make(PompisteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pompiste()
    {
        $pompiste = factory(Pompiste::class)->make()->toArray();

        $createdPompiste = $this->pompisteRepo->create($pompiste);

        $createdPompiste = $createdPompiste->toArray();
        $this->assertArrayHasKey('id', $createdPompiste);
        $this->assertNotNull($createdPompiste['id'], 'Created Pompiste must have id specified');
        $this->assertNotNull(Pompiste::find($createdPompiste['id']), 'Pompiste with given id must be in DB');
        $this->assertModelData($pompiste, $createdPompiste);
    }

    /**
     * @test read
     */
    public function test_read_pompiste()
    {
        $pompiste = factory(Pompiste::class)->create();

        $dbPompiste = $this->pompisteRepo->find($pompiste->id);

        $dbPompiste = $dbPompiste->toArray();
        $this->assertModelData($pompiste->toArray(), $dbPompiste);
    }

    /**
     * @test update
     */
    public function test_update_pompiste()
    {
        $pompiste = factory(Pompiste::class)->create();
        $fakePompiste = factory(Pompiste::class)->make()->toArray();

        $updatedPompiste = $this->pompisteRepo->update($fakePompiste, $pompiste->id);

        $this->assertModelData($fakePompiste, $updatedPompiste->toArray());
        $dbPompiste = $this->pompisteRepo->find($pompiste->id);
        $this->assertModelData($fakePompiste, $dbPompiste->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pompiste()
    {
        $pompiste = factory(Pompiste::class)->create();

        $resp = $this->pompisteRepo->delete($pompiste->id);

        $this->assertTrue($resp);
        $this->assertNull(Pompiste::find($pompiste->id), 'Pompiste should not exist in DB');
    }
}
