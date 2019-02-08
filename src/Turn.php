<?php

class Turn
{
    /**
     * @var Desk
     */
    private $desk;
    private $xFrom, $yFrom, $xTo, $yTo;
    /**
     * @var Figure|null
     */
    private $figure;

    public function __construct(Desk $desk, $xFrom, $yFrom, $xTo, $yTo)
    {
        $this->desk = $desk;
        $this->xFrom = $xFrom;
        $this->yFrom = $yFrom;
        $this->xTo = $xTo;
        $this->yTo = $yTo;

        $this->figure = $this->desk->getFigure($xFrom, $yFrom);
    }

    public function valid(): bool
    {
        if (null === $this->figure) {
            throw new \Exception('Incorrect move');
        }
        $lastTurn = $this->desk->getLastTurn();

        if (null === $lastTurn && $this->figure->isBlack() ||
            null !== $lastTurn && $lastTurn->figure->isBlack() === $this->figure->isBlack()
        ) {
            throw new \Exception('Incorrect rotation');
        }
        return true;
    }
}
