-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 08:37 AM
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
  `time_to_cook` int(11) NOT NULL,
  `visited` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `content`, `date_created`, `date_published`, `date_updated`, `vegan`, `difficulty`, `time_to_cook`, `visited`, `deleted`) VALUES
(1, 'Smoked Barbecue Chicken on Kamado Grill', 'Savor smoky perfectionth Kamado-grilled BBQ chicken. Rub, smoke, and relish the rich flavors of this culinary masterpiece.', 'Ingredients:\r\n1 whole chicken (about 4-5 pounds)\r\nBBQ rub of your choice\r\nOlive oil\r\nWood chunks or chips for smoking (hickory, apple, or cherry wood work well)\r\nBarbecue sauce (optional, for finishing)\r\nInstructions:\r\nPrepare the Kamado Grill:\r\n\r\nStart by lighting the charcoal in your kamado grill and preheat it to a temperature of around 225-250°F (107-121°C).\r\nAdd your choice of wood chunks or chips to the charcoal for smoke flavor.\r\nPrepare the Chicken:\r\n\r\nRinse the chicken under cold water and pat it dry with paper towels.\r\nRub the entire chicken with a thin layer of olive oil to help the rub adhere.\r\nApply BBQ Rub:\r\n\r\nGenerously coat the chicken with your favorite BBQ rub, covering both the exterior and inside the cavity. Ensure an even coating.\r\nSetup for Indirect Cooking:\r\n\r\nSet up your kamado grill for indirect cooking by placing a drip pan in the center and arranging the charcoal around it. This setup helps prevent flare-ups.\r\nSmoke the Chicken:\r\n\r\nPlace the chicken on the grill grates, positioning it over the drip pan.\r\nClose the lid and let the chicken smoke at the 225-250°F temperature range. Maintain this temperature for the duration of the cook.\r\nMonitor and Rotate:\r\n\r\nMonitor the temperature using the built-in thermometer or an external one. Rotate the chicken occasionally for even cooking.\r\nCheck Doneness:\r\n\r\nSmoke the chicken until the internal temperature at the thickest part reaches 165°F (74°C). This usually takes around 2.5 to 3.5 hours, but times may vary based on your grill and the size of the chicken.\r\nOptional: Glaze with Barbecue Sauce:\r\n\r\nIf you like, glaze the chicken with your favorite barbecue sauce during the last 15-20 minutes of cooking. This adds a flavorful finish.\r\nRest and Serve:\r\n\r\nOnce the chicken reaches the desired temperature, remove it from the grill and let it rest for about 10-15 minutes before carving.\r\nEnjoy your delicious smoked barbecue chicken from the kamado grill! Feel free to customize the rub, wood choice, or sauce to suit your preferences.', '2024-01-26 11:11:02', '2024-01-26 11:11:02', '2024-02-01 03:31:20', 0, 3, 210, 0, 0),
(12, 'test Salmon with Lemon-Dill Marinade', 'Grilled salmon, infused with lemon-dill marinade. Succulent, zesty perfection in every bite.', '1. Marinate Salmon:\r\n\r\nIn a bowl, mix olive oil, lemon juice, minced garlic, chopped dill, salt, and black pepper.\r\nCoat salmon fillets with the marinade and let them marinate in the refrigerator for at least 30 minutes.\r\nPreheat Grill:\r\n\r\n2. Preheat your grill to medium-high heat.\r\nGrill Salmon:\r\n\r\n3. Place marinated salmon fillets on the preheated grill grates.\r\nGrill for 4-5 minutes per side, or until salmon easily flakes with a fork.\r\nCheck Doneness:\r\n\r\n4. Ensure the internal temperature reaches 145°F (63°C).\r\nGarnish and Serve:\r\n\r\n5. Garnish with lemon slices and additional fresh dill before serving.\r\nEnjoy:\r\n\r\n6. Serve the grilled salmon with your favorite sides. Enjoy the succulent and flavorful result of this simple and delicious recipe!', '2024-01-30 07:47:36', '2024-02-02 12:00:00', '2024-02-01 03:31:33', 0, 2, 40, 0, 0),
(16, ' Grilled Vegetable Skewers with Balsamic Glaze', 'Vibrant Grilled Vegetable Skewers – a symphony of colors and flavors. Charred perfection drizzled with balsamic glaze. A vegetar', 'Prepare Vegetables:\r\n\r\nCut vegetables into bite-sized pieces.\r\nMarinate:\r\n\r\nToss vegetables with olive oil, garlic powder, dried oregano, salt, and black pepper.\r\nSkewer:\r\n\r\nThread the marinated vegetables onto skewers.\r\nPreheat Grill:\r\n\r\nPreheat your grill to medium-high heat.\r\nGrill Skewers:\r\n\r\nGrill vegetable skewers for about 10-15 minutes, turning occasionally until vegetables are charred and tender.\r\nCheck Doneness:\r\n\r\nEnsure vegetables are cooked to your liking.\r\nDrizzle with Balsamic Glaze:\r\n\r\nRemove skewers from the grill and drizzle with balsamic glaze.\r\nServe:\r\n\r\nServe the grilled vegetable skewers as a delicious and colorful vegetarian dish.', '2024-01-31 11:48:37', '2024-01-30 12:00:00', '2024-02-01 02:33:27', 1, 3, 20, 0, 0),
(18, 't', 't', 'test', '2024-02-01 03:32:10', '2024-02-01 03:00:00', '0000-00-00 00:00:00', 1, 3, 19, 0, 0),
(19, 't', 't', 'test', '2024-02-01 06:38:06', '2024-01-01 22:10:00', '0000-00-00 00:00:00', 1, 4, 120, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `salt`, `hashed_password`) VALUES
(4, 'admin', 'edf4e25aade4c3235373e49ef0e37c2a', '$2y$10$PnIFEJ3IB4g0jsWjzGXo3.8LrPxPGjs6LK2wl9Z/06vy535P07Gyu');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
