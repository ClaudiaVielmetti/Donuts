
<?php
// payment.php

// function to calculate the price of a single donut
function calcPriceOfDonut($glaze, $toppings, $filling)
{
    $price = 4.0; // base price
    if ($glaze != 'plain') {
        $price += 2.0; // additional price for glaze
    }
    $price += count($toppings) * 2.0; // additional price for toppings
    if ($filling != 'none') {
        $price += 2.0; // additional price for filling
    }
    return $price;
}

// function to calculate the total order price
function getOrderTotal($priceOfDonut, $quantity)
{
    return $priceOfDonut * $quantity;
}

// check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // retrieve the form data
    $username = $_POST['username'];
    $glaze = $_POST['glaze'];
    $toppings = isset($_POST['toppings']) ? $_POST['toppings'] : array();
    $filling = $_POST['filling'];
    $quantity = $_POST['quantity']; // calculate the price of a single donut
    $priceOfDonut = calcPriceOfDonut($glaze, $toppings, $filling);

    // calculate the total order price
    $orderTotal = getOrderTotal($priceOfDonut, $quantity);

    // display the order summary
    echo "<h2>Order Summary</h2>";
    echo "<p>Username: $username</p>";
    echo "<p>Glaze: $glaze</p>";
    echo "<p>Toppings: " . implode(", ", $toppings) . "</p>";
    echo "<p>Filling: $filling</p>";
    echo "<p>Quantity: $quantity</p>";
    echo "<p>Price per donut: R" . number_format($priceOfDonut, 2) . "</p>";
    echo "<p>Total price: R" . number_format($orderTotal, 2) . "</p>";
} else {
    // if the form was not submitted, redirect to the order form page
    header('Location: index.php');
    exit();
}
?>