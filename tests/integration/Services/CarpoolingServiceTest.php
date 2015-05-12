<?php

use Laracasts\TestDummy\Factory as TestDummy;

class CarpoolingServiceTest extends Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    protected $service;

    protected function _before()
    {
        $this->service = $this->tester->grabService('App\Services\CarpoolingService');
    }

    /**
     * @test
     */
    public function it_parse_stopovers()
    {

        $test_data['stopovers'] = 'Albi, France | Montauban, France | Toulouse, France';
        $assert = ['Albi, France', 'Montauban, France', 'Toulouse, France'];

        $this->service->extractStopovers($test_data);

        foreach ($this->service->getStopovers() as $key => $stopover) {
            $this->assertEquals($assert[$key], $stopover->location);
        }
        $this->assertEquals(3, $this->service->getPosition());
    }

    /**
     * @test
     */
    public function it_parse_departure()
    {
        $test_data['location'] = ' Albi, France ';
        $assert = 'Albi, France';

        $this->service->extractDeparture($test_data);

        $this->assertEquals($assert, $this->service->getStopovers()[0]->location);
        $this->assertEquals(0, $this->service->getPosition());
    }

    /**
     * @test
     */
    public function it_parse_arrival()
    {
        $test_data['event_id'] = 1;
        $assert = 'Toulouse, France';

        $this->service->extractArrival($test_data);

        $this->assertEquals($assert, $this->service->getStopovers()[0]->location);
        $this->assertEquals(1, $this->service->getPosition());
    }

    /**
     * @test
     */
    public function it_parse_all_data()
    {
        $test_data['location'] = ' Bordeaux, France ';
        $test_data['stopovers'] = 'Albi, France | Montauban, France | Paris, France';
        $test_data['event_id'] = 1;

        $assert = ['Bordeaux, France', 'Albi, France', 'Montauban, France', 'Paris, France', 'Toulouse, France'];

        $this->service->processData($test_data);

        foreach ($this->service->getStopovers() as $key => $stopover) {
            $this->assertEquals($assert[$key], $stopover->location);
        }

        $this->assertEquals(4, $this->service->getPosition());
    }

}