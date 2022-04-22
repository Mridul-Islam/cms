-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 07:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Java'),
(2, 'React'),
(3, 'Python'),
(5, 'Bangladesh'),
(6, 'Laravel'),
(7, 'Mountain'),
(8, 'Occean'),
(9, 'Bird'),
(10, 'PHP'),
(11, 'Nature');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(100) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(1, 5, 'Green Bangladesh', 'Mridul Islam', '2022-04-13', 'green-bangladesh.jpg', '<p>Bangladesh is very beautiful country…It has a many beautiful places..</p>', 'Bangladesh, Nature', 0, 'published', 24),
(3, 9, 'Peigon', 'Mridul Islam', '2022-04-22', 'peigon.jpg', '<p><strong>Columbidae</strong> is a bird <a href=\"https://en.wikipedia.org/wiki/Family_(biology)\">family</a> consisting of <strong>pigeons</strong> and <strong>doves</strong>. It is the only family in the <a href=\"https://en.wikipedia.org/wiki/Order_(biology)\">order</a> <strong>Columbiformes</strong>. These are stout-bodied birds with short necks and short slender bills that in some species feature fleshy <a href=\"https://en.wikipedia.org/wiki/Cere\">ceres</a>. They primarily feed on seeds, fruits, and plants. The family occurs worldwide, but the greatest variety is in the <a href=\"https://en.wikipedia.org/wiki/Indomalayan_realm\">Indomalayan</a> and <a href=\"https://en.wikipedia.org/wiki/Australasian_realm\">Australasian realms</a>.</p>', 'bird', 0, 'published', 2),
(4, 10, 'PHP Beginner Course', 'Mridul Islam', '2022-04-22', 'php-logo.jpg', '<p>PHP is a general-purpose scripting language geared toward web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.</p>', 'PHP', 0, 'published', 0),
(5, 6, 'Laravel Course', 'Mridul Islam', '2022-04-22', 'laravel-logo.jpg', '<p>Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller architectural pattern and based on Symfony</p>', 'Laravel', 0, 'published', 0),
(6, 8, 'Pacific occean', 'Mridul Islam', '2022-04-22', 'occean1.jpg', '<p>The <strong>Pacific Ocean</strong> is the largest and deepest of Earth\'s five oceanic divisions. It extends from the Arctic ocean in the north to the Southern Ocean (or, depending on definition, to ) in the south and is bounded by the continents of Asia and Australia in the west and the Americas in the east.</p><p>At 165,250,000 square kilometers (63,800,000 square miles) in area (as defined with a southern Antarctic border), this largest division of the —and, in turn, the —covers about 46% of Earth\'s water surface and about 32% of its total surface area, larger than Earth\'s entire land area combined (148,000,000&nbsp;km2&nbsp;[57,000,000&nbsp;sq&nbsp;mi]).<a href=\"https://en.wikipedia.org/wiki/Pacific_Ocean#cite_note-ebc-1\">[1]</a> The centers of both the and the &nbsp;are in the Pacific Ocean. Ocean circulation (caused by the ) subdivides it into two largely independent volumes of water, which meet at the : the <strong>North</strong>(<strong>ern</strong>) <strong>Pacific Ocean</strong> and <strong>South</strong>(<strong>ern</strong>) <strong>Pacific Ocean</strong>. The &nbsp;and , while straddling the , are deemed wholly within the South Pacific.</p>', 'Pacific, Occean', 0, 'published', 1),
(7, 8, 'Atlactic Ocean', 'Mridul Islam', '2022-04-22', 'occean3.jpg', '<p>The Atlantic Ocean is the second-largest of the world\'s five oceans, with an area of about 106,460,000 km². It covers approximately 20% of Earth\'s surface and about 29% of its water surface area. The <i><strong>Atlantic Ocean</strong></i> is the second-largest of the world\'s five oceans, with an area of about 106,460,000 km2 (41,100,000 sq mi). It covers approximately 20%&nbsp;...</p>', 'Atlantic, Ocean', 0, 'published', 0),
(8, 7, 'Mount Everest', 'Mridul Islam', '2022-04-22', 'mountain3.jpg', '<p>Mount Everest is Earth\'s highest mountain above sea level, located in the Mahalangur Himal sub-range of the Himalayas. The China–Nepal border runs across its summit point. Its elevation of 8,848.86 m was most recently established in 2020 by the Chinese and Nepali authorities. Mount <i><strong>Everest</strong></i> is Earth\'s highest mountain above sea level, located in the Mahalangur Himal sub-range of the Himalayas. The China–Nepal border runs across&nbsp;...</p>', 'Averest', 0, 'published', 0),
(9, 7, 'Mount Elbrus', 'Mridul Islam', '2022-04-22', 'mountain2.jpg', '<p>Mount Elbrus is the highest and most prominent peak in Russia and Europe. It is situated in the western part of the Caucasus and is the highest peak of the</p><p>It is situated in the western part of the Caucasus and is the highest peak of the Caucasus Mountains. The dormant volcano rises 5,642 m (18,510 ft) above sea&nbsp;...</p><p>First ascent: (West summit) 1874, by <a href=\"http://en.wikipedia.org/wiki/Florence_Crauford_Grove\">Florence ...</a>‎</p><p>Country: Russia</p><p>Topo map: Elbrus and Upper Baksan Valley by ...</p><p>Elevation: <a href=\"http://en.wikipedia.org/wiki/Mount_Elbrus\">5</a>,642 m (18,510 ft)‎</p>', 'Alps', 0, 'published', 0),
(10, 11, 'Amazing Kashmir', 'Mridul Islam', '2022-04-22', 'nature3.jpg', '<p>Jammu and Kashmir is a region administered by India as a union territory and consisting of the southern portion of the larger Kashmir region, which has been the subject of a dispute between India and Pakistan since 1947, and between India and China since 1962. <i><strong>Kashmir</strong></i> is the northernmost geographical region of the Indian subcontinent. Until the mid-19th century, the term \"<i><strong>Kashmir</strong></i>\" denoted only the <i><strong>Kashmir</strong></i> Valley&nbsp;...Jammu and <i><strong>Kashmir</strong></i> is a region administered by India as a union territory and consisting of the southern portion of the larger <i><strong>Kashmir</strong></i> region, which has been&nbsp;...</p>', 'Kashmir', 0, 'published', 0),
(11, 11, 'Manali Views', 'Mridul Islam', '2022-04-22', 'manali1.jpg', '<p>Manali is a high-altitude Himalayan resort town in India’s northern Himachal Pradesh state. It has a reputation as a backpacking center and honeymoon destination. Set on the Beas River, it’s a gateway for skiing in the Solang Valley and trekking in Parvati Valley. It\'s also a jumping-off point for paragliding, rafting and mountaineering in the Pir Panjal mountains, home to 4,000m-high Rohtang Pass. ―&nbsp;Google One of the most popular hill stations in Himachal, <i><strong>Manali</strong></i> offers the most magnificent views of the Pir Panjal and the Dhauladhar ranges covered with snow&nbsp;...<i><strong>Manali</strong></i> is a town in the Indian state of Himachal Pradesh. It is situated in the northern end of the Kullu Valley, formed by the Beas River.</p>', 'Manali', 0, 'published', 0),
(12, 11, 'Kullu manali', 'Mridul Islam', '2022-04-22', 'manali2.jpg', '<p>Kullu is a municipal council town that serves as the administrative headquarters of the Kullu district of the Indian state of Himachal Pradesh. It is located on the banks of the Beas River in the Kullu Valley about 10 kilometres north of the airport at Bhunta <i><strong>Kullu</strong></i> is a municipal council town that serves as the administrative headquarters of the <i><strong>Kullu</strong></i> district of the Indian state of Himachal Pradesh.</p>', 'kullu, manali', 0, 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'Mridul Islam', '$2y$12$kVksdlsZC9jf7vaijQPpuuUpKC/5itQ.ZOEZFmNDGTC4KfZiqanW6', 'Mridul ', 'Islam', 'md.mridulislam12345@gmail.com', '', 'Admin', '$2y$10$iusesomecrazystrings22	'),
(2, 'Showrab', '$2y$10$2FZWd2shKty3P/LNQGm6l.XSWkNu35hpIHe9k3/7rsO32espQtJPO', 'Showrab', 'Ahmed', 'Showrab@gmail.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22	'),
(3, 'Mahadi Hasan', '$2y$10$2cQSUunAJH6gr4oPZiNAoOcdjzM2GCzm3AKc1hUKRVQ6iR/AZ7IzS', 'Mahadi', 'Hasan', 'mahadihasan@gmail.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22	'),
(4, 'Shad', '$2y$10$1cY3M76FV8HB.Of6E/AUBOiK1EIG3QOWaQp4nqvKTh6wA8wJfUoie', 'Shofiul ', 'Alam', 'ShofiulAlamShad@gmail.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22	'),
(5, 'Azizul Haq', '$2y$10$zbGJNlN2.Lkjg8QMPqt5aewK0wmSZaHo6mZ2N31QabFbKe.DE7Ne.', 'Azizul', 'Haq', 'AzizulHaq@gmail.com', '', 'Admin', '$2y$10$iusesomecrazystrings22	');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'o85oig415dse3j1p5f4mh6ek3h', 1649873993),
(2, 'cf98ltujaclq6pl68bdtbhv1hk', 1650647980);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
