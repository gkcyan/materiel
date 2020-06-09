<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TypeZone;

class TypeZoneApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_type_zone()
    {
        $typeZone = factory(TypeZone::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/type_zones', $typeZone
        );

        $this->assertApiResponse($typeZone);
    }

    /**
     * @test
     */
    public function test_read_type_zone()
    {
        $typeZone = factory(TypeZone::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/type_zones/'.$typeZone->id
        );

        $this->assertApiResponse($typeZone->toArray());
    }

    /**
     * @test
     */
    public function test_update_type_zone()
    {
        $typeZone = factory(TypeZone::class)->create();
        $editedTypeZone = factory(TypeZone::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/type_zones/'.$typeZone->id,
            $editedTypeZone
        );

        $this->assertApiResponse($editedTypeZone);
    }

    /**
     * @test
     */
    public function test_delete_type_zone()
    {
        $typeZone = factory(TypeZone::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/type_zones/'.$typeZone->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/type_zones/'.$typeZone->id
        );

        $this->response->assertStatus(404);
    }
}
