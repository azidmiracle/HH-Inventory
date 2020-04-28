-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 05:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hhinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Meat & Seafood'),
(2, 'Fruits & Vegetables'),
(3, 'Household'),
(4, 'Rice & Cooking Ingredients'),
(5, 'Snacks'),
(6, 'Dairy & Eggs'),
(7, 'Drinks'),
(8, 'Health and Beauty');

-- --------------------------------------------------------

--
-- Table structure for table `cat_items`
--

CREATE TABLE `cat_items` (
  `item_name` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `currentCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cat_items`
--

INSERT INTO `cat_items` (`item_name`, `cat_id`, `currentCount`) VALUES
('Chicken', 1, 20),
('Pork', 1, -10),
('Beef', 1, 0),
('Fish', 1, 0),
('Beans', 1, 1),
('Potato', 1, 1),
('Cabbage', 2, 0),
('Pumpkin', 2, 0),
('Carrot', 2, 0),
('Onion', 2, 0),
('Garlic', 2, 0),
('Ginger', 2, 0),
('Lemon', 2, 0),
('Calamansi', 2, 0),
('Banana', 2, 0),
('Apple', 2, 10),
('Mango', 2, 0),
('Laundry Powder', 3, 0),
('Fabric Conditioner', 3, 0),
('Bleach', 3, 0),
('Dish Washing', 3, 0),
('Rice', 4, 10),
('Soy Sauce', 4, 10),
('Vinegar', 4, 0),
('Cooking Oil', 4, 0),
('Tomato Sauce', 4, 0),
('Pepper', 4, 0),
('Salt', 4, 0),
('Sugar', 4, 0),
('Seasoning', 4, 0),
('Garlic Powder', 4, 0),
('Fish Sauce', 4, 0),
('Oyster Sauce', 4, 0),
('Prawn', 1, 0),
('Slice Bread', 5, 0),
('Buns Bread', 5, 0),
('Cream-O', 5, 0),
('Mr Potato', 5, 0),
('Piatos', 5, 0),
('Dingdong', 5, 0),
('Nagaraya', 5, 0),
('Pringles', 5, 0),
('Doritos', 5, 0),
('Eggs', 6, 10240),
('Cheese', 6, 10240),
('Coke', 7, 11),
('Milk', 7, 0),
('Chocolate Drink', 7, 0),
('Isotonic Drink', 7, 0),
('Head and Shoulder', 8, 0),
('Vaseline Shampoo', 7, 0),
('Lifebouy Body wash', 8, 0),
('Shokubutsu', 8, 0),
('Facial wash', 8, 0),
('Tootpaste', 8, 0),
('Toothbrush', 8, 0),
('Feminine wash', 8, 0),
('Feminine napkin', 8, 0),
('Deodorant', 8, 0),
('Facial Sunscreen', 8, 0),
('Body Spray', 8, 0),
('Lamb', 1, 0),
('Juice', 7, 0),
('Powder', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_inventory`
--

CREATE TABLE `main_inventory` (
  `id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `current_count` int(11) NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_bought`
--

CREATE TABLE `transaction_bought` (
  `item_name` text NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_bought`
--

INSERT INTO `transaction_bought` (`item_name`, `qty`, `date`, `id`, `cat_id`) VALUES
('Chicken', 1, '2020-04-11', 1, 1),
('Pork', 1, '2020-04-11', 2, 1),
('Slice Bread', 10, '2020-04-11', 3, 5),
('Buns Bread', 20, '2020-04-11', 4, 5),
('Cream-O', 30, '2020-04-11', 5, 5),
('Pork', 20, '2020-04-11', 6, 1),
('Laundry Powder', 1, '2020-04-11', 7, 3),
('Fabric Conditioner', 1, '2020-04-11', 8, 3),
('Laundry Powder', 5, '2020-04-11', 9, 3),
('Fabric Conditioner', 5, '2020-04-11', 10, 3),
('Slice Bread', 10, '2020-04-12', 11, 5),
('Buns Bread', 10, '2020-04-12', 12, 5),
('Coke', 20, '2020-04-12', 13, 7),
('Milk', 20, '2020-04-12', 14, 7),
('Chocolate Drink', 20, '2020-04-12', 15, 7),
('Isotonic Drink', 20, '2020-04-12', 16, 7),
('Vaseline Shampoo', 20, '2020-04-12', 17, 7),
('Eggs', 20, '2020-04-12', 18, 6),
('Cheese', 20, '2020-04-12', 19, 6),
('Chicken', 10, '2020-04-12', 20, 1),
('Pork', 10, '2020-04-12', 21, 1),
('Milo', 10, '2020-04-12', 22, 7),
('Chicken', 20, '2020-04-12', 23, 1),
('Coke', 12, '2020-04-12', 24, 7),
('Crab', 1, '2020-04-12', 25, 1),
('Chicken', 5, '2020-04-12', 26, 1),
('Chicken', 10, '2020-04-12', 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_used`
--

CREATE TABLE `transaction_used` (
  `item_name` text NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_used`
--

INSERT INTO `transaction_used` (`item_name`, `qty`, `date`, `id`, `cat_id`) VALUES
('Laundry Powder', 1, '2020-04-11', 3, 3),
('Fabric Conditioner', 1, '2020-04-11', 4, 3),
('Laundry Powder', 1, '2020-04-11', 5, 3),
('Fabric Conditioner', 1, '2020-04-11', 6, 3),
('Eggs', 20, '2020-04-12', 7, 6),
('Cheese', 20, '2020-04-12', 8, 6),
('Chicken', 20, '2020-04-12', 9, 1),
('Pork', 20, '2020-04-12', 10, 1),
('Chicken', 10, '2020-04-12', 11, 1),
('Pork', 10, '2020-04-12', 12, 1),
('Chicken', 5, '2020-04-12', 13, 1),
('Potato', 1, '2020-04-12', 14, 1),
('Coke', 1, '2020-04-12', 15, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userName` text NOT NULL,
  `Password` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userName`, `Password`, `id`) VALUES
('auggy_emmy', '$2y$10$kdISKuH2584ijIqM18PBRO3QRG6918OrVylW8V/kADO9kpjLhxDwy', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`) USING HASH;

--
-- Indexes for table `cat_items`
--
ALTER TABLE `cat_items`
  ADD UNIQUE KEY `item_name` (`item_name`) USING HASH,
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `main_inventory`
--
ALTER TABLE `main_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_bought`
--
ALTER TABLE `transaction_bought`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `transaction_used`
--
ALTER TABLE `transaction_used`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `main_inventory`
--
ALTER TABLE `main_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_bought`
--
ALTER TABLE `transaction_bought`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transaction_used`
--
ALTER TABLE `transaction_used`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction_bought`
--
ALTER TABLE `transaction_bought`
  ADD CONSTRAINT `transaction_bought_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

--
-- Constraints for table `transaction_used`
--
ALTER TABLE `transaction_used`
  ADD CONSTRAINT `transaction_used_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
