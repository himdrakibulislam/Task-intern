<?php

class Employee {
    // Private properties for encapsulation
    private string $name;
    private int $age;
    private float $salary;

    // Constructor to initialize employee data
    public function __construct(string $name, int $age, float $salary) {
        $this->name = $name;
        $this->age = $age;
        $this->setSalary($salary); // Use the setter to ensure validation
    }

    // Getter for employee name
    public function getName(): string {
        return $this->name;
    }

    // Setter for employee name
    public function setName(string $name): void {
        $this->name = $name;
    }

    // Getter for employee age
    public function getAge(): int {
        return $this->age;
    }

    // Setter for employee age
    public function setAge(int $age): void {
        if ($age > 0) {
            $this->age = $age;
        } else {
            throw new Exception("Age must be positive.");
        }
    }

    // Getter for employee salary (secure access)
    public function getSalary(): float {
        return $this->salary;
    }

    // Setter for employee salary with validation (secure modification)
    public function setSalary(float $salary): void {
        if ($salary >= 0) {
            $this->salary = $salary;
        } else {
            throw new Exception("Salary must be a non-negative value.");
        }
    }

    // Method to display employee details
    public function displayEmployeeDetails(): void {
        echo "Employee: " . $this->getName() . "\n";
        echo "Age: " . $this->getAge() . "\n";
        echo "Salary: $" . $this->getSalary() . "\n";
    }
}

// Example usage
try {
    // Creating a new employee object
    $employee = new Employee("Rakibul Islam", 22, 50000);
    
    // Display employee details
    $employee->displayEmployeeDetails();
    
    // Update salary securely
    $employee->setSalary(55000);
    echo "\nUpdated Employee Details:\n";
    $employee->displayEmployeeDetails();
    
    // Attempt to set an invalid salary (this will throw an exception)
    $employee->setSalary(-1000);  // This will trigger an error

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
