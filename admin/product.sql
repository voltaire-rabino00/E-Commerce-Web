-- -----------------------------------------------------
-- Table structure for `products`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `products` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `category` VARCHAR(100),
    `price` DECIMAL(10,2) NOT NULL,
    `stock` INT DEFAULT 0,
    `image` VARCHAR(255),
    `status` ENUM('active','inactive') DEFAULT 'active',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    