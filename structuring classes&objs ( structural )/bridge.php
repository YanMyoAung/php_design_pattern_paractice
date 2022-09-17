<?php 

interface DrawingAPI{
    public function drawCircle();
    public function drawRectangle();
}

class SVGApi implements DrawingAPI{
    public function drawCircle()
    {
        return "DRAWING SVG CIRCLE \n";
    }

    public function drawRectangle()
    {
        return "DRAWING SVG RECTANGLE \n";
    }
}

class CanvasApi implements DrawingAPI{
    public function drawCircle()
    {
        return "Drawing Canvas Circle \n";
    }

    public function drawRectangle()
    {
        return "Drawing Canvas Rectangle \n";
    }
}

abstract class Shape{
    
    public function __construct(public DrawingAPI $drawingAPI)
    {
        
    }
    abstract function draw();
}

class Circle extends Shape{

    public function __construct(public DrawingAPI $drawingapi)
    {
       parent::__construct($drawingapi);
    }

    public function draw()
    {
        return $this->drawingAPI->drawCircle();
    }
}

class Rectangle extends Shape{

    public function __construct(public DrawingAPI $drawingapi)
    {
       parent::__construct($drawingapi);
    }

    public function draw()
    {
        $this->drawingAPI->drawRectangle();
    }
}

$svg_demo = new SVGApi();
$circle = new Circle($svg_demo);
print $circle->draw();
?>