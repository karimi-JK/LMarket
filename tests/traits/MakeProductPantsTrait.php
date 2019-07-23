<?php

use Faker\Factory as Faker;
use App\Models\Admin\ProductPants;
use App\Repositories\Admin\ProductPantsRepository;

trait MakeProductPantsTrait
{
    /**
     * Create fake instance of ProductPants and save it in database
     *
     * @param array $productPantsFields
     * @return ProductPants
     */
    public function makeProductPants($productPantsFields = [])
    {
        /** @var ProductPantsRepository $productPantsRepo */
        $productPantsRepo = App::make(ProductPantsRepository::class);
        $theme = $this->fakeProductPantsData($productPantsFields);
        return $productPantsRepo->create($theme);
    }

    /**
     * Get fake instance of ProductPants
     *
     * @param array $productPantsFields
     * @return ProductPants
     */
    public function fakeProductPants($productPantsFields = [])
    {
        return new ProductPants($this->fakeProductPantsData($productPantsFields));
    }

    /**
     * Get fake data of ProductPants
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProductPantsData($productPantsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'product_id' => $fake->word,
            'name' => $fake->word,
            'price' => $fake->word,
            'brand_id' => $fake->word,
            'tags' => $fake->text,
            'color_id' => $fake->word,
            'size' => $fake->text,
            'count' => $fake->word,
            'critical_number' => $fake->word,
            'description' => $fake->text,
            'state' => $fake->word,
            'status' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $productPantsFields);
    }
}
