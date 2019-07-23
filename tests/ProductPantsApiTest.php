<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductPantsApiTest extends TestCase
{
    use MakeProductPantsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProductPants()
    {
        $productPants = $this->fakeProductPantsData();
        $this->json('POST', '/api/v1/productPants', $productPants);

        $this->assertApiResponse($productPants);
    }

    /**
     * @test
     */
    public function testReadProductPants()
    {
        $productPants = $this->makeProductPants();
        $this->json('GET', '/api/v1/productPants/'.$productPants->id);

        $this->assertApiResponse($productPants->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProductPants()
    {
        $productPants = $this->makeProductPants();
        $editedProductPants = $this->fakeProductPantsData();

        $this->json('PUT', '/api/v1/productPants/'.$productPants->id, $editedProductPants);

        $this->assertApiResponse($editedProductPants);
    }

    /**
     * @test
     */
    public function testDeleteProductPants()
    {
        $productPants = $this->makeProductPants();
        $this->json('DELETE', '/api/v1/productPants/'.$productPants->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/productPants/'.$productPants->id);

        $this->assertResponseStatus(404);
    }
}
