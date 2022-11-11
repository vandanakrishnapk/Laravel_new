-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2022 at 05:39 PM
-- Server version: 8.0.31-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `User_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int NOT NULL,
  `user_id` int NOT NULL COMMENT 'foreignkey',
  `address` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `user_id`, `address`, `image`) VALUES
(1, 1, 'Mukam', 'istockphoto-1365223878-170667a.jpg'),
(2, 2, 'Thamarassery', 'ccc.jpeg'),
(3, 3, 'cvc', 'aaa.jpeg'),
(4, 4, 'Thalassery', 'images (3).jpeg'),
(5, 6, 'kakkov', 'download (4).jpeg'),
(6, 7, 'Karapparamb', 'ccc.jpeg'),
(7, 9, 'kozhikode', 'hhh.jpeg'),
(9, 1, 'Kaladi', 'fff.jpeg'),
(10, 11, 'kinaloor', 'fff.jpeg'),
(11, 1, 'karapparambu', 'ddd.jpeg'),
(12, 13, 'poonoor', 'ddd.jpeg'),
(13, 16, 'omassery', 'aaa.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `dob`, `email`, `password`) VALUES
(1, 'amal', '2022-11-10', 'amal@gmail.com', '505439c2c93b1f7c35f77386d25365ab'),
(2, 'sreya.N', '2022-11-11', 'sreya@gmail.com', '4b0af70bef790bed1adb7142053583f8'),
(3, 'raju', '2022-11-11', 'raju@gmail.com', '1ad9f189359e0797ccc7b3987efb2925'),
(4, 'vipin', '2022-11-12', 'vipin@gmail.com', '012cd22f2f42b8ca839ff01cafc12ea7'),
(5, 'renisha', '2022-11-18', 'Renisha@gmail.com', '2a6aff6c17d16ec89b1bf58e45cc4ab5'),
(6, 'kadeeja', '2022-11-05', 'Kadeeja@gmail.com', '2c01aa7f8734641f93163269e9f14baf'),
(7, 'reju', '2022-11-04', 'reju@gmail.com', 'be1422f28f49de43bb524063124d79a7'),
(8, 'hiba', '2022-11-11', 'hiba@gmail.com', 'b66856523b53d7c777e72c499bdd4450'),
(9, 'riya', '2022-11-11', 'Riya@gmail.com', 'e7505d0ab0f63e08810f6000a5f37ae9'),
(10, 'Jijo', '2022-11-18', 'jijo@gmail.com', 'ecf9b43e237739dfaf294594b4ce744e'),
(11, 'kaira', '2022-11-11', 'Kaira@gmail.com', '695469c6de51edf64e6cc12cfbeec992'),
(12, 'rincy', '2022-11-12', 'Rincy@gmail.com', 'd423e0a8183254d2ef0d9d063af3543c'),
(13, 'binu', '2022-11-11', 'Binu@gmail.com', '2e67dc54e70f679a51b317c115d3fe6b'),
(14, 'Nihara', '2022-11-10', 'Nihara@gmail.com', 'fc1db1e8bf89dc3dad72f00ebc2c475f'),
(15, 'sinaj', '2022-11-11', 'sinaj@gmail.com', 'd2ce3a84fdd46a2ef9391930c49992e9'),
(16, 'nihal', '2022-11-18', 'Nihal@gmail.com', '027a13928b1a47f9c0e41b0bfc4406da');

-- --------------------------------------------------------

--
-- Table structure for table `user_phone`
--

CREATE TABLE `user_phone` (
  `id` int NOT NULL,
  `user_id` int NOT NULL COMMENT 'foreign_key',
  `phone_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `user_phone`
--

INSERT INTO `user_phone` (`id`, `user_id`, `phone_no`) VALUES
(3, 1, '9846021452 '),
(4, 1, '9859635000'),
(27, 4, '8606865623'),
(28, 4, '8745253565'),
(39, 6, '9846021456     '),
(40, 6, '8606861343     '),
(41, 6, '9846253585'),
(44, 3, '8606861343   '),
(45, 7, '9846012563'),
(46, 7, '6525345875'),
(54, 9, '9846012563  '),
(55, 9, '9846021456  '),
(75, 1, '8606861343'),
(76, 1, '9846012563'),
(81, 11, '9847562356  '),
(82, 11, '6523415236  '),
(83, 1, '89745856'),
(84, 1, '6523658475'),
(87, 13, '9846021456 '),
(88, 13, '8606864595 '),
(89, 13, '7985623564'),
(93, 2, '9846015205             '),
(94, 2, '9846254785        '),
(95, 2, '9846021456     '),
(112, 16, '8943526598               ');

-- --------------------------------------------------------

--
-- Table structure for table `user_qualification`
--

CREATE TABLE `user_qualification` (
  `id` int NOT NULL,
  `user_id` int NOT NULL COMMENT 'foreign_key',
  `qualification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `user_qualification`
--

INSERT INTO `user_qualification` (`id`, `user_id`, `qualification`) VALUES
(3, 1, 'msc '),
(4, 1, 'bsc '),
(24, 4, 'ma'),
(25, 4, 'ba'),
(36, 6, 'MA     '),
(37, 6, 'ba     '),
(38, 6, 'plustwo'),
(41, 3, 'MA   '),
(42, 7, 'MA'),
(43, 7, 'msc'),
(51, 9, 'btech  '),
(52, 9, 'msc  '),
(72, 1, 'btech'),
(77, 11, 'ba  '),
(78, 11, 'ca  '),
(79, 1, 'MCA'),
(80, 1, 'bca'),
(83, 13, 'btech '),
(84, 13, 'ba '),
(85, 13, 'ca'),
(89, 2, 'MCA             '),
(90, 2, 'ba        '),
(91, 2, 'plustwo     '),
(108, 16, 'bsc               ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_phone`
--
ALTER TABLE `user_phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_qualification`
--
ALTER TABLE `user_qualification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_phone`
--
ALTER TABLE `user_phone`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `user_qualification`
--
ALTER TABLE `user_qualification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user_phone`
--
ALTER TABLE `user_phone`
  ADD CONSTRAINT `user_phone_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user_qualification`
--
ALTER TABLE `user_qualification`
  ADD CONSTRAINT `user_qualification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
