<?php

namespace Src\Classes;

class ClassBreadcrumb{

    use \Src\Traits\TraitUrlParser;

    # Cria os breadcrumbs do site
    public function addBreadcrumb()
    {
        $count = count($this->parseUrl());

        $link = "";

        echo "<a href='".DIRPAGE."'>home</a> >";
        
        for($i=0; $i < $count; $i++){
            $link .= $this->parseUrl()[$i]."/";
            echo "<a href='".DIRPAGE.$link."'>".$this->parseUrl()[$i]."</a>";

            if($i < $count -1){
                echo " > ";
            }
        }
    }
}