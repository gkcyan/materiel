<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TypeFournisseur;

class TypeFournisseurApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_type_fournisseur()
    {
        $typeFournisseur = factory(TypeFournisseur::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/type_fournisseurs', $typeFournisseur
        );

        $this->assertApiResponse($typeFournisseur);
    }

    /**
     * @test
     */
    public function test_read_type_fournisseur()
    {
        $typeFournisseur = factory(TypeFournisseur::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/type_fournisseurs/'.$typeFournisseur->id
        );

        $this->assertApiResponse($typeFournisseur->toArray());
    }

    /**
     * @test
     */
    public function test_update_type_fournisseur()
    {
        $typeFournisseur = factory(TypeFournisseur::class)->create();
        $editedTypeFournisseur = factory(TypeFournisseur::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/type_fournisseurs/'.$typeFournisseur->id,
            $editedTypeFournisseur
        );

        $this->assertApiResponse($editedTypeFournisseur);
    }

    /**
     * @test
     */
    public function test_delete_type_fournisseur()
    {
        $typeFournisseur = factory(TypeFournisseur::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/type_fournisseurs/'.$typeFournisseur->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/type_fournisseurs/'.$typeFournisseur->id
        );

        $this->response->assertStatus(404);
    }
}
