<?php

use App\Models\Admin\Product_pants;
use App\Repositories\Admin\Product_pantsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Product_pantsRepositoryTest extends TestCase
{
    use MakeProduct_pantsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var Product_pantsRepository
     */
    protected $productPantsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->productPantsRepo = App::make(Product_pantsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProduct_pants()
    {
        $productPants = $this->fakeProduct_pantsData();
        $createdProduct_pants = $this->productPantsRepo->create($productPants);
        $createdProduct_pants = $createdProduct_pants->toArray();
        $this->assertArrayHasKey('id', $createdProduct_pants);
        $this->assertNotNull($createdProduct_pants['id'], 'Created Product_pants must have id specified');
        $this->assertNotNull(Product_pants::find($createdProduct_pants['id']), 'Product_pants with given id must be in DB');
        $this->assertModelData($productPants, $createdProduct_pants);
    }

    /**
     * @test read
     */
    public function testReadProduct_pants()
    {
        $productPants = $this->makeProduct_pants();
        $dbProduct_pants = $this->productPantsRepo->find($productPants->id);
        $dbProduct_pants = $dbProduct_pants->toArray();
        $this->assertModelData($productPants->toArray(), $dbProduct_pants);
    }

    /**
     * @test update
     */
    public function testUpdateProduct_pants()
    {
        $productPants = $this->makeProduct_pants();
        $fakeProduct_pants = $this->fakeProduct_pantsData();
        $updatedProduct_pants = $this->productPantsRepo->update($fakeProduct_pants, $productPants->id);
        $this->assertModelData($fakeProduct_pants, $updatedProduct_pants->toArray());
        $dbProduct_pants = $this->productPantsRepo->find($productPants->id);
        $this->assertModelData($fakeProduct_pants, $dbProduct_pants->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProduct_pants()
    {
        $productPants = $this->makeProduct_pants();
        $resp = $this->productPantsRepo->delete($productPants->id);
        $this->assertTrue($resp);
        $this->assertNull(Product_pants::find($productPants->id), 'Product_pants should not exist in DB');
    }
}
