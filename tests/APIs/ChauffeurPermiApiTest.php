<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ChauffeurPermi;

class ChauffeurPermiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_chauffeur_permi()
    {
        $chauffeurPermi = factory(ChauffeurPermi::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/chauffeur_permis', $chauffeurPermi
        );

        $this->assertApiResponse($chauffeurPermi);
    }

    /**
     * @test
     */
    public function test_read_chauffeur_permi()
    {
        $chauffeurPermi = factory(ChauffeurPermi::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/chauffeur_permis/'.$chauffeurPermi->id
        );

        $this->assertApiResponse($chauffeurPermi->toArray());
    }

    /**
     * @test
     */
    public function test_update_chauffeur_permi()
    {
        $chauffeurPermi = factory(ChauffeurPermi::class)->create();
        $editedChauffeurPermi = factory(ChauffeurPermi::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/chauffeur_permis/'.$chauffeurPermi->id,
            $editedChauffeurPermi
        );

        $this->assertApiResponse($editedChauffeurPermi);
    }

    /**
     * @test
     */
    public function test_delete_chauffeur_permi()
    {
        $chauffeurPermi = factory(ChauffeurPermi::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/chauffeur_permis/'.$chauffeurPermi->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/chauffeur_permis/'.$chauffeurPermi->id
        );

        $this->response->assertStatus(404);
    }
}
