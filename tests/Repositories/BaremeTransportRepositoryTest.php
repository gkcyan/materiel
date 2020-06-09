<?php namespace Tests\Repositories;

use App\Models\BaremeTransport;
use App\Repositories\BaremeTransportRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BaremeTransportRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BaremeTransportRepository
     */
    protected $baremeTransportRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->baremeTransportRepo = \App::make(BaremeTransportRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bareme_transport()
    {
        $baremeTransport = factory(BaremeTransport::class)->make()->toArray();

        $createdBaremeTransport = $this->baremeTransportRepo->create($baremeTransport);

        $createdBaremeTransport = $createdBaremeTransport->toArray();
        $this->assertArrayHasKey('id', $createdBaremeTransport);
        $this->assertNotNull($createdBaremeTransport['id'], 'Created BaremeTransport must have id specified');
        $this->assertNotNull(BaremeTransport::find($createdBaremeTransport['id']), 'BaremeTransport with given id must be in DB');
        $this->assertModelData($baremeTransport, $createdBaremeTransport);
    }

    /**
     * @test read
     */
    public function test_read_bareme_transport()
    {
        $baremeTransport = factory(BaremeTransport::class)->create();

        $dbBaremeTransport = $this->baremeTransportRepo->find($baremeTransport->id);

        $dbBaremeTransport = $dbBaremeTransport->toArray();
        $this->assertModelData($baremeTransport->toArray(), $dbBaremeTransport);
    }

    /**
     * @test update
     */
    public function test_update_bareme_transport()
    {
        $baremeTransport = factory(BaremeTransport::class)->create();
        $fakeBaremeTransport = factory(BaremeTransport::class)->make()->toArray();

        $updatedBaremeTransport = $this->baremeTransportRepo->update($fakeBaremeTransport, $baremeTransport->id);

        $this->assertModelData($fakeBaremeTransport, $updatedBaremeTransport->toArray());
        $dbBaremeTransport = $this->baremeTransportRepo->find($baremeTransport->id);
        $this->assertModelData($fakeBaremeTransport, $dbBaremeTransport->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bareme_transport()
    {
        $baremeTransport = factory(BaremeTransport::class)->create();

        $resp = $this->baremeTransportRepo->delete($baremeTransport->id);

        $this->assertTrue($resp);
        $this->assertNull(BaremeTransport::find($baremeTransport->id), 'BaremeTransport should not exist in DB');
    }
}
