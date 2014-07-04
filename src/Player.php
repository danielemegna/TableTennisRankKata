<?php

class Player
{
  private $name;
  private $score;

  public function __construct($name)
  {
    $this->name = $name;
    $this->score = 0;
  }

  public function score()
  {
    $this->score++;
  }

  public function getScore()
  {
    return $this->score;
  }

  public function getName()
  {
    return $this->name;
  }

  public function isOverWinThreshold()
  {
    return $this->score > 10; 
  }

  public function hasThisName($name)
  {
    return $this->name == $name;
  }
}
