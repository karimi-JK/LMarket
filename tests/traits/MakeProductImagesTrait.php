<?php

use Faker\Factory as Faker;
use App\Models\Admin\ProductImages;
use App\Repositories\Admin\ProductImagesRepository;

trait MakeProductImagesTrait
{
    /**
     * Create fake instance of ProductImages and save it in database
     *
     * @param array $productImagesFields
     * @return ProductImages
     */
    public function makeProductImages($productImagesFields = [])
    {
        /** @var ProductImagesRepository $productImagesRepo */
        $productImagesRepo = App::make(ProductImagesRepository::class);
        $theme = $this->fakeProductImagesData($productImagesFields);
        return $productImagesRepo->create($theme);
    }

    /**
     * Get fake instance of ProductImages
     *
     * @param array $productImagesFields
     * @return ProductImages
     */
    public function fakeProductImages($productImagesFields = [])
    {
        return new ProductImages($this->fakeProductImagesData($productImagesFields));
    }

    /**
     * Get fake data of ProductImages
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProductImagesData($productImagesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'type' => $fake->word,
            'product_id' => $fake->word,
            'product_type' => $fake->word,
            'state' => $fake->word,
            'status' => $fake->word,
            'description' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $productImagesFields);
    }
}
