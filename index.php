<!-- index.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Dropping Donuts Order Form</title>
</head>

<body>
    <h1>Dropping Donuts Order Form</h1>
    <form method="post" action="payment.php">
        <!-- username input -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <!-- glaze input -->
        <label>Glaze:</label><br>
        <input type="radio" id="plain" name="glaze" value="plain" checked>
        <label for="plain">Plain</label><br>
        <input type="radio" id="chocolate" name="glaze" value="chocolate">
        <label for="chocolate">Chocolate</label><br>
        <input type="radio" id="strawberry" name="glaze" value="strawberry">
        <label for="strawberry">Strawberry</label><br><br>

        <!-- toppings input -->
        <label>Toppings (max 3):</label><br>
        <input type="checkbox" id="sprinkles" name="toppings[]" value="sprinkles">
        <label for="sprinkles">Sprinkles</label><br>
        <input type="checkbox" id="nuts" name="toppings[]" value="nuts">
        <label for="nuts">Nuts</label><br>
        <input type="checkbox" id="fruit" name="toppings[]" value="fruit">
        <label for="fruit">Fruit</label><br><br>

        <!-- filling input -->
        <label>Filling:</label><br>
        <select id="filling" name="filling">
            <option value="none" selected>None</option>
            <option value="chocolate">Chocolate</option>
            <option value="caramel">Caramel</option>
            <option value="jam">Jam</option>
        </select><br><br>

        <!-- number of donuts input -->
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" value="1" required><br><br>

        <!-- submit button -->
        <input type="submit" value="Submit">
    </form>
</body>

</html>

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
    // retrieve theform data
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
    echo "<p>Price per donut: $" . number_format($priceOfDonut, 2) . "</p>";
    echo "<p>Total price: $" . number_format($orderTotal, 2) . "</p>";
} else {
    // if the form was not submitted, redirect to the order form page
    header('Location: index.php');
    exit();
}
?>