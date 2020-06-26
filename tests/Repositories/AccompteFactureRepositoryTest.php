<?php namespace Tests\Repositories;

use App\Models\AccompteFacture;
use App\Repositories\AccompteFactureRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AccompteFactureRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AccompteFactureRepository
     */
    protected $accompteFactureRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->accompteFactureRepo = \App::make(AccompteFactureRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_accompte_facture()
    {
        $accompteFacture = factory(AccompteFacture::class)->make()->toArray();

        $createdAccompteFacture = $this->accompteFactureRepo->create($accompteFacture);

        $createdAccompteFacture = $createdAccompteFacture->toArray();
        $this->assertArrayHasKey('id', $createdAccompteFacture);
        $this->assertNotNull($createdAccompteFacture['id'], 'Created AccompteFacture must have id specified');
        $this->assertNotNull(AccompteFacture::find($createdAccompteFacture['id']), 'AccompteFacture with given id must be in DB');
        $this->assertModelData($accompteFacture, $createdAccompteFacture);
    }

    /**
     * @test read
     */
    public function test_read_accompte_facture()
    {
        $accompteFacture = factory(AccompteFacture::class)->create();

        $dbAccompteFacture = $this->accompteFactureRepo->find($accompteFacture->id);

        $dbAccompteFacture = $dbAccompteFacture->toArray();
        $this->assertModelData($accompteFacture->toArray(), $dbAccompteFacture);
    }

    /**
     * @test update
     */
    public function test_update_accompte_facture()
    {
        $accompteFacture = factory(AccompteFacture::class)->create();
        $fakeAccompteFacture = factory(AccompteFacture::class)->make()->toArray();

        $updatedAccompteFacture = $this->accompteFactureRepo->update($fakeAccompteFacture, $accompteFacture->id);

        $this->assertModelData($fakeAccompteFacture, $updatedAccompteFacture->toArray());
        $dbAccompteFacture = $this->accompteFactureRepo->find($accompteFacture->id);
        $this->assertModelData($fakeAccompteFacture, $dbAccompteFacture->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_accompte_facture()
    {
        $accompteFacture = factory(AccompteFacture::class)->create();

        $resp = $this->accompteFactureRepo->delete($accompteFacture->id);

        $this->assertTrue($resp);
        $this->assertNull(AccompteFacture::find($accompteFacture->id), 'AccompteFacture should not exist in DB');
    }
}
