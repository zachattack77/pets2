<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require the autoload file
require_once('vendor/autoload.php');

//create an instance of the base class
$f3 = Base::instance();
$f3->set('colors',
            array('pink', 'green', 'blue'));


//define a default route
$f3->route('GET /', function() {
    $view = new View();
    echo $view->render('views/home.html');
}
);

// Route to two pet pictures
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
$f3->route('GET /pets/order1', function(){
    $template = new Template();
    echo $template->render('views/form1.html');
});

//define a page1 route
$f3->route('POST /pets/order2', function($f3){
    $template = new Template();
    echo $template->render('views/form2.html');
    $animal = $_POST['animal'];
    $_SESSION['animal'] = $animal;
    $f3->set('animal', $animal);

});

//define a page1 route
$f3->route('POST /pets/results', function($f3){
    $color = $_POST['colors'];
    $_SESSION['colors'] = $color;
    $animal = $_SESSION['animal'];
    $f3->set('color', $color);
    $f3->set('animal', $animal);
    echo "<h1>Results Page</h1>";
    echo "Thank you for ordering a " . $color . " " . $animal;

});

$f3->route('GET|POST /new-pet', function($f3){
    $template = new Template();
    if(isset($_POST['submit'])) {
        $color = $_POST['pet-color'];
        $type = $_POST['pet-type'];
        $name = $_POST['pet-name'];
        $errors = $_POST['errors'];
        $success = $_POST['success'];

        include('model/validate.php');

        $f3->set('color', $color);
        $f3->set('type', $type);
        $f3->set('name', $name);
        $f3->set('errors', $errors);
        $f3->set('success', $success);


        if (!validString($name)){
            $f3->set('invalidName', "Invalid");
        }
        if (!validString($type)){
            $f3->set('invalidType', "Invalid");
        }
        if (!validColor($color)){
            $f3->set('invalidColor', "Invalid");
        }

    }

    echo $template->render('views/new-pet.html');
});

//run Fat-Free
    $f3->run();

    ?>

