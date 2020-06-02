<?php namespace Tests\Repositories;

use App\Models\ChauffeurPermi;
use App\Repositories\ChauffeurPermiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ChauffeurPermiRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ChauffeurPermiRepository
     */
    protected $chauffeurPermiRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->chauffeurPermiRepo = \App::make(ChauffeurPermiRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_chauffeur_permi()
    {
        $chauffeurPermi = factory(ChauffeurPermi::class)->make()->toArray();

        $createdChauffeurPermi = $this->chauffeurPermiRepo->create($chauffeurPermi);

        $createdChauffeurPermi = $createdChauffeurPermi->toArray();
        $this->assertArrayHasKey('id', $createdChauffeurPermi);
        $this->assertNotNull($createdChauffeurPermi['id'], 'Created ChauffeurPermi must have id specified');
        $this->assertNotNull(ChauffeurPermi::find($createdChauffeurPermi['id']), 'ChauffeurPermi with given id must be in DB');
        $this->assertModelData($chauffeurPermi, $createdChauffeurPermi);
    }

    /**
     * @test read
     */
    public function test_read_chauffeur_permi()
    {
        $chauffeurPermi = factory(ChauffeurPermi::class)->create();

        $dbChauffeurPermi = $this->chauffeurPermiRepo->find($chauffeurPermi->id);

        $dbChauffeurPermi = $dbChauffeurPermi->toArray();
        $this->assertModelData($chauffeurPermi->toArray(), $dbChauffeurPermi);
    }

    /**
     * @test update
     */
    public function test_update_chauffeur_permi()
    {
        $chauffeurPermi = factory(ChauffeurPermi::class)->create();
        $fakeChauffeurPermi = factory(ChauffeurPermi::class)->make()->toArray();

        $updatedChauffeurPermi = $this->chauffeurPermiRepo->update($fakeChauffeurPermi, $chauffeurPermi->id);

        $this->assertModelData($fakeChauffeurPermi, $updatedChauffeurPermi->toArray());
        $dbChauffeurPermi = $this->chauffeurPermiRepo->find($chauffeurPermi->id);
        $this->assertModelData($fakeChauffeurPermi, $dbChauffeurPermi->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_chauffeur_permi()
    {
        $chauffeurPermi = factory(ChauffeurPermi::class)->create();

        $resp = $this->chauffeurPermiRepo->delete($chauffeurPermi->id);

        $this->assertTrue($resp);
        $this->assertNull(ChauffeurPermi::find($chauffeurPermi->id), 'ChauffeurPermi should not exist in DB');
    }
}
