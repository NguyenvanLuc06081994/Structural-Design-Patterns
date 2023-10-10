<?php

interface Employee
{
    public function __construct(string $name, float $salary);

    public function getName(): string;

    public function setSalary(float $salary);

    public function getSalary(): float;

    public function getRoles(): array;
}

class Developer implements Employee
{
    protected float $salary;
    protected string $name;
    protected array $roles;

    public function __construct(string $name, float $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setSalary(float $salary): void
    {
        $this->salary = $salary;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }
}

class Designer implements Employee
{
    protected float $salary;
    protected string $name;
    protected array $roles;

    public function __construct(string $name, float $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setSalary(float $salary): void
    {
        $this->salary = $salary;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }
}

class Organization
{
    protected array $employees;
    protected string $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNetSalaries(): float
    {
        $netSalary = 0;
        foreach ($this->employees as $employee) {
            $netSalary += $employee->getSalary();
        }

        return $netSalary;
    }
}

$nvluc = new Developer('Luc Nguyen', 25000);
$longP = new Designer('Long Pham', 30000);

$kiaiSoft = new Organization('KiaiSoft');

$kiaiSoft->addEmployee($nvluc);
$kiaiSoft->addEmployee($longP);

echo $kiaiSoft->getName(). ' has net Salaries per month: '. $kiaiSoft->getNetSalaries(). '$';