<?php

use Laracasts\TestDummy\Factory as TestDummy;

class UserRepositoryTest extends Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    protected $repo;

    protected function _before()
    {
        $this->repo = $this->tester->grabService('App\Repositories\Eloquent\UserRepository');
    }

    /**
     * @test
     */
    public function it_gets_all_users()
    {
        $users = $this->repo->getAll();
        $this->assertCount(21, $users);
    }

    /**
     * @test
     */
    public function it_gets_one_user()
    {
        $user = $this->repo->getById(1);
        $this->assertEquals('Citrex', $user->name);
        $this->assertEquals('alexandre.mangin@viacesi.fr', $user->email);
    }

    /**
     * @test
     */
    public function it_update_one_user()
    {
        $this->repo->update(1, array('name' => 'Yolo', 'email' => 'alex@viacesi.fr'));
        $user = $this->repo->getById(1);
        $this->assertEquals('Yolo', $user->name);
        $this->assertEquals('alex@viacesi.fr', $user->email);
    }


}