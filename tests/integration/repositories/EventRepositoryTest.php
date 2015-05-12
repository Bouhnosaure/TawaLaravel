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
        $events = $this->repo->getAll();
        $this->assertCount(101, $events);
    }

    /**
     * @test
     */
    public function it_gets_one_event()
    {
        $events = $this->repo->getById(1);
        $this->assertEquals('Toulouse, France', $events->location);
        $this->assertEquals('Event Test #1', $events->name);
    }

    /**
     * @test
     */
    public function it_gets_by_slug_or_id()
    {
        $events = $this->repo->getBySlug(1);
        $this->assertEquals('Toulouse, France', $events->location);
        $this->assertEquals('Event Test #1', $events->name);

        $events = $this->repo->getBySlug('event-test-1');
        $this->assertEquals('Toulouse, France', $events->location);
        $this->assertEquals('Event Test #1', $events->name);

    }

    /**
     * @test
     */
    public function it_update_one_event()
    {
        $this->repo->update(1, array('location' => 'Bordeaux, France'));
        $events = $this->repo->getById(1);
        $this->assertEquals('Bordeaux, France', $events->location);
    }


}