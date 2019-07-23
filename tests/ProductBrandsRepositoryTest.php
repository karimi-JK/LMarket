<?php

use App\Models\Admin\ProductBrands;
use App\Repositories\Admin\ProductBrandsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductBrandsRepositoryTest extends TestCase
{
    use MakeProductBrandsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProductBrandsRepository
     */
    protected $productBrandsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->productBrandsRepo = App::make(ProductBrandsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProductBrands()
    {
        $productBrands = $this->fakeProductBrandsData();
        $createdProductBrands = $this->productBrandsRepo->create($productBrands);
        $createdProductBrands = $createdProductBrands->toArray();
        $this->assertArrayHasKey('id', $createdProductBrands);
        $this->assertNotNull($createdProductBrands['id'], 'Created ProductBrands must have id specified');
        $this->assertNotNull(ProductBrands::find($createdProductBrands['id']), 'ProductBrands with given id must be in DB');
        $this->assertModelData($productBrands, $createdProductBrands);
    }

    /**
     * @test read
     */
    public function testReadProductBrands()
    {
        $productBrands = $this->makeProductBrands();
        $dbProductBrands = $this->productBrandsRepo->find($productBrands->id);
        $dbProductBrands = $dbProductBrands->toArray();
        $this->assertModelData($productBrands->toArray(), $dbProductBrands);
    }

    /**
     * @test update
     */
    public function testUpdateProductBrands()
    {
        $productBrands = $this->makeProductBrands();
        $fakeProductBrands = $this->fakeProductBrandsData();
        $updatedProductBrands = $this->productBrandsRepo->update($fakeProductBrands, $productBrands->id);
        $this->assertModelData($fakeProductBrands, $updatedProductBrands->toArray());
        $dbProductBrands = $this->productBrandsRepo->find($productBrands->id);
        $this->assertModelData($fakeProductBrands, $dbProductBrands->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProductBrands()
    {
        $productBrands = $this->makeProductBrands();
        $resp = $this->productBrandsRepo->delete($productBrands->id);
        $this->assertTrue($resp);
        $this->assertNull(ProductBrands::find($productBrands->id), 'ProductBrands should not exist in DB');
    }
}
