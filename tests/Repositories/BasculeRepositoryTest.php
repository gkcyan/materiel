<?php namespace Tests\Repositories;

use App\Models\Bascule;
use App\Repositories\BasculeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BasculeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BasculeRepository
     */
    protected $basculeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->basculeRepo = \App::make(BasculeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bascule()
    {
        $bascule = factory(Bascule::class)->make()->toArray();

        $createdBascule = $this->basculeRepo->create($bascule);

        $createdBascule = $createdBascule->toArray();
        $this->assertArrayHasKey('id', $createdBascule);
        $this->assertNotNull($createdBascule['id'], 'Created Bascule must have id specified');
        $this->assertNotNull(Bascule::find($createdBascule['id']), 'Bascule with given id must be in DB');
        $this->assertModelData($bascule, $createdBascule);
    }

    /**
     * @test read
     */
    public function test_read_bascule()
    {
        $bascule = factory(Bascule::class)->create();

        $dbBascule = $this->basculeRepo->find($bascule->id);

        $dbBascule = $dbBascule->toArray();
        $this->assertModelData($bascule->toArray(), $dbBascule);
    }

    /**
     * @test update
     */
    public function test_update_bascule()
    {
        $bascule = factory(Bascule::class)->create();
        $fakeBascule = factory(Bascule::class)->make()->toArray();

        $updatedBascule = $this->basculeRepo->update($fakeBascule, $bascule->id);

        $this->assertModelData($fakeBascule, $updatedBascule->toArray());
        $dbBascule = $this->basculeRepo->find($bascule->id);
        $this->assertModelData($fakeBascule, $dbBascule->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bascule()
    {
        $bascule = factory(Bascule::class)->create();

        $resp = $this->basculeRepo->delete($bascule->id);

        $this->assertTrue($resp);
        $this->assertNull(Bascule::find($bascule->id), 'Bascule should not exist in DB');
    }
}
