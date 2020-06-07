<?php namespace Tests\Repositories;

use App\Models\ProduitPrix;
use App\Repositories\ProduitPrixRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProduitPrixRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProduitPrixRepository
     */
    protected $produitPrixRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->produitPrixRepo = \App::make(ProduitPrixRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_produit_prix()
    {
        $produitPrix = factory(ProduitPrix::class)->make()->toArray();

        $createdProduitPrix = $this->produitPrixRepo->create($produitPrix);

        $createdProduitPrix = $createdProduitPrix->toArray();
        $this->assertArrayHasKey('id', $createdProduitPrix);
        $this->assertNotNull($createdProduitPrix['id'], 'Created ProduitPrix must have id specified');
        $this->assertNotNull(ProduitPrix::find($createdProduitPrix['id']), 'ProduitPrix with given id must be in DB');
        $this->assertModelData($produitPrix, $createdProduitPrix);
    }

    /**
     * @test read
     */
    public function test_read_produit_prix()
    {
        $produitPrix = factory(ProduitPrix::class)->create();

        $dbProduitPrix = $this->produitPrixRepo->find($produitPrix->id);

        $dbProduitPrix = $dbProduitPrix->toArray();
        $this->assertModelData($produitPrix->toArray(), $dbProduitPrix);
    }

    /**
     * @test update
     */
    public function test_update_produit_prix()
    {
        $produitPrix = factory(ProduitPrix::class)->create();
        $fakeProduitPrix = factory(ProduitPrix::class)->make()->toArray();

        $updatedProduitPrix = $this->produitPrixRepo->update($fakeProduitPrix, $produitPrix->id);

        $this->assertModelData($fakeProduitPrix, $updatedProduitPrix->toArray());
        $dbProduitPrix = $this->produitPrixRepo->find($produitPrix->id);
        $this->assertModelData($fakeProduitPrix, $dbProduitPrix->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_produit_prix()
    {
        $produitPrix = factory(ProduitPrix::class)->create();

        $resp = $this->produitPrixRepo->delete($produitPrix->id);

        $this->assertTrue($resp);
        $this->assertNull(ProduitPrix::find($produitPrix->id), 'ProduitPrix should not exist in DB');
    }
}
