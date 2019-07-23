<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VersionApiTest extends TestCase
{
    use MakeVersionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVersion()
    {
        $version = $this->fakeVersionData();
        $this->json('POST', '/api/v1/versions', $version);

        $this->assertApiResponse($version);
    }

    /**
     * @test
     */
    public function testReadVersion()
    {
        $version = $this->makeVersion();
        $this->json('GET', '/api/v1/versions/'.$version->id);

        $this->assertApiResponse($version->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVersion()
    {
        $version = $this->makeVersion();
        $editedVersion = $this->fakeVersionData();

        $this->json('PUT', '/api/v1/versions/'.$version->id, $editedVersion);

        $this->assertApiResponse($editedVersion);
    }

    /**
     * @test
     */
    public function testDeleteVersion()
    {
        $version = $this->makeVersion();
        $this->json('DELETE', '/api/v1/versions/'.$version->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/versions/'.$version->id);

        $this->assertResponseStatus(404);
    }
}
