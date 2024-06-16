<?php
class Manager implements Employee
{
    private float $salary;
    private array $employees;
    public function addEmployee(Employee $employee)
    {
        $this->employees = array_push($this->employees, $employee);
    }

    public function getEmployees(): array
    {
        return $this->employees;
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
        return 'Manager';
    }


}