<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Petrolier;

class PetrolierApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_petrolier()
    {
        $petrolier = factory(Petrolier::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/petroliers', $petrolier
        );

        $this->assertApiResponse($petrolier);
    }

    /**
     * @test
     */
    public function test_read_petrolier()
    {
        $petrolier = factory(Petrolier::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/petroliers/'.$petrolier->id
        );

        $this->assertApiResponse($petrolier->toArray());
    }

    /**
     * @test
     */
    public function test_update_petrolier()
    {
        $petrolier = factory(Petrolier::class)->create();
        $editedPetrolier = factory(Petrolier::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/petroliers/'.$petrolier->id,
            $editedPetrolier
        );

        $this->assertApiResponse($editedPetrolier);
    }

    /**
     * @test
     */
    public function test_delete_petrolier()
    {
        $petrolier = factory(Petrolier::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/petroliers/'.$petrolier->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/petroliers/'.$petrolier->id
        );

        $this->response->assertStatus(404);
    }
}
