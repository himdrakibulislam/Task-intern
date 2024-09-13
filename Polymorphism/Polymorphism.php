<?php 

class Animal {
    // General method for making sound (will be overridden)
    public function makeSound(): string {
        return "Some generic animal sound";
    }
}

class Dog extends Animal {
    // Override the makeSound method for Dog
    public function makeSound(): string {
        return "Woof! Woof!";
    }
}

// Cat class inherits Animal
class Cat extends Animal {
    // Override the makeSound method for Cat
    public function makeSound(): string {
        return "Meow! Meow!";
    }
}

// Cow class inherits Animal
class Cow extends Animal {
    // Override the makeSound method for Cow
    public function makeSound(): string {
        return "Moo! Moo!";
    }
}

function describeAnimalSound(Animal $animal): void {
    // This function works with any class that extends Animal
    echo $animal->makeSound() . PHP_EOL;
}

// Create different animal objects
$dog = new Dog();
$cat = new Cat();
$cow = new Cow();

// Demonstrate polymorphism: different classes, same method name
describeAnimalSound($dog);  // Output: Woof! Woof!
describeAnimalSound($cat);  // Output: Meow! Meow!
describeAnimalSound($cow);  // Output: Moo! Moo!
