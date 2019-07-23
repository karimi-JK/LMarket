<?php

use Faker\Factory as Faker;
use App\Models\Admin\Requirement;
use App\Repositories\Admin\RequirementRepository;

trait MakeRequirementTrait
{
    /**
     * Create fake instance of Requirement and save it in database
     *
     * @param array $requirementFields
     * @return Requirement
     */
    public function makeRequirement($requirementFields = [])
    {
        /** @var RequirementRepository $requirementRepo */
        $requirementRepo = App::make(RequirementRepository::class);
        $theme = $this->fakeRequirementData($requirementFields);
        return $requirementRepo->create($theme);
    }

    /**
     * Get fake instance of Requirement
     *
     * @param array $requirementFields
     * @return Requirement
     */
    public function fakeRequirement($requirementFields = [])
    {
        return new Requirement($this->fakeRequirementData($requirementFields));
    }

    /**
     * Get fake data of Requirement
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRequirementData($requirementFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $requirementFields);
    }
}
