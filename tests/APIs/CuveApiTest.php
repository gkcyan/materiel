<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Cuve;

class CuveApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cuve()
    {
        $cuve = factory(Cuve::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cuves', $cuve
        );

        $this->assertApiResponse($cuve);
    }

    /**
     * @test
     */
    public function test_read_cuve()
    {
        $cuve = factory(Cuve::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/cuves/'.$cuve->id
        );

        $this->assertApiResponse($cuve->toArray());
    }

    /**
     * @test
     */
    public function test_update_cuve()
    {
        $cuve = factory(Cuve::class)->create();
        $editedCuve = factory(Cuve::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cuves/'.$cuve->id,
            $editedCuve
        );

        $this->assertApiResponse($editedCuve);
    }

    /**
     * @test
     */
    public function test_delete_cuve()
    {
        $cuve = factory(Cuve::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cuves/'.$cuve->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cuves/'.$cuve->id
        );

        $this->response->assertStatus(404);
    }
}
