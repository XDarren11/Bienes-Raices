<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETAS_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplate($nombre, $inicio = false) {
    include TEMPLATES_URL."/${nombre}.php";
}

function estaAutenticado() {
    session_start();

    if(!$_SESSION['login']) {
        header('Location: /');
        //return true;
    }
    //return false;
}

function debuguear($variable) {

    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;

}

//escapar--sanitizar el html
function s($HTML) : string {
    $s = htmlspecialchars($HTML);
    return $s;
}