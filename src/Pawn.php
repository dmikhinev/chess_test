<?php

class Pawn extends Figure {
    public function __toString() {
        return $this->isBlack ? '♟' : '♙';
    }

    public function canMove(Turn $turn): bool
    {
        $xDiff = abs(ord($turn->getXFrom()) - ord($turn->getXTo()));
        $yDiff = abs($turn->getYFrom() - $turn->getYTo());

        switch ($xDiff) {
            case 1:
                if (1 !== $yDiff) {
                    throw new \Exception('Incorrect move');
                }
                $target = $turn->getDesk()->getFigure($turn->getXTo(), $turn->getYTo());

                if (null !== $target) {
                    return true;
                }
                $lastTurn = $turn->getDesk()->getLastTurn();

                if (null === $target && null !== $lastTurn && $lastTurn->getFigure() instanceof Pawn
                    && 1 === count($lastTurn->getFigure()->getHistory())
                    && $lastTurn->getXTo() === $turn->getXTo() && 1 === abs($lastTurn->getYTo() - $turn->getYTo())
                ) {
                    return true;
                }
                break;
            case 0:
                if (null !== $turn->getDesk()->getFigure($turn->getXTo(), $turn->getYTo())) {
                    throw new \Exception('Incorrect move');
                }
                if ($yDiff === 2 && null !== $turn->getDesk()->getFigure($turn->getXTo(), ($turn->getYTo() + $turn->getYFrom()) / 2)) {
                    throw new \Exception('Incorrect move');
                }
                if ($yDiff === 1 || $yDiff === 2 && 0 === count($this->history)) {
                    return true;
                }
                break;
            default:
                throw new \Exception('Incorrect move');
        }
        return false;
    }
}
