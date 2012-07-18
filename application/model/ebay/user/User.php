<?php

namespace Ebay\User;
use Ebay\User\UserInterface;

/**
 * Description of User
 *
 * @author leonardaustin
 */
abstract class User implements UserInterface{
    
    abstract public function getUserValue();
}
