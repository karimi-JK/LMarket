<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Product_pantsApiTest extends TestCase
{
    use MakeProduct_pantsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProduct_pants()
    {
        $productPants = $this->fakeProduct_pantsData();
        $this->json('POST', '/api/v1/productPants', $productPants);

        $this->assertApiResponse($productPants);
    }

    /**
     * @test
     */
    public function testReadProduct_pants()
    {
        $productPants = $this->makeProduct_pants();
        $this->json('GET', '/api/v1/productPants/'.$productPants->id);

        $this->assertApiResponse($productPants->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProduct_pants()
    {
        $productPants = $this->makeProduct_pants();
        $editedProduct_pants = $this->fakeProduct_pantsData();

        $this->json('PUT', '/api/v1/productPants/'.$productPants->id, $editedProduct_pants);

        $this->assertApiResponse($editedProduct_pants);
    }

    /**
     * @test
     */
    public function testDeleteProduct_pants()
    {
        $productPants = $this->makeProduct_pants();
        $this->json('DELETE', '/api/v1/productPants/'.$productPants->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/productPants/'.$productPants->id);

        $this->assertResponseStatus(404);
    }
}
