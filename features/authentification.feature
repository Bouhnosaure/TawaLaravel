Feature: Members
  In order to give access to specific content for registered users
  As a admin
  I want to authenticate users on application

  Scenario: Register an user
    When I register "alex" "alex@mail.fr"
    Then I should be logged in

  Scenario: Successful authentication
    Given I have an account "alex" "alex@mail.fr"
    When I sign in
    Then I should be logged in

  Scenario: Log out from application
    When I go to "auth/logout"
    Then I should be logged out

  Scenario: Failed authentication
    When I sign in whit invalid credentials
    Then I should not be logged in

