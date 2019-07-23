<?php

use App\Models\Admin\Color;
use App\Repositories\Admin\ColorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ColorRepositoryTest extends TestCase
{
    use MakeColorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ColorRepository
     */
    protected $colorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->colorRepo = App::make(ColorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateColor()
    {
        $color = $this->fakeColorData();
        $createdColor = $this->colorRepo->create($color);
        $createdColor = $createdColor->toArray();
        $this->assertArrayHasKey('id', $createdColor);
        $this->assertNotNull($createdColor['id'], 'Created Color must have id specified');
        $this->assertNotNull(Color::find($createdColor['id']), 'Color with given id must be in DB');
        $this->assertModelData($color, $createdColor);
    }

    /**
     * @test read
     */
    public function testReadColor()
    {
        $color = $this->makeColor();
        $dbColor = $this->colorRepo->find($color->id);
        $dbColor = $dbColor->toArray();
        $this->assertModelData($color->toArray(), $dbColor);
    }

    /**
     * @test update
     */
    public function testUpdateColor()
    {
        $color = $this->makeColor();
        $fakeColor = $this->fakeColorData();
        $updatedColor = $this->colorRepo->update($fakeColor, $color->id);
        $this->assertModelData($fakeColor, $updatedColor->toArray());
        $dbColor = $this->colorRepo->find($color->id);
        $this->assertModelData($fakeColor, $dbColor->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteColor()
    {
        $color = $this->makeColor();
        $resp = $this->colorRepo->delete($color->id);
        $this->assertTrue($resp);
        $this->assertNull(Color::find($color->id), 'Color should not exist in DB');
    }
}
