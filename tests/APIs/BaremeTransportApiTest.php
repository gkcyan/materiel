<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BaremeTransport;

class BaremeTransportApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bareme_transport()
    {
        $baremeTransport = factory(BaremeTransport::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bareme_transports', $baremeTransport
        );

        $this->assertApiResponse($baremeTransport);
    }

    /**
     * @test
     */
    public function test_read_bareme_transport()
    {
        $baremeTransport = factory(BaremeTransport::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/bareme_transports/'.$baremeTransport->id
        );

        $this->assertApiResponse($baremeTransport->toArray());
    }

    /**
     * @test
     */
    public function test_update_bareme_transport()
    {
        $baremeTransport = factory(BaremeTransport::class)->create();
        $editedBaremeTransport = factory(BaremeTransport::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bareme_transports/'.$baremeTransport->id,
            $editedBaremeTransport
        );

        $this->assertApiResponse($editedBaremeTransport);
    }

    /**
     * @test
     */
    public function test_delete_bareme_transport()
    {
        $baremeTransport = factory(BaremeTransport::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bareme_transports/'.$baremeTransport->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bareme_transports/'.$baremeTransport->id
        );

        $this->response->assertStatus(404);
    }
}
