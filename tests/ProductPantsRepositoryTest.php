<?php

use App\Models\Admin\ProductPants;
use App\Repositories\Admin\ProductPantsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductPantsRepositoryTest extends TestCase
{
    use MakeProductPantsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProductPantsRepository
     */
    protected $productPantsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->productPantsRepo = App::make(ProductPantsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProductPants()
    {
        $productPants = $this->fakeProductPantsData();
        $createdProductPants = $this->productPantsRepo->create($productPants);
        $createdProductPants = $createdProductPants->toArray();
        $this->assertArrayHasKey('id', $createdProductPants);
        $this->assertNotNull($createdProductPants['id'], 'Created ProductPants must have id specified');
        $this->assertNotNull(ProductPants::find($createdProductPants['id']), 'ProductPants with given id must be in DB');
        $this->assertModelData($productPants, $createdProductPants);
    }

    /**
     * @test read
     */
    public function testReadProductPants()
    {
        $productPants = $this->makeProductPants();
        $dbProductPants = $this->productPantsRepo->find($productPants->id);
        $dbProductPants = $dbProductPants->toArray();
        $this->assertModelData($productPants->toArray(), $dbProductPants);
    }

    /**
     * @test update
     */
    public function testUpdateProductPants()
    {
        $productPants = $this->makeProductPants();
        $fakeProductPants = $this->fakeProductPantsData();
        $updatedProductPants = $this->productPantsRepo->update($fakeProductPants, $productPants->id);
        $this->assertModelData($fakeProductPants, $updatedProductPants->toArray());
        $dbProductPants = $this->productPantsRepo->find($productPants->id);
        $this->assertModelData($fakeProductPants, $dbProductPants->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProductPants()
    {
        $productPants = $this->makeProductPants();
        $resp = $this->productPantsRepo->delete($productPants->id);
        $this->assertTrue($resp);
        $this->assertNull(ProductPants::find($productPants->id), 'ProductPants should not exist in DB');
    }
}
