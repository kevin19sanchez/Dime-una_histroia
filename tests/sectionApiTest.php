<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class sectionApiTest extends TestCase
{
    use MakesectionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesection()
    {
        $section = $this->fakesectionData();
        $this->json('POST', '/api/v1/sections', $section);

        $this->assertApiResponse($section);
    }

    /**
     * @test
     */
    public function testReadsection()
    {
        $section = $this->makesection();
        $this->json('GET', '/api/v1/sections/'.$section->id);

        $this->assertApiResponse($section->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesection()
    {
        $section = $this->makesection();
        $editedsection = $this->fakesectionData();

        $this->json('PUT', '/api/v1/sections/'.$section->id, $editedsection);

        $this->assertApiResponse($editedsection);
    }

    /**
     * @test
     */
    public function testDeletesection()
    {
        $section = $this->makesection();
        $this->json('DELETE', '/api/v1/sections/'.$section->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/sections/'.$section->id);

        $this->assertResponseStatus(404);
    }
}
