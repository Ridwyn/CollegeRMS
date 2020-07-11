<?php
function autoload($name) {
    require '../classes/' . $name . '.php';
   }