-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 02:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Python'),
(4, 'PHP'),
(5, 'JavaScript'),
(7, '.NET');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(19, 33, 'shad', 'shad@gmail.com', 'You are nice....', 'approved', '2021-09-02'),
(22, 34, 'Arfan', 'Arfan@arfan.com', 'This is the best..', 'approved', '2021-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(3) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(33, 4, 'PHP developer', '', 'Mridul Islam', '2021-09-01', 'php_logo.png', '<p>PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.</p>', 'PHP', 0, 'draft', 8),
(39, 4, 'SEO', '', 'Shad', '2021-09-06', 'seo-logo.jpg', '<p>SEO is very important for a application……</p>', 'SEO', 0, 'draft', 0),
(40, 4, 'SEO', '', 'Shad', '2021-09-06', 'seo-logo.jpg', '<p>SEO is very important for a application……</p>', 'SEO', 0, 'draft', 0),
(41, 4, 'PHP developer', '', 'Mridul Islam', '2021-09-06', 'php_logo.png', '<p>PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.</p>', 'PHP', 0, 'draft', 0),
(42, 4, 'PHP developer', '', 'Mridul Islam', '2021-09-06', 'php_logo.png', '<p>PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.</p>', 'PHP', 0, 'draft', 0),
(43, 4, 'SEO', '', 'Shad', '2021-09-06', 'seo-logo.jpg', '<p>SEO is very important for a application……</p>', 'SEO', 0, 'draft', 0),
(44, 4, 'SEO', '', 'Shad', '2021-09-06', 'seo-logo.jpg', '<p>SEO is very important for a application……</p>', 'SEO', 0, 'draft', 0),
(45, 4, 'PHP developer', '', 'Mridul Islam', '2021-09-06', 'php_logo.png', '<p>PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.</p>', 'PHP', 0, 'draft', 0),
(47, 4, 'SEO', '', 'Shad', '2021-09-06', 'seo-logo.jpg', '<p>SEO is very important for a application……</p>', 'SEO', 0, 'draft', 0),
(49, 4, 'PHP developer', '', 'Mridul Islam', '2021-09-06', 'php_logo.png', '<p>PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.</p>', 'PHP', 0, 'draft', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(17, 'Khalid bin walid', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'Khalid bin', 'Walid', 'Khalid@gmail.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22'),
(18, 'Md Omar Faruk', '$2y$12$joikZHetX.x2s.uY.oAh.O99pqaG1JuX8x1vO/O85VFzQMm8CV5WS', 'Md Omar', 'Faruk', 'Omar@gmail.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22'),
(27, 'Shad', '$2y$12$.6IRmYshqoAmKr7EP5b5ueuarCsJxAf4DzmEDPvLiLyjZ7Ai3LJNK', 'Shofiul', 'Alam', 'shad@gmail.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22'),
(31, 'Shamim', '$2y$12$Hq31CLj0By8DZjEcEqUjsOvQx.Sd.2nBt5KRxNUmpE2.HVJcGbydu', 'Shamim', 'Hossain', 'shamimMridha@shamim.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22'),
(34, 'Mridul Islam', '$2y$12$yvzHJseRTAK.nz17wv9zXusOa7hU8Hh5YDvKlJMCPFYUEcW26rEwu', 'Mridul', 'Islam', 'mridulIslam@gmail.com', '', 'Admin', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(5) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(24, 'ah6hsh89oovm3gdpq7i825r4fa', 1630236239),
(25, 'd4djd8icduqlmspuhptsndumec', 1630230184),
(26, '9dm1jcvfua3rrp0uv65964bcqs', 1630230192),
(27, 'fbkh9qnva0pv0k51d00bkj7mvc', 1630276952),
(28, '43bp62pn2hpdaujrcj251dss40', 1630415264),
(29, 'fn3ln9t2uddufi151qvl11m2q4', 1630437174),
(30, 'n4akakbmiqg7rdq62ebdsb1a6i', 1630498877),
(31, 'sir0cu7apfu3abk426nh9k1tns', 1630523123),
(32, 'vueuh490phd5diau6qkqa23750', 1630590013),
(33, 'jlmjotkm4ntbjanmutlonv3hfo', 1630613891),
(34, 'rjkqjpcgqacvp2o5aqlrnagvje', 1630742183),
(35, 'ks0sfbkq0p30buotqd6qjlpf5r', 1630852744),
(36, '6i6al5lrjat5cfa96p753n1doj', 1630868435),
(37, '1qbof37kvsgbuj37n9tiq2nasr', 1630931372);

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
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
