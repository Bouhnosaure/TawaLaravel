<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPUnit_Framework_Assert as PHPUnit;
use Behat\Behat\Tester\Exception\PendingException;

trait AuthContext
{

    protected $name;
    protected $email;

    /**
     * @When I register :name :email
     * @param $name
     * @param $email
     */
    public function iRegister($name, $email)
    {
        $this->name = $name;
        $this->email = $email;

        $this->visit('auth/register');
        $this->fillField('name', $name);
        $this->fillField('email', $email);
        $this->fillField('password', 'password');
        $this->fillField('password_confirmation', 'password');
        $this->pressButton('Inscription');
    }

    /**
     * @Given I have an account :name :email
     * @param $name
     * @param $email
     */
    public function iHaveAnAccount($name, $email)
    {
        $this->iRegister($name, $email);
        $this->visit('auth/logout');
    }

    /**
     * @When I sign in
     */
    public function iSignIn()
    {
        $this->visit('auth/login');
        $this->fillField('email', $this->email);
        $this->fillField('password', 'password');
        $this->pressButton('Connexion');
    }

    /**
     * @Given I am logged in as :email
     * @param $email
     */
    public function iAmLoggedInAs($email)
    {
        if (Session::isStarted()) {
            Session::regenerate(true);
        } else {
            Session::start();
        }
        $user = User::where('email', $email)->firstOrFail();
        Auth::login($user);
        Session::save();
    }

    /**
     * @Then I should be logged in
     */
    public function iShouldBeLoggedIn()
    {
        PHPUnit::assertTrue(Auth::check());
        $this->assertPageAddress('events');
    }

    /**
     * @Then I should be logged out
     */
    public function iShouldBeLoggedOut()
    {
        PHPUnit::assertFalse(Auth::check());
        $this->assertPageAddress('/');
    }

    /**
     * @When I sign in whit invalid credentials
     */
    public function iSignInWhitInvalidCredentials()
    {
        $this->email = 'invalid@mail.fr';
        $this->iSignIn();
    }

    /**
     * @Then I should not be logged in
     */
    public function iShouldNotBeLoggedIn()
    {
        PHPUnit::assertTrue(Auth::guest());
        $this->assertPageAddress('auth/login');
    }

}