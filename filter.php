<?php
require_once('./db/config.php');

// Default SQL query to get all products
$query = "SELECT * FROM product";

// Default SQL query to count all products
$countQuery = "SELECT COUNT(*) AS total_count FROM product";

// Check if the form is submitted and filter by price range
$selectedPriceRange = 'all';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedPriceRange = $_POST['price_range'];
    switch ($selectedPriceRange) {
        case '0-10000':
            $query = "SELECT * FROM product WHERE sell_price BETWEEN 0 AND 10000";
            break;
        case '10001-20000':
            $query = "SELECT * FROM product WHERE sell_price BETWEEN 10001 AND 20000";
            break;
        case '20001-30000':
            $query = "SELECT * FROM product WHERE sell_price BETWEEN 20001 AND 30000";
            break;
        case '30001-40000':
            $query = "SELECT * FROM product WHERE sell_price BETWEEN 30001 AND 40000";
            break;
        case '40001-50000':
            $query = "SELECT * FROM product WHERE sell_price BETWEEN 40001 AND 50000";
            break;
        case '50001-100000':
            $query = "SELECT * FROM product WHERE sell_price BETWEEN 50001 AND 100000";
            break;
        default:
            $selectedPriceRange = 'all';
            break;
    }
}

// Execute the product query
$sql = $conn->query($query);
?>
