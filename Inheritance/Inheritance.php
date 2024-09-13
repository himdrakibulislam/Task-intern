<?php 
abstract class Shape {
    // Abstract method for calculating area
    abstract public function calculateArea(): float;
}

// Class for Circle
class Circle extends Shape {
    private float $radius;

    // Constructor to initialize radius
    public function __construct(float $radius) {
        $this->radius = $radius;
    }

    // Method to calculate area of the circle
    public function calculateArea(): float {
        return pi() * pow($this->radius, 2);
    }
}

// Class for Rectangle
class Rectangle extends Shape {
    private float $width;
    private float $height;

    // Constructor to initialize width and height
    public function __construct(float $width, float $height) {
        $this->width = $width;
        $this->height = $height;
    }

    // Method to calculate area of the rectangle
    public function calculateArea(): float {
        return $this->width * $this->height;
    }
}

// Example usage
$circle = new Circle(10);
echo "Area of Circle: " . $circle->calculateArea() . " sq units\n";

$rectangle = new Rectangle(3, 8);
echo "Area of Rectangle: " . $rectangle->calculateArea() . " sq units\n";

?>