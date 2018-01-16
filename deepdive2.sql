-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2017 at 04:06 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deepdive2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `adname` varchar(50) NOT NULL,
  `adusername` varchar(50) NOT NULL,
  `ademail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adname`, `adusername`, `ademail`, `password`) VALUES
(1, 'Tuhin', 'aumtuhin', 'aumtuhin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catid` int(11) NOT NULL,
  `catname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catid`, `catname`) VALUES
(1, 'Web Development'),
(2, 'App Development'),
(3, 'Photography'),
(4, 'Graphic Design'),
(5, 'Tips Tricks'),
(6, 'Wordpress');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `cmntdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentid`, `comment`, `postid`, `userid`, `cmntdate`) VALUES
(45, 'Hello world!!', 5, 14, '11-08-17'),
(46, '<script>alert("Hello world");</script>', 7, 15, '12-08-17'),
(47, 'ff', 6, 15, '12-08-17'),
(48, 'Hey', 5, 16, '15-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postid` int(11) NOT NULL,
  `posttitle` text NOT NULL,
  `catid` int(11) NOT NULL,
  `postdate` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `userid` int(11) NOT NULL,
  `tag1` varchar(50) DEFAULT NULL,
  `tag2` varchar(50) DEFAULT NULL,
  `tag3` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `posttitle`, `catid`, `postdate`, `description`, `userid`, `tag1`, `tag2`, `tag3`) VALUES
(5, 'Tags can only contain small letters and numbers. No space or special characters please. Min 4 and max 20 chars.', 1, '11-08-17', '<p><span style="color: #e74c3c; font-family: Raleway, sans-serif; font-size: 13px;">Tags can only contain small letters and numbers. No space or special characters please. Min 4 and max 20 chars.</span></p>', 14, '', '', ''),
(6, 'Hello world', 5, '12-08-17', '<p>Hello world!! this is awesome!!</p>', 15, 'Hello', 'Testing', ''),
(7, 'Hello world again!!', 1, '12-08-17', '<p>Post Description..</p>', 15, 'Test1', 'Test2', 'Test3');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tagid` int(11) NOT NULL,
  `tag1` varchar(80) NOT NULL,
  `tag2` varchar(80) NOT NULL,
  `tag3` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `institution` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `username`, `email`, `password`, `image`, `institution`) VALUES
(12, 'abu yusuf', 'abuyusuf101', 'abuyusuf@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL),
(14, 'Alamgir Jony', 'alamgirjony', 'jony@gmail.com', '7dbb151cc2f0ef198bf6c1b1bef7a4b8', 'user3.png', ''),
(15, 'Aylan Qurd', 'aumtuhin', 'aumtuhin@gmail.com', '7dbb151cc2f0ef198bf6c1b1bef7a4b8', '20160204_215304.jpg', ''),
(16, 'Au Yusuf ', 'abuyusuf', 'abuyusuf@gmail.com', 'd39059e1bfaf2776d3cca71e7b7fa204', 'Bald-baby-e1382547601684.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tagid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tagid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
