<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BaremePenaliteTransport;

class BaremePenaliteTransportApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bareme_penalite_transport()
    {
        $baremePenaliteTransport = factory(BaremePenaliteTransport::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bareme_penalite_transports', $baremePenaliteTransport
        );

        $this->assertApiResponse($baremePenaliteTransport);
    }

    /**
     * @test
     */
    public function test_read_bareme_penalite_transport()
    {
        $baremePenaliteTransport = factory(BaremePenaliteTransport::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/bareme_penalite_transports/'.$baremePenaliteTransport->id
        );

        $this->assertApiResponse($baremePenaliteTransport->toArray());
    }

    /**
     * @test
     */
    public function test_update_bareme_penalite_transport()
    {
        $baremePenaliteTransport = factory(BaremePenaliteTransport::class)->create();
        $editedBaremePenaliteTransport = factory(BaremePenaliteTransport::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bareme_penalite_transports/'.$baremePenaliteTransport->id,
            $editedBaremePenaliteTransport
        );

        $this->assertApiResponse($editedBaremePenaliteTransport);
    }

    /**
     * @test
     */
    public function test_delete_bareme_penalite_transport()
    {
        $baremePenaliteTransport = factory(BaremePenaliteTransport::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bareme_penalite_transports/'.$baremePenaliteTransport->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bareme_penalite_transports/'.$baremePenaliteTransport->id
        );

        $this->response->assertStatus(404);
    }
}
