-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 12:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(1, 1, 4, 'Oreo Cake', 169, 1, 'cake5.jpg'),
(2, 1, 29, 'Vanilla Gelato', 6, 1, 'pic5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`, `review`) VALUES
(1, 3, 'Laura', 'laura.iliescu@gmail.com', '+40726152473', 'I would like to order a custom birthday cake.', 'It serves a wide variety of delicious sweets, cakes and confectioneries at an affordable prices. The quality and tastes of the dessert are unique. The atmosphere is pleasant and the staff is very kind and open to client suggestions. Really happy with the purchase, it was a complicated order but it was handled perfectly. I’d definitely return to YumCakes confectionary again.'),
(2, 4, 'Sofia', 'sofia@gmail.com', '+40727136986', '-', 'It&#39;s my third time ordering from YumCakes and I can say they never disappoint. The sweets are just amazing and they are packed carefully. I took their vanilla cake for our office party celebration and everyone loved it. My favorites must be their waffles that are full of flavour, making a great breakfast. Definitely buying more and will recommend to my friends.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 4, 'Sofia Stan', '0723231627', 'sofia@gmail.com', 'credit card-Visa', 'flat no. Str. Jean Monnet Nr.7 Bucuresti Bucuresti Romania - 011956', ', Vanilla Gelato ( 1 ), Nutella Almond Milkshake ( 2 )', 20, '29-May-2022', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `details`, `price`, `image`) VALUES
(1, 'Vanilla Double Cake', 'cake', 'A moist vanilla cake made with Madagascar vanilla extract. Fluffier, more tender and way less greasy than the typical vanilla cakes, much more moist than traditional sponge cakes, a large layered cake smothered with frosting or piles of cream and berries.', 171, 'cake1.jpg'),
(2, 'Toffee Cake', 'cake', '', 140, 'cake3.jpg'),
(3, 'Dark Chocolate Strawberry Cake', 'cake', '', 135, 'cake4.jpg'),
(4, 'Oreo Cake', 'cake', '', 169, 'cake5.jpg'),
(5, 'Orange Vanilla Cake', 'cake', '', 156, 'cake6.jpg'),
(6, 'Hazelnut Cake', 'cake', '', 145, 'cake7.jpg'),
(7, 'Vanilla Sprinkle Cake', 'cake', '', 200, 'cake8.jpg'),
(8, 'Strawberry Cheesecake', 'cake', '', 127, 'cake12.jpg'),
(9, 'Mixed Fruits Cake', 'cake', '', 123, 'cake15.jpg'),
(10, 'Blueberry Cake', 'cake', '', 165, 'cake16.jpg'),
(11, 'Liquor Cake', 'cake', '', 187, 'cake14.jpg'),
(12, 'Strawberry Vanilla Crepes', 'crepe', '', 20, 'crepecake1.jpg'),
(13, 'Blueberry Crepes', 'crepe', '', 15, 'crepecake3.jpg'),
(14, 'Nutella Crepes', 'crepe', 'Light and fluffy chocolate cream sandwiched between layers of paper thin chocolate crepes, topped with a swirl of rich chocolate ganache and a dusting of cocoa powder.', 21, 'crepecake4.jpg'),
(15, 'Strawberry & Vanilla Cream Crepes', 'crepe', '', 16, 'crepecake5.jpg'),
(16, 'Matcha Crepes', 'crepe', '', 24, 'crepecake6.jpg'),
(17, 'Birthday Cake Cupcakes', 'cupcake', '', 5, 'cupcakes.jpg'),
(18, 'Strawberry & Blueberry Cupcakes', 'cupcake', '', 4, 'cupcakes2.jpg'),
(19, 'Lavander Cupcakes', 'cupcake', '', 13, 'lavander.jpg'),
(20, 'Nutella Cupcakes', 'cupcake', 'These super moist chocolate cupcakes pack tons of chocolate flavor in each cupcake wrapper! Chocolate cake, dark chocolate ganache frosting, chocolate sprinkles our cupcakes are made out natural unsweetened cocoa powder, that brings a rich flavour to the spongey cake.', 14, 'nutella.jpg'),
(21, 'Raspberry Cupcakes', 'cupcake', '', 15, 'raspberry.jpg'),
(22, 'Rose Cupcakes', 'cupcake', '', 16, 'rose.jpg'),
(23, 'Ferrero Cupcakes', 'cupcake', '', 11, 'toffee.jpg'),
(25, 'Nutella Gelato', 'gelato', '', 4, 'pic1.jpg'),
(26, 'Strawberry Cheesecake Gelato', 'gelato', '', 7, 'pic2.jpg'),
(27, 'Strawberry Gelato', 'gelato', '', 6, 'pic3.jpg'),
(28, 'Mixed Berry Gelato', 'gelato', '', 10, 'pic4.jpg'),
(29, 'Vanilla Gelato', 'gelato', '', 6, 'pic5.jpg'),
(30, 'Sweet Figs Gelato', 'gelato', '', 9, 'pic6.jpg'),
(31, 'Blueberry Gelato', 'gelato', 'It&#39;s smooth, and creamy, and bursting with a sweet raspberry flavor in every bite. Raspberry Ice Cream is the perfect summertime treat, and a great way to consume these fresh seasonal berries.', 9, 'pic7.jpg'),
(32, 'Passion Fruit Gelato', 'gelato', '', 16, 'pic8.jpg'),
(33, 'Matcha Pistachio Gelato', 'gelato', '', 11, 'pistachio.jpg'),
(34, 'Rose & Strawberry Gelato', 'gelato', '', 12, 'strawberry1.jpg'),
(36, 'Strawberry Peach Tart', 'tart', '', 23, 'tart1.jpg'),
(37, 'Chocolate Tart', 'tart', 'Our Chocolate Tarts have a rich chocolate filling baked into a tender sweet crust. They’re rich and decadent, with just the perfect amount of sweetness.', 21, 'tart2.jpg'),
(38, 'Rose Jelly Tart', 'tart', '', 21, 'tart3.jpg'),
(39, 'Strawberry Lemon Tart', 'tart', '', 24, 'tart4.jpg'),
(40, 'Blueberry Chocolate Tart', 'tart', '', 20, 'tart5.jpg'),
(41, 'Blueberry Passion Fruit Tart', 'tart', '', 26, 'tart7.jpg'),
(42, 'Mixed Berry Macarons', 'macaron', '', 2, 'categoryPic2.jpg'),
(43, 'Lemon Lime Macarons', 'macaron', '', 3, 'limemacarons.jpg'),
(44, 'Asortment Macarons', 'macaron', 'These blueberry macarons have a blueberry ganache filling that&#39;s made with real berries. The amount of natural blueberry flavor these macarons have is out of this world and the naturally purple filling makes them look so impressive.', 4, 'categoryPic1.jpg'),
(45, 'Rose Macarons', 'macaron', '', 3, 'blueberrymacaron.jpg'),
(46, 'Strawberry Shortcake Macarons', 'macaron', '', 5, 'strawberrymacaron.jpg'),
(47, 'Coffee Macarons', 'macaron', '', 6, 'coffeemacarons.jpg'),
(48, 'Cherry Macarons', 'macaron', '', 5, 'cherrymacaron.jpg'),
(49, 'Strawberry Lemon Waffle', 'waffle', '', 10, 'lemonwaffle.jpg'),
(50, 'Dark Chocolate Waffle', 'waffle', '', 9, 'darkchocolate.jpg'),
(51, 'Strawberry Coconut Waffle', 'waffle', '', 13, 'redheart.jpg'),
(52, 'Rose Vanilla Cream Waffle', 'waffle', '', 15, 'pinkheart.jpg'),
(53, 'Caramel Almond Gelato Waffle', 'waffle', 'Waffles are always a favorite, but these salted caramel waffles make for an extra special treat.  Their extra crispy outside with the tender, fluffy inside begs for savoring at breakfast or brunch or even breakfast for supper.', 17, 'caramelwaffles.jpg'),
(54, 'Chocolate Strawberry Combo Milkshakes', 'milkshake', '', 8, 'Milkshake.jpg'),
(55, 'Cherry Chocolate Milkshake', 'milkshake', '', 10, 'milkshake1.jpg'),
(56, 'Taro Milkshake', 'milkshake', '', 11, 'milkshake2.jpg'),
(57, 'Nutella Almond Milkshake', 'milkshake', '', 7, 'milkshake3.jpg'),
(58, 'Strawberry Milkshake', 'milkshake', 'Creamy, delicious and bursting with strawberry flavour, our strawberry milkshake is a sweet, cooling treat that you&#39;ll no doubt be craving during a hot summer. It&#39;s made out of strawberries, milk, ice cream and vanilla extract.', 8, 'milkshake4.jpg'),
(59, 'Pistachio Dark Chocolate Milkshake', 'milkshake', '', 10, 'milkshake5.jpg'),
(60, 'Chocolate Toffee Milkshake', 'milkshake', '', 11, 'milkshake6.jpg'),
(61, 'Strawberry Almond Combo Milkshake', 'milkshake', '', 13, 'milkshake8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `image`) VALUES
(1, 'Mara', 'mara.sofia.stan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'redvelvet.jpg'),
(3, 'Laura', 'laura.iliescu@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', 'laura.png'),
(4, 'Sofia', 'sofia@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', 'mara.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(1, 4, 1, 'Vanilla Double Cake', 171, 'cake1.jpg'),
(2, 4, 16, 'Matcha Crepes', 24, 'crepecake6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
