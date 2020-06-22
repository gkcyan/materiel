<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Accompte;

class AccompteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_accompte()
    {
        $accompte = factory(Accompte::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accomptes', $accompte
        );

        $this->assertApiResponse($accompte);
    }

    /**
     * @test
     */
    public function test_read_accompte()
    {
        $accompte = factory(Accompte::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/accomptes/'.$accompte->id
        );

        $this->assertApiResponse($accompte->toArray());
    }

    /**
     * @test
     */
    public function test_update_accompte()
    {
        $accompte = factory(Accompte::class)->create();
        $editedAccompte = factory(Accompte::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accomptes/'.$accompte->id,
            $editedAccompte
        );

        $this->assertApiResponse($editedAccompte);
    }

    /**
     * @test
     */
    public function test_delete_accompte()
    {
        $accompte = factory(Accompte::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accomptes/'.$accompte->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accomptes/'.$accompte->id
        );

        $this->response->assertStatus(404);
    }
}
