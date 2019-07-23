<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ColorApiTest extends TestCase
{
    use MakeColorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateColor()
    {
        $color = $this->fakeColorData();
        $this->json('POST', '/api/v1/colors', $color);

        $this->assertApiResponse($color);
    }

    /**
     * @test
     */
    public function testReadColor()
    {
        $color = $this->makeColor();
        $this->json('GET', '/api/v1/colors/'.$color->id);

        $this->assertApiResponse($color->toArray());
    }

    /**
     * @test
     */
    public function testUpdateColor()
    {
        $color = $this->makeColor();
        $editedColor = $this->fakeColorData();

        $this->json('PUT', '/api/v1/colors/'.$color->id, $editedColor);

        $this->assertApiResponse($editedColor);
    }

    /**
     * @test
     */
    public function testDeleteColor()
    {
        $color = $this->makeColor();
        $this->json('DELETE', '/api/v1/colors/'.$color->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/colors/'.$color->id);

        $this->assertResponseStatus(404);
    }
}
