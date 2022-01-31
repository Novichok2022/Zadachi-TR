<?php

class Circle {
    
    protected const PI = 3.14;


    /**
     * Circle area value
     *
     * @var type float
     */
    protected $area;

    /**
     * Calculates area of the Circle
     * 
     * @param float $radius
     * @return float
     */
    public function getAreaFigure(float $radius): float {

        $this->area = self::PI * pow($radius, 2);

        return $this->area;
    }
    

}

