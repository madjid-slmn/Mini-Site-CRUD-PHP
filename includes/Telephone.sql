DROP TABLE IF EXISTS `Telephone`;

CREATE TABLE `Telephone` (
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `marque` VARCHAR(100) NOT NULL,
  `modele` VARCHAR(100) NOT NULL,
  `stockage` INT NOT NULL,
  `ram` INT NOT NULL,
  `couleur` VARCHAR(50) NOT NULL,
  `prix` DECIMAL(10, 2) NOT NULL
);

INSERT INTO `Telephone` (`marque`, `modele`, `stockage`, `ram`, `couleur`, `prix`) VALUES
('Samsung', 'Galaxy S21', 128, 8, 'Noir', 799.99),
('Apple', 'iPhone 12', 256, 6, 'Bleu', 999.99),
('Samsung', 'Galaxy S22', 256, 8, 'blanc', 799.99),
('Google', 'Pixel 5', 128, 8, 'Vert', 699.99),
('Samsung', 'Galaxy S24', 256, 8, 'blanc', 1299.99);

