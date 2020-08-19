<?php 

namespace Test;
use \Src\Board;
use PHPUnit\Framework\TestCase;


final class BoardTest extends TestCase
{
    public function testDisplayEmptyBoard()
    {
        $board = new Board;
        $displayBoard = $board->displayBoard();

        $this->assertEquals(
            [
                [' ',' ',' ',' ',' ',' ',' ',' '],
                [' ',' ',' ',' ',' ',' ',' ',' '],
                [' ',' ',' ',' ',' ',' ',' ',' '],
                [' ',' ',' ',' ',' ',' ',' ',' '],
                [' ',' ',' ',' ',' ',' ',' ',' '],
                [' ',' ',' ',' ',' ',' ',' ',' '],
                [' ',' ',' ',' ',' ',' ',' ',' '],
                [' ',' ',' ',' ',' ',' ',' ',' ']
            ], $displayBoard);
    }
}