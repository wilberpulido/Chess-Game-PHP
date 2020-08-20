<?php
namespace Src\pieces;
use \Src\interfaces\Piece;

class Pawn implements Piece
{
    private String $color;

    public function __construct(String $color="none")
    {
        $this->color = strtolower($color);
    }

    public function move(int $x1,int $y1,int $x2,int $y2,array $board)
    {
        if (count($board) <= $x1 || count($board[0]) <= $y1) {
            return false;
        }
        if (count($board) <= $x2 || count($board[0]) <= $y2) {
            return false;
        }
        if ($x1 < 0 || $x2 < 0 || $y1 < 0 || $y2 < 0) {
            return false;
        }

        if($x1 == $x2){
            return false;
        }
        if (abs($x1-$x2) != 1) {
            return false;
        }
        if($y1 === $y2 && $board[$x2][$y2] !== ' '){
            return false;
        }
        if ($y1 !== $y2 && $board[$x2][$y2] == ' ') {
            return false;
        }
        if($y1 !== $y2 && $board[$x2][$y2]->getColor()===$this->color){
            return false;
        }
        if ($this->color == 'white' && $x1-$x2 == -1) {
            return false;
        }
        if ($this->color == 'black' && $x1-$x2 == 1) {
            return false;
        }

        return true;
    }

    public function render()
    {
        return "P";
    }
    public function getColor()
    {
        return $this->color;
    }
}