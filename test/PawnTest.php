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
    
}