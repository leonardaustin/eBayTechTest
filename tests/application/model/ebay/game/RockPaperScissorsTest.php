<?php
namespace Ebay\Game;
use Ebay\Game\RockPaperScissors;
use Ebay\User\User;

/**
 * Description of RockPaperScissors
 *
 * @author leonardaustin
 */
class RockPaperScissorsTest extends \PHPUnit_Framework_TestCase {

    protected $player1;
    protected $player2;
    protected $instance;

    public function setUp() 
    {
	$this->player1 = $this->getMock('Ebay\User\Player', array(), array(), '', false, false);
	$this->player2 = $this->getMock('Ebay\User\Player', array(), array(), '', false, false);
        
        $this->instance = new RockPaperScissors($this->player1, $this->player2);
    }
    
    public function testGetAllowedValues()
    {
        $result = array(
            RockPaperScissors::ALLOWED_VALUES_ROCK, 
            RockPaperScissors::ALLOWED_VALUES_PAPER, 
            RockPaperScissors::ALLOWED_VALUES_SCISSORS);
        $this->assertEquals(RockPaperScissors::getAllowedValues(), $result);
    }
    
    public function allowedValuesProvider()
    {
        return array(
          array(RockPaperScissors::ALLOWED_VALUES_ROCK, RockPaperScissors::ALLOWED_VALUES_ROCK, RockPaperScissors::RESULT_DRAW),
          array(RockPaperScissors::ALLOWED_VALUES_PAPER, RockPaperScissors::ALLOWED_VALUES_PAPER, RockPaperScissors::RESULT_DRAW),
          array(RockPaperScissors::ALLOWED_VALUES_SCISSORS, RockPaperScissors::ALLOWED_VALUES_SCISSORS, RockPaperScissors::RESULT_DRAW),
            
          array(RockPaperScissors::ALLOWED_VALUES_ROCK, RockPaperScissors::ALLOWED_VALUES_PAPER, RockPaperScissors::RESULT_P_TWO),
          array(RockPaperScissors::ALLOWED_VALUES_PAPER, RockPaperScissors::ALLOWED_VALUES_ROCK, RockPaperScissors::RESULT_P_ONE),
            
          array(RockPaperScissors::ALLOWED_VALUES_ROCK, RockPaperScissors::ALLOWED_VALUES_SCISSORS, RockPaperScissors::RESULT_P_ONE),
          array(RockPaperScissors::ALLOWED_VALUES_SCISSORS, RockPaperScissors::ALLOWED_VALUES_ROCK, RockPaperScissors::RESULT_P_TWO),
            
          array(RockPaperScissors::ALLOWED_VALUES_PAPER, RockPaperScissors::ALLOWED_VALUES_SCISSORS, RockPaperScissors::RESULT_P_TWO),
          array(RockPaperScissors::ALLOWED_VALUES_SCISSORS, RockPaperScissors::ALLOWED_VALUES_PAPER, RockPaperScissors::RESULT_P_ONE),
        );
    }
    
    public function testRules()
    {
        $this->assertStringMatchesFormat('%a', $this->instance->rules());
    }
    
    public function testPlayPlayerNoValueBothPlayers()
    {
        $this->instance->play();
        
        $this->assertEquals($this->instance->result(), RockPaperScissors::RESULT_DRAW);
    }
    
    public function testPlayPlayerNoValuePlayerTwo()
    {
        $this->player1
            ->expects($this->any())
            ->method('getUserValue')
            ->will($this->returnValue(RockPaperScissors::ALLOWED_VALUES_ROCK));
        
        $this->instance->play();
        
        $this->assertEquals($this->instance->result(), RockPaperScissors::RESULT_P_ONE);
    }
    
    public function testPlayPlayerNoValuePlayerOne()
    {
        $this->player2
            ->expects($this->any())
            ->method('getUserValue')
            ->will($this->returnValue(RockPaperScissors::ALLOWED_VALUES_ROCK));
        
        $this->instance->play();
        
        $this->assertEquals($this->instance->result(), RockPaperScissors::RESULT_P_TWO);
    }
    
    /**
     * @dataProvider allowedValuesProvider
     */
    public function testPlay($player1, $player2, $result)
    {
        $this->player1
            ->expects($this->any())
            ->method('getUserValue')
            ->will($this->returnValue($player1));
        
        $this->player2
            ->expects($this->any())
            ->method('getUserValue')
            ->will($this->returnValue($player2));
        
        $this->instance->play();
        
        $this->assertEquals($this->instance->result(), $result);
    }

    
    public function testResult()
    {
        $this->assertStringMatchesFormat('%a', $this->instance->result());
    }
    
    public function testSetPlayerOne()
    {
        $newPlayer = $this->getMock('Ebay\User\Player', array(), array(), '', false, false);
        
        $this->instance->setPlayerOne($newPlayer);
        
        $this->assertEquals($this->instance->getPlayerOne(), $newPlayer);
    }
    
    public function testSetPlayerTwo()
    {
        $newPlayer = $this->getMock('Ebay\User\Player', array(), array(), '', false, false);
        
        $this->instance->setPlayerTwo($newPlayer);
        
        $this->assertEquals($this->instance->getPlayerTwo(), $newPlayer);
    }
    
}
