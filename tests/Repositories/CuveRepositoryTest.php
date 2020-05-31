<?php namespace Tests\Repositories;

use App\Models\Cuve;
use App\Repositories\CuveRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CuveRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CuveRepository
     */
    protected $cuveRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cuveRepo = \App::make(CuveRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cuve()
    {
        $cuve = factory(Cuve::class)->make()->toArray();

        $createdCuve = $this->cuveRepo->create($cuve);

        $createdCuve = $createdCuve->toArray();
        $this->assertArrayHasKey('id', $createdCuve);
        $this->assertNotNull($createdCuve['id'], 'Created Cuve must have id specified');
        $this->assertNotNull(Cuve::find($createdCuve['id']), 'Cuve with given id must be in DB');
        $this->assertModelData($cuve, $createdCuve);
    }

    /**
     * @test read
     */
    public function test_read_cuve()
    {
        $cuve = factory(Cuve::class)->create();

        $dbCuve = $this->cuveRepo->find($cuve->id);

        $dbCuve = $dbCuve->toArray();
        $this->assertModelData($cuve->toArray(), $dbCuve);
    }

    /**
     * @test update
     */
    public function test_update_cuve()
    {
        $cuve = factory(Cuve::class)->create();
        $fakeCuve = factory(Cuve::class)->make()->toArray();

        $updatedCuve = $this->cuveRepo->update($fakeCuve, $cuve->id);

        $this->assertModelData($fakeCuve, $updatedCuve->toArray());
        $dbCuve = $this->cuveRepo->find($cuve->id);
        $this->assertModelData($fakeCuve, $dbCuve->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cuve()
    {
        $cuve = factory(Cuve::class)->create();

        $resp = $this->cuveRepo->delete($cuve->id);

        $this->assertTrue($resp);
        $this->assertNull(Cuve::find($cuve->id), 'Cuve should not exist in DB');
    }
}
