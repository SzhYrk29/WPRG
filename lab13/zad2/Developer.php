<?php

class Developer implements Employee
{
    private float $salary;
    private string $programmingLanguage;

    public function getProgrammingLanguage(): string
    {
        return $this->programmingLanguage;
    }

    public function setProgrammingLanguage(string $programmingLanguage): void
    {
        $this->programmingLanguage = $programmingLanguage;
    }
    function getSalary()
    {
        return $this->salary;
    }
    function setSalary($salary)
    {
        $this->salary = $salary;
    }
    function getRole()
    {
        return 'Developer';
    }

}