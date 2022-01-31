<?php

include_once 'Circle.php';
include_once 'Rectangle.php';
include_once 'Square.php';
include_once 'Triangle.php';

$circle = new Circle();
$rectangle = new Rectangle();
$square = new Square();
$triangle = new Triangle();

echo 'Площа круга = ' . $circle->getAreaFigure(5) . '<br>';
echo 'Площа прямокутника = ' . $rectangle->getAreaFigure(5, 10) . '<br>';
echo 'Площа квадрата = ' . $square->getAreaFigure(4) . '<br>';
echo 'Площа трикутника = ' . $triangle->getAreaFigure(5, 10) . '<br>';



