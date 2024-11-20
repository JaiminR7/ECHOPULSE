<?php
session_start();
header('Content-Type: application/json');

// Check if cart exists
if (isset($_SESSION['cart'])) {
    echo json_encode($_SESSION['cart']);
} else {
    echo json_encode([]);
}
?>
