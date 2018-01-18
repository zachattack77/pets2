<?php

//require the autoload file
require_once('vendor/autoload.php');

//create an istance of the base class
$f3 = Base::instance();

//define a default route
$f3->route('GET /', function() {
    echo '<h1>Hello!</h1>';

    $view = new View();
    echo $view->render('pets2/index.php');
}
);

//run Fat-Free
$f3->run();