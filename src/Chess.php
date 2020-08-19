<?php
namespace Src;
use Src\Board;

class Chess {
  public Board $board;
  public function __construct()
  {
    $this->board = new Board();
  }

}