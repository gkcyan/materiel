<?php namespace Tests\Repositories;

use App\Models\TypeAccompte;
use App\Repositories\TypeAccompteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TypeAccompteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TypeAccompteRepository
     */
    protected $typeAccompteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->typeAccompteRepo = \App::make(TypeAccompteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_type_accompte()
    {
        $typeAccompte = factory(TypeAccompte::class)->make()->toArray();

        $createdTypeAccompte = $this->typeAccompteRepo->create($typeAccompte);

        $createdTypeAccompte = $createdTypeAccompte->toArray();
        $this->assertArrayHasKey('id', $createdTypeAccompte);
        $this->assertNotNull($createdTypeAccompte['id'], 'Created TypeAccompte must have id specified');
        $this->assertNotNull(TypeAccompte::find($createdTypeAccompte['id']), 'TypeAccompte with given id must be in DB');
        $this->assertModelData($typeAccompte, $createdTypeAccompte);
    }

    /**
     * @test read
     */
    public function test_read_type_accompte()
    {
        $typeAccompte = factory(TypeAccompte::class)->create();

        $dbTypeAccompte = $this->typeAccompteRepo->find($typeAccompte->id);

        $dbTypeAccompte = $dbTypeAccompte->toArray();
        $this->assertModelData($typeAccompte->toArray(), $dbTypeAccompte);
    }

    /**
     * @test update
     */
    public function test_update_type_accompte()
    {
        $typeAccompte = factory(TypeAccompte::class)->create();
        $fakeTypeAccompte = factory(TypeAccompte::class)->make()->toArray();

        $updatedTypeAccompte = $this->typeAccompteRepo->update($fakeTypeAccompte, $typeAccompte->id);

        $this->assertModelData($fakeTypeAccompte, $updatedTypeAccompte->toArray());
        $dbTypeAccompte = $this->typeAccompteRepo->find($typeAccompte->id);
        $this->assertModelData($fakeTypeAccompte, $dbTypeAccompte->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_type_accompte()
    {
        $typeAccompte = factory(TypeAccompte::class)->create();

        $resp = $this->typeAccompteRepo->delete($typeAccompte->id);

        $this->assertTrue($resp);
        $this->assertNull(TypeAccompte::find($typeAccompte->id), 'TypeAccompte should not exist in DB');
    }
}
