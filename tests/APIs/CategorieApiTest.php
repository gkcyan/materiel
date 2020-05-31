<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Categorie;

class CategorieApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_categorie()
    {
        $categorie = factory(Categorie::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/categories', $categorie
        );

        $this->assertApiResponse($categorie);
    }

    /**
     * @test
     */
    public function test_read_categorie()
    {
        $categorie = factory(Categorie::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/categories/'.$categorie->id
        );

        $this->assertApiResponse($categorie->toArray());
    }

    /**
     * @test
     */
    public function test_update_categorie()
    {
        $categorie = factory(Categorie::class)->create();
        $editedCategorie = factory(Categorie::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/categories/'.$categorie->id,
            $editedCategorie
        );

        $this->assertApiResponse($editedCategorie);
    }

    /**
     * @test
     */
    public function test_delete_categorie()
    {
        $categorie = factory(Categorie::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/categories/'.$categorie->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/categories/'.$categorie->id
        );

        $this->response->assertStatus(404);
    }
}
