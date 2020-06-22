<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TypeAccompte;

class TypeAccompteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_type_accompte()
    {
        $typeAccompte = factory(TypeAccompte::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/type_accomptes', $typeAccompte
        );

        $this->assertApiResponse($typeAccompte);
    }

    /**
     * @test
     */
    public function test_read_type_accompte()
    {
        $typeAccompte = factory(TypeAccompte::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/type_accomptes/'.$typeAccompte->id
        );

        $this->assertApiResponse($typeAccompte->toArray());
    }

    /**
     * @test
     */
    public function test_update_type_accompte()
    {
        $typeAccompte = factory(TypeAccompte::class)->create();
        $editedTypeAccompte = factory(TypeAccompte::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/type_accomptes/'.$typeAccompte->id,
            $editedTypeAccompte
        );

        $this->assertApiResponse($editedTypeAccompte);
    }

    /**
     * @test
     */
    public function test_delete_type_accompte()
    {
        $typeAccompte = factory(TypeAccompte::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/type_accomptes/'.$typeAccompte->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/type_accomptes/'.$typeAccompte->id
        );

        $this->response->assertStatus(404);
    }
}
