<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FactureTicket;

class FactureTicketApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_facture_ticket()
    {
        $factureTicket = factory(FactureTicket::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/facture_tickets', $factureTicket
        );

        $this->assertApiResponse($factureTicket);
    }

    /**
     * @test
     */
    public function test_read_facture_ticket()
    {
        $factureTicket = factory(FactureTicket::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/facture_tickets/'.$factureTicket->id
        );

        $this->assertApiResponse($factureTicket->toArray());
    }

    /**
     * @test
     */
    public function test_update_facture_ticket()
    {
        $factureTicket = factory(FactureTicket::class)->create();
        $editedFactureTicket = factory(FactureTicket::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/facture_tickets/'.$factureTicket->id,
            $editedFactureTicket
        );

        $this->assertApiResponse($editedFactureTicket);
    }

    /**
     * @test
     */
    public function test_delete_facture_ticket()
    {
        $factureTicket = factory(FactureTicket::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/facture_tickets/'.$factureTicket->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/facture_tickets/'.$factureTicket->id
        );

        $this->response->assertStatus(404);
    }
}
