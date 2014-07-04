<?php

require_once(__DIR__.'/../vendor/autoload.php');

class TableTennisMatch
{
  private $player1;
  private $player2;

  public function __construct($player1Name, $player2Name)
  {
    $this->player1 = new Player($player1Name);
    $this->player2 = new Player($player2Name);
  }

  public function hasPlayer1MorePoints()
  {
    return $this->player1->getScore() > $this->player2->getScore();
  }

  public function status()
  {
    if($this->isSomeoneTheWinner())
      return $this->getPlayerNameWithMorePoints() . ' wins!';
    
    $nextServerName = $this->retrieveNextServerName();
      
    return sprintf(
      "[%d - %d] Ball to %s",
      $this->player1->getScore(),
      $this->player2->getScore(),
      $nextServerName
    );
  }

  private function isSomeoneTheWinner()
  {
    return
      $this->isSomeoneOverWinThreshold() &&
      $this->hasSomeoneTwoPointsAhead();
  }

  private function getPlayerNameWithMorePoints()
  {
    if($this->hasPlayer1MorePoints())
      return $this->player1->getName();
      
    return $this->player2->getName();
  }

  private function isSomeoneOverWinThreshold()
  {
    return
      $this->player1->isOverWinThreshold() ||
      $this->player2->isOverWinThreshold();
  }

  private function hasSomeoneTwoPointsAhead() 
  {
    return abs(
      $this->player1->getScore() - $this->player2->getScore()
    ) > 1;
  }

  private function retrieveNextServerName()
  {
    return $this->isPlayerOneServer() ?
      $this->player1->getName() : $this->player2->getName();
  }
  
  private function isPlayerOneServer()
  {
    $pointsSum = $this->player1->getScore() + $this->player2->getScore();

    if($this->isSomeoneOverWinThreshold())
      return (($pointsSum % 2) == 0); 

    return ((($pointsSum / 2) % 2) == 0);
  }

  public function point($playerName)
  {
    if($this->player1->hasThisName($playerName))
      $this->player1->score();
    else
      $this->player2->score();
  }
}
