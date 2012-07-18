<?php

namespace Ebay\User;
use Ebay\User\User;
use Ebay\User\HumanInterface;

/**
 * Description of User
 *
 * @author leonardaustin
 */
class Player extends User implements HumanInterface{
    
    protected $userValue;

    
    public function getUserValue()
    {
        return $this->userValue;
    }
    
    public function setUserValue($userValue)
    {
        $this->userValue = $userValue;
    }
}