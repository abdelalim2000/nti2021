<?php

use JetBrains\PhpStorm\Pure;

class HiredEmployee
{
    private string $eName = '';
    private int|float $bSalary = 0;
    private int $cDays = 0;
    private int $sDays = 0;

    /**
     * @return string
     */
    public function getEName(): string
    {
        return $this->eName;
    }

    /**
     * @param string $eName
     */
    public function setEName(string $eName): void
    {
        $this->eName = $eName;
    }

    /**
     * @return float|int
     */
    public function getBSalary(): float|int
    {
        return $this->bSalary;
    }

    /**
     * @param float|int $bSalary
     */
    public function setBSalary(float|int $bSalary): void
    {
        $this->bSalary = $bSalary;
    }

    /**
     * @return int
     */
    public function getCDays(): int
    {
        return $this->cDays;
    }

    /**
     * @param int $cDays
     */
    public function setCDays(int $cDays): void
    {
        $this->cDays = $cDays;
    }

    /**
     * @return int
     */
    public function getSDays(): int
    {
        return $this->sDays;
    }

    /**
     * @param int $sDays
     */
    public function setSDays(int $sDays): void
    {
        $this->sDays = $sDays;
    }

    public function calcAbsentContinus(int $days): int|float
    {
        if ($days === 1)
            return 1;
        elseif ($days === 2)
            return 1.25;
        elseif ($days === 3)
            return 1.5;
        else
            return 3.75 + (($days - 3) * 2);
    }

    #[Pure] public function calcAbsentSplit(int $days): int|float
    {
        return $days * $this->calcBased();
    }

    public function calcBased(int $basicSalary): int|float
    {
        return $basicSalary / 30;
    }


}