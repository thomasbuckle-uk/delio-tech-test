<?php

namespace App\Statistics\Dto;

class currentPreviousDayDto
{

    private string $shareName;

    private float $totalCurrent;

    private float $totalPreviousDay;

    private int $numberOfShares;

    private float $profitLossDifference;

    /**
     * @return string
     */
    public function getShareName(): string
    {
        return $this->shareName;
    }

    /**
     * @param string $shareName
     */
    public function setShareName(string $shareName): void
    {
        $this->shareName = $shareName;
    }

    /**
     * @return float
     */
    public function getTotalCurrent(): float
    {
        return $this->totalCurrent;
    }

    /**
     * @param float $totalCurrent
     */
    public function setTotalCurrent(float $totalCurrent): void
    {
        $this->totalCurrent = $totalCurrent;
    }

    /**
     * @return float
     */
    public function getTotalPreviousDay(): float
    {
        return $this->totalPreviousDay;
    }

    /**
     * @param float $totalPreviousDay
     */
    public function setTotalPreviousDay(float $totalPreviousDay): void
    {
        $this->totalPreviousDay = $totalPreviousDay;
    }

    /**
     * @return int
     */
    public function getNumberOfShares(): int
    {
        return $this->numberOfShares;
    }

    /**
     * @param int $numberOfShares
     */
    public function setNumberOfShares(int $numberOfShares): void
    {
        $this->numberOfShares = $numberOfShares;
    }

    /**
     * @return float
     */
    public function getProfitLossDifference(): float
    {
        return $this->profitLossDifference;
    }

    /**
     * @param float $profitLossDifference
     */
    public function setProfitLossDifference(float $profitLossDifference): void
    {
        $this->profitLossDifference = $profitLossDifference;
    }
}