<?php namespace Tests\Repositories;

use App\Models\TypeZone;
use App\Repositories\TypeZoneRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TypeZoneRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TypeZoneRepository
     */
    protected $typeZoneRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->typeZoneRepo = \App::make(TypeZoneRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_type_zone()
    {
        $typeZone = factory(TypeZone::class)->make()->toArray();

        $createdTypeZone = $this->typeZoneRepo->create($typeZone);

        $createdTypeZone = $createdTypeZone->toArray();
        $this->assertArrayHasKey('id', $createdTypeZone);
        $this->assertNotNull($createdTypeZone['id'], 'Created TypeZone must have id specified');
        $this->assertNotNull(TypeZone::find($createdTypeZone['id']), 'TypeZone with given id must be in DB');
        $this->assertModelData($typeZone, $createdTypeZone);
    }

    /**
     * @test read
     */
    public function test_read_type_zone()
    {
        $typeZone = factory(TypeZone::class)->create();

        $dbTypeZone = $this->typeZoneRepo->find($typeZone->id);

        $dbTypeZone = $dbTypeZone->toArray();
        $this->assertModelData($typeZone->toArray(), $dbTypeZone);
    }

    /**
     * @test update
     */
    public function test_update_type_zone()
    {
        $typeZone = factory(TypeZone::class)->create();
        $fakeTypeZone = factory(TypeZone::class)->make()->toArray();

        $updatedTypeZone = $this->typeZoneRepo->update($fakeTypeZone, $typeZone->id);

        $this->assertModelData($fakeTypeZone, $updatedTypeZone->toArray());
        $dbTypeZone = $this->typeZoneRepo->find($typeZone->id);
        $this->assertModelData($fakeTypeZone, $dbTypeZone->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_type_zone()
    {
        $typeZone = factory(TypeZone::class)->create();

        $resp = $this->typeZoneRepo->delete($typeZone->id);

        $this->assertTrue($resp);
        $this->assertNull(TypeZone::find($typeZone->id), 'TypeZone should not exist in DB');
    }
}
