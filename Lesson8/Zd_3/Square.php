<?php

class Square {
    /**
     * Square area value
     *
     * @var type float
     */
    protected $area;

    /**
     * Calculates area of the Square
     * 
     * @param float $side_length_square
     * @return float
     */
    public function getAreaFigure(float $side_length_square): float {
       
        $this->area = pow($side_length_square, 2);
        
        return $this->area;
        
    }

}