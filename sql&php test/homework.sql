CREATE DATABASE homework;

USE homework;

CREATE TABLE categories (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

INSERT INTO categories (name)
VALUES
    ('Electronics'),
    ('Clothes');


CREATE TABLE products (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    price BIGINT,
    category_id BIGINT UNSIGNED,

    FOREIGN KEY (category_id) REFERENCES categories(id)
);

INSERT INTO products (name, price, category_id)
VALUES
    ('iPhone', 1000, 1),
    ('Laptop', 2000, 1),
    ('T-Shirt', 50, 2);


SELECT
    products.name AS 'Product Name',
    products.price AS 'Price',
    categories.name AS 'Category Name'
FROM products
INNER JOIN categories
ON products.category_id = categories.id;