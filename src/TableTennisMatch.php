<?php

class TableTennisMatch
{
  private $player1Name;
  private $player2Name;

  private $player1Points;
  private $player2Points;

  public function __construct($player1Name, $player2Name)
  {
    $this->player1Name = $player1Name;
    $this->player2Name = $player2Name;

    $this->player1Points = 0;
    $this->player2Points = 0;
  }

  public function printStatus()
  {
    $nextPlayer = 
      (((($this->player1Points + $this->player2Points) / 5) % 2) == 0) ?
      $this->player1Name : $this->player2Name;
      
    return sprintf(
      "[%d - %d] Ball to %s",
      $this->player1Points,
      $this->player2Points,
      $nextPlayer
    );
  }

  public function point($playerName)
  {
    if($playerName == $this->player1Name)
      $this->player1Points++;
    else
      $this->player2Points++;
  }
}
