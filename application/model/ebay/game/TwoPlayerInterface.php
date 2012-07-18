<?php

namespace Ebay\Game;
use Ebay\User\User;
/**
 *
 * @author leonardaustin
 */
interface TwoPlayerInterface {

    
    
    public function setPlayerOne(User $user);
    public function getPlayerOne();
    
    public function setPlayerTwo(User $user);
    public function getPlayerTwo();
}
