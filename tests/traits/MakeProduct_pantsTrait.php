<?php

use Faker\Factory as Faker;
use App\Models\Admin\Product_pants;
use App\Repositories\Admin\Product_pantsRepository;

trait MakeProduct_pantsTrait
{
    /**
     * Create fake instance of Product_pants and save it in database
     *
     * @param array $productPantsFields
     * @return Product_pants
     */
    public function makeProduct_pants($productPantsFields = [])
    {
        /** @var Product_pantsRepository $productPantsRepo */
        $productPantsRepo = App::make(Product_pantsRepository::class);
        $theme = $this->fakeProduct_pantsData($productPantsFields);
        return $productPantsRepo->create($theme);
    }

    /**
     * Get fake instance of Product_pants
     *
     * @param array $productPantsFields
     * @return Product_pants
     */
    public function fakeProduct_pants($productPantsFields = [])
    {
        return new Product_pants($this->fakeProduct_pantsData($productPantsFields));
    }

    /**
     * Get fake data of Product_pants
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProduct_pantsData($productPantsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'product_id' => $fake->word,
            'name' => $fake->word,
            'price' => $fake->word,
            'tags' => $fake->text,
            'color_id' => $fake->word,
            'size' => $fake->text,
            'count' => $fake->word,
            'critical_number' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $productPantsFields);
    }
}
