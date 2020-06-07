<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProduitPrix;

class ProduitPrixApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_produit_prix()
    {
        $produitPrix = factory(ProduitPrix::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/produit_prixes', $produitPrix
        );

        $this->assertApiResponse($produitPrix);
    }

    /**
     * @test
     */
    public function test_read_produit_prix()
    {
        $produitPrix = factory(ProduitPrix::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/produit_prixes/'.$produitPrix->id
        );

        $this->assertApiResponse($produitPrix->toArray());
    }

    /**
     * @test
     */
    public function test_update_produit_prix()
    {
        $produitPrix = factory(ProduitPrix::class)->create();
        $editedProduitPrix = factory(ProduitPrix::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/produit_prixes/'.$produitPrix->id,
            $editedProduitPrix
        );

        $this->assertApiResponse($editedProduitPrix);
    }

    /**
     * @test
     */
    public function test_delete_produit_prix()
    {
        $produitPrix = factory(ProduitPrix::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/produit_prixes/'.$produitPrix->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/produit_prixes/'.$produitPrix->id
        );

        $this->response->assertStatus(404);
    }
}
