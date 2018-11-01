<?php

use Faker\Factory as Faker;
use App\Models\story;
use App\Repositories\storyRepository;

trait MakestoryTrait
{
    /**
     * Create fake instance of story and save it in database
     *
     * @param array $storyFields
     * @return story
     */
    public function makestory($storyFields = [])
    {
        /** @var storyRepository $storyRepo */
        $storyRepo = App::make(storyRepository::class);
        $theme = $this->fakestoryData($storyFields);
        return $storyRepo->create($theme);
    }

    /**
     * Get fake instance of story
     *
     * @param array $storyFields
     * @return story
     */
    public function fakestory($storyFields = [])
    {
        return new story($this->fakestoryData($storyFields));
    }

    /**
     * Get fake data of story
     *
     * @param array $postFields
     * @return array
     */
    public function fakestoryData($storyFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'state' => $fake->randomDigitNotNull,
            'id_category' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $storyFields);
    }
}
