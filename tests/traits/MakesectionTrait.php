<?php

use Faker\Factory as Faker;
use App\Models\section;
use App\Repositories\sectionRepository;

trait MakesectionTrait
{
    /**
     * Create fake instance of section and save it in database
     *
     * @param array $sectionFields
     * @return section
     */
    public function makesection($sectionFields = [])
    {
        /** @var sectionRepository $sectionRepo */
        $sectionRepo = App::make(sectionRepository::class);
        $theme = $this->fakesectionData($sectionFields);
        return $sectionRepo->create($theme);
    }

    /**
     * Get fake instance of section
     *
     * @param array $sectionFields
     * @return section
     */
    public function fakesection($sectionFields = [])
    {
        return new section($this->fakesectionData($sectionFields));
    }

    /**
     * Get fake data of section
     *
     * @param array $postFields
     * @return array
     */
    public function fakesectionData($sectionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_story' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'description' => $fake->word,
            'url' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $sectionFields);
    }
}
