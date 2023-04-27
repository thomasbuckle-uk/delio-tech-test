<?php

declare(strict_types=1);

namespace App\Finnhub\src\Dto;

use DateTime;

class QuoteTo
{

    private string $name;
    private float $c;
    private float $d;
    private float $dp;
    private float $h;
    private float $l;
    private float $o;
    private float $pc;

    private DateTime $time;

    /**
     * @return float
     */
    public function getC(): float
    {
        return $this->c;
    }

    /**
     * @param float $c
     * @return QuoteTo
     */
    public function setC(float $c): self
    {
        $this->c = $c;
        return $this;

    }

    /**
     * @return float
     */
    public function getD(): float
    {
        return $this->d;
    }

    /**
     * @param float $d
     * @return QuoteTo
     */
    public function setD(float $d): self
    {
        $this->d = $d;
        return $this;

    }

    /**
     * @return float
     */
    public function getDp(): float
    {
        return $this->dp;
    }

    /**
     * @param float $dp
     * @return QuoteTo
     */
    public function setDp(float $dp): self
    {
        $this->dp = $dp;
        return $this;

    }

    /**
     * @return float
     */
    public function getH(): float
    {
        return $this->h;
    }

    /**
     * @param float $h
     * @return QuoteTo
     */
    public function setH(float $h): self
    {
        $this->h = $h;
        return $this;

    }

    /**
     * @return float
     */
    public function getL(): float
    {
        return $this->l;
    }

    /**
     * @param float $l
     * @return QuoteTo
     */
    public function setL(float $l): self
    {
        $this->l = $l;
        return $this;

    }

    /**
     * @return float
     */
    public function getO(): float
    {
        return $this->o;
    }

    /**
     * @param float $o
     * @return QuoteTo
     */
    public function setO(float $o): self
    {
        $this->o = $o;
        return $this;

    }

    /**
     * @return float
     */
    public function getPc(): float
    {
        return $this->pc;
    }

    /**
     * @param float $pc
     * @return QuoteTo
     */
    public function setPc(float $pc): self
    {
        $this->pc = $pc;
        return $this;

    }

    /**
     * @return DateTime
     */
    public function getTime(): DateTime
    {
        return $this->time;
    }

    /**
     * @param DateTime $time
     * @return QuoteTo
     */
    public function setTime(DateTime $time): self
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return QuoteTo
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}