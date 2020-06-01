<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Engin;

class EnginApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_engin()
    {
        $engin = factory(Engin::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/engins', $engin
        );

        $this->assertApiResponse($engin);
    }

    /**
     * @test
     */
    public function test_read_engin()
    {
        $engin = factory(Engin::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/engins/'.$engin->id
        );

        $this->assertApiResponse($engin->toArray());
    }

    /**
     * @test
     */
    public function test_update_engin()
    {
        $engin = factory(Engin::class)->create();
        $editedEngin = factory(Engin::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/engins/'.$engin->id,
            $editedEngin
        );

        $this->assertApiResponse($editedEngin);
    }

    /**
     * @test
     */
    public function test_delete_engin()
    {
        $engin = factory(Engin::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/engins/'.$engin->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/engins/'.$engin->id
        );

        $this->response->assertStatus(404);
    }
}
