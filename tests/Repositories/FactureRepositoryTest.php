<?php namespace Tests\Repositories;

use App\Models\Facture;
use App\Repositories\FactureRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FactureRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FactureRepository
     */
    protected $factureRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->factureRepo = \App::make(FactureRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_facture()
    {
        $facture = factory(Facture::class)->make()->toArray();

        $createdFacture = $this->factureRepo->create($facture);

        $createdFacture = $createdFacture->toArray();
        $this->assertArrayHasKey('id', $createdFacture);
        $this->assertNotNull($createdFacture['id'], 'Created Facture must have id specified');
        $this->assertNotNull(Facture::find($createdFacture['id']), 'Facture with given id must be in DB');
        $this->assertModelData($facture, $createdFacture);
    }

    /**
     * @test read
     */
    public function test_read_facture()
    {
        $facture = factory(Facture::class)->create();

        $dbFacture = $this->factureRepo->find($facture->id);

        $dbFacture = $dbFacture->toArray();
        $this->assertModelData($facture->toArray(), $dbFacture);
    }

    /**
     * @test update
     */
    public function test_update_facture()
    {
        $facture = factory(Facture::class)->create();
        $fakeFacture = factory(Facture::class)->make()->toArray();

        $updatedFacture = $this->factureRepo->update($fakeFacture, $facture->id);

        $this->assertModelData($fakeFacture, $updatedFacture->toArray());
        $dbFacture = $this->factureRepo->find($facture->id);
        $this->assertModelData($fakeFacture, $dbFacture->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_facture()
    {
        $facture = factory(Facture::class)->create();

        $resp = $this->factureRepo->delete($facture->id);

        $this->assertTrue($resp);
        $this->assertNull(Facture::find($facture->id), 'Facture should not exist in DB');
    }
}
