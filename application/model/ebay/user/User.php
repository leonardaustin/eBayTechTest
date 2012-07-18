<?php

namespace Ebay\User;
use Ebay\User\UserInterface;

/**
 * A User of games with abstract method which all users wishing to play games
 * need.
 *
 * @author Leonard Austin
 */
abstract class User implements UserInterface{
    
    /**
     * Get the user value fo the game 
     */
    abstract public function getUserValue();
}
