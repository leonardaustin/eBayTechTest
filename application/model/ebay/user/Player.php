<?php

namespace Ebay\User;
use Ebay\User\User;
use Ebay\User\HumanInterface;

/**
 * Player which is human
 *
 * @author Leonard Austin
 */
class Player extends User implements HumanInterface{
    
    protected $userValue;

    /**
     * gets the user value
     * 
     * @return string 
     */
    public function getUserValue()
    {
        return $this->userValue;
    }
    
    /**
     * sets the user value
     * 
     * @param string $userValue 
     */
    public function setUserValue($userValue)
    {
        $this->userValue = $userValue;
    }
}