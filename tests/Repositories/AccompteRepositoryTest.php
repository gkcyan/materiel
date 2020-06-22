<?php namespace Tests\Repositories;

use App\Models\Accompte;
use App\Repositories\AccompteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AccompteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AccompteRepository
     */
    protected $accompteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->accompteRepo = \App::make(AccompteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_accompte()
    {
        $accompte = factory(Accompte::class)->make()->toArray();

        $createdAccompte = $this->accompteRepo->create($accompte);

        $createdAccompte = $createdAccompte->toArray();
        $this->assertArrayHasKey('id', $createdAccompte);
        $this->assertNotNull($createdAccompte['id'], 'Created Accompte must have id specified');
        $this->assertNotNull(Accompte::find($createdAccompte['id']), 'Accompte with given id must be in DB');
        $this->assertModelData($accompte, $createdAccompte);
    }

    /**
     * @test read
     */
    public function test_read_accompte()
    {
        $accompte = factory(Accompte::class)->create();

        $dbAccompte = $this->accompteRepo->find($accompte->id);

        $dbAccompte = $dbAccompte->toArray();
        $this->assertModelData($accompte->toArray(), $dbAccompte);
    }

    /**
     * @test update
     */
    public function test_update_accompte()
    {
        $accompte = factory(Accompte::class)->create();
        $fakeAccompte = factory(Accompte::class)->make()->toArray();

        $updatedAccompte = $this->accompteRepo->update($fakeAccompte, $accompte->id);

        $this->assertModelData($fakeAccompte, $updatedAccompte->toArray());
        $dbAccompte = $this->accompteRepo->find($accompte->id);
        $this->assertModelData($fakeAccompte, $dbAccompte->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_accompte()
    {
        $accompte = factory(Accompte::class)->create();

        $resp = $this->accompteRepo->delete($accompte->id);

        $this->assertTrue($resp);
        $this->assertNull(Accompte::find($accompte->id), 'Accompte should not exist in DB');
    }
}
