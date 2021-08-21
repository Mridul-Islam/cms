-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2021 at 02:43 PM
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
(3, 'Java'),
(4, 'PHP'),
(5, 'JavaScript'),
(6, 'HTML'),
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
(1, 1, 'shad', 'shad@gmail.com', 'This is good...', 'approved', '2021-08-19'),
(2, 1, 'Aziz', 'Aziz@gmail.com', 'Wow, your are so good....', 'approved', '2021-08-19'),
(3, 1, 'Arfan', 'Arfan@arfan.com', 'ok, this is nice...', 'unapproved', '2021-08-19'),
(4, 1, 'Srijon', 'srijon@srijon.com', 'You are hot', 'unapproved', '2021-08-19'),
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
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 5, 'Angular.js Tutorial', 'Mridul Islam', '2021-08-21', 'AngularJS_logo.svg.png', '<p>Angular.js is a very good frontend technology</p>', 'Angular', 4, 'published'),
(4, 2, 'Python Tutorial', 'Shagor', '2021-08-20', 'Python_logo_and_wordmark.svg.png', '<p>Python is very easy to learn………</p>', 'Python', 0, 'draft'),
(5, 5, 'Welcome to vue.js', 'Shad', '2021-08-21', 'vue.js-logo.png', '<p>Vue (pronounced /vjuː/, like <strong>view</strong>) is a <strong>progressive framework</strong> for building user interfaces. Unlike other monolithic frameworks, Vue is designed from the ground up to be incrementally adoptable. The core library is focused on the view layer only, and is easy to pick up and integrate with other libraries or existing projects. On the other hand, Vue is also perfectly capable of powering sophisticated Single-Page Applications when used in combination with <a href=\"https://vuejs.org/v2/guide/single-file-components.html\"><strong>modern tooling</strong></a> and <a href=\"https://github.com/vuejs/awesome-vue#components--libraries\"><strong>supporting libraries</strong></a>.</p>', 'Vue,js', 0, 'published'),
(6, 5, 'React Course', 'Azizul Haq', '2021-08-21', 'react_logo.png', '<p>We will build a small game during this tutorial. <strong>You might be tempted to skip it because you’re not building games — but give it a chance.</strong> The techniques you’ll learn in the tutorial are fundamental to building any React app, and mastering it will give you a deep understanding of React.</p>', 'React', 0, 'published'),
(7, 7, 'ASP.Net Core Tutorial', 'Arfan', '2021-08-21', 'NET_Core_Logo.png', '<p>ASP.NET Core is a cross-platform, high-performance, <a href=\"https://github.com/dotnet/aspnetcore\">open-source</a> framework for building modern, cloud-enabled, Internet-connected apps. With ASP.NET Core, you can:</p><ul><li>Build web apps and services, <a href=\"https://www.microsoft.com/internet-of-things/\">Internet of Things (IoT)</a> apps, and mobile backends.</li><li>Use your favorite development tools on Windows, macOS, and Linux.</li><li>Deploy to the cloud or on-premises.</li><li>Run on <a href=\"https://docs.microsoft.com/en-us/dotnet/core/introduction\">.NET Core</a>.</li></ul>', 'ASP.Net Core', 0, 'draft'),
(8, 4, 'PHP developer', 'Shamim Hossain', '2021-08-21', 'php_logo.png', '<p>PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.</p><p>PHP is a widely-used, free, and efficient alternative to competitors such as Microsofts ASP.</p>', 'PHP', 0, 'published'),
(9, 4, 'IOS tutorial', 'Showrab Ahmed', '2021-08-21', 'iOS-Logo-2010.jpg', '<p>iOS&nbsp;14 brings a fresh look to the things you do most often, making them easier than ever. New features help you get what you need in the moment. And the apps you use all the time become even more intelligent, more personal, and more&nbsp;private.</p>', 'Apple', 0, 'draft'),
(10, 4, 'Best OOP course', 'Shahriar', '2021-08-21', 'php-oop logo.png', '<p>OOP stands for Object-Oriented Programming.</p><p>Procedural programming is about writing procedures or functions that perform operations on the data, while object-oriented programming is about creating objects that contain both data and functions.</p><p>Object-oriented programming has several advantages over procedural programming:</p><ul><li>OOP is faster and easier to execute</li><li>OOP provides a clear structure for the programs</li><li>OOP helps to keep the PHP code DRY \"Dont Repeat Yourself\", and makes the code easier to maintain, modify and debug</li><li>OOP makes it possible to create full reusable applications with less code and shorter development time</li></ul>', 'PHP OOP', 0, 'published'),
(11, 4, 'PHP developer', 'Ragib Ibne', '2021-08-21', 'oop_logo.jpg', '<p>OOP stands for Object-Oriented Programming.</p><p>Procedural programming is about writing procedures or functions that perform operations on the data, while object-oriented programming is about creating objects that contain both data and functions.</p><p>Object-oriented programming has several advantages over procedural programming:</p><ul><li>OOP is faster and easier to execute</li><li>OOP provides a clear structure for the programs</li><li>OOP helps to keep the PHP code DRY \"Dont Repeat Yourself\", and makes the code easier to maintain, modify and debug</li><li>OOP makes it possible to create full reusable applications with less code and shorter development time</li></ul>', 'PHP ', 0, 'published'),
(12, 6, 'Bootstrap course', 'Ninad', '2021-08-21', 'bootstrap-logo.png', '<p>Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>', 'Bootstrap', 0, 'published'),
(13, 5, 'Android tutorial', 'Ashik', '2021-08-21', 'android-logo.png', '<p>Quickly design and customize responsive mobile-first sites with Bootstrap, the worlds most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>', 'Android', 0, 'published'),
(14, 7, '.Net Mvc Course', 'Rahobar', '2021-08-21', 'asp-net-mvc-logo-.jpg', '<p>ASP.NET MVC is a web application framework developed by Microsoft that implements the model–view–controller pattern. It is no longer in active development. It is open-source software, apart from the ASP.NET Web Forms component, which is proprietary</p>', '.NET MVC', 0, 'published'),
(15, 7, 'ASP .Net Mvc Course', 'Robin Hood', '2021-08-21', 'asp.net-mvc-logo.jpg', '<p>ASP.NET MVC is a web application framework developed by Microsoft that implements the model–view–controller pattern. It is no longer in active development. It is open-source software, apart from the ASP.NET Web Forms component, which is proprietary.</p>', 'ASP .NET MVC', 0, 'published');

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
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'Mridul Islam', '123', 'Mridul', 'Islam', 'mridul@mridul.com', '', 'Admin', ''),
(2, 'Shamim Mridha', '123', 'Shamim', 'Hossain', 'shamimMridha@shamim.com', '', 'Subscriber', ''),
(3, 'Aziz120', '123', 'Azizul ', 'Haq', 'Aziz@gmail.com', '', 'Subscriber', ''),
(4, 'Arfan Uddin', '123', 'Arfan', 'uddin', 'Arfan@gmail.com', '', 'Subscriber', ''),
(5, 'Showrab', '123', 'Showrab', 'Ahmed', 'Showrab@gmail.com', '', 'Subscriber', ''),
(6, 'Pranto', '123', 'Ragin', 'Ibne Hossain', 'RaginIbne@gmail.com', '', 'Subscriber', ''),
(7, 'Shah Alam', '123', 'Shah ', 'Alam', 'ShalAlam@gmail.com', '', 'Subscriber', ''),
(8, 'Shakil ', '123', 'Shakil ', 'Ahmed', 'Shakil@gmail.com', '', 'Subscriber', ''),
(10, 'Biplob', '123', 'Biplob', 'Ahmed', 'Biplob@gmail.com', '', 'Subscriber', ''),
(11, 'Shagor Mosta', '123', 'Shagor', 'Mostafa', 'ShagorMosta@gmail.com', '', 'Subscriber', '');

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
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
