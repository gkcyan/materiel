<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Fournisseur;

class FournisseurApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_fournisseur()
    {
        $fournisseur = factory(Fournisseur::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/fournisseurs', $fournisseur
        );

        $this->assertApiResponse($fournisseur);
    }

    /**
     * @test
     */
    public function test_read_fournisseur()
    {
        $fournisseur = factory(Fournisseur::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/fournisseurs/'.$fournisseur->id
        );

        $this->assertApiResponse($fournisseur->toArray());
    }

    /**
     * @test
     */
    public function test_update_fournisseur()
    {
        $fournisseur = factory(Fournisseur::class)->create();
        $editedFournisseur = factory(Fournisseur::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/fournisseurs/'.$fournisseur->id,
            $editedFournisseur
        );

        $this->assertApiResponse($editedFournisseur);
    }

    /**
     * @test
     */
    public function test_delete_fournisseur()
    {
        $fournisseur = factory(Fournisseur::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/fournisseurs/'.$fournisseur->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/fournisseurs/'.$fournisseur->id
        );

        $this->response->assertStatus(404);
    }
}
