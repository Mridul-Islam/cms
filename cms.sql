-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2021 at 09:47 AM
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
(6, 'HTML'),
(7, '.NET'),
(8, 'IOS');

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
(1, 1, 'shad', 'shad@gmail.com', 'This is good...', 'approved', '2021-08-19'),
(2, 1, 'Aziz', 'Aziz@gmail.com', 'Wow, your are so good....', 'approved', '2021-08-19'),
(3, 1, 'Arfan', 'Arfan@arfan.com', 'ok, this is nice...', 'unapproved', '2021-08-19'),
(4, 1, 'Srijon', 'srijon@srijon.com', 'You are hot', 'approved', '2021-08-19'),
(5, 3, 'Srijon', 'srijon@srijon.com', 'how nice is that......', 'approved', '2021-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
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

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(5, 5, 'Welcome to vue.js', 'Shad', '2021-08-21', 'vue.js-logo.png', '<p>Vue (pronounced /vjuː/, like <strong>view</strong>) is a <strong>progressive framework</strong> for building user interfaces. Unlike other monolithic frameworks, Vue is designed from the ground up to be incrementally adoptable. The core library is focused on the view layer only, and is easy to pick up and integrate with other libraries or existing projects. On the other hand, Vue is also perfectly capable of powering sophisticated Single-Page Applications when used in combination with <a href=\"https://vuejs.org/v2/guide/single-file-components.html\"><strong>modern tooling</strong></a> and <a href=\"https://github.com/vuejs/awesome-vue#components--libraries\"><strong>supporting libraries</strong></a>.</p>', 'Vue,js', 0, 'published', 0),
(6, 5, 'React Course', 'Azizul Haq', '2021-08-21', 'react_logo.png', '<p>We will build a small game during this tutorial. <strong>You might be tempted to skip it because you’re not building games — but give it a chance.</strong> The techniques you’ll learn in the tutorial are fundamental to building any React app, and mastering it will give you a deep understanding of React.</p>', 'React', 0, 'published', 7),
(8, 4, 'PHP developer', 'Shamim Hossain', '2021-08-21', 'php_logo.png', '<p>PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.</p><p>PHP is a widely-used, free, and efficient alternative to competitors such as Microsofts ASP.</p>', 'PHP', 0, 'published', 0),
(9, 4, 'IOS tutorial', 'Showrab Ahmed', '2021-08-21', 'iOS-Logo-2010.jpg', '<p>iOS&nbsp;14 brings a fresh look to the things you do most often, making them easier than ever. New features help you get what you need in the moment. And the apps you use all the time become even more intelligent, more personal, and more&nbsp;private.</p>', 'Apple', 0, 'published', 0),
(11, 4, 'PHP developer', 'Ragib Ibne', '2021-08-21', 'oop_logo.jpg', '<p>OOP stands for Object-Oriented Programming.</p><p>Procedural programming is about writing procedures or functions that perform operations on the data, while object-oriented programming is about creating objects that contain both data and functions.</p><p>Object-oriented programming has several advantages over procedural programming:</p><ul><li>OOP is faster and easier to execute</li><li>OOP provides a clear structure for the programs</li><li>OOP helps to keep the PHP code DRY \"Dont Repeat Yourself\", and makes the code easier to maintain, modify and debug</li><li>OOP makes it possible to create full reusable applications with less code and shorter development time</li></ul>', 'PHP ', 0, 'published', 0),
(12, 6, 'Bootstrap course', 'Ninad', '2021-08-21', 'bootstrap-logo.png', '<p>Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>', 'Bootstrap', 1, 'published', 0),
(16, 5, 'Flutter Development', 'Mridul Islam', '2021-08-24', 'Flutter-logo.png', '<p>Flutter is Googles UI toolkit for building beautiful, natively compiled applications for <a href=\"https://flutter.dev/docs\">mobile</a>, <a href=\"https://flutter.dev/web\">web</a>, <a href=\"https://flutter.dev/desktop\">desktop</a>, and <a href=\"https://flutter.dev/embedded\">embedded</a> devices from a single codebase.</p>', 'Flutter', 0, 'published', 0),
(17, 5, 'Angular.js Tutorial', 'Mridul Islam', '2021-08-25', 'AngularJS_logo.svg.png', '<p>Angular.js is a very good frontend technology</p>', 'Angular', 0, 'published', 0),
(18, 2, 'Python Tutorial', 'Shagor', '2021-08-25', 'Python_logo_and_wordmark.svg.png', '<p>Python is very easy to learn………</p>', 'Python', 0, 'published', 0),
(22, 8, 'IOS tutorial', 'Arfan', '2021-08-27', 'iOS-Logo-2010.jpg', '<p>iOS&nbsp;14 brings a fresh look to the things you do most often, making them easier than ever. New features help you get what you need in the moment. And the apps you use all the time become even more intelligent, more personal, and more&nbsp;private.</p><p><br>&nbsp;</p>', 'IOS', 0, 'published', 0),
(23, 5, 'React Course', 'Shad', '2021-08-27', 'react_logo.png', '<p>React makes it painless to create interactive UIs. Design simple views for each state in your application, and React will efficiently update and render just the right components when your data changes.</p>', 'React', 0, 'published', 0),
(24, 5, 'React Native', 'Shohan', '2021-08-27', 'react-native-logo.jpg', '<p>React Native combines the best parts of native development with React, a best-in-class JavaScript library for building user interfaces.<br><br><strong>Use a little—or a lot</strong>. You can use React Native today in your existing Android and iOS projects or you can create a whole new app from scratch.</p>', 'React Native', 0, 'published', 0),
(25, 5, 'React Course', 'Shad', '2021-08-28', 'react_logo.png', '<p>React makes it painless to create interactive UIs. Design simple views for each state in your application, and React will efficiently update and render just the right components when your data changes.</p>', 'React', 0, 'published', 0),
(26, 8, 'IOS tutorial', 'Arfan', '2021-08-28', 'iOS-Logo-2010.jpg', '<p>iOS&nbsp;14 brings a fresh look to the things you do most often, making them easier than ever. New features help you get what you need in the moment. And the apps you use all the time become even more intelligent, more personal, and more&nbsp;private.</p><p><br>&nbsp;</p>', 'IOS', 0, 'published', 0),
(27, 5, 'Flutter Development', 'Mridul Islam', '2021-08-28', 'Flutter-logo.png', '<p>Flutter is Googles UI toolkit for building beautiful, natively compiled applications for <a href=\"https://flutter.dev/docs\">mobile</a>, <a href=\"https://flutter.dev/web\">web</a>, <a href=\"https://flutter.dev/desktop\">desktop</a>, and <a href=\"https://flutter.dev/embedded\">embedded</a> devices from a single codebase.</p>', 'Flutter', 0, 'published', 0),
(28, 6, 'Bootstrap course', 'Ninad', '2021-08-28', 'bootstrap-logo.png', '<p>Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>', 'Bootstrap', 0, 'published', 0);

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
(13, 'Mahadi Hasan', '$1$YsFxNv5j$8LYJYJBwPlnBgSsQ/Mgk2/', 'Mahadi', 'Hasan', 'MahadiHasan@gmail.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22'),
(16, 'Mamunul haq', '$1$HSG/Hytw$gXbT6re8esjYKF2SgFFxE.', 'Mamunul', 'Haq', 'Mamun@gmail.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22'),
(17, 'Khalid bin walid', '$1$WEjqtdyP$bZ5ZnDJOQg2zlACaRwKff/', 'Khalid bin', 'Walid', 'Khalid@gmail.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22'),
(18, 'Md Omar Faruk', '$1$1FTcWzke$14r24vRaB4u3Rc2rGcdUw1', 'Md Omar', 'Faruk', 'Omar@gmail.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22'),
(19, 'Mridul Islam', '$1$80v1ifp4$M0t.JhP6wLwXcUMOOShAu/', 'Mridul ', 'Islam', 'Mridul@gmail.com', '', 'Admin', '$2y$10$iusesomecrazystrings22');

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
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
