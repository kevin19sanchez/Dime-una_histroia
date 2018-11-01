<?php

use App\Models\story;
use App\Repositories\storyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class storyRepositoryTest extends TestCase
{
    use MakestoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var storyRepository
     */
    protected $storyRepo;

    public function setUp()
    {
        parent::setUp();
        $this->storyRepo = App::make(storyRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatestory()
    {
        $story = $this->fakestoryData();
        $createdstory = $this->storyRepo->create($story);
        $createdstory = $createdstory->toArray();
        $this->assertArrayHasKey('id', $createdstory);
        $this->assertNotNull($createdstory['id'], 'Created story must have id specified');
        $this->assertNotNull(story::find($createdstory['id']), 'story with given id must be in DB');
        $this->assertModelData($story, $createdstory);
    }

    /**
     * @test read
     */
    public function testReadstory()
    {
        $story = $this->makestory();
        $dbstory = $this->storyRepo->find($story->id);
        $dbstory = $dbstory->toArray();
        $this->assertModelData($story->toArray(), $dbstory);
    }

    /**
     * @test update
     */
    public function testUpdatestory()
    {
        $story = $this->makestory();
        $fakestory = $this->fakestoryData();
        $updatedstory = $this->storyRepo->update($fakestory, $story->id);
        $this->assertModelData($fakestory, $updatedstory->toArray());
        $dbstory = $this->storyRepo->find($story->id);
        $this->assertModelData($fakestory, $dbstory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletestory()
    {
        $story = $this->makestory();
        $resp = $this->storyRepo->delete($story->id);
        $this->assertTrue($resp);
        $this->assertNull(story::find($story->id), 'story should not exist in DB');
    }
}
