-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-12-16 10:52:41
-- 服务器版本： 5.5.53
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hzytql`
--

-- --------------------------------------------------------

--
-- 表的结构 `bbs_thread`
--

CREATE TABLE `bbs_thread` (
  `tid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `subject` char(200) NOT NULL,
  `time` int(11) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bbs_thread`
--

INSERT INTO `bbs_thread` (`tid`, `uid`, `subject`, `time`, `message`) VALUES
(1, 1, 'hzytql', 1544950064, 'hzytql'),
(2, 1, 'hzynb', 1544957140, 'hzytql'),
(3, 4, 'hzytqltql', 1544957356, 'tqltql'),
(4, 4, 'tqlb', 1544957406, '; 1=1');

-- --------------------------------------------------------

--
-- 表的结构 `bbs_user`
--

CREATE TABLE `bbs_user` (
  `uid` int(10) NOT NULL,
  `username` char(72) NOT NULL,
  `password` char(144) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bbs_user`
--

INSERT INTO `bbs_user` (`uid`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'hzytql', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'hzynb', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'hzy', 'e10adc3949ba59abbe56e057f20f883e'),
(5, '123', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bbs_thread`
--
ALTER TABLE `bbs_thread`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `bbs_user`
--
ALTER TABLE `bbs_user`
  ADD PRIMARY KEY (`uid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `bbs_thread`
--
ALTER TABLE `bbs_thread`
  MODIFY `tid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `bbs_user`
--
ALTER TABLE `bbs_user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
