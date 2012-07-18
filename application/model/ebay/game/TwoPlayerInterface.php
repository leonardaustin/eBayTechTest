<?php

namespace Ebay\Game;
use Ebay\User\User;
/**
 * An interface for two player games. The methods here are really just as
 * a reminder to developers in the future building 2 player games that there
 * need to be two players set. 
 * 
 * @author Leonard Austin
 */
interface TwoPlayerInterface {

    
    /**
     * sets player 1 
     */
    public function setPlayerOne(User $user);
    
    /**
     * Gets player 1 
     */
    public function getPlayerOne();
    
    /**
     * Sets player 2 
     */
    public function setPlayerTwo(User $user);
    
    /**
     * Gets player 2 
     */
    public function getPlayerTwo();
}
