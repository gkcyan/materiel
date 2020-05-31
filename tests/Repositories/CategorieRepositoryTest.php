<?php namespace Tests\Repositories;

use App\Models\Categorie;
use App\Repositories\CategorieRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CategorieRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CategorieRepository
     */
    protected $categorieRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->categorieRepo = \App::make(CategorieRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_categorie()
    {
        $categorie = factory(Categorie::class)->make()->toArray();

        $createdCategorie = $this->categorieRepo->create($categorie);

        $createdCategorie = $createdCategorie->toArray();
        $this->assertArrayHasKey('id', $createdCategorie);
        $this->assertNotNull($createdCategorie['id'], 'Created Categorie must have id specified');
        $this->assertNotNull(Categorie::find($createdCategorie['id']), 'Categorie with given id must be in DB');
        $this->assertModelData($categorie, $createdCategorie);
    }

    /**
     * @test read
     */
    public function test_read_categorie()
    {
        $categorie = factory(Categorie::class)->create();

        $dbCategorie = $this->categorieRepo->find($categorie->id);

        $dbCategorie = $dbCategorie->toArray();
        $this->assertModelData($categorie->toArray(), $dbCategorie);
    }

    /**
     * @test update
     */
    public function test_update_categorie()
    {
        $categorie = factory(Categorie::class)->create();
        $fakeCategorie = factory(Categorie::class)->make()->toArray();

        $updatedCategorie = $this->categorieRepo->update($fakeCategorie, $categorie->id);

        $this->assertModelData($fakeCategorie, $updatedCategorie->toArray());
        $dbCategorie = $this->categorieRepo->find($categorie->id);
        $this->assertModelData($fakeCategorie, $dbCategorie->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_categorie()
    {
        $categorie = factory(Categorie::class)->create();

        $resp = $this->categorieRepo->delete($categorie->id);

        $this->assertTrue($resp);
        $this->assertNull(Categorie::find($categorie->id), 'Categorie should not exist in DB');
    }
}
