<?php

namespace Src\Traits;

trait TraitUrlParser {

    # Classe responsável por dividir a Url em array.
    public function parseUrl()
    {
        return explode("/", rtrim($_GET['url']),FILTER_SANITIZE_URL);
    }
}