<?php
include 'bootstrap.php';
use Ebay\Game\Game;
use Ebay\Game\RockPaperScissors;
use Ebay\User\Player;
use Ebay\User\Computer;

$player1 = new Computer();
$player1->setAllowedValues(RockPaperScissors::getAllowedValues());
$viewData['computerValue1'] = $player1->getUserValue();


$player2 = new Computer();
$player2->setAllowedValues(RockPaperScissors::getAllowedValues());
$viewData['computerValue2'] = $player2->getUserValue();

$rps = new RockPaperScissors($player1, $player2);
$rps->play();
$viewData['result'] = $rps->result();


$view->render('computervscomputerplay', $viewData);