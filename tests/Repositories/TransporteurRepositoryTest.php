<?php namespace Tests\Repositories;

use App\Models\Transporteur;
use App\Repositories\TransporteurRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TransporteurRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransporteurRepository
     */
    protected $transporteurRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->transporteurRepo = \App::make(TransporteurRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_transporteur()
    {
        $transporteur = factory(Transporteur::class)->make()->toArray();

        $createdTransporteur = $this->transporteurRepo->create($transporteur);

        $createdTransporteur = $createdTransporteur->toArray();
        $this->assertArrayHasKey('id', $createdTransporteur);
        $this->assertNotNull($createdTransporteur['id'], 'Created Transporteur must have id specified');
        $this->assertNotNull(Transporteur::find($createdTransporteur['id']), 'Transporteur with given id must be in DB');
        $this->assertModelData($transporteur, $createdTransporteur);
    }

    /**
     * @test read
     */
    public function test_read_transporteur()
    {
        $transporteur = factory(Transporteur::class)->create();

        $dbTransporteur = $this->transporteurRepo->find($transporteur->id);

        $dbTransporteur = $dbTransporteur->toArray();
        $this->assertModelData($transporteur->toArray(), $dbTransporteur);
    }

    /**
     * @test update
     */
    public function test_update_transporteur()
    {
        $transporteur = factory(Transporteur::class)->create();
        $fakeTransporteur = factory(Transporteur::class)->make()->toArray();

        $updatedTransporteur = $this->transporteurRepo->update($fakeTransporteur, $transporteur->id);

        $this->assertModelData($fakeTransporteur, $updatedTransporteur->toArray());
        $dbTransporteur = $this->transporteurRepo->find($transporteur->id);
        $this->assertModelData($fakeTransporteur, $dbTransporteur->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_transporteur()
    {
        $transporteur = factory(Transporteur::class)->create();

        $resp = $this->transporteurRepo->delete($transporteur->id);

        $this->assertTrue($resp);
        $this->assertNull(Transporteur::find($transporteur->id), 'Transporteur should not exist in DB');
    }
}
