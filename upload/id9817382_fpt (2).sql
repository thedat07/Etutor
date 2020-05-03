-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 09:44 AM
-- Server version: 10.4.11-MariaDB
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
-- Database: `id9817382_fpt`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `id_Trainer` int(255) NOT NULL,
  `id_Course_manager` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `id_Trainer`, `id_Course_manager`) VALUES
(2, 'IT', 3, 2),
(5, 'GCH89', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `class_student`
--

CREATE TABLE `class_student` (
  `id` int(11) NOT NULL,
  `class_id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_student`
--

INSERT INTO `class_student` (`id`, `class_id`, `student_id`) VALUES
(60, 2, 30),
(70, 2, 35),
(123, 2, 37),
(124, 2, 36),
(145, 2, 40),
(156, 5, 30),
(157, 5, 35),
(161, 5, 36),
(162, 5, 37),
(163, 5, 40),
(164, 5, 42);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_document` int(255) NOT NULL,
  `id_class` int(255) NOT NULL,
  `id_trainer` int(255) NOT NULL,
  `id_comment` int(255) NOT NULL,
  `Content` char(255) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `Document` varchar(255) NOT NULL,
  `id_trainee` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_document`, `id_class`, `id_trainer`, `id_comment`, `Content`, `Time`, `Document`, `id_trainee`, `Name`) VALUES
(103, 2, 0, 21, 'Gui bai\r\n				', '2020-03-18 09:05:03', 'codester-7544-advance-comment-system-php-script (1).zip', 30, 'Student'),
(103, 2, 3, 22, 'tra bai\r\n				', '2020-03-18 09:05:26', 'codester-7544-advance-comment-system-php-script (1).zip', 30, 'Permision'),
(103, 2, 0, 23, 'dat		', '2020-03-24 03:39:11', 'New Piskel (2)-1.png.png', 30, 'Student'),
(103, 2, 3, 24, 'info\r\n					', '2020-04-20 17:55:22', '', 30, 'Permision'),
(103, 2, 0, 25, 'This is my file\r\n  					', '2020-04-20 19:09:29', 'project.png', 36, 'Student'),
(104, 5, 0, 26, 'Meet document\r\n  					', '2020-04-24 15:43:00', 'Sprint backlog.xlsx', 30, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `courses_categories_manager`
--

CREATE TABLE `courses_categories_manager` (
  `id_Courses_categories` int(255) NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `descriptions_Courses_categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_categories_manager`
--

INSERT INTO `courses_categories_manager` (`id_Courses_categories`, `name_category`, `descriptions_Courses_categories`) VALUES
(2, 'IT', 'Learn about IT very good'),
(3, 'Computing', 'This is Computing courses category and everyone can join');

-- --------------------------------------------------------

--
-- Table structure for table `course_manager`
--

CREATE TABLE `course_manager` (
  `id_Course_manager` int(255) NOT NULL,
  `id_Courses_categories` int(255) NOT NULL,
  `name_Courses` varchar(255) NOT NULL,
  `descriptions_Courses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_manager`
--

INSERT INTO `course_manager` (`id_Course_manager`, `id_Courses_categories`, `name_Courses`, `descriptions_Courses`) VALUES
(2, 2, 'Security', 'Security is very popular'),
(3, 3, 'Website design', 'This is an advanced course');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `Id` int(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Id_class` varchar(255) NOT NULL,
  `Document` varchar(255) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_trainer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`Id`, `Title`, `Content`, `Id_class`, `Document`, `Time`, `id_trainer`) VALUES
(103, '121', 'info\r\n            ', '2', 'feature-live-preview.gif', '2020-03-17 10:12:28', 0),
(104, 'meeting log', 'information exchange\r\n              ', '5', 'Sprint Planning.docx', '2020-04-03 16:29:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `id_Trainer` int(255) NOT NULL,
  `id_Trainee` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`, `id_Trainer`, `id_Trainee`) VALUES
(11, 'asdas', '2020-04-16 00:00:00', '2020-04-17 00:00:00', 0, 0),
(12, 'asdas', '2020-04-08 00:00:00', '2020-04-09 00:00:00', 0, 0),
(18, 'dat', '2020-04-04 10:30:00', '2020-04-04 11:00:00', 3, 32),
(25, 'Coding challenge', '2020-03-30 00:00:00', '2020-03-31 00:00:00', 3, 40),
(26, 'Coding challenge', '2020-03-30 00:00:00', '2020-03-31 00:00:00', 3, 36),
(28, 'information exchange', '2020-04-10 00:00:00', '2020-04-11 00:00:00', 3, 30),
(29, 'Problem solving', '2020-04-09 00:00:00', '2020-04-10 00:00:00', 3, 30);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_Trainee` int(11) NOT NULL,
  `id_Class` int(11) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_Trainer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_Trainee`, `id_Class`, `Time`, `id_Trainer`) VALUES
(30, 2, '2020-04-06 05:49:35', 0),
(37, 2, '2020-04-06 05:49:47', 0),
(0, 2, '2020-04-06 09:24:28', 3),
(38, 2, '2020-04-08 02:48:31', 0),
(38, 2, '2020-04-08 02:48:39', 0),
(38, 2, '2020-04-08 02:49:40', 0),
(38, 2, '2020-04-08 02:49:48', 0),
(38, 2, '2020-04-08 02:49:50', 0),
(0, 2, '2020-04-08 02:50:44', 3),
(0, 2, '2020-04-08 02:50:47', 3),
(0, 2, '2020-04-08 02:50:53', 3),
(0, 2, '2020-04-08 02:50:55', 3),
(0, 2, '2020-04-08 02:53:06', 3),
(0, 2, '2020-04-08 02:53:09', 3),
(0, 2, '2020-04-08 06:56:17', 3),
(30, 2, '2020-04-08 07:01:40', 0),
(30, 2, '2020-04-08 07:02:04', 0),
(30, 2, '2020-04-08 07:08:12', 0),
(30, 2, '2020-04-08 07:08:28', 0),
(30, 2, '2020-04-08 07:09:28', 0),
(30, 2, '2020-04-08 07:09:30', 0),
(30, 2, '2020-04-08 07:09:30', 0),
(30, 2, '2020-04-08 07:09:47', 0),
(30, 2, '2020-04-08 07:09:48', 0),
(30, 2, '2020-04-08 07:10:12', 0),
(30, 2, '2020-04-08 07:11:32', 0),
(30, 2, '2020-04-08 07:11:36', 0),
(30, 2, '2020-04-08 07:11:38', 0),
(30, 2, '2020-04-08 07:14:57', 0),
(30, 2, '2020-04-08 07:15:03', 0),
(30, 2, '2020-04-08 07:39:24', 0),
(30, 2, '2020-04-08 07:46:53', 0),
(30, 2, '2020-04-08 07:46:56', 0),
(30, 2, '2020-04-08 07:57:07', 0),
(30, 2, '2020-04-08 07:57:13', 0),
(30, 2, '2020-04-08 08:00:05', 0),
(30, 2, '2020-04-08 08:26:53', 0),
(30, 2, '2020-04-08 08:26:57', 0),
(30, 2, '2020-04-08 08:27:01', 0),
(30, 2, '2020-04-08 08:27:06', 0),
(30, 2, '2020-04-08 08:27:10', 0),
(0, 2, '2020-04-08 08:32:18', 3),
(0, 2, '2020-04-08 08:32:34', 3),
(0, 2, '2020-04-08 08:32:41', 3),
(0, 2, '2020-04-08 08:32:49', 3),
(0, 2, '2020-04-08 08:34:14', 3),
(0, 2, '2020-04-08 08:36:17', 3),
(0, 2, '2020-04-08 08:36:49', 3),
(0, 2, '2020-04-08 08:36:54', 3),
(0, 2, '2020-04-08 08:37:21', 3),
(0, 2, '2020-04-08 08:43:18', 3),
(0, 3, '2020-04-08 08:47:57', 3),
(0, 2, '2020-04-08 08:48:01', 3),
(0, 2, '2020-04-08 08:48:04', 3),
(0, 2, '2020-04-08 08:48:06', 3),
(0, 2, '2020-04-08 08:48:15', 3),
(0, 2, '2020-04-08 08:51:59', 3),
(0, 2, '2020-04-08 08:57:18', 3),
(0, 2, '2020-04-08 08:57:21', 3),
(0, 2, '2020-04-08 08:57:26', 3),
(30, 2, '2020-04-08 08:57:56', 0),
(30, 2, '2020-04-08 08:58:50', 0),
(30, 2, '2020-04-08 08:58:57', 0),
(0, 2, '2020-04-08 14:00:18', 3),
(0, 2, '2020-04-08 14:00:22', 3),
(0, 2, '2020-04-09 04:42:31', 3),
(0, 2, '2020-04-09 04:42:35', 3),
(0, 2, '2020-04-09 04:42:37', 3),
(0, 2, '2020-04-09 04:42:38', 3),
(0, 2, '2020-04-09 04:42:44', 3),
(37, 2, '2020-04-14 02:53:36', 0),
(37, 2, '2020-04-14 02:53:41', 0),
(37, 2, '2020-04-14 02:53:46', 0),
(0, 2, '2020-04-14 03:25:50', 3),
(0, 2, '2020-04-14 03:32:01', 3),
(0, 0, '2020-04-14 03:38:40', 3),
(0, 0, '2020-04-14 03:38:42', 3),
(0, 0, '2020-04-14 03:38:46', 3),
(0, 0, '2020-04-14 03:38:51', 3),
(0, 0, '2020-04-14 03:39:05', 3),
(0, 0, '2020-04-14 03:39:19', 3),
(0, 0, '2020-04-14 03:40:15', 3),
(30, 2, '2020-04-14 03:54:40', 0),
(30, 2, '2020-04-14 03:54:53', 0),
(30, 2, '2020-04-14 04:00:48', 0),
(30, 2, '2020-04-14 04:00:51', 0),
(30, 2, '2020-04-14 04:01:17', 0),
(30, 2, '2020-04-14 04:01:23', 0),
(30, 2, '2020-04-14 04:01:25', 0),
(30, 2, '2020-04-14 04:01:32', 0),
(30, 2, '2020-04-14 04:52:57', 0),
(30, 2, '2020-04-14 04:54:21', 0),
(30, 2, '2020-04-14 04:54:24', 0),
(30, 2, '2020-04-14 04:54:31', 0),
(30, 2, '2020-04-14 05:07:55', 0),
(30, 2, '2020-04-14 05:08:59', 0),
(30, 2, '2020-04-14 05:09:03', 0),
(30, 2, '2020-04-14 05:09:11', 0),
(30, 2, '2020-04-14 05:09:13', 0),
(30, 2, '2020-04-14 05:09:16', 0),
(30, 2, '2020-04-14 05:09:33', 0),
(30, 2, '2020-04-14 05:09:58', 0),
(30, 2, '2020-04-14 05:10:02', 0),
(30, 2, '2020-04-14 05:10:04', 0),
(30, 2, '2020-04-14 06:09:26', 0),
(30, 2, '2020-04-14 06:09:33', 0),
(30, 2, '2020-04-14 06:09:37', 0),
(30, 2, '2020-04-14 06:09:40', 0),
(30, 2, '2020-04-14 06:09:45', 0),
(30, 2, '2020-04-14 06:11:21', 0),
(30, 2, '2020-04-14 06:11:57', 0),
(30, 2, '2020-04-14 06:12:32', 0),
(30, 2, '2020-04-14 06:12:35', 0),
(30, 2, '2020-04-14 06:12:39', 0),
(30, 2, '2020-04-14 06:19:50', 0),
(30, 2, '2020-04-14 06:27:10', 0),
(30, 2, '2020-04-14 06:28:05', 0),
(30, 2, '2020-04-14 06:28:39', 0),
(30, 2, '2020-04-14 06:28:40', 0),
(30, 2, '2020-04-14 06:28:41', 0),
(30, 2, '2020-04-14 06:28:54', 0),
(30, 2, '2020-04-14 06:28:58', 0),
(30, 2, '2020-04-14 06:53:38', 0),
(30, 2, '2020-04-14 06:54:43', 0),
(30, 2, '2020-04-14 06:58:41', 0),
(30, 2, '2020-04-14 07:01:27', 0),
(30, 2, '2020-04-14 07:11:29', 0),
(0, 2, '2020-04-14 07:41:06', 3),
(0, 2, '2020-04-14 07:41:55', 3),
(0, 2, '2020-04-14 07:42:02', 3),
(0, 2, '2020-04-14 07:42:33', 3),
(0, 2, '2020-04-14 07:42:41', 3),
(0, 2, '2020-04-14 07:45:04', 3),
(0, 2, '2020-04-14 07:45:22', 3),
(0, 2, '2020-04-14 07:45:29', 3),
(0, 2, '2020-04-14 07:45:31', 3),
(0, 2, '2020-04-14 07:45:38', 3),
(0, 2, '2020-04-14 07:45:43', 3),
(0, 2, '2020-04-14 07:46:58', 3),
(30, 2, '2020-04-14 07:49:10', 0),
(30, 2, '2020-04-14 07:49:29', 0),
(30, 2, '2020-04-14 07:49:32', 0),
(30, 2, '2020-04-14 07:49:35', 0),
(30, 2, '2020-04-14 08:21:36', 0),
(30, 2, '2020-04-14 08:21:49', 0),
(30, 2, '2020-04-14 08:22:59', 0),
(30, 2, '2020-04-14 08:24:04', 0),
(30, 2, '2020-04-14 08:24:29', 0),
(30, 2, '2020-04-14 08:26:33', 0),
(30, 2, '2020-04-14 08:29:49', 0),
(30, 2, '2020-04-14 08:29:54', 0),
(30, 2, '2020-04-14 08:31:04', 0),
(30, 2, '2020-04-14 08:31:48', 0),
(30, 2, '2020-04-14 08:31:52', 0),
(30, 2, '2020-04-14 08:32:12', 0),
(30, 2, '2020-04-14 08:36:06', 0),
(30, 2, '2020-04-14 08:40:41', 0),
(37, 2, '2020-04-18 04:41:56', 0),
(37, 2, '2020-04-18 04:42:01', 0),
(37, 2, '2020-04-18 04:42:04', 0),
(37, 2, '2020-04-18 05:07:34', 0),
(37, 2, '2020-04-18 12:34:06', 0),
(37, 2, '2020-04-18 12:49:54', 0),
(37, 2, '2020-04-18 12:49:56', 0),
(37, 2, '2020-04-18 12:50:00', 0),
(30, 2, '2020-04-18 12:52:13', 0),
(30, 2, '2020-04-18 12:53:47', 0),
(30, 2, '2020-04-19 13:42:22', 0),
(30, 2, '2020-04-19 13:43:07', 0),
(30, 2, '2020-04-19 13:46:07', 0),
(30, 2, '2020-04-20 05:52:49', 0),
(30, 2, '2020-04-20 06:59:56', 0),
(30, 2, '2020-04-20 06:59:59', 0),
(30, 2, '2020-04-20 10:44:57', 0),
(30, 2, '2020-04-20 10:45:05', 0),
(30, 2, '2020-04-20 10:45:34', 0),
(30, 2, '2020-04-20 15:10:40', 0),
(0, 2, '2020-04-20 17:36:19', 3),
(0, 2, '2020-04-20 17:36:24', 3),
(0, 2, '2020-04-20 17:36:37', 3),
(30, 2, '2020-04-20 17:47:34', 0),
(0, 2, '2020-04-20 17:55:05', 3),
(0, 2, '2020-04-20 17:55:12', 3),
(30, 2, '2020-04-20 18:29:54', 0),
(35, 2, '2020-04-20 18:46:47', 0),
(35, 2, '2020-04-20 18:46:59', 0),
(35, 2, '2020-04-20 18:47:13', 0),
(35, 2, '2020-04-20 18:47:39', 0),
(35, 2, '2020-04-20 18:48:01', 0),
(36, 2, '2020-04-20 18:51:26', 0),
(36, 2, '2020-04-20 18:52:06', 0),
(36, 2, '2020-04-20 18:52:24', 0),
(36, 2, '2020-04-20 18:56:07', 0),
(36, 2, '2020-04-20 18:56:15', 0),
(36, 2, '2020-04-20 18:56:24', 0),
(36, 2, '2020-04-20 18:57:25', 0),
(36, 2, '2020-04-20 18:57:52', 0),
(36, 2, '2020-04-20 18:57:58', 0),
(36, 2, '2020-04-20 18:58:03', 0),
(36, 2, '2020-04-20 19:02:53', 0),
(36, 2, '2020-04-20 19:03:09', 0),
(36, 2, '2020-04-20 19:03:12', 0),
(36, 2, '2020-04-20 19:09:49', 0),
(36, 2, '2020-04-20 19:09:53', 0),
(36, 2, '2020-04-20 19:23:23', 0),
(36, 2, '2020-04-20 19:23:27', 0),
(36, 2, '2020-04-20 19:34:58', 0),
(36, 2, '2020-04-20 19:35:03', 0),
(36, 2, '2020-04-20 19:35:05', 0),
(0, 5, '2020-04-21 16:12:33', 3),
(0, 5, '2020-04-21 16:12:47', 3),
(0, 2, '2020-04-21 16:13:57', 3),
(0, 2, '2020-04-21 16:14:04', 3),
(0, 2, '2020-04-21 16:14:14', 3),
(0, 2, '2020-04-03 16:17:28', 3),
(0, 2, '2020-04-03 16:17:38', 3),
(0, 5, '2020-04-03 16:18:19', 3),
(0, 5, '2020-04-03 16:19:13', 3),
(0, 5, '2020-04-03 16:19:41', 3),
(0, 5, '2020-04-03 16:21:21', 3),
(0, 5, '2020-04-03 16:29:12', 3),
(0, 5, '2020-04-03 16:29:18', 3),
(0, 5, '2020-04-03 16:29:24', 3),
(0, 5, '2020-04-03 16:30:26', 3),
(0, 5, '2020-04-03 16:30:28', 3),
(0, 5, '2020-04-03 16:31:11', 3),
(0, 5, '2020-04-03 16:34:58', 3),
(0, 5, '2020-04-03 16:35:03', 3),
(0, 5, '2020-04-03 16:35:12', 3),
(0, 5, '2020-04-19 16:46:07', 3),
(0, 5, '2020-04-19 16:46:14', 3),
(0, 5, '2020-04-21 16:59:29', 3),
(30, 2, '2020-04-24 15:38:08', 0),
(30, 5, '2020-04-24 15:41:42', 0),
(30, 5, '2020-04-24 15:42:06', 0),
(30, 5, '2020-04-24 16:08:04', 0),
(0, 2, '2020-04-24 16:42:53', 3),
(0, 5, '2020-04-24 16:42:57', 3),
(0, 5, '2020-04-24 16:43:04', 3),
(0, 5, '2020-04-24 16:43:34', 3),
(0, 5, '2020-04-24 16:51:52', 3),
(0, 5, '2020-04-24 16:52:00', 3),
(0, 5, '2020-04-24 16:52:16', 3),
(0, 5, '2020-04-24 16:52:45', 3);

-- --------------------------------------------------------

--
-- Table structure for table `logchatbox`
--

CREATE TABLE `logchatbox` (
  `id_Trainer` int(11) NOT NULL,
  `id_Trainee` int(11) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `checkP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logchatbox`
--

INSERT INTO `logchatbox` (`id_Trainer`, `id_Trainee`, `Time`, `checkP`) VALUES
(3, 30, '2020-04-05 09:37:50', 1),
(3, 30, '2020-04-05 09:41:28', 0),
(3, 35, '2020-04-05 09:44:13', 0),
(3, 36, '2020-04-05 09:44:15', 0),
(3, 30, '2020-04-05 09:45:20', 1),
(3, 30, '2020-04-14 04:52:59', 1),
(3, 30, '2020-04-14 04:53:04', 1),
(3, 30, '2020-04-14 05:00:13', 1),
(3, 30, '2020-04-14 05:08:13', 1),
(3, 30, '2020-04-14 05:08:19', 1),
(3, 30, '2020-04-14 06:06:23', 0),
(3, 30, '2020-04-14 06:20:11', 1),
(3, 30, '2020-04-14 06:22:24', 1),
(3, 30, '2020-04-14 06:29:16', 1),
(3, 30, '2020-04-14 06:30:02', 1),
(3, 30, '2020-04-14 06:30:03', 1),
(3, 30, '2020-04-14 06:30:27', 1),
(3, 30, '2020-04-14 06:37:13', 1),
(3, 30, '2020-04-14 06:38:46', 1),
(3, 30, '2020-04-14 06:38:49', 1),
(3, 30, '2020-04-14 06:38:50', 1),
(3, 30, '2020-04-14 06:39:10', 1),
(3, 30, '2020-04-14 06:40:11', 1),
(3, 30, '2020-04-14 06:42:53', 1),
(3, 30, '2020-04-14 06:45:21', 1),
(3, 30, '2020-04-14 06:45:47', 1),
(3, 30, '2020-04-14 06:45:55', 1),
(3, 30, '2020-04-14 06:46:17', 1),
(3, 30, '2020-04-14 06:46:27', 1),
(3, 30, '2020-04-14 06:46:58', 1),
(3, 30, '2020-04-14 06:53:40', 1),
(3, 30, '2020-04-14 06:53:42', 1),
(3, 30, '2020-04-14 06:53:43', 1),
(3, 30, '2020-04-14 06:53:49', 1),
(3, 30, '2020-04-14 06:53:55', 1),
(3, 30, '2020-04-14 06:53:57', 1),
(3, 30, '2020-04-14 06:54:10', 1),
(3, 30, '2020-04-14 06:54:22', 1),
(3, 30, '2020-04-14 06:54:23', 1),
(3, 30, '2020-04-14 06:58:44', 1),
(3, 30, '2020-04-14 06:59:25', 1),
(3, 30, '2020-04-14 07:00:47', 1),
(3, 30, '2020-04-14 07:01:21', 1),
(3, 30, '2020-04-14 07:11:38', 1),
(3, 30, '2020-04-14 07:15:39', 1),
(3, 30, '2020-04-14 07:15:43', 1),
(3, 30, '2020-04-14 07:17:31', 1),
(3, 30, '2020-04-14 07:23:55', 1),
(3, 30, '2020-04-14 07:24:04', 1),
(3, 30, '2020-04-14 07:27:34', 1),
(3, 30, '2020-04-14 07:27:40', 1),
(3, 30, '2020-04-14 07:27:50', 1),
(3, 30, '2020-04-14 07:28:37', 1),
(3, 30, '2020-04-14 07:29:04', 1),
(3, 30, '2020-04-14 07:29:49', 0),
(3, 30, '2020-04-14 07:30:32', 0),
(3, 30, '2020-04-14 07:31:19', 0),
(3, 30, '2020-04-14 07:31:20', 0),
(3, 30, '2020-04-14 07:31:52', 0),
(3, 30, '2020-04-14 07:32:15', 0),
(3, 30, '2020-04-14 07:32:16', 0),
(3, 30, '2020-04-14 07:32:16', 0),
(3, 30, '2020-04-14 07:33:37', 0),
(3, 30, '2020-04-14 07:33:51', 0),
(3, 30, '2020-04-14 07:35:27', 0),
(3, 30, '2020-04-14 07:37:15', 0),
(3, 30, '2020-04-14 07:37:18', 0),
(3, 30, '2020-04-14 07:37:21', 0),
(3, 30, '2020-04-14 07:37:41', 0),
(3, 30, '2020-04-14 07:46:48', 0),
(3, 35, '2020-04-14 07:46:50', 0),
(3, 30, '2020-04-14 07:48:14', 0),
(3, 35, '2020-04-14 07:48:22', 0),
(3, 30, '2020-04-14 08:21:27', 1),
(3, 30, '2020-04-14 08:21:42', 1),
(3, 30, '2020-04-14 08:22:10', 1),
(3, 30, '2020-04-14 08:29:45', 1),
(3, 30, '2020-04-14 08:32:18', 1),
(3, 30, '2020-04-17 06:23:34', 0),
(3, 30, '2020-04-17 06:24:07', 0),
(3, 35, '2020-04-17 06:24:16', 0),
(3, 30, '2020-04-17 06:24:47', 0),
(3, 35, '2020-04-17 06:25:07', 0),
(3, 30, '2020-04-17 06:30:30', 0),
(3, 30, '2020-04-17 06:33:41', 0),
(3, 30, '2020-04-17 06:35:21', 0),
(3, 35, '2020-04-17 06:35:24', 0),
(3, 36, '2020-04-17 06:35:27', 0),
(3, 30, '2020-04-17 07:40:46', 0),
(3, 30, '2020-04-17 07:41:46', 0),
(3, 30, '2020-04-17 07:45:17', 0),
(3, 30, '2020-04-18 03:45:28', 0),
(3, 30, '2020-04-18 04:11:46', 0),
(3, 30, '2020-04-18 04:11:51', 0),
(3, 30, '2020-04-18 04:19:27', 0),
(3, 30, '2020-04-18 04:19:38', 0),
(3, 37, '2020-04-18 04:41:40', 1),
(3, 37, '2020-04-18 12:34:08', 1),
(3, 37, '2020-04-18 12:50:19', 1),
(3, 37, '2020-04-18 12:50:30', 1),
(3, 30, '2020-04-18 12:51:05', 0),
(3, 30, '2020-04-18 12:51:16', 0),
(3, 30, '2020-04-18 12:53:38', 1),
(3, 30, '2020-04-18 12:59:09', 1),
(3, 37, '2020-04-18 13:00:41', 1),
(3, 30, '2020-04-18 13:01:02', 0),
(3, 30, '2020-04-18 13:01:14', 0),
(3, 37, '2020-04-18 13:01:24', 1),
(3, 30, '2020-04-18 13:02:16', 1),
(3, 30, '2020-04-18 13:02:36', 1),
(3, 30, '2020-04-18 13:02:39', 0),
(3, 30, '2020-04-18 13:02:54', 1),
(3, 30, '2020-04-18 13:03:00', 0),
(3, 30, '2020-04-18 13:03:12', 1),
(3, 30, '2020-04-18 13:03:21', 0),
(3, 30, '2020-04-18 13:04:33', 1),
(3, 30, '2020-04-18 13:04:38', 0),
(3, 30, '2020-04-19 13:42:16', 1),
(3, 30, '2020-04-20 05:52:52', 1),
(3, 30, '2020-04-20 06:59:53', 1),
(3, 37, '2020-04-20 08:35:00', 1),
(3, 30, '2020-04-20 15:10:13', 1),
(3, 30, '2020-04-20 15:10:46', 1),
(3, 30, '2020-04-20 17:33:19', 1),
(3, 30, '2020-04-20 17:34:53', 1),
(3, 30, '2020-04-20 17:38:31', 1),
(3, 30, '2020-04-20 17:39:53', 1),
(3, 30, '2020-04-20 17:42:09', 1),
(3, 35, '2020-04-20 17:54:41', 0),
(3, 40, '2020-04-20 18:20:48', 0),
(3, 40, '2020-04-20 18:21:02', 0),
(3, 40, '2020-04-20 18:24:18', 0),
(3, 35, '2020-04-20 18:39:24', 1),
(3, 35, '2020-04-20 18:39:43', 1),
(3, 35, '2020-04-20 18:46:45', 1),
(3, 35, '2020-04-20 18:48:08', 1),
(3, 36, '2020-04-20 18:50:27', 1),
(3, 36, '2020-04-20 18:52:10', 1),
(3, 36, '2020-04-20 18:52:18', 1),
(3, 36, '2020-04-20 18:52:48', 1),
(3, 36, '2020-04-20 18:53:44', 1),
(3, 36, '2020-04-20 18:56:03', 1),
(3, 36, '2020-04-20 19:35:14', 1),
(3, 30, '2020-04-21 15:46:56', 0),
(3, 30, '2020-04-21 16:12:54', 0),
(3, 30, '2020-04-03 16:16:32', 0),
(3, 30, '2020-04-03 16:18:28', 0),
(3, 30, '2020-04-03 16:36:26', 0),
(3, 30, '2020-04-03 16:51:37', 0),
(3, 30, '2020-04-03 16:51:45', 0),
(3, 30, '2020-04-03 16:52:25', 0),
(3, 30, '2020-04-21 16:54:04', 0),
(3, 30, '2020-04-24 15:38:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mess`
--

CREATE TABLE `mess` (
  `id_trainer` int(11) NOT NULL,
  `id_trainee` int(11) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `mess` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `Document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mess`
--

INSERT INTO `mess` (`id_trainer`, `id_trainee`, `Time`, `mess`, `info`, `Document`) VALUES
(0, 30, '2020-03-24 13:39:29', '', 'Student', ''),
(3, 30, '2020-03-24 13:40:06', '', 'Student', ''),
(3, 30, '2020-03-24 13:40:15', 'hi\r\n', 'Student', ''),
(3, 30, '2020-03-24 13:40:29', 'hi', 'Permision', ''),
(3, 30, '2020-03-24 13:40:38', 'ádasdasdas', 'Permision', ''),
(3, 30, '2020-03-24 13:41:28', 'đâsdasd', 'Permision', ''),
(0, 30, '2020-04-03 10:01:32', 'hoa ham', 'Student', ''),
(3, 30, '2020-04-03 10:01:42', 'aaa', 'Student', ''),
(3, 38, '2020-04-08 02:48:56', 'das\r\n', 'Student', ''),
(3, 38, '2020-04-08 02:49:23', 'hello\r\n', 'Student', ''),
(3, 38, '2020-04-08 02:51:06', 'hello\r\n', 'Permision', ''),
(3, 38, '2020-04-08 02:52:08', 'dsad', 'Permision', ''),
(3, 38, '2020-04-08 02:52:11', 'dasd', 'Permision', ''),
(3, 30, '2020-04-08 06:56:34', 'da', 'Permision', ''),
(3, 30, '2020-04-08 08:13:24', 'dsd', 'Student', ''),
(3, 30, '2020-04-08 08:13:29', 'dsad', 'Student', ''),
(3, 30, '2020-04-08 08:13:39', 'Ã¡d', 'Student', ''),
(3, 30, '2020-04-08 08:13:43', '', 'Student', ''),
(3, 30, '2020-04-08 08:14:01', 'dfadfadf\r\n', 'Student', ''),
(3, 30, '2020-04-08 08:15:16', 'Ä‘Ã¡', 'Student', ''),
(3, 37, '2020-04-14 02:54:27', 'hello\r\n', 'Student', ''),
(3, 37, '2020-04-14 03:24:06', 'Hello\r\n', 'Student', ''),
(3, 37, '2020-04-14 03:24:40', 'Hello\r\n', 'Permision', ''),
(3, 36, '2020-04-14 03:27:14', 'Hello\r\n', 'Permision', ''),
(3, 30, '2020-04-14 03:29:22', 'Hello', 'Permision', ''),
(3, 30, '2020-04-14 07:24:03', '', 'Student', 'lab 4.1-Login Form.docx'),
(3, 30, '2020-04-14 07:27:40', 'heloo', 'Student', ''),
(3, 30, '2020-04-14 07:27:50', '', 'Student', '5.1 HTTP GET and Post.docx'),
(3, 30, '2020-04-14 07:29:04', 'ÄÃ¢y lÃ  flie', 'Student', '5.2 HTTP GET and Post (cont).docx'),
(3, 30, '2020-04-14 07:31:51', 'ÄÃ¢y lÃ  flile cá»§a tháº§y\r\n', 'Permision', ''),
(3, 30, '2020-04-14 07:33:51', 'ÄÃ¢y lÃ  flie cá»§a tháº§y', 'Permision', 'lab 4.1-Login Form.docx'),
(3, 30, '2020-04-18 13:01:13', 'Chao em', 'Permision', ''),
(3, 30, '2020-04-18 13:02:36', 'chao thay\r\n', 'Student', ''),
(3, 30, '2020-04-18 13:02:54', 'chao thay', 'Student', ''),
(3, 30, '2020-04-18 13:03:12', 'hello', 'Student', ''),
(3, 30, '2020-04-18 13:04:33', 'chao em', 'Student', ''),
(3, 30, '2020-04-20 17:39:53', 'hello', 'Student', ''),
(3, 30, '2020-04-20 17:42:09', 'Hello, I am Student', 'Student', ''),
(3, 40, '2020-04-20 18:21:02', 'Hello', 'Permision', ''),
(3, 35, '2020-04-20 18:39:43', 'Hello, I am Student', 'Student', ''),
(3, 36, '2020-04-20 18:53:44', '', 'Student', 'feature-live-preview.gif'),
(3, 30, '2020-04-03 16:51:45', 'Hello', 'Permision', ''),
(3, 30, '2020-04-03 16:52:25', 'Hello', 'Permision', ''),
(3, 30, '2020-04-21 16:54:04', 'Hello hoang', 'Permision', '');

-- --------------------------------------------------------

--
-- Table structure for table `topic_manager`
--

CREATE TABLE `topic_manager` (
  `id_topic_manager` int(11) NOT NULL,
  `name_topic_manager` varchar(255) NOT NULL,
  `descriptions_topic_manager` varchar(255) NOT NULL,
  `id_Course_manager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trainee_manager`
--

CREATE TABLE `trainee_manager` (
  `id_Trainee` int(255) NOT NULL,
  `name_Trainee` varchar(255) NOT NULL,
  `education_Trainee` varchar(255) NOT NULL,
  `TOEIC_score_Trainee` varchar(255) NOT NULL,
  `DoB_Trainee` varchar(255) NOT NULL,
  `age_Trainee` int(200) NOT NULL,
  `location_Trainee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainee_manager`
--

INSERT INTO `trainee_manager` (`id_Trainee`, `name_Trainee`, `education_Trainee`, `TOEIC_score_Trainee`, `DoB_Trainee`, `age_Trainee`, `location_Trainee`) VALUES
(30, 'Pham Tuan Hoang', 'IT', '8.0', '10/8/1999', 21, 'FPT'),
(35, 'Bui Viet Hoang', 'IT', '7.0', '01/02/1999', 21, 'FPT'),
(36, 'Nguyen Cong Trung', 'IT', '7.0', '04/07/1998', 22, 'FPT'),
(37, 'Cao The Giang', 'IT', '7.5', '10/08/1999', 22, 'FPT'),
(40, 'Pham Cao Duong', 'IT', '9.0', '22/10/1999', 21, 'FPT'),
(42, 'Tran Ngoc Linh', 'IT', '8.0', '10/1/1999', 21, 'FPT');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_manager`
--

CREATE TABLE `trainer_manager` (
  `id_Trainer` int(255) NOT NULL,
  `name_Trainer` varchar(255) NOT NULL,
  `Working_place_Trainer` varchar(255) NOT NULL,
  `email_Trainer` varchar(255) NOT NULL,
  `telephone_Trainer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer_manager`
--

INSERT INTO `trainer_manager` (`id_Trainer`, `name_Trainer`, `Working_place_Trainer`, `email_Trainer`, `telephone_Trainer`) VALUES
(3, 'dung', 'FPT', 'dungpt@gmail.com', '096996999');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `permision` varchar(255) NOT NULL,
  `id_Trainer` int(255) NOT NULL,
  `id_Trainee` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `permision`, `id_Trainer`, `id_Trainee`) VALUES
(18, 'dung', '1', 'dung', 'hoangdepzai025@gmail.com', 'Personal', 3, 0),
(21, 'dat0712', 'admin', 'dat0712', 'thedatmno07@gmail.com', 'Admin', 0, 0),
(32, 'hoangpt@gmail.com', 'student1', 'Pham Tuan Hoang', 'hoangptgch17420@fpt.edu.vn', 'Student', 0, 30),
(33, 'duongpc@gmail.com', 'student2', 'Pham Cao Duong', 'duongpcgch17362@fpt.edu.vn', 'Student', 0, 40),
(34, 'hoangbv@gmail.com', 'student3', 'Bui Viet Hoang', 'hoangbvgch17056@fpt.edu.vn', 'Student', 0, 35),
(35, 'trungnc@gmail.com', 'student4', 'Nguyen Cong Trung', 'trungncgch16478@fpt.edu.vn', 'Student', 0, 36),
(36, 'giangtc@gmail.com', 'student5', 'Cao The Giang', 'giangctgch17142@fpt.edu.vn', 'Student', 0, 37),
(37, 'linhtn@gmail.com', '1', 'Tran Ngoc Linh', 'linhtn@gmail.com', 'Student', 0, 42);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Trainer` (`id_Trainer`),
  ADD KEY `id_Course_manager` (`id_Course_manager`);

--
-- Indexes for table `class_student`
--
ALTER TABLE `class_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `courses_categories_manager`
--
ALTER TABLE `courses_categories_manager`
  ADD PRIMARY KEY (`id_Courses_categories`);

--
-- Indexes for table `course_manager`
--
ALTER TABLE `course_manager`
  ADD PRIMARY KEY (`id_Course_manager`),
  ADD KEY `id_Courses_categories` (`id_Courses_categories`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic_manager`
--
ALTER TABLE `topic_manager`
  ADD PRIMARY KEY (`id_topic_manager`),
  ADD KEY `id_Course_manager` (`id_Course_manager`);

--
-- Indexes for table `trainee_manager`
--
ALTER TABLE `trainee_manager`
  ADD PRIMARY KEY (`id_Trainee`);

--
-- Indexes for table `trainer_manager`
--
ALTER TABLE `trainer_manager`
  ADD PRIMARY KEY (`id_Trainer`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class_student`
--
ALTER TABLE `class_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `courses_categories_manager`
--
ALTER TABLE `courses_categories_manager`
  MODIFY `id_Courses_categories` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_manager`
--
ALTER TABLE `course_manager`
  MODIFY `id_Course_manager` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `topic_manager`
--
ALTER TABLE `topic_manager`
  MODIFY `id_topic_manager` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainee_manager`
--
ALTER TABLE `trainee_manager`
  MODIFY `id_Trainee` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `trainer_manager`
--
ALTER TABLE `trainer_manager`
  MODIFY `id_Trainer` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`id_Trainer`) REFERENCES `trainer_manager` (`id_Trainer`),
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`id_Course_manager`) REFERENCES `course_manager` (`id_Course_manager`);

--
-- Constraints for table `class_student`
--
ALTER TABLE `class_student`
  ADD CONSTRAINT `class_student_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `class_student_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `trainee_manager` (`id_Trainee`);

--
-- Constraints for table `course_manager`
--
ALTER TABLE `course_manager`
  ADD CONSTRAINT `course_manager_ibfk_1` FOREIGN KEY (`id_Courses_categories`) REFERENCES `courses_categories_manager` (`id_Courses_categories`);

--
-- Constraints for table `topic_manager`
--
ALTER TABLE `topic_manager`
  ADD CONSTRAINT `topic_manager_ibfk_1` FOREIGN KEY (`id_Course_manager`) REFERENCES `course_manager` (`id_Course_manager`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
