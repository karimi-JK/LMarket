<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResalerApiTest extends TestCase
{
    use MakeResalerTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateResaler()
    {
        $resaler = $this->fakeResalerData();
        $this->json('POST', '/api/v1/resalers', $resaler);

        $this->assertApiResponse($resaler);
    }

    /**
     * @test
     */
    public function testReadResaler()
    {
        $resaler = $this->makeResaler();
        $this->json('GET', '/api/v1/resalers/'.$resaler->id);

        $this->assertApiResponse($resaler->toArray());
    }

    /**
     * @test
     */
    public function testUpdateResaler()
    {
        $resaler = $this->makeResaler();
        $editedResaler = $this->fakeResalerData();

        $this->json('PUT', '/api/v1/resalers/'.$resaler->id, $editedResaler);

        $this->assertApiResponse($editedResaler);
    }

    /**
     * @test
     */
    public function testDeleteResaler()
    {
        $resaler = $this->makeResaler();
        $this->json('DELETE', '/api/v1/resalers/'.$resaler->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/resalers/'.$resaler->id);

        $this->assertResponseStatus(404);
    }
}
