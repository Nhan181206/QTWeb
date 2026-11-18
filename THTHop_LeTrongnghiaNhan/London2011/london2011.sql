-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2026 at 03:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `london2011`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `image`) VALUES
(1, 'Starters', 'starters.jpg'),
(2, 'Salads', 'salads.jpg'),
(3, 'Sandwiches', 'sandwiches.jpg'),
(4, 'Main courses', 'main-courses.jpg'),
(5, 'Beef', 'beef.jpg'),
(6, 'Desserts', 'desserts.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `dish_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`dish_id`, `category_id`, `title`, `price`, `description`, `image`) VALUES
(1, 1, 'Davy\'s classic prawn cocktail', 7.85, 'A selection of prawns, marie rose sauce with a hint of Manzanilla', 'davys-classic-prawn-cocktail.jpg'),
(2, 1, 'Warm grilled goat\'s cheese crostini', 5.55, 'on balsamic dressed mixed leaf', 'warm-grilled-goats-cheese-crostini.jpg'),
(3, 1, 'Plate of Scottish smoked salmon', 7.95, 'with lambs leaf dressed with balsamic syrup and pink peppercorns', 'plate-of-scottish-smoked-salmon.jpg'),
(4, 2, 'Gordon\'s Salad', 9.95, 'Chicory, gorgonzola cheese, pear and dandelion salad with a whole grain mustard dressing', 'gordons-salad.jpg'),
(5, 2, 'Grilled Salmon Salad', 23.95, 'Mixed greens with sliced avocado, bacon, cherry tomato, onion and Cheshire with toasted sesame citrus vinaigrette', 'grilled-salmon-salad.jpg'),
(6, 2, 'Cobb Salad', 21.15, 'Our take on the classic - grilled chicken, hickory-smoked bacon, Stilton cheese, tomato, boiled egg, black olive, English mustard dressing', 'cobb-salad.jpg'),
(7, 3, 'Grilled goat\'s cheese', 7.95, 'Warm goat\'s cheese served with roast Mediterranean vegetables and pesto on a toasted ciabatta', 'grilled-goats-cheese.jpg'),
(8, 3, 'Cumberland sausage', 7.25, '6oz Cumberland sausage ring served with red onions, in toasted sourdough bloomer', 'cumberland-sausage.jpg'),
(9, 4, 'Kings Wings', 15.95, 'A dozen spiced chicken wings tossed in our special Guinness Hoisin BBQ sauce, with sesame seeds and green onion', 'kings-wings.jpg'),
(10, 4, 'Sausage Rolls', 18.35, 'Banger sausage wrapped in pastry served with our house BBQ and Scotch eggs', 'sausage-rolls.jpg'),
(11, 4, 'Bangers and mash', 10.95, 'Cumberland sausages with traditional mashed potatoes and onion gravy', 'bangers-and-mash.jpg'),
(12, 4, 'Fish and chips', 12.95, 'Line caught haddock in beer batter served with chipped potatoes and minted pea puree', 'fish-n-chips.jpg'),
(13, 4, 'New season lamb cutlets', 16.25, 'Roasted vegetables, sweet potato and chive mash', 'new-season-lamb-cutlets.jpg'),
(14, 4, 'Side orders', 2.85, 'Choose from:\n- chipped potatoes or fries\n- Jersey Royal potatoes\n- traditional mash\n- seasonal vegetable selection\n- green beans\n- mixed leaf salad with house dressing\n(Price is for each portion)', 'side-orders.jpg'),
(15, 5, 'T-Bone steak', 28.95, '400g served on the bone. Made up of both sirloin and fillet offering you both the tenderness of the fillet and the flavour of the sirloin', 't-bone-steak.jpg'),
(16, 5, 'Sirloin steak', 23.55, 'A juicy, tasty and tender cut of 240g fully trimmed and aged for 21 days', 'sirloin-steak.jpg'),
(17, 5, 'Ribeye steak', 20.15, 'Rich marbling is the secret to this succulent and tasty cut of 220g, aged for 28 days', 'ribeye-steak.jpg'),
(18, 6, 'English cheese board', 9.75, 'A selection of four British cheeses served with biscuits and green tomato and apple chutney', 'english-cheese-board.jpg'),
(19, 6, 'Chocolate tart', 5.85, 'Delicious tart with clotted cream and raspberry coulis', 'chocolate-tart.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `score` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `dish_id`, `score`) VALUES
(1, 1, 4),
(2, 1, 4),
(3, 1, 4),
(4, 2, 4),
(5, 2, 5),
(6, 3, 4),
(7, 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`dish_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `dish_id` (`dish_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `dish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dish`
--
ALTER TABLE `dish`
  ADD CONSTRAINT `fk_dish_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk_rating_dish` FOREIGN KEY (`dish_id`) REFERENCES `dish` (`dish_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
