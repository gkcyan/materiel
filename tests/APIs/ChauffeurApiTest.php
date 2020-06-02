<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Chauffeur;

class ChauffeurApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_chauffeur()
    {
        $chauffeur = factory(Chauffeur::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/chauffeurs', $chauffeur
        );

        $this->assertApiResponse($chauffeur);
    }

    /**
     * @test
     */
    public function test_read_chauffeur()
    {
        $chauffeur = factory(Chauffeur::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/chauffeurs/'.$chauffeur->id
        );

        $this->assertApiResponse($chauffeur->toArray());
    }

    /**
     * @test
     */
    public function test_update_chauffeur()
    {
        $chauffeur = factory(Chauffeur::class)->create();
        $editedChauffeur = factory(Chauffeur::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/chauffeurs/'.$chauffeur->id,
            $editedChauffeur
        );

        $this->assertApiResponse($editedChauffeur);
    }

    /**
     * @test
     */
    public function test_delete_chauffeur()
    {
        $chauffeur = factory(Chauffeur::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/chauffeurs/'.$chauffeur->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/chauffeurs/'.$chauffeur->id
        );

        $this->response->assertStatus(404);
    }
}
