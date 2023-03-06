<!-- index.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Dropping Donuts Order Form</title>

    <link rel="stylesheet" href="./assets/css/style.css">

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

