<?php namespace Tests\Repositories;

use App\Models\FactureTicket;
use App\Repositories\FactureTicketRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FactureTicketRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FactureTicketRepository
     */
    protected $factureTicketRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->factureTicketRepo = \App::make(FactureTicketRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_facture_ticket()
    {
        $factureTicket = factory(FactureTicket::class)->make()->toArray();

        $createdFactureTicket = $this->factureTicketRepo->create($factureTicket);

        $createdFactureTicket = $createdFactureTicket->toArray();
        $this->assertArrayHasKey('id', $createdFactureTicket);
        $this->assertNotNull($createdFactureTicket['id'], 'Created FactureTicket must have id specified');
        $this->assertNotNull(FactureTicket::find($createdFactureTicket['id']), 'FactureTicket with given id must be in DB');
        $this->assertModelData($factureTicket, $createdFactureTicket);
    }

    /**
     * @test read
     */
    public function test_read_facture_ticket()
    {
        $factureTicket = factory(FactureTicket::class)->create();

        $dbFactureTicket = $this->factureTicketRepo->find($factureTicket->id);

        $dbFactureTicket = $dbFactureTicket->toArray();
        $this->assertModelData($factureTicket->toArray(), $dbFactureTicket);
    }

    /**
     * @test update
     */
    public function test_update_facture_ticket()
    {
        $factureTicket = factory(FactureTicket::class)->create();
        $fakeFactureTicket = factory(FactureTicket::class)->make()->toArray();

        $updatedFactureTicket = $this->factureTicketRepo->update($fakeFactureTicket, $factureTicket->id);

        $this->assertModelData($fakeFactureTicket, $updatedFactureTicket->toArray());
        $dbFactureTicket = $this->factureTicketRepo->find($factureTicket->id);
        $this->assertModelData($fakeFactureTicket, $dbFactureTicket->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_facture_ticket()
    {
        $factureTicket = factory(FactureTicket::class)->create();

        $resp = $this->factureTicketRepo->delete($factureTicket->id);

        $this->assertTrue($resp);
        $this->assertNull(FactureTicket::find($factureTicket->id), 'FactureTicket should not exist in DB');
    }
}
