<?php
  // Initialize session
  session_start();

  // Redirect to order page if user is already logged in
  if (isset($_SESSION['username'])) {
    header('Location: order.php');
    exit;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dropping Donuts - Home</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <header>
      <h1>Dropping Donuts</h1>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="order.php">Order</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <h2>Welcome to Dropping Donuts!</h2>
      <p>Our donuts are freshly made every day using only the finest ingredients. We offer a variety of flavors and toppings, but if you don't see what you want on the menu, you can create your own donut!</p>
      <p>Click the "Order" link above to get started.</p>
    </main>
    <footer>
      <p>&copy; 2023 Dropping Donuts</p>
    </footer>
  </body>
</html>
