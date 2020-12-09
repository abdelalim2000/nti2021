<?php


/**
 * Class Student
 */
class Student
{
    /**
     * @var string
     */
    private string $sName = '';
    /**
     * @var int
     */
    private int $totalDegree = 0;
    /**
     * @var int
     */
    private int $countOfSubjects = 0;
    private int $percentage = 0;
    private string $Grade = '';
    private string $sign = '';

    /**
     * @return int
     */
    public function getPercentage(): int
    {
        return $this->percentage;
    }

    /**
     * @param int $percentage
     */
    public function setPercentage(int $percentage): void
    {
        $this->percentage = $percentage;
    }

    /**
     * @return string
     */
    public function getGrade(): string
    {
        return $this->Grade;
    }

    /**
     * @param string $Grade
     */
    public function setGrade(string $Grade): void
    {
        $this->Grade = $Grade;
    }

    /**
     * @return string
     */
    public function getSign(): string
    {
        return $this->sign;
    }

    /**
     * @param string $sign
     */
    public function setSign(string $sign): void
    {
        $this->sign = $sign;
    }

    public function showGrade(int $percentage): void
    {
        if ($percentage < 50 && $percentage > 0)
            $this->setGrade("Fail");
        elseif ($percentage < 65)
            $this->setGrade("Pass");
        elseif ($percentage < 75)
            $this->setGrade("Good");
        elseif ($percentage < 85)
            $this->setGrade("Very Good");
        elseif ($percentage > 85 && $percentage <= 100)
            $this->setGrade("Excelent");
        else
            $this->setGrade("Not a Grade");
    }

    public function showGradeSign(string $grade): void
    {
        switch ($grade) {
            case "Fail":
                $this->setSign("F");
                break;
            case "Pass":
                $this->setSign("D");
                break;
            case "Good":
                $this->setSign("C");
                break;
            case "Very Good":
                $this->setSign("B");
                break;
            case "Excelent":
                $this->setSign("A");
                break;
            default:
                $this->setSign("You dont have a grade");
        }
    }

    /**
     * @return string
     */
    public function getSName(): string
    {
        return $this->sName;
    }

    /**
     * @param string $sName
     */
    public function setSName(string $sName): void
    {
        $this->sName = $sName;
    }

    /**
     * @return int
     */
    public function getTotalDegree(): int
    {
        return $this->totalDegree;
    }

    /**
     * @param int $totalDegree
     */
    public function setTotalDegree(int $totalDegree): void
    {
        $this->totalDegree = $totalDegree;
    }

    /**
     * @return int
     */
    public function getCountOfSubjects(): int
    {
        return $this->countOfSubjects;
    }

    /**
     * @param int $countOfSubjects
     */
    public function setCountOfSubjects(int $countOfSubjects): void
    {
        $this->countOfSubjects = $countOfSubjects;
    }

    public function handleSubmit($sName, $tDegree, $COS)
    {
        $this->setSName($sName);
        $this->setTotalDegree($tDegree);
        $this->setCountOfSubjects($COS);
    }

    public function showPercentage(int $totalDegree, int $countOfSubjects): void
    {
        $this->setPercentage($totalDegree / $countOfSubjects);
    }
}