<?php
namespace Ebay\User;
use Ebay\User\Computer;
use Ebay\Game\RockPaperScissors;

/**
 * Description of Computer
 *
 * @author leonardaustin
 */
class ComputerTest extends \PHPUnit_Framework_TestCase {
    
    protected $value;
    protected $allowedVal;
    
    public function setUp() 
    {
        $this->instance = new Computer();
        
        $this->allowedVal = array(RockPaperScissors::ALLOWED_VALUES_ROCK, RockPaperScissors::ALLOWED_VALUES_PAPER, RockPaperScissors::ALLOWED_VALUES_SCISSORS);
        $this->instance->setAllowedValues($this->allowedVal);
    }
    
    public function testAllowedValues()
    {
        $this->assertEquals($this->instance->getAllowedValues(), $this->allowedVal);
    }
    
    public function testGetUserValueIfNotAlreadySet()
    {
        
        $this->assertTrue(in_array($this->instance->getUserValue(), $this->allowedVal));
        
    }

    public function testGetUserValueIfAlreadyCalledOnce()
    {
        $firstCall = $this->instance->getUserValue();
        
        $this->assertEquals($this->instance->getUserValue(), $firstCall);
    }

}