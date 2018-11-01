<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class storyApiTest extends TestCase
{
    use MakestoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatestory()
    {
        $story = $this->fakestoryData();
        $this->json('POST', '/api/v1/stories', $story);

        $this->assertApiResponse($story);
    }

    /**
     * @test
     */
    public function testReadstory()
    {
        $story = $this->makestory();
        $this->json('GET', '/api/v1/stories/'.$story->id);

        $this->assertApiResponse($story->toArray());
    }

    /**
     * @test
     */
    public function testUpdatestory()
    {
        $story = $this->makestory();
        $editedstory = $this->fakestoryData();

        $this->json('PUT', '/api/v1/stories/'.$story->id, $editedstory);

        $this->assertApiResponse($editedstory);
    }

    /**
     * @test
     */
    public function testDeletestory()
    {
        $story = $this->makestory();
        $this->json('DELETE', '/api/v1/stories/'.$story->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/stories/'.$story->id);

        $this->assertResponseStatus(404);
    }
}
