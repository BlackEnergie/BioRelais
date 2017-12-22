<?php

function __autoload($class) {
 require_once 'modeles/dto/' . lcfirst($class) . '.php';
}

?>