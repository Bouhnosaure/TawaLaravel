<?php

use Laracasts\TestDummy\Factory as TestDummy;

class CarpoolingRepositoryTest extends Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    protected $repo;

    protected function _before()
    {
        $this->repo = $this->tester->grabService('App\Repositories\Eloquent\CarpoolingRepository');
    }

    /**
     * @test
     */
    public function it_gets_all_carpoolings()
    {
        $carpoolings = $this->repo->getAll();
        $this->assertCount(11, $carpoolings);
    }

    /**
     * @test
     */
    public function it_gets_one_carpooling()
    {
        $carpooling = $this->repo->getById(1);
        $this->assertEquals(4, $carpooling->seats);
        $this->assertEquals(10, $carpooling->price);
    }

    /**
     * @test
     */
    public function it_update_one_carpooling()
    {
        $this->repo->update(1, array('seats' => 10, 'price' => 20));
        $carpooling = $this->repo->getById(1);
        $this->assertEquals(10, $carpooling->seats);
        $this->assertEquals(20, $carpooling->price);
    }


}