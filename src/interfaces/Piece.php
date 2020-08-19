<?php
namespace Src\interfaces;

use Src\Board;

interface Piece {
    public function move(int $x1,int $y1,int $x2,int $y2,array $board);
    public function render();
    public function getColor();
}