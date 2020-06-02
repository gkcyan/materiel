<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\EnginKilometrage;

class EnginKilometrageApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_engin_kilometrage()
    {
        $enginKilometrage = factory(EnginKilometrage::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/engin_kilometrages', $enginKilometrage
        );

        $this->assertApiResponse($enginKilometrage);
    }

    /**
     * @test
     */
    public function test_read_engin_kilometrage()
    {
        $enginKilometrage = factory(EnginKilometrage::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/engin_kilometrages/'.$enginKilometrage->id
        );

        $this->assertApiResponse($enginKilometrage->toArray());
    }

    /**
     * @test
     */
    public function test_update_engin_kilometrage()
    {
        $enginKilometrage = factory(EnginKilometrage::class)->create();
        $editedEnginKilometrage = factory(EnginKilometrage::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/engin_kilometrages/'.$enginKilometrage->id,
            $editedEnginKilometrage
        );

        $this->assertApiResponse($editedEnginKilometrage);
    }

    /**
     * @test
     */
    public function test_delete_engin_kilometrage()
    {
        $enginKilometrage = factory(EnginKilometrage::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/engin_kilometrages/'.$enginKilometrage->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/engin_kilometrages/'.$enginKilometrage->id
        );

        $this->response->assertStatus(404);
    }
}
