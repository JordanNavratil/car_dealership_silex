<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        $porsche = new Car("2014 Porsche 911", 114991, 7861, "images/porsche.jpg");
        $ford = new Car("2011 Ford F450", 55995, 14241, "images/ford.jpg");
        $lexus = new Car("2013 Lexus RX 350", 44700, 20000, "images/lexus.jpg");
        $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "images/mercedes.jpg");
        $cars = array($porsche, $ford, $lexus, $mercedes);

        $cars_matching_search = array();
        foreach ($cars as $car) {
            if ($car->worthBuying($_GET["price"]) && ($car->worthBuying($_GET["miles"]))) {
                array_push($cars_matching_search, $car);
            }

        }


    $app->get("/new_car", function() {
        return "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Find a Car</title>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
            </head>
            <body>
                <div class='container'>
                    <h1>Find a Car!</h1>
                    <form action='car.php'>
                        <div class='form-group'>
                            <label for='price'>Enter Maximum Price:</label>
                            <input id='price' name='price' class='form-control' type='number'>
                        </div>
                        <div class='form-group'>
                            <label for='miles'>Enter Maximum Mileage:</label>
                            <input id='miles' name='miles' class='form-control' type='number'>
                        </div>
                        <button type='submit' class='btn-success'>Submit</button>
                    </form>
                </div>
            </body>
        </html>
        ";
    });

    $app->("/view_car", function() {

    })

    return $app;

?>
