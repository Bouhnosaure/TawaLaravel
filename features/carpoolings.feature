Feature: Carpoolings
  In order to give the ability to an user for managing carpoolings
  As an admin
  I want to manage carpoolings

  Scenario: Create an event is locked to guests
    When I go to "carpoolings/create"
    Then I should not be logged in

  Scenario: Update an event is locked to guests
    When I go to "carpoolings/1/edit"
    Then I should not be logged in