<?php

use App\Models\section;
use App\Repositories\sectionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class sectionRepositoryTest extends TestCase
{
    use MakesectionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var sectionRepository
     */
    protected $sectionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->sectionRepo = App::make(sectionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesection()
    {
        $section = $this->fakesectionData();
        $createdsection = $this->sectionRepo->create($section);
        $createdsection = $createdsection->toArray();
        $this->assertArrayHasKey('id', $createdsection);
        $this->assertNotNull($createdsection['id'], 'Created section must have id specified');
        $this->assertNotNull(section::find($createdsection['id']), 'section with given id must be in DB');
        $this->assertModelData($section, $createdsection);
    }

    /**
     * @test read
     */
    public function testReadsection()
    {
        $section = $this->makesection();
        $dbsection = $this->sectionRepo->find($section->id);
        $dbsection = $dbsection->toArray();
        $this->assertModelData($section->toArray(), $dbsection);
    }

    /**
     * @test update
     */
    public function testUpdatesection()
    {
        $section = $this->makesection();
        $fakesection = $this->fakesectionData();
        $updatedsection = $this->sectionRepo->update($fakesection, $section->id);
        $this->assertModelData($fakesection, $updatedsection->toArray());
        $dbsection = $this->sectionRepo->find($section->id);
        $this->assertModelData($fakesection, $dbsection->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesection()
    {
        $section = $this->makesection();
        $resp = $this->sectionRepo->delete($section->id);
        $this->assertTrue($resp);
        $this->assertNull(section::find($section->id), 'section should not exist in DB');
    }
}
