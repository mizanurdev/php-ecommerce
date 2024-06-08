<?php
//connection
require_once("config.php");

// user table
$createUserTable = "CREATE TABLE user (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(300) NULL,
    username VARCHAR(300) NULL,
    image VARCHAR(300) DEFAULT '',
    email VARCHAR(300) NULL,
    password VARCHAR(300) NULL,
    code INT DEFAULT 0,
    first_name VARCHAR(150) NULL,
    last_name VARCHAR(150) NULL,
    cell VARCHAR(22) NULL,
    address_one TEXT NULL,
    address_two TEXT NULL,
    country_id INT(11) NULL,
    city_id INT(11) NULL,
    state_id INT(11) NULL,
    zip_code VARCHAR(20) NULL,
    user_type VARCHAR(50) DEFAULT 'customer',
    status VARCHAR(30) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// product table
$createProductTable = "CREATE TABLE product (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(300) NULL,
    price DECIMAL(10, 2) NULL,
    sell_price DECIMAL(10, 2) NULL,
    cat_id INT(11) NULL,
    brand_id INT(11) NULL,
    feature_image VARCHAR(300) DEFAULT '',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// category table
$createCategoryTable = "CREATE TABLE category (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(300) NULL,
    image VARCHAR(300) DEFAULT '',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// brand table
$createBrandTable = "CREATE TABLE brand (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(300) NULL,
    image VARCHAR(300) DEFAULT '',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// orders table
$createOrdersTable = "CREATE TABLE orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_number VARCHAR(150) NULL,
    status VARCHAR(50) DEFAULT 'pending',
    product_name VARCHAR(300) NULL,
    product_id INT(11) NULL,
    product_price DECIMAL(10, 2) NULL,
    product_qty INT(11) NULL,
    product_total DECIMAL(10, 2) NULL,
    product_discount DECIMAL(10, 2) NULL,
    product_ship_charge DECIMAL(10, 2) NULL,
    product_grand_total DECIMAL(10, 2) NULL,
    payment_type VARCHAR(20) NULL,
    payment_status VARCHAR(150) DEFAULT 'pending',
    customer_id INT(11) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Execute each table creation query individually
$tables = [
    'User' => $createUserTable,
    'Product' => $createProductTable,
    'Category' => $createCategoryTable,
    'Brand' => $createBrandTable,
    'Orders' => $createOrdersTable
];

foreach ($tables as $tableName => $createQuery) {
    $sql = $conn->query($createQuery);
    if ($sql) {
        echo "Table $tableName created successfully<br>";
    } else {
        echo "Error creating table $tableName: " . $conn->error . "<br>";
    }
}
?>