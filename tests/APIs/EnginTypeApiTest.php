<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\EnginType;

class EnginTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_engin_type()
    {
        $enginType = factory(EnginType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/engin_types', $enginType
        );

        $this->assertApiResponse($enginType);
    }

    /**
     * @test
     */
    public function test_read_engin_type()
    {
        $enginType = factory(EnginType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/engin_types/'.$enginType->id
        );

        $this->assertApiResponse($enginType->toArray());
    }

    /**
     * @test
     */
    public function test_update_engin_type()
    {
        $enginType = factory(EnginType::class)->create();
        $editedEnginType = factory(EnginType::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/engin_types/'.$enginType->id,
            $editedEnginType
        );

        $this->assertApiResponse($editedEnginType);
    }

    /**
     * @test
     */
    public function test_delete_engin_type()
    {
        $enginType = factory(EnginType::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/engin_types/'.$enginType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/engin_types/'.$enginType->id
        );

        $this->response->assertStatus(404);
    }
}
