<?php namespace Tests\Repositories;

use App\Models\ZoneCollecte;
use App\Repositories\ZoneCollecteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ZoneCollecteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ZoneCollecteRepository
     */
    protected $zoneCollecteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->zoneCollecteRepo = \App::make(ZoneCollecteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_zone_collecte()
    {
        $zoneCollecte = factory(ZoneCollecte::class)->make()->toArray();

        $createdZoneCollecte = $this->zoneCollecteRepo->create($zoneCollecte);

        $createdZoneCollecte = $createdZoneCollecte->toArray();
        $this->assertArrayHasKey('id', $createdZoneCollecte);
        $this->assertNotNull($createdZoneCollecte['id'], 'Created ZoneCollecte must have id specified');
        $this->assertNotNull(ZoneCollecte::find($createdZoneCollecte['id']), 'ZoneCollecte with given id must be in DB');
        $this->assertModelData($zoneCollecte, $createdZoneCollecte);
    }

    /**
     * @test read
     */
    public function test_read_zone_collecte()
    {
        $zoneCollecte = factory(ZoneCollecte::class)->create();

        $dbZoneCollecte = $this->zoneCollecteRepo->find($zoneCollecte->id);

        $dbZoneCollecte = $dbZoneCollecte->toArray();
        $this->assertModelData($zoneCollecte->toArray(), $dbZoneCollecte);
    }

    /**
     * @test update
     */
    public function test_update_zone_collecte()
    {
        $zoneCollecte = factory(ZoneCollecte::class)->create();
        $fakeZoneCollecte = factory(ZoneCollecte::class)->make()->toArray();

        $updatedZoneCollecte = $this->zoneCollecteRepo->update($fakeZoneCollecte, $zoneCollecte->id);

        $this->assertModelData($fakeZoneCollecte, $updatedZoneCollecte->toArray());
        $dbZoneCollecte = $this->zoneCollecteRepo->find($zoneCollecte->id);
        $this->assertModelData($fakeZoneCollecte, $dbZoneCollecte->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_zone_collecte()
    {
        $zoneCollecte = factory(ZoneCollecte::class)->create();

        $resp = $this->zoneCollecteRepo->delete($zoneCollecte->id);

        $this->assertTrue($resp);
        $this->assertNull(ZoneCollecte::find($zoneCollecte->id), 'ZoneCollecte should not exist in DB');
    }
}
