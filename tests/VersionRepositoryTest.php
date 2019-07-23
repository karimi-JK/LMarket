<?php

use App\Models\Admin\Version;
use App\Repositories\Admin\VersionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VersionRepositoryTest extends TestCase
{
    use MakeVersionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VersionRepository
     */
    protected $versionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->versionRepo = App::make(VersionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVersion()
    {
        $version = $this->fakeVersionData();
        $createdVersion = $this->versionRepo->create($version);
        $createdVersion = $createdVersion->toArray();
        $this->assertArrayHasKey('id', $createdVersion);
        $this->assertNotNull($createdVersion['id'], 'Created Version must have id specified');
        $this->assertNotNull(Version::find($createdVersion['id']), 'Version with given id must be in DB');
        $this->assertModelData($version, $createdVersion);
    }

    /**
     * @test read
     */
    public function testReadVersion()
    {
        $version = $this->makeVersion();
        $dbVersion = $this->versionRepo->find($version->id);
        $dbVersion = $dbVersion->toArray();
        $this->assertModelData($version->toArray(), $dbVersion);
    }

    /**
     * @test update
     */
    public function testUpdateVersion()
    {
        $version = $this->makeVersion();
        $fakeVersion = $this->fakeVersionData();
        $updatedVersion = $this->versionRepo->update($fakeVersion, $version->id);
        $this->assertModelData($fakeVersion, $updatedVersion->toArray());
        $dbVersion = $this->versionRepo->find($version->id);
        $this->assertModelData($fakeVersion, $dbVersion->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVersion()
    {
        $version = $this->makeVersion();
        $resp = $this->versionRepo->delete($version->id);
        $this->assertTrue($resp);
        $this->assertNull(Version::find($version->id), 'Version should not exist in DB');
    }
}
