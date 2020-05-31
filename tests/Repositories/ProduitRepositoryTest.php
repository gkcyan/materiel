<?php namespace Tests\Repositories;

use App\Models\Produit;
use App\Repositories\ProduitRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProduitRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProduitRepository
     */
    protected $produitRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->produitRepo = \App::make(ProduitRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_produit()
    {
        $produit = factory(Produit::class)->make()->toArray();

        $createdProduit = $this->produitRepo->create($produit);

        $createdProduit = $createdProduit->toArray();
        $this->assertArrayHasKey('id', $createdProduit);
        $this->assertNotNull($createdProduit['id'], 'Created Produit must have id specified');
        $this->assertNotNull(Produit::find($createdProduit['id']), 'Produit with given id must be in DB');
        $this->assertModelData($produit, $createdProduit);
    }

    /**
     * @test read
     */
    public function test_read_produit()
    {
        $produit = factory(Produit::class)->create();

        $dbProduit = $this->produitRepo->find($produit->id);

        $dbProduit = $dbProduit->toArray();
        $this->assertModelData($produit->toArray(), $dbProduit);
    }

    /**
     * @test update
     */
    public function test_update_produit()
    {
        $produit = factory(Produit::class)->create();
        $fakeProduit = factory(Produit::class)->make()->toArray();

        $updatedProduit = $this->produitRepo->update($fakeProduit, $produit->id);

        $this->assertModelData($fakeProduit, $updatedProduit->toArray());
        $dbProduit = $this->produitRepo->find($produit->id);
        $this->assertModelData($fakeProduit, $dbProduit->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_produit()
    {
        $produit = factory(Produit::class)->create();

        $resp = $this->produitRepo->delete($produit->id);

        $this->assertTrue($resp);
        $this->assertNull(Produit::find($produit->id), 'Produit should not exist in DB');
    }
}
