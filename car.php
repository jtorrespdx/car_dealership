<?php
    class Car
    {
        private $make_model;
        private $make_price;
        private $make_miles;

        function __construct($car_make, $car_price, $car_miles)
        {
            $this->make_model = $car_make;
            $this->make_price = $car_price;
            $this->make_miles = $car_miles;
        }
        function setMake($new_make)
        {
            $model = (string) $new_make;
        }

        function getMake()
        {
            return $this->make_model;
        }

        function setPrice($new_price)
        {
            $price = (float) $new_price;
        }

        function getPrice()
        {
            return $this->make_price;
        }

        function setMiles($new_miles)
        {
            $miles = (float) $new_miles;
        }

        function getMiles()
        {
            return $this->make_miles;
        }

        function worthBuying($max_price)
        {
            return $this->make_price < ($max_price + 100);
        }
    }

    $porsche = new Car("2014 Porsche 911", 114991, 7861);
    $ford = new Car("2011 Ford F450", 55995, 14241);
    $lexus = new Car("2013 Lexus RX 350", 44700, 20000);
    $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);

    $cars = array($porsche, $ford, $lexus, $mercedes);

    $cars_matching_search = array();
    foreach ($cars as $car) {
        if ($car->worthBuying($_GET["price"])) {
            array_push($cars_matching_search, $car);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Your Car Dealership</h1>
        <ul>
            <?php
                foreach ($cars_matching_search as $car) {
                    $car_make = $car->getMake();
                    $car_price = $car->getPrice();
                    $car_miles = $car->getMiles();
                    echo "<li> $car_make </li>";
                    echo "<ul>";
                        echo "<li> $car_price </li>";
                        echo "<li> Miles: $car_miles </li>";
                    echo"</ul>";

                }
            ?>
        </ul>
     </div>
</body>
</html>
