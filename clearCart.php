<?php
session_start();
unset($_SESSION['cart']);
header('Location: cart.html'); // Redirect back to cart
?>
