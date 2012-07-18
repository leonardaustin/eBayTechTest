<?php
namespace Ebay\User;

/**
 * For users/players that are human
 * 
 * @author Leonard Austin
 */
interface HumanInterface {
    
    /**
     * Gets the users value for the game 
     */
    public function getUserValue();
    
    /**
     * Set the users value for the game 
     */
    public function setUserValue($userValue);
}