<?php namespace Tests\Repositories;

use App\Models\BaremePenaliteTransport;
use App\Repositories\BaremePenaliteTransportRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BaremePenaliteTransportRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BaremePenaliteTransportRepository
     */
    protected $baremePenaliteTransportRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->baremePenaliteTransportRepo = \App::make(BaremePenaliteTransportRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bareme_penalite_transport()
    {
        $baremePenaliteTransport = factory(BaremePenaliteTransport::class)->make()->toArray();

        $createdBaremePenaliteTransport = $this->baremePenaliteTransportRepo->create($baremePenaliteTransport);

        $createdBaremePenaliteTransport = $createdBaremePenaliteTransport->toArray();
        $this->assertArrayHasKey('id', $createdBaremePenaliteTransport);
        $this->assertNotNull($createdBaremePenaliteTransport['id'], 'Created BaremePenaliteTransport must have id specified');
        $this->assertNotNull(BaremePenaliteTransport::find($createdBaremePenaliteTransport['id']), 'BaremePenaliteTransport with given id must be in DB');
        $this->assertModelData($baremePenaliteTransport, $createdBaremePenaliteTransport);
    }

    /**
     * @test read
     */
    public function test_read_bareme_penalite_transport()
    {
        $baremePenaliteTransport = factory(BaremePenaliteTransport::class)->create();

        $dbBaremePenaliteTransport = $this->baremePenaliteTransportRepo->find($baremePenaliteTransport->id);

        $dbBaremePenaliteTransport = $dbBaremePenaliteTransport->toArray();
        $this->assertModelData($baremePenaliteTransport->toArray(), $dbBaremePenaliteTransport);
    }

    /**
     * @test update
     */
    public function test_update_bareme_penalite_transport()
    {
        $baremePenaliteTransport = factory(BaremePenaliteTransport::class)->create();
        $fakeBaremePenaliteTransport = factory(BaremePenaliteTransport::class)->make()->toArray();

        $updatedBaremePenaliteTransport = $this->baremePenaliteTransportRepo->update($fakeBaremePenaliteTransport, $baremePenaliteTransport->id);

        $this->assertModelData($fakeBaremePenaliteTransport, $updatedBaremePenaliteTransport->toArray());
        $dbBaremePenaliteTransport = $this->baremePenaliteTransportRepo->find($baremePenaliteTransport->id);
        $this->assertModelData($fakeBaremePenaliteTransport, $dbBaremePenaliteTransport->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bareme_penalite_transport()
    {
        $baremePenaliteTransport = factory(BaremePenaliteTransport::class)->create();

        $resp = $this->baremePenaliteTransportRepo->delete($baremePenaliteTransport->id);

        $this->assertTrue($resp);
        $this->assertNull(BaremePenaliteTransport::find($baremePenaliteTransport->id), 'BaremePenaliteTransport should not exist in DB');
    }
}
