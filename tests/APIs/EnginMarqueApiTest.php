<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\EnginMarque;

class EnginMarqueApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_engin_marque()
    {
        $enginMarque = factory(EnginMarque::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/engin_marques', $enginMarque
        );

        $this->assertApiResponse($enginMarque);
    }

    /**
     * @test
     */
    public function test_read_engin_marque()
    {
        $enginMarque = factory(EnginMarque::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/engin_marques/'.$enginMarque->id
        );

        $this->assertApiResponse($enginMarque->toArray());
    }

    /**
     * @test
     */
    public function test_update_engin_marque()
    {
        $enginMarque = factory(EnginMarque::class)->create();
        $editedEnginMarque = factory(EnginMarque::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/engin_marques/'.$enginMarque->id,
            $editedEnginMarque
        );

        $this->assertApiResponse($editedEnginMarque);
    }

    /**
     * @test
     */
    public function test_delete_engin_marque()
    {
        $enginMarque = factory(EnginMarque::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/engin_marques/'.$enginMarque->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/engin_marques/'.$enginMarque->id
        );

        $this->response->assertStatus(404);
    }
}
