CREATE DATABASE products_db;

use products_db;

create table products(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(150) NOT NULL,
    price double NOT NULL,
    stock int NOT NULL
)
