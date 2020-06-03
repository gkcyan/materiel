<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\VentePetrolier;

class VentePetrolierApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vente_petrolier()
    {
        $ventePetrolier = factory(VentePetrolier::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/vente_petroliers', $ventePetrolier
        );

        $this->assertApiResponse($ventePetrolier);
    }

    /**
     * @test
     */
    public function test_read_vente_petrolier()
    {
        $ventePetrolier = factory(VentePetrolier::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/vente_petroliers/'.$ventePetrolier->id
        );

        $this->assertApiResponse($ventePetrolier->toArray());
    }

    /**
     * @test
     */
    public function test_update_vente_petrolier()
    {
        $ventePetrolier = factory(VentePetrolier::class)->create();
        $editedVentePetrolier = factory(VentePetrolier::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/vente_petroliers/'.$ventePetrolier->id,
            $editedVentePetrolier
        );

        $this->assertApiResponse($editedVentePetrolier);
    }

    /**
     * @test
     */
    public function test_delete_vente_petrolier()
    {
        $ventePetrolier = factory(VentePetrolier::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/vente_petroliers/'.$ventePetrolier->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/vente_petroliers/'.$ventePetrolier->id
        );

        $this->response->assertStatus(404);
    }
}
