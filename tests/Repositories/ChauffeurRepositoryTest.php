<?php namespace Tests\Repositories;

use App\Models\Chauffeur;
use App\Repositories\ChauffeurRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ChauffeurRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ChauffeurRepository
     */
    protected $chauffeurRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->chauffeurRepo = \App::make(ChauffeurRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_chauffeur()
    {
        $chauffeur = factory(Chauffeur::class)->make()->toArray();

        $createdChauffeur = $this->chauffeurRepo->create($chauffeur);

        $createdChauffeur = $createdChauffeur->toArray();
        $this->assertArrayHasKey('id', $createdChauffeur);
        $this->assertNotNull($createdChauffeur['id'], 'Created Chauffeur must have id specified');
        $this->assertNotNull(Chauffeur::find($createdChauffeur['id']), 'Chauffeur with given id must be in DB');
        $this->assertModelData($chauffeur, $createdChauffeur);
    }

    /**
     * @test read
     */
    public function test_read_chauffeur()
    {
        $chauffeur = factory(Chauffeur::class)->create();

        $dbChauffeur = $this->chauffeurRepo->find($chauffeur->id);

        $dbChauffeur = $dbChauffeur->toArray();
        $this->assertModelData($chauffeur->toArray(), $dbChauffeur);
    }

    /**
     * @test update
     */
    public function test_update_chauffeur()
    {
        $chauffeur = factory(Chauffeur::class)->create();
        $fakeChauffeur = factory(Chauffeur::class)->make()->toArray();

        $updatedChauffeur = $this->chauffeurRepo->update($fakeChauffeur, $chauffeur->id);

        $this->assertModelData($fakeChauffeur, $updatedChauffeur->toArray());
        $dbChauffeur = $this->chauffeurRepo->find($chauffeur->id);
        $this->assertModelData($fakeChauffeur, $dbChauffeur->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_chauffeur()
    {
        $chauffeur = factory(Chauffeur::class)->create();

        $resp = $this->chauffeurRepo->delete($chauffeur->id);

        $this->assertTrue($resp);
        $this->assertNull(Chauffeur::find($chauffeur->id), 'Chauffeur should not exist in DB');
    }
}
