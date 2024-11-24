CREATE DATABASE IF NOT EXISTS shop;
USE shop;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL CHECK (price >= 0),
    description TEXT
);

INSERT INTO products (name, price, description) VALUES
('протигаз гп-5', 4999, 'йде з сумкою та фільтром у комплекті'),
('лом-цвяходер', 309, '900 мм, червоний'),
('клавіатура разор', 3000, 'чарівна клавіатура у якої зламається кнопка А через місяць після покупки');