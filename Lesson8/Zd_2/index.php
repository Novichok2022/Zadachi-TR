<?php

include_once 'Calculator.php';


$calculator = new Calculator();

echo 'Результат додавання ' . $calculator->sumaNumbers(5, 4.45) . '<br>';
echo 'Результат віднімання ' . $calculator->subtractionNumbers(10.55, 2.2) . '<br>';
echo 'Результат ділення ' . $calculator->divisonNumbers(2.1, 3.2) . '<br>';
echo 'Результат множення ' . $calculator->multiplicationNumbers(5, 3.12) . '<br>';

