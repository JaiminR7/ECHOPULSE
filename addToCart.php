<?php
session_start();

// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ecommerce';
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get product ID from query
$productId = $_GET['id'];
$productQuery = "SELECT * FROM products WHERE id = $productId";
$productResult = $conn->query($productQuery);
$product = $productResult->fetch_assoc();

if ($product) {
    // Initialize cart if not set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add product to cart
    $_SESSION['cart'][] = [
        'id' => $product['id'],
        'name' => $product['name'],
        'price' => $product['price'],
        'image' => $product['image'],
    ];

    echo json_encode(['message' => 'Product added to cart']);
} else {
    echo json_encode(['message' => 'Product not found']);
}

$conn->close();
?>
