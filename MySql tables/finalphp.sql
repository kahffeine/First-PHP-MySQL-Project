-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Mar-2024 às 22:52
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `finalphp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories1`
--

CREATE TABLE `categories1` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categories1`
--

INSERT INTO `categories1` (`id`, `cat_name`, `img_path`) VALUES
(1, 'Adventure', 'adventure-game.png'),
(2, 'Sci-fi', 'ufo.png'),
(3, 'Biography', 'earth.png'),
(4, 'Other', 'book.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `products` varchar(500) DEFAULT NULL,
  `authors` varchar(500) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `products`, `authors`, `price`) VALUES
(1, 2, '11/22/63 (2) / Chronicles of Narnia: The Lion, the Witch and the Wardrobe (5) / Bone (4)', 'Stephen King / CS Lewis / Jeff Smith', 154),
(2, 2, 'Marie Antoinette: The Journey (1)', 'Antonia Fraser', 12),
(3, 2, 'Doomsday Book (7) / The Sandman (3)', 'Connie Willis / Neil Gaiman', 162),
(4, 2, 'Einstein: His Life and Universe (99)', 'Walter Isaacson', 1683);

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `maincat` varchar(255) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `subcat` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `details` varchar(500) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `book_name`, `maincat`, `author_name`, `subcat`, `price`, `details`, `path`) VALUES
(1, 'Harry Potter and the Sorcerer\'s Stone', 'Adventure', 'JK Rowling', 'Fantasy', 10, 'The book that introduced us to the wizarding world, J.K. Rowing’s Harry Potter and the Sorcerer’s Stone is the beginning of a magical journey that changed the world. Follow the boy who lived as he navigates his first year at Hogwarts.', '656660ba38c20.jpg'),
(2, 'The Hobbit', 'Adventure', 'JRR Tolkien', 'Fantasy', 15, 'Bilbo Baggins is a hobbit who enjoys a comfortable, unambitious life, rarely traveling any farther than his pantry or cellar. But his contentment is disturbed when the wizard Gandalf and a company of dwarves arrive on his doorstep one day to whisk him away on an adventure.', 'the-hobbit-illustrated-by-alan-lee.jpg'),
(3, 'Game of Thrones', 'Adventure', 'GRR Martin', 'Fantasy', 14, 'In the mythical continent of Westeros, several powerful families fight for control of the Seven Kingdoms. As conflict erupts in the kingdoms of men, an ancient enemy rises once again to threaten them all. Meanwhile, the last heirs of a recently usurped dynasty plot to take back their homeland from across the Narrow Sea.', '9780553386790_p0_v6_s192x300.jpg'),
(4, 'Chronicles of Narnia: The Lion, the Witch and the Wardrobe', 'Adventure', 'CS Lewis', 'Fantasy', 10, 'Through the door and into the sprawling fantastical world of Narnia, full of satyrs, talking beavers, and umbrellas of questionable origins. Join Peter, Susan, Edmund, and Lucy as they look to save this new kingdom from a menacing evil. This classic tale, the most popular of the series, is not the first in the series (see The Magician’s Nephew) but it’s immediately readable.', 'MV5BN2ZmZDMzMmYtNzgzYy00OTBiLWI4ZTEtNWYzZmExODhkYmJlXkEyXkFqcGdeQXVyNTE1NjY5Mg@@._V1_.jpg'),
(5, '11/22/63', 'Sci-fi', 'Stephen King', 'Time Travel', 28, 'On November 22, 1963, three shots rang out in Dallas, President Kennedy died, and the world changed. What if you could change it back? This heart-stoppingly dramatic new novel is about a man who travels back in time to prevent the JFK assassination.', 'mB2sx0OPP0ejzH59bQhOfQ.jpg'),
(6, 'Outlander', 'Sci-fi', 'Diana Gabaldon', 'Time Travel', 17, 'After serving as a British Army nurse in World War II, Claire Randall is enjoying a second honeymoon in Scotland with husband Frank, an MI6 officer looking forward to a new career as an Oxford historian. Suddenly, Claire is transported to 1743 and into a mysterious world where her freedom and life are threatened.', 'outlander-11.jpg'),
(7, 'The Time Machine', 'Sci-fi', 'H.G. Wells', 'Time Travel', 12, 'The Time Machine, published in 1895 by British author H. G. Wells, is a science fiction novella that follows an unnamed narrator as he recounts the story of a time traveler who journeys to the year 802,701 AD. There, he encounters the Eloi and Morlocks, two divergent human species.', 'the-time-machine-274.jpg'),
(8, 'Doomsday Book', 'Sci-fi', 'Connie Willis', 'Time Travel', 18, 'Doomsday Book is set in mid-twenty-first-century England at the University of Oxford, where historians conduct field observations using time travel.', '91HjecLPP3L._AC_UF1000,1000_QL80_.jpg'),
(9, 'Marie Antoinette: The Journey', 'Biography', 'Antonia Fraser', 'Historical', 12, 'Marie Antoinette\'s dramatic life-story continues to arouse mixed emotions. To many people, she is still \'la reine méchante\', whose extravagance and frivolity helped to bring down the French monarchy; her indifference to popular suffering epitomised by the (apocryphal) words: \'let them eat cake\'. Others are equally passionate in her defence: to them, she is a victim of misogyny.', '41P8KK8TREL._AC_UF1000,1000_QL80_.jpg'),
(10, 'Alexander Hamilton', 'Biography', 'Ron Chernow', 'Historical', 12, '\'Alexander Hamilton\' by Ron Chernow is a biography that delves into the life of one of America\'s founding fathers. It explores his rise from poverty to becoming a leading politician and his pivotal role in shaping America\'s financial system.', 'alexander-hamilton-39.jpg'),
(11, 'Cleopatra: A Life', 'Biography', 'Stacy Schiff', 'Historical', 12, 'The book covers her family, her childhood, her education, her ability to charm and manipulate, her relationships with Julius Caesar and Mark Antony, the political climate in Rome and Alexandria, her death, and her enduring appeal. \"Among the most famous women to have lived, Cleopatra VII ruled Egypt for 22 years.', 'Cleopatra@2x.jpg'),
(12, 'Einstein: His Life and Universe', 'Biography', 'Walter Isaacson', 'Historical', 17, 'Einstein: His Life and Universe. It closely examines the life of Einstein, assembling numerous primary and secondary sources to explore the development of his his personality and scientific genius. At the same time, it casts him within the larger contexts of World War II, Jewish persecution, the popularization of quantum mechanics, and the invention of the atomic bomb.', '71M6EivDCnL._AC_UF1000,1000_QL80_.jpg'),
(13, 'Watchman', 'Other', 'Alan Moore', 'Comics', 12, 'A murder mystery-turned-nationwide conspiracy, WATCHMEN examines the lives of the eponymous superhero team as they seem to decay alongside the ever-darkening America around them. Rorschach, Nite Owl, the Silk Spectre, Dr. Manhattan and Ozymandias reunite to investigate who’s behind a teammate’s murder, but find that the truth may be even more grim than the world they seek to protect.', '61dR24v9eCL._AC_UF1000,1000_QL80_.jpg'),
(14, 'The Sandman', 'Other', 'Neil Gaiman', 'Comics', 12, 'An occultist attempting to capture the physical embodiment of Death to bargain for eternal life traps her younger brother Dream instead. After his seventy-year imprisonment and eventual escape, Dream, also known as Morpheus, goes on a quest for his lost objects of power to reclaim his reign. From there, one of the greatest series in the history of the graphic novel genre begins.', '81qjOno3wIL._AC_UF1000,1000_QL80_.jpg'),
(15, 'Bone', 'Other', 'Jeff Smith', 'Comics', 12, 'Three modern cartoon cousins get lost in a pre-technological valley, speanding a year there making new friends and out-running dangerous enemies. Their many adventures include crossing the local people in The Great Cow Race, and meeting a giant mountain lion called RockJaw: Master of the Eastern Border. They learn about sacrifice and hardship in The Ghost Circles and finally discover their own true natures in the climatic journey to The Crown of Horns.', '81JleckryOL._AC_UF1000,1000_QL80_.jpg'),
(16, 'MARVEL: Secret Warriors', 'Other', 'Jonathan H', 'Comics', 13, 'Nick Fury, former director of the now-defunct S.H.I.E.L.D, has gathered a special handpicked team. Young and untested, the Secret Warriors are the offspring of the most powerful forces on Earth — and with Fury’s guidance, they might just have what it takes to save the world.', '71rVrwVaQXL._AC_UF1000,1000_QL80_.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_categories1`
--

CREATE TABLE `sub_categories1` (
  `id` int(11) NOT NULL,
  `maincat_id` int(11) DEFAULT NULL,
  `subcat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `sub_categories1`
--

INSERT INTO `sub_categories1` (`id`, `maincat_id`, `subcat`) VALUES
(1, 1, 'Fantasy'),
(2, 1, 'Romance'),
(3, 1, 'Young Adult'),
(4, 1, 'Thriller'),
(5, 2, 'Time Travel'),
(6, 2, 'Aliens'),
(7, 2, 'Post-Apocalyptic'),
(8, 2, 'Cyberpunk'),
(9, 3, 'Historical'),
(10, 3, 'Academic'),
(11, 3, 'Memoir'),
(12, 3, 'Intellectual'),
(13, 4, 'Comics'),
(14, 4, 'Romance'),
(15, 4, 'Fiction'),
(16, 4, 'Non-fiction');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT 'user',
  `created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone_number`, `password`, `email`, `user_type`, `created`) VALUES
(1, 'Admin', 'Booknook', '123456789', '$2y$10$Vj9htlO4BMjyILlFC5jy4OX9GxINofnhg0kmeEtV/vRym4cufzfia', 'booknook@gmail.com', 'Admin', '1711318387'),
(2, 'Karen', 'Martins', '123123123', '$2y$10$bLdN09qyDR7YzkksVhusBuglrW9HhPJTUIo/z/LkfU0gZAhx3HY5y', 'karen@gmail.com', 'Customer', '1711399153');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categories1`
--
ALTER TABLE `categories1`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sub_categories1`
--
ALTER TABLE `sub_categories1`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categories1`
--
ALTER TABLE `categories1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `sub_categories1`
--
ALTER TABLE `sub_categories1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
