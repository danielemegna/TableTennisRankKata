<?php

class TableTennisRankTest extends PHPUnit_Framework_TestCase
{
  public function test_that_true_is_true()
  {
    $this->assertTrue(true);
  }

  public function test_can_create_new_TableTennisMatch()
  {
    $m = new TableTennisMatch("Pippo", "Pluto");
  }

  /*public function test_print_status_of_started_match()
  {
    $m = new TableTennisMatch("Pippo", "Pluto");
    $this->assertEquals("[0 - 0] Ball to Pippo", $m->printStatus());
  }*/
}
