<?php
include 'bootstrap.php';
use Ebay\Game\Game;
use Ebay\Game\RockPaperScissors;
use Ebay\User\Player;
use Ebay\User\Computer;

$viewData['playerValue'] = $_GET['weapon'];

if(!in_array($viewData['playerValue'], RockPaperScissors::getAllowedValues())){
    throw new Exception('Invalid Weapon Chosen! Press back and try again.');
}

$player = new Player();
$player->setUserValue($viewData['playerValue']);


$computer = new Computer();
$computer->setAllowedValues(RockPaperScissors::getAllowedValues());
$viewData['computerValue'] = $computer->getUserValue();

$rps = new RockPaperScissors($player, $computer);
$rps->play();
$viewData['result'] = $rps->result();


$view->render('playervscomputerplay', $viewData);