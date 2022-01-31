<?php

class Calculator {

    /**
     * The result of calculating the calculator method
     *
     * @var type float
     */
    private $result;

    /**
     * Counts the sum of the numbers
     * 
     * @param float $nubmer_1
     * @param float $number_2
     * @return float
     */
    public function sumaNumbers(float $nubmer_1, float $number_2): float {
        $this->number_1 = $nubmer_1;
        $this->result = $nubmer_1 + $number_2;

        return $this->result;
    }

    /**
     * Subtraction of numbers
     * 
     * @param float $nubmer_1
     * @param float $number_2
     * @return float
     */
    public function subtractionNumbers(float $nubmer_1, float $number_2): float {

        $this->result = $nubmer_1 - $number_2;

        return $this->result;
    }

    /**
     * Division of numbers
     * 
     * @param float $nubmer_1
     * @param float $number_2
     * @return float
     */
    public function divisonNumbers(float $nubmer_1, float $number_2): float {

        $this->result = $nubmer_1 / $number_2;

        return $this->result;
    }

    /**
     * Multiplication of numbers
     * 
     * @param float $nubmer_1
     * @param float $number_2
     * @return float
     */
    public function multiplicationNumbers(float $nubmer_1, float $number_2): float {

        $this->result = $nubmer_1 * $number_2;

        return $this->result;
    }

}
