<?php

use Faker\Factory as Faker;
use App\Models\Admin\Color;
use App\Repositories\Admin\ColorRepository;

trait MakeColorTrait
{
    /**
     * Create fake instance of Color and save it in database
     *
     * @param array $colorFields
     * @return Color
     */
    public function makeColor($colorFields = [])
    {
        /** @var ColorRepository $colorRepo */
        $colorRepo = App::make(ColorRepository::class);
        $theme = $this->fakeColorData($colorFields);
        return $colorRepo->create($theme);
    }

    /**
     * Get fake instance of Color
     *
     * @param array $colorFields
     * @return Color
     */
    public function fakeColor($colorFields = [])
    {
        return new Color($this->fakeColorData($colorFields));
    }

    /**
     * Get fake data of Color
     *
     * @param array $postFields
     * @return array
     */
    public function fakeColorData($colorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'color' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $colorFields);
    }
}
