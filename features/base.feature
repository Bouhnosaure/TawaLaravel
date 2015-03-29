Feature: testing
  In order to test my application
  As a developer
  I Want to test UI features

  Scenario: Homepage
    Given I am on the homepage
    Then I should see "Tawa!"

  Scenario: Create an event is locked to guests
    When I go to "events/create"
    Then the url should match "auth/login"

  Scenario: Update an event is locked to guests
    When I go to "events/1/edit"
    Then the url should match "auth/login"

  Scenario: Create an event is locked to guests
    When I go to "carpoolings/create"
    Then the url should match "auth/login"

  Scenario: Update an event is locked to guests
    When I go to "carpoolings/1/edit"
    Then the url should match "auth/login"

  Scenario: Log into application
    Given I am on "auth/login"
    And I fill in "email" with "alexandre.mangin@viacesi.fr"
    And I fill in "password" with "123123"
    And I press "Connexion"
    Then I should be on "events"

  Scenario: Log out from application
    Given I am on "events"
    When I go to "auth/logout"
    Then I should see "Tawa!"
