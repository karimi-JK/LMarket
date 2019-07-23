<?php

use Faker\Factory as Faker;
use App\Models\Admin\ProductBrands;
use App\Repositories\Admin\ProductBrandsRepository;

trait MakeProductBrandsTrait
{
    /**
     * Create fake instance of ProductBrands and save it in database
     *
     * @param array $productBrandsFields
     * @return ProductBrands
     */
    public function makeProductBrands($productBrandsFields = [])
    {
        /** @var ProductBrandsRepository $productBrandsRepo */
        $productBrandsRepo = App::make(ProductBrandsRepository::class);
        $theme = $this->fakeProductBrandsData($productBrandsFields);
        return $productBrandsRepo->create($theme);
    }

    /**
     * Get fake instance of ProductBrands
     *
     * @param array $productBrandsFields
     * @return ProductBrands
     */
    public function fakeProductBrands($productBrandsFields = [])
    {
        return new ProductBrands($this->fakeProductBrandsData($productBrandsFields));
    }

    /**
     * Get fake data of ProductBrands
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProductBrandsData($productBrandsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Name' => $fake->word,
            'Region' => $fake->word,
            'logo' => $fake->word,
            'description' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $productBrandsFields);
    }
}
