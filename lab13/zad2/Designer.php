<?php

class Designer implements Employee
{
    private float $salary;
    private string $designingTool;

    public function getDesigningTool(): string
    {
        return $this->designingTool;
    }

    public function setDesigningTool(string $designingTool): void
    {
        $this->designingTool = $designingTool;
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
        return 'Designer';
    }

}