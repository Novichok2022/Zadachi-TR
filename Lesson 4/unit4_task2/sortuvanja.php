<?php

function sort_po_zrostanju($x, $y) {
        if($x['price'] == $y['price']){
            return 0;
        }
        return ($x['price'] < $y['price']) ? -1 : 1;
 }
 
 function sort_po_spadanju($x, $y) {
        if($x['price'] == $y['price']){
            return 0;
        }
        return ($x['price'] < $y['price']) ? 1 : -1;
 }