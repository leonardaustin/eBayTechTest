<?php

namespace Ebay\Game;

/**
 * Abstract class for which all games should extend. It require three methods
 * that all games have rules, play, and result.
 *
 * @author Leonard Austin
 */
abstract class Game  implements GameInterface{
    
    /**
     * Should return the human readable rules for the game 
     */
    abstract public function rules();
    
    /**
     * Should start playing the game 
     */
    abstract public function play();
    
    /**
     *Should return the result of the played game 
     */
    abstract public function result();

}

