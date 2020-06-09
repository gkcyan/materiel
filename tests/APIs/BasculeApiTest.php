<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Bascule;

class BasculeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bascule()
    {
        $bascule = factory(Bascule::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bascules', $bascule
        );

        $this->assertApiResponse($bascule);
    }

    /**
     * @test
     */
    public function test_read_bascule()
    {
        $bascule = factory(Bascule::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/bascules/'.$bascule->id
        );

        $this->assertApiResponse($bascule->toArray());
    }

    /**
     * @test
     */
    public function test_update_bascule()
    {
        $bascule = factory(Bascule::class)->create();
        $editedBascule = factory(Bascule::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bascules/'.$bascule->id,
            $editedBascule
        );

        $this->assertApiResponse($editedBascule);
    }

    /**
     * @test
     */
    public function test_delete_bascule()
    {
        $bascule = factory(Bascule::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bascules/'.$bascule->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bascules/'.$bascule->id
        );

        $this->response->assertStatus(404);
    }
}
