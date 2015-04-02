<?php
use Carbon\Carbon;
use PHPUnit_Framework_Assert as PHPUnit;
use Behat\Behat\Tester\Exception\PendingException;

trait EventContext
{
    protected $event_id;

    /**
     * @When I create an event
     */
    public function iCreateAnEvent()
    {
        $this->visit('events/create');
        $this->fillField('name', 'Testing Event');
        $this->fillField('description', 'Praesent ut ligula non mi varius sagittis. Nulla porta dolor.');
        $this->fillField('start_time', Carbon::parse(Carbon::now()->addDays(2))->format('d/m/Y - H:i'));
        $this->fillField('end_time', Carbon::parse(Carbon::now()->addDays(10))->format('d/m/Y - H:i'));
        $this->fillField('categorie_id', 1);
        $this->pressButton('Créer un évènement');

    }

    /**
     * @Then I can see my event
     */
    public function iCanSeeMyEvent()
    {
        throw new PendingException();
    }
}