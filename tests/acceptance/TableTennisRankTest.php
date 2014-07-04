<?php

class TableTennisRankTest extends PHPUnit_Framework_TestCase
{
  private $match;
  
  private function initMatch($p1, $p2)
  {
    $this->match = new TableTennisMatch("Pippo", "Pluto");
  }

  public function test_that_true_is_true()
  {
    $this->assertTrue(true);
  }

  public function test_print_status_of_started_match()
  {
    $this->initMatch("Pippo", "Pluto");

    $this->assertEquals("[0 - 0] Ball to Pippo", $this->match->status());
  }

  public function test_assign_first_point_should_print_new_result()
  {
    $this->initMatch("Pippo", "Pluto");
    $this->match->point("Pippo");

    $this->assertEquals("[1 - 0] Ball to Pippo", $this->match->status());
  }

  public function test_after_two_point_server_is_changed()
  {
    $this->initMatch("Pippo", "Pluto");
    $this->match->point("Pippo");
    $this->match->point("Pippo");

    $this->assertEquals("[2 - 0] Ball to Pluto", $this->match->status());
  }

  public function test_assign_some_points_should_print_correct_status()
  {
    $this->initMatch("Pippo", "Pluto");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pluto");
    $this->match->point("Pippo");

    $this->assertEquals("[3 - 1] Ball to Pippo", $this->match->status());
  }

  public function test_assing_ten_points_should_print_correct_status()
  {
    $this->initMatch("Pippo", "Pluto");

    $this->match->point("Pippo");
    $this->assertEquals("[1 - 0] Ball to Pippo", $this->match->status());
    
    $this->match->point("Pluto");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pluto");
    $this->assertEquals("[3 - 2] Ball to Pippo", $this->match->status());

    $this->match->point("Pippo");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pippo");

    $this->assertEquals("[5 - 5] Ball to Pluto", $this->match->status());
  }

  public function test_player_one_wins_at_eleven_zero()
  {
    $this->initMatch("Pippo", "Pluto");
    
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");

    $this->assertEquals("Pippo wins!", $this->match->status());
  }

  public function test_player_two_wins_at_zero_eleven()
  {
    $this->initMatch("Pippo", "Pluto");
    
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");

    $this->assertEquals("Pluto wins!", $this->match->status());
  }

  public function test_match_ten_at_ten_goes_to_advantage()
  {
    $this->initMatch("Pippo", "Pluto");

    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pippo");

    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pluto");

    $this->assertEquals("[10 - 10] Ball to Pippo", $this->match->status());
    
    $this->match->point("Pippo");
    $this->assertEquals("[11 - 10] Ball to Pluto", $this->match->status());
    
    $this->match->point("Pluto");
    $this->assertEquals("[11 - 11] Ball to Pippo", $this->match->status());

    $this->match->point("Pippo");
    $this->assertEquals("[12 - 11] Ball to Pluto", $this->match->status());

    $this->match->point("Pippo");
    $this->assertEquals("Pippo wins!", $this->match->status());
  }
  
}
