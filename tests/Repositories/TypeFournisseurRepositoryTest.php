<?php namespace Tests\Repositories;

use App\Models\TypeFournisseur;
use App\Repositories\TypeFournisseurRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TypeFournisseurRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TypeFournisseurRepository
     */
    protected $typeFournisseurRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->typeFournisseurRepo = \App::make(TypeFournisseurRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_type_fournisseur()
    {
        $typeFournisseur = factory(TypeFournisseur::class)->make()->toArray();

        $createdTypeFournisseur = $this->typeFournisseurRepo->create($typeFournisseur);

        $createdTypeFournisseur = $createdTypeFournisseur->toArray();
        $this->assertArrayHasKey('id', $createdTypeFournisseur);
        $this->assertNotNull($createdTypeFournisseur['id'], 'Created TypeFournisseur must have id specified');
        $this->assertNotNull(TypeFournisseur::find($createdTypeFournisseur['id']), 'TypeFournisseur with given id must be in DB');
        $this->assertModelData($typeFournisseur, $createdTypeFournisseur);
    }

    /**
     * @test read
     */
    public function test_read_type_fournisseur()
    {
        $typeFournisseur = factory(TypeFournisseur::class)->create();

        $dbTypeFournisseur = $this->typeFournisseurRepo->find($typeFournisseur->id);

        $dbTypeFournisseur = $dbTypeFournisseur->toArray();
        $this->assertModelData($typeFournisseur->toArray(), $dbTypeFournisseur);
    }

    /**
     * @test update
     */
    public function test_update_type_fournisseur()
    {
        $typeFournisseur = factory(TypeFournisseur::class)->create();
        $fakeTypeFournisseur = factory(TypeFournisseur::class)->make()->toArray();

        $updatedTypeFournisseur = $this->typeFournisseurRepo->update($fakeTypeFournisseur, $typeFournisseur->id);

        $this->assertModelData($fakeTypeFournisseur, $updatedTypeFournisseur->toArray());
        $dbTypeFournisseur = $this->typeFournisseurRepo->find($typeFournisseur->id);
        $this->assertModelData($fakeTypeFournisseur, $dbTypeFournisseur->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_type_fournisseur()
    {
        $typeFournisseur = factory(TypeFournisseur::class)->create();

        $resp = $this->typeFournisseurRepo->delete($typeFournisseur->id);

        $this->assertTrue($resp);
        $this->assertNull(TypeFournisseur::find($typeFournisseur->id), 'TypeFournisseur should not exist in DB');
    }
}
