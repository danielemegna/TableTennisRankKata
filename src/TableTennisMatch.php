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

  public function status()
  {
    if($this->isSomeoneTheWinner())
    {
      if($this->player1Points > $this->player2Points)
        return $this->player1Name . ' wins!';
        
      return $this->player2Name . ' wins!';
    }
    
    $nextServerName = $this->calcolateNextServerName();
      
    return sprintf(
      "[%d - %d] Ball to %s",
      $this->player1Points,
      $this->player2Points,
      $nextServerName
    );
  }

  private function isSomeoneTheWinner()
  {
    return $this->isSomeoneOverTen() && $this->hasSomeoneTwoPointsAhead();
  }

  private function isSomeoneOverTen()
  {
    return $this->player1Points > 10 || $this->player2Points > 10;
  }

  private function hasSomeoneTwoPointsAhead() 
  {
    return abs($this->player1Points - $this->player2Points) > 1;
  }

  private function calcolateNextServerName()
  {
    return $this->isPlayerOneServer() ?
      $this->player1Name : $this->player2Name;
  }
  
  private function isPlayerOneServer()
  {
    $pointsSum = $this->player1Points + $this->player2Points;

    if($this->isSomeoneOverTen())
      return (($pointsSum % 2) == 0); 

    return ((($pointsSum / 2) % 2) == 0);
  }

  public function point($playerName)
  {
    if($playerName == $this->player1Name)
      $this->player1Points++;
    else
      $this->player2Points++;
  }
}
