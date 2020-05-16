Feature:
  In order to manage Users
  As a user
  I want to manage Users

  Scenario: Create a new user
    When I create request for a new user with name "mike"
    Then I should have a new user with name "mike"