<?php namespace Tests\Repositories;

use App\Models\Activite;
use App\Repositories\ActiviteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ActiviteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ActiviteRepository
     */
    protected $activiteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->activiteRepo = \App::make(ActiviteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_activite()
    {
        $activite = factory(Activite::class)->make()->toArray();

        $createdActivite = $this->activiteRepo->create($activite);

        $createdActivite = $createdActivite->toArray();
        $this->assertArrayHasKey('id', $createdActivite);
        $this->assertNotNull($createdActivite['id'], 'Created Activite must have id specified');
        $this->assertNotNull(Activite::find($createdActivite['id']), 'Activite with given id must be in DB');
        $this->assertModelData($activite, $createdActivite);
    }

    /**
     * @test read
     */
    public function test_read_activite()
    {
        $activite = factory(Activite::class)->create();

        $dbActivite = $this->activiteRepo->find($activite->id);

        $dbActivite = $dbActivite->toArray();
        $this->assertModelData($activite->toArray(), $dbActivite);
    }

    /**
     * @test update
     */
    public function test_update_activite()
    {
        $activite = factory(Activite::class)->create();
        $fakeActivite = factory(Activite::class)->make()->toArray();

        $updatedActivite = $this->activiteRepo->update($fakeActivite, $activite->id);

        $this->assertModelData($fakeActivite, $updatedActivite->toArray());
        $dbActivite = $this->activiteRepo->find($activite->id);
        $this->assertModelData($fakeActivite, $dbActivite->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_activite()
    {
        $activite = factory(Activite::class)->create();

        $resp = $this->activiteRepo->delete($activite->id);

        $this->assertTrue($resp);
        $this->assertNull(Activite::find($activite->id), 'Activite should not exist in DB');
    }
}
