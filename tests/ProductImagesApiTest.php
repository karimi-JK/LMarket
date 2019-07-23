<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductImagesApiTest extends TestCase
{
    use MakeProductImagesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProductImages()
    {
        $productImages = $this->fakeProductImagesData();
        $this->json('POST', '/api/v1/productImages', $productImages);

        $this->assertApiResponse($productImages);
    }

    /**
     * @test
     */
    public function testReadProductImages()
    {
        $productImages = $this->makeProductImages();
        $this->json('GET', '/api/v1/productImages/'.$productImages->id);

        $this->assertApiResponse($productImages->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProductImages()
    {
        $productImages = $this->makeProductImages();
        $editedProductImages = $this->fakeProductImagesData();

        $this->json('PUT', '/api/v1/productImages/'.$productImages->id, $editedProductImages);

        $this->assertApiResponse($editedProductImages);
    }

    /**
     * @test
     */
    public function testDeleteProductImages()
    {
        $productImages = $this->makeProductImages();
        $this->json('DELETE', '/api/v1/productImages/'.$productImages->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/productImages/'.$productImages->id);

        $this->assertResponseStatus(404);
    }
}
