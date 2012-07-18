<?php

namespace Ebay\User;
use Ebay\User\User;
use Ebay\User\MachineInterface;

/**
 * Description of Computer
 *
 * @author Leonard Austin
 */
class Computer extends User implements MachineInterface {
    
    protected $allowedValues;
    protected $userValue;
    
    /**
     * Sets an array of allowed values for the game
     * 
     * @param array $allowedValue 
     */
    public function setAllowedValues(array $allowedValue)
    {
        $this->allowedValues = $allowedValue;
    }
    
    /**
     * Gets the computer generate value. Which is randomly selected from the
     * allowed values.
     * 
     * @return string 
     */
    public function getUserValue()
    {
        if(!$this->userValue){
            $randomKey = array_rand($this->getAllowedValues());
            $this->userValue = $this->allowedValues[$randomKey];
        }
        
        return $this->userValue;
    }
    
    /**
     * gets the allowed values
     * 
     * @return array
     */
    public function getAllowedValues() {
        return $this->allowedValues;
    }


}