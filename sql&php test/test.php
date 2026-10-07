<?php

$products = [
    [
        "name" => "iPhone",
        "price" => 1000,
        "category" => "Electronics"
    ],
    [
        "name" => "Laptop",
        "price" => 2000,
        "category" => "Electronics"
    ],
    [
        "name" => "T-Shirt",
        "price" => 50,
        "category" => "Clothes"
    ]
];

foreach ($products as $product) {

    echo "Product: " . $product["name"]
        . " | Price: " . $product["price"]
        . " | Category: " . $product["category"]
        . "<br>";
}

?>