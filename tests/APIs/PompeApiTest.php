<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pompe;

class PompeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pompe()
    {
        $pompe = factory(Pompe::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pompes', $pompe
        );

        $this->assertApiResponse($pompe);
    }

    /**
     * @test
     */
    public function test_read_pompe()
    {
        $pompe = factory(Pompe::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/pompes/'.$pompe->id
        );

        $this->assertApiResponse($pompe->toArray());
    }

    /**
     * @test
     */
    public function test_update_pompe()
    {
        $pompe = factory(Pompe::class)->create();
        $editedPompe = factory(Pompe::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pompes/'.$pompe->id,
            $editedPompe
        );

        $this->assertApiResponse($editedPompe);
    }

    /**
     * @test
     */
    public function test_delete_pompe()
    {
        $pompe = factory(Pompe::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pompes/'.$pompe->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pompes/'.$pompe->id
        );

        $this->response->assertStatus(404);
    }
}
