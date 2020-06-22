<?php namespace Tests\Repositories;

use App\Models\Fournisseur;
use App\Repositories\FournisseurRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FournisseurRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FournisseurRepository
     */
    protected $fournisseurRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->fournisseurRepo = \App::make(FournisseurRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_fournisseur()
    {
        $fournisseur = factory(Fournisseur::class)->make()->toArray();

        $createdFournisseur = $this->fournisseurRepo->create($fournisseur);

        $createdFournisseur = $createdFournisseur->toArray();
        $this->assertArrayHasKey('id', $createdFournisseur);
        $this->assertNotNull($createdFournisseur['id'], 'Created Fournisseur must have id specified');
        $this->assertNotNull(Fournisseur::find($createdFournisseur['id']), 'Fournisseur with given id must be in DB');
        $this->assertModelData($fournisseur, $createdFournisseur);
    }

    /**
     * @test read
     */
    public function test_read_fournisseur()
    {
        $fournisseur = factory(Fournisseur::class)->create();

        $dbFournisseur = $this->fournisseurRepo->find($fournisseur->id);

        $dbFournisseur = $dbFournisseur->toArray();
        $this->assertModelData($fournisseur->toArray(), $dbFournisseur);
    }

    /**
     * @test update
     */
    public function test_update_fournisseur()
    {
        $fournisseur = factory(Fournisseur::class)->create();
        $fakeFournisseur = factory(Fournisseur::class)->make()->toArray();

        $updatedFournisseur = $this->fournisseurRepo->update($fakeFournisseur, $fournisseur->id);

        $this->assertModelData($fakeFournisseur, $updatedFournisseur->toArray());
        $dbFournisseur = $this->fournisseurRepo->find($fournisseur->id);
        $this->assertModelData($fakeFournisseur, $dbFournisseur->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_fournisseur()
    {
        $fournisseur = factory(Fournisseur::class)->create();

        $resp = $this->fournisseurRepo->delete($fournisseur->id);

        $this->assertTrue($resp);
        $this->assertNull(Fournisseur::find($fournisseur->id), 'Fournisseur should not exist in DB');
    }
}
