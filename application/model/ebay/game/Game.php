<?php

namespace Ebay\Game;

/**
 * Description of Game
 *
 * @author leonardaustin
 */
abstract class Game  implements GameInterface{
    
    //abstract static public function getAllowedValues();
    
    abstract public function rules();
    abstract public function play();
    abstract public function result();

}

