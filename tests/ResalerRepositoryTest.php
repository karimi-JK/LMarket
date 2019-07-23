<?php

use App\Models\Admin\Resaler;
use App\Repositories\Admin\ResalerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResalerRepositoryTest extends TestCase
{
    use MakeResalerTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ResalerRepository
     */
    protected $resalerRepo;

    public function setUp()
    {
        parent::setUp();
        $this->resalerRepo = App::make(ResalerRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateResaler()
    {
        $resaler = $this->fakeResalerData();
        $createdResaler = $this->resalerRepo->create($resaler);
        $createdResaler = $createdResaler->toArray();
        $this->assertArrayHasKey('id', $createdResaler);
        $this->assertNotNull($createdResaler['id'], 'Created Resaler must have id specified');
        $this->assertNotNull(Resaler::find($createdResaler['id']), 'Resaler with given id must be in DB');
        $this->assertModelData($resaler, $createdResaler);
    }

    /**
     * @test read
     */
    public function testReadResaler()
    {
        $resaler = $this->makeResaler();
        $dbResaler = $this->resalerRepo->find($resaler->id);
        $dbResaler = $dbResaler->toArray();
        $this->assertModelData($resaler->toArray(), $dbResaler);
    }

    /**
     * @test update
     */
    public function testUpdateResaler()
    {
        $resaler = $this->makeResaler();
        $fakeResaler = $this->fakeResalerData();
        $updatedResaler = $this->resalerRepo->update($fakeResaler, $resaler->id);
        $this->assertModelData($fakeResaler, $updatedResaler->toArray());
        $dbResaler = $this->resalerRepo->find($resaler->id);
        $this->assertModelData($fakeResaler, $dbResaler->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteResaler()
    {
        $resaler = $this->makeResaler();
        $resp = $this->resalerRepo->delete($resaler->id);
        $this->assertTrue($resp);
        $this->assertNull(Resaler::find($resaler->id), 'Resaler should not exist in DB');
    }
}
