<?php

namespace Test;
use \Src\pieces\Pawn;
use PHPUnit\Framework\TestCase;
use \Src\interfaces\Piece;

final class PawnTest extends TestCase
{
    public function testPawnImplementPiece()
    {
        $pawn = new Pawn;
        $this->assertTrue($pawn instanceof Piece);
    }
    public function testRenderPawnWhitLetterP()
    {
        $pawn = new Pawn;
        $this->assertEquals("P",$pawn->render());

    }
    public function testMovePawnOneGrid()
    {
        $board = [[' ',' ',' '],[' ',' ',' '],[' ',' ',' ']];
        $pawn = new Pawn;
        $result = $pawn->move(1,1,0,1,$board);

        $this->assertTrue($result);
    }
    public function testNotNotHorizontally(){

        $board = [[' ',' ',' '],[' ',' ',' '],[' ',' ',' ']];
        $pawn = new Pawn;
        $result = $pawn->move(0,0,0,1,$board);

        $this->assertFalse($result);
    }
    public function testMoveNotMoreThanOneGrid()
    {

        $board = [[' ',' '],[' ',' '],[' ',' '],[' ',' '],[' ',' '],[' ',' '],[' ',' ']];
        $pawn = new Pawn;
        $firtResult = $pawn->move(0,0,3,0,$board);
        $secondResult = $pawn->move(0,0,5,0,$board);

        $this-> assertFalse($firtResult);
        $this-> assertFalse($secondResult);
    }
    public function testGetColorReturnAColor(){
        $pawn = new Pawn;
        $result = $pawn->getColor();

        $this -> assertEquals('none',$result);
    }
    public function testGiveTheColorOnConstructor()
    {
        $pawn = new Pawn('black');
        $result = $pawn->getColor();

        $this -> assertEquals('black',$result);
    }
    public function testCantMoveDiagonallyIfThereIsASpace()
    {
        $pawnWhite = new Pawn;
        $board = [[' ',' ',' '],[' ',' ',' '],[' ',' ',' ']];

        $move = $pawnWhite->move(0,0,1,1,$board);

        $this-> assertFalse($move);
    }
    public function testNotEatDiagonallyToAlly()
    {
        $pawnWhite = new Pawn('White');
        $pawnWhite1 = new Pawn('White');
        $board = [[' ',' ',' '],[' ',$pawnWhite1,' '],[' ',' ',' ']];

        $moveNotEat = $pawnWhite->move(0,0,1,1,$board);

        $this-> assertFalse($moveNotEat);
    }

    public function testEatDiagonally()
    {
        $pawnBlack = new Pawn('Black');
        $pawnWhite = new Pawn('White');
        $board = [[' ',' ',' '],[' ',$pawnWhite,' '],[' ',' ',' ']];

        $moveEat = $pawnBlack->move(0,0,1,1,$board);

        $this-> assertTrue($moveEat);
    }
    public function testWhitePawnShoudMoveNegativeVertically()
    {
      $pawnWhite = new Pawn('White');
      $board = [[' ',' ',' '],[' ',' ',' '],[' ',' ',' ']];

      $moveTrue = $pawnWhite->move(1,1,0,1,$board);
      $moveFalse = $pawnWhite->move(1,1,2,1,$board);
    
      $this-> assertFalse($moveFalse);
      $this-> assertTrue($moveTrue);

    }
    public function testBlackPawnShoudMovePositiveVertically()
    {
        $pawnBlack = new Pawn('black');
        $board = [[' ',' ',' '],[' ',' ',' '],[' ',' ',' ']];
  
        $moveTrue = $pawnBlack->move(1,1,2,1,$board);
        $moveFalse = $pawnBlack->move(1,1,0,1,$board);
      
        $this-> assertTrue($moveTrue);
        $this-> assertFalse($moveFalse);
  
      }
      public function testItNotMovingOutsideTheBoard()
      {
        $pawnBlack = new Pawn('black');
        $pawnWhite = new Pawn('white');
        $board = [[' ',' ',' '],[' ',' ',' '],[' ',' ',' ']];

        $moveOutsideInit = $pawnWhite->move(3,2,2,2,$board);
        $moveOutside = $pawnBlack->move(2,2,3,2,$board);
        $moveOutsideOutside = $pawnBlack->move(3,3,4,3,$board);
        $moveNegatives = $pawnWhite->move(-1,-1,-2,-1, $board);

        $this-> assertFalse($moveOutside);
        $this-> assertFalse($moveOutsideInit);
        $this-> assertFalse($moveOutsideOutside);
        $this-> assertFalse($moveNegatives);

      }
      public function testPawnMoveTwoSpacesAtTheExit()
      {
        $pawnBlack = new Pawn('black');
        $pawnWhite = new Pawn('white');
        $board = [[' ',' ',' '],[' ',' ',' '],[' ',' ',' ']];

        $moveTrueWhiteOne = $pawnWhite->move(2,0,0,0,$board);
        $moveTrueWhiteTwo = $pawnWhite->move(1,0,0,0,$board);
        $moveTrueBlackOne = $pawnBlack->move(0,0,2,0,$board);
        $moveTrueBlackTwo = $pawnBlack->move(1,0,2,0,$board);

        $this-> assertTrue($moveTrueWhiteOne);
        $this-> assertTrue($moveTrueWhiteTwo);
        $this-> assertTrue($moveTrueBlackOne);
        $this-> assertTrue($moveTrueBlackTwo);



      }
}