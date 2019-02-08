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
        if (!$this->figure->canMove($this)) {
            throw new \Exception('Incorrect move');
        }
        return true;
    }

    public function getDesk(): Desk
    {
        return $this->desk;
    }

    public function getFigure(): ?Figure
    {
        return $this->figure;
    }

    /**
     * @return string a-h
     */
    public function getXFrom()
    {
        return $this->xFrom;
    }

    /**
     * @return int 1-8
     */
    public function getYFrom()
    {
        return $this->yFrom;
    }

    /**
     * @return string a-h
     */
    public function getXTo()
    {
        return $this->xTo;
    }

    /**
     * @return int 1-8
     */
    public function getYTo()
    {
        return $this->yTo;
    }
}
