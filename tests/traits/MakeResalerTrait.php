<?php

use Faker\Factory as Faker;
use App\Models\Admin\Resaler;
use App\Repositories\Admin\ResalerRepository;

trait MakeResalerTrait
{
    /**
     * Create fake instance of Resaler and save it in database
     *
     * @param array $resalerFields
     * @return Resaler
     */
    public function makeResaler($resalerFields = [])
    {
        /** @var ResalerRepository $resalerRepo */
        $resalerRepo = App::make(ResalerRepository::class);
        $theme = $this->fakeResalerData($resalerFields);
        return $resalerRepo->create($theme);
    }

    /**
     * Get fake instance of Resaler
     *
     * @param array $resalerFields
     * @return Resaler
     */
    public function fakeResaler($resalerFields = [])
    {
        return new Resaler($this->fakeResalerData($resalerFields));
    }

    /**
     * Get fake data of Resaler
     *
     * @param array $postFields
     * @return array
     */
    public function fakeResalerData($resalerFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'company' => $fake->word,
            'email' => $fake->word,
            'avatar' => $fake->word,
            'last_acc' => $fake->word,
            'policy' => $fake->word,
            'state' => $fake->word,
            'activate_code' => $fake->text,
            'mobile' => $fake->word,
            'password' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $resalerFields);
    }
}
