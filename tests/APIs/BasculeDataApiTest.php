<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BasculeData;

class BasculeDataApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bascule_data()
    {
        $basculeData = factory(BasculeData::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bascule_datas', $basculeData
        );

        $this->assertApiResponse($basculeData);
    }

    /**
     * @test
     */
    public function test_read_bascule_data()
    {
        $basculeData = factory(BasculeData::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/bascule_datas/'.$basculeData->id
        );

        $this->assertApiResponse($basculeData->toArray());
    }

    /**
     * @test
     */
    public function test_update_bascule_data()
    {
        $basculeData = factory(BasculeData::class)->create();
        $editedBasculeData = factory(BasculeData::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bascule_datas/'.$basculeData->id,
            $editedBasculeData
        );

        $this->assertApiResponse($editedBasculeData);
    }

    /**
     * @test
     */
    public function test_delete_bascule_data()
    {
        $basculeData = factory(BasculeData::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bascule_datas/'.$basculeData->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bascule_datas/'.$basculeData->id
        );

        $this->response->assertStatus(404);
    }
}
