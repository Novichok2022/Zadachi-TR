<?php


class Triangle {
    /**
     * Triangle area value
     *
     * @var type float
     */
    protected $area;

    /**
     * Calculates area of the Triangle
     * 
     * @param float $triangle_base
     * @param float $triangle_height
     * @return float
     */
    public function getAreaFigure(float $triangle_base, float $triangle_height): float {
        
        $this->area = 0.5 * $triangle_base * $triangle_height;
        
        return $this->area;
        
    }

}
