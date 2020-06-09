<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ZoneCollecte;

class ZoneCollecteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_zone_collecte()
    {
        $zoneCollecte = factory(ZoneCollecte::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/zone_collectes', $zoneCollecte
        );

        $this->assertApiResponse($zoneCollecte);
    }

    /**
     * @test
     */
    public function test_read_zone_collecte()
    {
        $zoneCollecte = factory(ZoneCollecte::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/zone_collectes/'.$zoneCollecte->id
        );

        $this->assertApiResponse($zoneCollecte->toArray());
    }

    /**
     * @test
     */
    public function test_update_zone_collecte()
    {
        $zoneCollecte = factory(ZoneCollecte::class)->create();
        $editedZoneCollecte = factory(ZoneCollecte::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/zone_collectes/'.$zoneCollecte->id,
            $editedZoneCollecte
        );

        $this->assertApiResponse($editedZoneCollecte);
    }

    /**
     * @test
     */
    public function test_delete_zone_collecte()
    {
        $zoneCollecte = factory(ZoneCollecte::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/zone_collectes/'.$zoneCollecte->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/zone_collectes/'.$zoneCollecte->id
        );

        $this->response->assertStatus(404);
    }
}
