<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Facture;

class FactureApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_facture()
    {
        $facture = factory(Facture::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/factures', $facture
        );

        $this->assertApiResponse($facture);
    }

    /**
     * @test
     */
    public function test_read_facture()
    {
        $facture = factory(Facture::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/factures/'.$facture->id
        );

        $this->assertApiResponse($facture->toArray());
    }

    /**
     * @test
     */
    public function test_update_facture()
    {
        $facture = factory(Facture::class)->create();
        $editedFacture = factory(Facture::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/factures/'.$facture->id,
            $editedFacture
        );

        $this->assertApiResponse($editedFacture);
    }

    /**
     * @test
     */
    public function test_delete_facture()
    {
        $facture = factory(Facture::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/factures/'.$facture->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/factures/'.$facture->id
        );

        $this->response->assertStatus(404);
    }
}
