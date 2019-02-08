<?php

class Pawn extends Figure {
    public function __toString() {
        return $this->isBlack ? '♟' : '♙';
    }

    public function canMove($xFrom, $yFrom, $xTo, $yTo): bool
    {
        return true;
    }
}
