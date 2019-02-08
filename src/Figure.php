<?php

class Figure {
    /**
     * @var bool
     */
    protected $isBlack;
    /**
     * @var Turn[]
     */
    protected $history = [];

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

    public function canMove(Turn $turn): bool
    {
        return true;
    }

    /**
     * @return Turn[]
     */
    public function getHistory(): array
    {
        return $this->history;
    }

    public function addHistory(Turn $turn): Figure
    {
        $this->history[] = $turn;

        return $this;
    }
}
