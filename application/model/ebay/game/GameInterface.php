<?php

namespace Ebay\Game;

/**
 *
 * @author leonardaustin
 */
interface GameInterface {
    
    static public function getAllowedValues();
    
    public function rules();
    public function play();
    public function result();
}
