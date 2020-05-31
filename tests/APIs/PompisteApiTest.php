<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pompiste;

class PompisteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pompiste()
    {
        $pompiste = factory(Pompiste::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pompistes', $pompiste
        );

        $this->assertApiResponse($pompiste);
    }

    /**
     * @test
     */
    public function test_read_pompiste()
    {
        $pompiste = factory(Pompiste::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/pompistes/'.$pompiste->id
        );

        $this->assertApiResponse($pompiste->toArray());
    }

    /**
     * @test
     */
    public function test_update_pompiste()
    {
        $pompiste = factory(Pompiste::class)->create();
        $editedPompiste = factory(Pompiste::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pompistes/'.$pompiste->id,
            $editedPompiste
        );

        $this->assertApiResponse($editedPompiste);
    }

    /**
     * @test
     */
    public function test_delete_pompiste()
    {
        $pompiste = factory(Pompiste::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pompistes/'.$pompiste->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pompistes/'.$pompiste->id
        );

        $this->response->assertStatus(404);
    }
}
