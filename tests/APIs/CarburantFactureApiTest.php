<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CarburantFacture;

class CarburantFactureApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_carburant_facture()
    {
        $carburantFacture = factory(CarburantFacture::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/carburant_factures', $carburantFacture
        );

        $this->assertApiResponse($carburantFacture);
    }

    /**
     * @test
     */
    public function test_read_carburant_facture()
    {
        $carburantFacture = factory(CarburantFacture::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/carburant_factures/'.$carburantFacture->id
        );

        $this->assertApiResponse($carburantFacture->toArray());
    }

    /**
     * @test
     */
    public function test_update_carburant_facture()
    {
        $carburantFacture = factory(CarburantFacture::class)->create();
        $editedCarburantFacture = factory(CarburantFacture::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/carburant_factures/'.$carburantFacture->id,
            $editedCarburantFacture
        );

        $this->assertApiResponse($editedCarburantFacture);
    }

    /**
     * @test
     */
    public function test_delete_carburant_facture()
    {
        $carburantFacture = factory(CarburantFacture::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/carburant_factures/'.$carburantFacture->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/carburant_factures/'.$carburantFacture->id
        );

        $this->response->assertStatus(404);
    }
}
