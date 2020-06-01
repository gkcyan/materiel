<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\EnginModele;

class EnginModeleApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_engin_modele()
    {
        $enginModele = factory(EnginModele::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/engin_modeles', $enginModele
        );

        $this->assertApiResponse($enginModele);
    }

    /**
     * @test
     */
    public function test_read_engin_modele()
    {
        $enginModele = factory(EnginModele::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/engin_modeles/'.$enginModele->id
        );

        $this->assertApiResponse($enginModele->toArray());
    }

    /**
     * @test
     */
    public function test_update_engin_modele()
    {
        $enginModele = factory(EnginModele::class)->create();
        $editedEnginModele = factory(EnginModele::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/engin_modeles/'.$enginModele->id,
            $editedEnginModele
        );

        $this->assertApiResponse($editedEnginModele);
    }

    /**
     * @test
     */
    public function test_delete_engin_modele()
    {
        $enginModele = factory(EnginModele::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/engin_modeles/'.$enginModele->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/engin_modeles/'.$enginModele->id
        );

        $this->response->assertStatus(404);
    }
}
