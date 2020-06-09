<?php namespace Tests\Repositories;

use App\Models\BasculeData;
use App\Repositories\BasculeDataRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BasculeDataRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BasculeDataRepository
     */
    protected $basculeDataRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->basculeDataRepo = \App::make(BasculeDataRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bascule_data()
    {
        $basculeData = factory(BasculeData::class)->make()->toArray();

        $createdBasculeData = $this->basculeDataRepo->create($basculeData);

        $createdBasculeData = $createdBasculeData->toArray();
        $this->assertArrayHasKey('id', $createdBasculeData);
        $this->assertNotNull($createdBasculeData['id'], 'Created BasculeData must have id specified');
        $this->assertNotNull(BasculeData::find($createdBasculeData['id']), 'BasculeData with given id must be in DB');
        $this->assertModelData($basculeData, $createdBasculeData);
    }

    /**
     * @test read
     */
    public function test_read_bascule_data()
    {
        $basculeData = factory(BasculeData::class)->create();

        $dbBasculeData = $this->basculeDataRepo->find($basculeData->id);

        $dbBasculeData = $dbBasculeData->toArray();
        $this->assertModelData($basculeData->toArray(), $dbBasculeData);
    }

    /**
     * @test update
     */
    public function test_update_bascule_data()
    {
        $basculeData = factory(BasculeData::class)->create();
        $fakeBasculeData = factory(BasculeData::class)->make()->toArray();

        $updatedBasculeData = $this->basculeDataRepo->update($fakeBasculeData, $basculeData->id);

        $this->assertModelData($fakeBasculeData, $updatedBasculeData->toArray());
        $dbBasculeData = $this->basculeDataRepo->find($basculeData->id);
        $this->assertModelData($fakeBasculeData, $dbBasculeData->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bascule_data()
    {
        $basculeData = factory(BasculeData::class)->create();

        $resp = $this->basculeDataRepo->delete($basculeData->id);

        $this->assertTrue($resp);
        $this->assertNull(BasculeData::find($basculeData->id), 'BasculeData should not exist in DB');
    }
}
