<?php

class Rectangle {
     /**
     * Rectangle area value
     *
     * @var type float
     */
    protected $area;

    /**
     * Calculates area of the Rectangle
     * 
     * @param float $rectangle_width
     * @param float $rectangle_length
     * @return float
     */
    public function getAreaFigure(float $rectangle_width, float $rectangle_length ): float {
        
        $this->square = $rectangle_width * $rectangle_length;
        
        return $this->square;
        
    }

}
