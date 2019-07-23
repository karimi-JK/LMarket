<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductBrandsApiTest extends TestCase
{
    use MakeProductBrandsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProductBrands()
    {
        $productBrands = $this->fakeProductBrandsData();
        $this->json('POST', '/api/v1/productBrands', $productBrands);

        $this->assertApiResponse($productBrands);
    }

    /**
     * @test
     */
    public function testReadProductBrands()
    {
        $productBrands = $this->makeProductBrands();
        $this->json('GET', '/api/v1/productBrands/'.$productBrands->id);

        $this->assertApiResponse($productBrands->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProductBrands()
    {
        $productBrands = $this->makeProductBrands();
        $editedProductBrands = $this->fakeProductBrandsData();

        $this->json('PUT', '/api/v1/productBrands/'.$productBrands->id, $editedProductBrands);

        $this->assertApiResponse($editedProductBrands);
    }

    /**
     * @test
     */
    public function testDeleteProductBrands()
    {
        $productBrands = $this->makeProductBrands();
        $this->json('DELETE', '/api/v1/productBrands/'.$productBrands->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/productBrands/'.$productBrands->id);

        $this->assertResponseStatus(404);
    }
}
