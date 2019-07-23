<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RequirementApiTest extends TestCase
{
    use MakeRequirementTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRequirement()
    {
        $requirement = $this->fakeRequirementData();
        $this->json('POST', '/api/v1/requirements', $requirement);

        $this->assertApiResponse($requirement);
    }

    /**
     * @test
     */
    public function testReadRequirement()
    {
        $requirement = $this->makeRequirement();
        $this->json('GET', '/api/v1/requirements/'.$requirement->id);

        $this->assertApiResponse($requirement->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRequirement()
    {
        $requirement = $this->makeRequirement();
        $editedRequirement = $this->fakeRequirementData();

        $this->json('PUT', '/api/v1/requirements/'.$requirement->id, $editedRequirement);

        $this->assertApiResponse($editedRequirement);
    }

    /**
     * @test
     */
    public function testDeleteRequirement()
    {
        $requirement = $this->makeRequirement();
        $this->json('DELETE', '/api/v1/requirements/'.$requirement->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/requirements/'.$requirement->id);

        $this->assertResponseStatus(404);
    }
}
