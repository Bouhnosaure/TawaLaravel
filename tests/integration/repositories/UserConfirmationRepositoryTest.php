<?php

use Laracasts\TestDummy\Factory as TestDummy;

class UserConfirmationRepositoryTest extends Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    protected $repo;

    protected function _before()
    {
        $this->repo = $this->tester->grabService('App\Repositories\Eloquent\UserConfirmationRepository');
    }

    /**
     * @test
     */
    public function it_create_token()
    {
        $this->repo->create(\App\User::find(1), 'mail');
        $this->assertCount(1, \App\User::find(1)->confirmations()->get());
        $this->repo->create(\App\User::find(1), 'phone');
        $this->assertCount(2, \App\User::find(1)->confirmations()->get());

    }

    /**
     * @test
     */
    public function it_can_be_retrieve_by_user_and_code()
    {
        $this->repo->create(\App\User::find(1), 'mail');

        $code_assert = \App\User::find(1)->confirmations()->first();

        $code = $this->repo->getByConfirmationCode($code_assert->confirmation_code);

        $this->assertEquals($code_assert, $code);
    }


}