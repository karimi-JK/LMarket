<?php

use App\Models\Admin\ProductImages;
use App\Repositories\Admin\ProductImagesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductImagesRepositoryTest extends TestCase
{
    use MakeProductImagesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProductImagesRepository
     */
    protected $productImagesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->productImagesRepo = App::make(ProductImagesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProductImages()
    {
        $productImages = $this->fakeProductImagesData();
        $createdProductImages = $this->productImagesRepo->create($productImages);
        $createdProductImages = $createdProductImages->toArray();
        $this->assertArrayHasKey('id', $createdProductImages);
        $this->assertNotNull($createdProductImages['id'], 'Created ProductImages must have id specified');
        $this->assertNotNull(ProductImages::find($createdProductImages['id']), 'ProductImages with given id must be in DB');
        $this->assertModelData($productImages, $createdProductImages);
    }

    /**
     * @test read
     */
    public function testReadProductImages()
    {
        $productImages = $this->makeProductImages();
        $dbProductImages = $this->productImagesRepo->find($productImages->id);
        $dbProductImages = $dbProductImages->toArray();
        $this->assertModelData($productImages->toArray(), $dbProductImages);
    }

    /**
     * @test update
     */
    public function testUpdateProductImages()
    {
        $productImages = $this->makeProductImages();
        $fakeProductImages = $this->fakeProductImagesData();
        $updatedProductImages = $this->productImagesRepo->update($fakeProductImages, $productImages->id);
        $this->assertModelData($fakeProductImages, $updatedProductImages->toArray());
        $dbProductImages = $this->productImagesRepo->find($productImages->id);
        $this->assertModelData($fakeProductImages, $dbProductImages->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProductImages()
    {
        $productImages = $this->makeProductImages();
        $resp = $this->productImagesRepo->delete($productImages->id);
        $this->assertTrue($resp);
        $this->assertNull(ProductImages::find($productImages->id), 'ProductImages should not exist in DB');
    }
}
