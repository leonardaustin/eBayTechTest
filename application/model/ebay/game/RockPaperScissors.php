<?php

namespace Ebay\Game;
use Ebay\Game\Game;
use Ebay\Game\GameInterface;
use Ebay\Game\TwoPlayerInterface;
use Ebay\User\User;

/**
 * Description of RockPaperScissors
 *
 * @author Leonard Austin
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
    
    /**
     * This game requires two users
     * 
     * @param Ebay\User\User $playerOne
     * @param Ebay\User\User $playerTwo 
     */
    function __construct(User $playerOne, User $playerTwo) {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }
    
    /**
     * Gets the allowed value for this game 
     * 
     * @return array() 
     */
    static public function getAllowedValues()
    {
        return array(self::ALLOWED_VALUES_ROCK, self::ALLOWED_VALUES_PAPER, self::ALLOWED_VALUES_SCISSORS);
    }
    
    /**
     * Return the rules of the game in a human readable format.
     * 
     * @return string 
     */
    public function rules()
    {
        $rules  = 'Rock beats scissors. Scissors beats Paper. Paper beats Rock.';
        $rules .= "/n" . 'Two Player Mode Only.';
        return $rules;
    }
    

    /**
     * Plays the game and sets the result.
     * 
     * 
     * @return \Ebay\Game\RockPaperScissors 
     */
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
        
        return $this;
    }
    
    /**
     * Returns the result of the game
     * 
     * @return type 
     */
    public function result()
    {
        if(!$this->getResult()){
            $this->play();
        }
        
        return $this->getResult();
    }
    
    /**
     * Sets player one.
     * 
     * @param Ebay\User\User $playerOne 
     */
    public function setPlayerOne(User $playerOne) {
        $this->playerOne = $playerOne;
    }

    /**
     * Sets player two.
     * 
     * @param Ebay\User\User $playerTwo 
     */
    public function setPlayerTwo(User $playerTwo) {
        $this->playerTwo = $playerTwo;
    }
    
    /**
     * returns player one
     * 
     * @return Ebay\User\User 
     */
    public function getPlayerOne() {
        return $this->playerOne;
    }

    /**
     * return player two
     * 
     * @return Ebay\User\User 
     */
    public function getPlayerTwo() {
        return $this->playerTwo;
    }
    
    /**
     * return the result
     * 
     * @return string 
     */
    public function getResult() {
        return $this->result;
    }

    /**
     * Sets the result
     * 
     * @param string $result 
     */
    public function setResult($result) {
        $this->result = $result;
    }

    
}
