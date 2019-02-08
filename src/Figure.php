<?php

class Figure {
    protected $isBlack;

    public function __construct($isBlack) {
        $this->isBlack = $isBlack;
    }

    /** @noinspection PhpToStringReturnInspection */
    public function __toString() {
        throw new \Exception("Not implemented");
    }

    /**
     * @return bool
     */
    public function isBlack(): bool
    {
        return $this->isBlack;
    }

    public function canMove($xFrom, $yFrom, $xTo, $yTo): bool
    {
        return true;
    }
}
