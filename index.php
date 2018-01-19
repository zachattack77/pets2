<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require the autoload file
require_once('vendor/autoload.php');

//create an instance of the base class
$f3 = Base::instance();

//define a default route
$f3->route('GET /', function() {
    $view = new View();
    echo $view->render('views/home.html');
}
);

$f3->route('GET /pets/show/@pet', function($f3, $params) {
    switch ($params['pet']) {
        case 'cat';

        echo '<img src="https://lh6.ggpht.com/8xiOx0sg6CWMljCZeUP5OLZF66di7ih6EY5jY_pHGuH0oJxGa_sD70kP7ja5cpEorK0=h310" border=0>';

            break;

        case 'dog';

          echo  '<img src="http://r.ddmcdn.com/w_830/s_f/o_1/cx_0/cy_220/cw_1255/ch_1255/APL/uploads/2014/11/dog-breed-selector-australian-shepherd.jpg" border=0>';

          break;

        default:
            $f3->error(404);
    }
});

//define a page1 route
$f3->route('GET /pets/form1', function(){
    $template = new Template();
    echo $template->render('views/form1.html');
});

//define a page1 route
$f3->route('GET /pets/form2', function(){
    $template = new Template();
    echo $template->render('views/form2.html');
});

//define a page1 route
$f3->route('GET /pets/results', function(){
    echo '<h1>this is the results </h1>';
});

//run Fat-Free
    $f3->run();

    ?>

