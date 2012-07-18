<?php
namespace Ebay\User;
use Ebay\User\Player;
use Ebay\Game\RockPaperScissors;

/**
 * Description of User
 *
 * @author leonardaustin
 */
class PlayerTest extends \PHPUnit_Framework_TestCase {
    
    protected $value;
    protected $allowedVal;
    
    public function setUp() 
    {
        $this->instance = new Player();
        
    }
    
    public function testGetUserValue()
    {
        $this->instance->setUserValue(RockPaperScissors::ALLOWED_VALUES_ROCK);
        
        $this->assertEquals($this->instance->getUserValue(), RockPaperScissors::ALLOWED_VALUES_ROCK);
        
    }

}