<?php

namespace Ebay\Game;
use Ebay\Game\Game;
use Ebay\Game\GameInterface;
use Ebay\Game\TwoPlayerInterface;
use Ebay\User\User;

/**
 * Description of RockPaperScissors
 *
 * @author leonardaustin
 */
class RockPaperScissors extends Game implements GameInterface, TwoPlayerInterface {

    protected $playerOne;
    protected $playerTwo;
    protected $result;
    
    const ALLOWED_VALUES_ROCK = 'rock';
    const ALLOWED_VALUES_PAPER = 'paper';
    const ALLOWED_VALUES_SCISSORS = 'scissors';
    
    const RESULT_DRAW = 'Draw!';
    const RESULT_P_ONE = 'Player 1 Wins!';
    const RESULT_P_TWO = 'Player 2 Wins!';
    
    function __construct(User $playerOne, User $playerTwo) {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }
    
    static public function getAllowedValues()
    {
        return array(self::ALLOWED_VALUES_ROCK, self::ALLOWED_VALUES_PAPER, self::ALLOWED_VALUES_SCISSORS);
    }
    
    public function rules()
    {
        $rules  = 'Rock beats scissors. Scissors beats Paper. Paper beats Rock.';
        $rules .= "/n" . 'Two Player Mode Only.';
        return $rules;
    }
    
    public function play()
    {
        $rOne = $this->getPlayerOne()->getUserValue();
        $rTwo = $this->getPlayerTwo()->getUserValue();
        
        if(!$rOne && !$rTwo){
            $result = self::RESULT_DRAW; // as neither player provide a value!
        }elseif(!$rOne){
            $result = self::RESULT_P_TWO; // as player 1 didn't provide a value!
        }elseif(!$rTwo){
            $result = self::RESULT_P_ONE; // as player 2 didn't provide a value!
        }else{
            // Set default to player 1 wins
            $result = self::RESULT_P_ONE;
        }
        
        switch ($rOne) {
            case self::ALLOWED_VALUES_ROCK:
                if($rTwo == self::ALLOWED_VALUES_ROCK) $result = self::RESULT_DRAW;
                if($rTwo == self::ALLOWED_VALUES_PAPER) $result = self::RESULT_P_TWO;
                break;
            case self::ALLOWED_VALUES_PAPER:
                if($rTwo == self::ALLOWED_VALUES_PAPER) $result = self::RESULT_DRAW;
                if($rTwo == self::ALLOWED_VALUES_SCISSORS) $result = self::RESULT_P_TWO;
                break;
            case self::ALLOWED_VALUES_SCISSORS:
                if($rTwo == self::ALLOWED_VALUES_SCISSORS) $result = self::RESULT_DRAW;
                if($rTwo == self::ALLOWED_VALUES_ROCK) $result = self::RESULT_P_TWO;
                break;
        }
        
        $this->setResult($result);
    }
    
    public function result()
    {
        if(!$this->getResult()){
            $this->play();
        }
        
        return $this->getResult();
    }
    
    public function setPlayerOne(User $playerOne) {
        $this->playerOne = $playerOne;
    }

    public function setPlayerTwo(User $playerTwo) {
        $this->playerTwo = $playerTwo;
    }
    
    public function getPlayerOne() {
        return $this->playerOne;
    }

    public function getPlayerTwo() {
        return $this->playerTwo;
    }
    
    public function getResult() {
        return $this->result;
    }

    public function setResult($result) {
        $this->result = $result;
    }

    
}
