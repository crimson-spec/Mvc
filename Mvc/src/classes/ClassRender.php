<?php

namespace Src\Classes;

class ClassRender{

    private $dir;
    private $title;
    private $description;
    private $keywords;

    # Método responsável por renderizar todo o layout
    public function renderLayout()
    {
        include_once(DIRREQ.'app/view/Layout.php');
    }

    # Método para adicionar caracteristicas específicas no head
    public function addHead()
    {
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/Head.php")){
            include(DIRREQ."app/view/{$this->getDir()}/Head.php");
        }
    }

    # Método para adicionar caracteristicas específicas no header
    public function addHeader()
    {
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/Header.php")){
            include(DIRREQ."app/view/{$this->getDir()}/Header.php");
        }
    }

    # Método para adicionar caracteristicas específicas no main
    public function addMain()
    {
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/Main.php")){
            include(DIRREQ."app/view/{$this->getDir()}/Main.php");
        }
    }

    # Método para adicionar caracteristicas específicas no footer
    public function addFooter()
    {
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/Footer.php")){
            include(DIRREQ."app/view/{$this->getDir()}/Footer.php");
        }
    }

    /**
     * GETTERS AND SETTERS
     */

    public function getDir(){return $this->dir;}
    public function setDir($dir){$this->dir = $dir;}

    public function getTitle(){return $this->title;}
    public function setTitle($title){$this->title = $title;}

    public function getDescription(){return $this->description;}
    public function setDescription($description){$this->description = $description;}

    public function getKeywords(){return $this->keywords;}
    public function setKeywords($keywords){$this->keywords = $keywords;}
}