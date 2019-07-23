<?php

use App\Models\Admin\Requirement;
use App\Repositories\Admin\RequirementRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RequirementRepositoryTest extends TestCase
{
    use MakeRequirementTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RequirementRepository
     */
    protected $requirementRepo;

    public function setUp()
    {
        parent::setUp();
        $this->requirementRepo = App::make(RequirementRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRequirement()
    {
        $requirement = $this->fakeRequirementData();
        $createdRequirement = $this->requirementRepo->create($requirement);
        $createdRequirement = $createdRequirement->toArray();
        $this->assertArrayHasKey('id', $createdRequirement);
        $this->assertNotNull($createdRequirement['id'], 'Created Requirement must have id specified');
        $this->assertNotNull(Requirement::find($createdRequirement['id']), 'Requirement with given id must be in DB');
        $this->assertModelData($requirement, $createdRequirement);
    }

    /**
     * @test read
     */
    public function testReadRequirement()
    {
        $requirement = $this->makeRequirement();
        $dbRequirement = $this->requirementRepo->find($requirement->id);
        $dbRequirement = $dbRequirement->toArray();
        $this->assertModelData($requirement->toArray(), $dbRequirement);
    }

    /**
     * @test update
     */
    public function testUpdateRequirement()
    {
        $requirement = $this->makeRequirement();
        $fakeRequirement = $this->fakeRequirementData();
        $updatedRequirement = $this->requirementRepo->update($fakeRequirement, $requirement->id);
        $this->assertModelData($fakeRequirement, $updatedRequirement->toArray());
        $dbRequirement = $this->requirementRepo->find($requirement->id);
        $this->assertModelData($fakeRequirement, $dbRequirement->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRequirement()
    {
        $requirement = $this->makeRequirement();
        $resp = $this->requirementRepo->delete($requirement->id);
        $this->assertTrue($resp);
        $this->assertNull(Requirement::find($requirement->id), 'Requirement should not exist in DB');
    }
}
