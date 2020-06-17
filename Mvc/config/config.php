<?php

/**
 * Arquivos diretórios raízes
 */

$pastaInterna='Mvc/';
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");
define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$pastaInterna}");

/**
 * Diretórios específicos
 */

define('DIRIMG', DIRPAGE."public/img/");
define('DIRCSS', DIRPAGE."public/css/");
define('DIRJS', DIRPAGE."public/js/");

/**
 * Acesso ao banco de dados
 */

define('HOST', "localhost");
define('DBNAME', "test");
define('USER', "root");
define('PASSWD', "");