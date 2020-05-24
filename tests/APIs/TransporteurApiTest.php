<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Transporteur;

class TransporteurApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_transporteur()
    {
        $transporteur = factory(Transporteur::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/transporteurs', $transporteur
        );

        $this->assertApiResponse($transporteur);
    }

    /**
     * @test
     */
    public function test_read_transporteur()
    {
        $transporteur = factory(Transporteur::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/transporteurs/'.$transporteur->id
        );

        $this->assertApiResponse($transporteur->toArray());
    }

    /**
     * @test
     */
    public function test_update_transporteur()
    {
        $transporteur = factory(Transporteur::class)->create();
        $editedTransporteur = factory(Transporteur::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/transporteurs/'.$transporteur->id,
            $editedTransporteur
        );

        $this->assertApiResponse($editedTransporteur);
    }

    /**
     * @test
     */
    public function test_delete_transporteur()
    {
        $transporteur = factory(Transporteur::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/transporteurs/'.$transporteur->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/transporteurs/'.$transporteur->id
        );

        $this->response->assertStatus(404);
    }
}
