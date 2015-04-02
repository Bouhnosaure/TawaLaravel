Feature: Events
  In order to give the ability to an user for managing events
  As an user
  I want to manage events

  Scenario: Create an event is locked to guests
    When I go to "events/create"
    Then I should not be logged in

  Scenario: Update an event is locked to guests
    When I go to "events/1/edit"
    Then I should not be logged in

  Scenario: Create an event is unlocked for logged users
    Given I am logged in as "alexandre.mangin@viacesi.fr"
    When I create an event
    Then I can see my event