<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Matheus">
        <meta name="description" content="<?php echo $this->getDescription();?>">
        <meta name="keywords" content="<?php echo $this->getKeywords();?>">
        <title><?php echo $this->getTitle();?></title>
        <link rel="stylesheet" href="<?php echo DIRCSS.'style.css'?>">
        <?php echo $this->addHead()."\n";?>
    </head>
    <body>
        <div class="Nav">
            <a href="<?php echo DIRPAGE;?>">HOME</a>
            <a href="<?php echo DIRPAGE.'contato';?>">CONTATO</a>
            <a href="<?php echo DIRPAGE.'cadastro';?>">CADASTRO</a>
            <a href="<?php echo DIRPAGE.'login';?>">LOGIN</a>
        </div>

        <div class="Header">
            <?php
                $new = new \Src\Classes\ClassBreadcrumb;
                $new->addBreadcrumb();
            ?>
        <?php echo $this->addHeader();?>
        </div>

        <div class="Main">
        <?php echo $this->addMain();?>
        </div>

        <div class="Footer">
            2020 - TODOS OS DIREITOS RESERVADOS MONDERNIC FULL DEVELOPERS
        <?php echo $this->addFooter();?>
        </div>
        
    </body>
</html>