<?php

require '../functions/loadtemplate.php';
require './route.php';


$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
$routes= new Routes();
$page=$routes->getPage($route);



$output = loadTemplate('../templates/' . $page['template'], $page['variables']);
$title = $page['title'];
require '../templates/layout.html.php';
