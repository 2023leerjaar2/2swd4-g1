-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 05:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kamadoing`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_published` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `vegan` tinyint(1) NOT NULL,
  `difficulty` int(1) NOT NULL,
  `time_to_cook` time NOT NULL,
  `photo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `content`, `date_created`, `date_published`, `date_updated`, `vegan`, `difficulty`, `time_to_cook`, `photo`) VALUES
(1, 'Smoked Barbecue Chicken on Kamado Grill', 'Savor smoky perfection with Kamado-grilled BBQ chicken. Rub, smoke, and relish the rich flavors of this culinary masterpiece.', 'Ingredients:\r\n1 whole chicken (about 4-5 pounds)\r\nBBQ rub of your choice\r\nOlive oil\r\nWood chunks or chips for smoking (hickory, apple, or cherry wood work well)\r\nBarbecue sauce (optional, for finishing)\r\nInstructions:\r\nPrepare the Kamado Grill:\r\n\r\nStart by lighting the charcoal in your kamado grill and preheat it to a temperature of around 225-250°F (107-121°C).\r\nAdd your choice of wood chunks or chips to the charcoal for smoke flavor.\r\nPrepare the Chicken:\r\n\r\nRinse the chicken under cold water and pat it dry with paper towels.\r\nRub the entire chicken with a thin layer of olive oil to help the rub adhere.\r\nApply BBQ Rub:\r\n\r\nGenerously coat the chicken with your favorite BBQ rub, covering both the exterior and inside the cavity. Ensure an even coating.\r\nSetup for Indirect Cooking:\r\n\r\nSet up your kamado grill for indirect cooking by placing a drip pan in the center and arranging the charcoal around it. This setup helps prevent flare-ups.\r\nSmoke the Chicken:\r\n\r\nPlace the chicken on the grill grates, positioning it over the drip pan.\r\nClose the lid and let the chicken smoke at the 225-250°F temperature range. Maintain this temperature for the duration of the cook.\r\nMonitor and Rotate:\r\n\r\nMonitor the temperature using the built-in thermometer or an external one. Rotate the chicken occasionally for even cooking.\r\nCheck Doneness:\r\n\r\nSmoke the chicken until the internal temperature at the thickest part reaches 165°F (74°C). This usually takes around 2.5 to 3.5 hours, but times may vary based on your grill and the size of the chicken.\r\nOptional: Glaze with Barbecue Sauce:\r\n\r\nIf you like, glaze the chicken with your favorite barbecue sauce during the last 15-20 minutes of cooking. This adds a flavorful finish.\r\nRest and Serve:\r\n\r\nOnce the chicken reaches the desired temperature, remove it from the grill and let it rest for about 10-15 minutes before carving.\r\nEnjoy your delicious smoked barbecue chicken from the kamado grill! Feel free to customize the rub, wood choice, or sauce to suit your preferences.', '2024-01-26 11:11:02', '2024-01-26 11:11:02', '2024-01-26 11:11:02', 0, 3, '01:30:00', 1),
(2, 'Grilled Salmon with Lemon-Dill Marinade', 'Grilled salmon, infused with lemon-dill marinade. Succulent, zesty perfection in every bite.', '    Marinate Salmon:\r\n        In a bowl, mix olive oil, lemon juice, minced garlic, chopped dill, salt, and black pepper.\r\n        Coat salmon fillets with the marinade and let them marinate in the refrigerator for at least 30 minutes.\r\n\r\n    Preheat Grill:\r\n        Preheat your grill to medium-high heat.\r\n\r\n    Grill Salmon:\r\n        Place marinated salmon fillets on the preheated grill grates.\r\n        Grill for 4-5 minutes per side, or until salmon easily flakes with a fork.\r\n\r\n    Check Doneness:\r\n        Ensure the internal temperature reaches 145°F (63°C).\r\n\r\n    Garnish and Serve:\r\n        Garnish with lemon slices and additional fresh dill before serving.\r\n\r\n    Enjoy:\r\n        Serve the grilled salmon with your favorite sides. Enjoy the succulent and flavorful result of this simple and delicious recipe!', '2024-01-28 23:01:57', '2024-01-28 23:01:57', '2024-01-28 23:01:57', 0, 2, '00:40:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `salt` varchar(16) NOT NULL,
  `hashed_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
