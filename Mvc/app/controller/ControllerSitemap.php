<?php

namespace App\Controller;

class ControllerSitemap{
    public function global($country, $city){
        echo "<hr>";
        echo "O país escolhido foi => ".strtoupper($country);
        echo "<br>";
        echo "A cidade escolhido foi => ".strtoupper($city);
        echo "<hr>";
    }
}