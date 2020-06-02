<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Activite;

class ActiviteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_activite()
    {
        $activite = factory(Activite::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/activites', $activite
        );

        $this->assertApiResponse($activite);
    }

    /**
     * @test
     */
    public function test_read_activite()
    {
        $activite = factory(Activite::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/activites/'.$activite->id
        );

        $this->assertApiResponse($activite->toArray());
    }

    /**
     * @test
     */
    public function test_update_activite()
    {
        $activite = factory(Activite::class)->create();
        $editedActivite = factory(Activite::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/activites/'.$activite->id,
            $editedActivite
        );

        $this->assertApiResponse($editedActivite);
    }

    /**
     * @test
     */
    public function test_delete_activite()
    {
        $activite = factory(Activite::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/activites/'.$activite->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/activites/'.$activite->id
        );

        $this->response->assertStatus(404);
    }
}
