<?php

use Laracasts\TestDummy\Factory as TestDummy;

class EventRepositoryTest extends Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    protected $repo;

    protected function _before()
    {
        $this->repo = $this->tester->grabService('App\Repositories\Eloquent\EventRepository');
    }

    /**
     * @test
     */
    public function it_gets_all_events()
    {
        //given i have ten events
        //TestDummy::times(10)->create('App\Event');

        //get all
        $events = $this->repo->getAll();

        $this->assertCount(100, $events);
    }

}