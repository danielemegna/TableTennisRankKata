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

    $this->assertEquals("[0 - 0] Ball to Pippo", $this->match->printStatus());
  }

  public function test_assign_first_point_should_print_new_result()
  {
    $this->initMatch("Pippo", "Pluto");
    $this->match->point("Pippo");

    $this->assertEquals("[1 - 0] Ball to Pippo", $this->match->printStatus());
  }

  public function test_assign_some_points_should_print_correct_result()
  {
    $this->initMatch("Pippo", "Pluto");
    $this->match->point("Pippo");
    $this->match->point("Pippo");
    $this->match->point("Pluto");
    $this->match->point("Pippo");

    $this->assertEquals("[3 - 1] Ball to Pippo", $this->match->printStatus());
  }
  
  public function test_after_five_points_change_next_server()
  {
    $this->initMatch("Pippo", "Pluto");
    $this->match->point("Pippo");
    $this->match->point("Pluto");
    $this->match->point("Pluto");
    $this->match->point("Pippo");
    $this->match->point("Pluto");

    $this->assertEquals("[2 - 3] Ball to Pluto", $this->match->printStatus());
  }
}
