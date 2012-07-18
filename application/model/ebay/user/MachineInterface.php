<?php
namespace Ebay\User;

/**
 * For machine/computer players
 * 
 * @author Leonard Austin
 */
interface MachineInterface {

    /**
     * sets the allowed values, required as the machine will randomly select
     * from this
     *  
     */
    public function setAllowedValues(array $allowedValue);
    
    /**
     * Get the vlaue the computer has chosen 
     */
    public function getUserValue();
    
    /**
     * get the allowed values
     *  
     */
    public function getAllowedValues();
}
