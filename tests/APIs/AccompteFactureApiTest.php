<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\AccompteFacture;

class AccompteFactureApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_accompte_facture()
    {
        $accompteFacture = factory(AccompteFacture::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accompte_factures', $accompteFacture
        );

        $this->assertApiResponse($accompteFacture);
    }

    /**
     * @test
     */
    public function test_read_accompte_facture()
    {
        $accompteFacture = factory(AccompteFacture::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/accompte_factures/'.$accompteFacture->id
        );

        $this->assertApiResponse($accompteFacture->toArray());
    }

    /**
     * @test
     */
    public function test_update_accompte_facture()
    {
        $accompteFacture = factory(AccompteFacture::class)->create();
        $editedAccompteFacture = factory(AccompteFacture::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accompte_factures/'.$accompteFacture->id,
            $editedAccompteFacture
        );

        $this->assertApiResponse($editedAccompteFacture);
    }

    /**
     * @test
     */
    public function test_delete_accompte_facture()
    {
        $accompteFacture = factory(AccompteFacture::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accompte_factures/'.$accompteFacture->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accompte_factures/'.$accompteFacture->id
        );

        $this->response->assertStatus(404);
    }
}
