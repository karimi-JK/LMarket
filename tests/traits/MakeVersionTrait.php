<?php

use Faker\Factory as Faker;
use App\Models\Admin\Version;
use App\Repositories\Admin\VersionRepository;

trait MakeVersionTrait
{
    /**
     * Create fake instance of Version and save it in database
     *
     * @param array $versionFields
     * @return Version
     */
    public function makeVersion($versionFields = [])
    {
        /** @var VersionRepository $versionRepo */
        $versionRepo = App::make(VersionRepository::class);
        $theme = $this->fakeVersionData($versionFields);
        return $versionRepo->create($theme);
    }

    /**
     * Get fake instance of Version
     *
     * @param array $versionFields
     * @return Version
     */
    public function fakeVersion($versionFields = [])
    {
        return new Version($this->fakeVersionData($versionFields));
    }

    /**
     * Get fake data of Version
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVersionData($versionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'product_id' => $fake->word,
            'version' => $fake->word,
            'apk' => $fake->word,
            'version_price' => $fake->word,
            'compony' => $fake->word,
            'visited' => $fake->word,
            'downloaded' => $fake->word,
            'change' => $fake->text,
            'description' => $fake->text,
            'requirements' => $fake->text,
            'state' => $fake->word,
            'status' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $versionFields);
    }
}
