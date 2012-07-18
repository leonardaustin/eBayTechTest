<?php

namespace Ebay\Game;

/**
 * 
 * 
 * @author Leonard Austin
 */
interface GameInterface {
    
    /**
     * All games will have allowedValues that a user can use. The user might
     * require the allowedvalues before starting the game.
     *  
     */
    static public function getAllowedValues();
    
    /**
     * Should return the human readable rules for the game 
     */
    public function rules();
    
    /**
     * Should start playing the game 
     */
    public function play();
    
    /**
     *Should return the result of the played game 
     */
    public function result();
}
