-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2023 at 05:21 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pathway`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_parts`
--

CREATE TABLE `about_parts` (
  `id` bigint UNSIGNED NOT NULL,
  `about_video_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_parts`
--

INSERT INTO `about_parts` (`id`, `about_video_link`, `about_text`, `created_at`, `updated_at`) VALUES
(1, 'https://www.youtube.com/embed/lPJVi797Uy0', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium dignissimos quas perferendis ipsam, incidunt optio quae libero id odio, maiores explicabo deserunt, distinctio culpa? Nam magni eum ad. Cum nobis incidunt alias! Exercitationem perspiciatis autem amet repellat vero maxime omnis nam ipsa, cum suscipit modi explicabo eum accusamus adipisci minus quam sapiente eius. Distinctio possimus quos, assumenda saepe quam sunt quis recusandae alias unde sint deleniti earum cumque repudiandae dignissimos, molestiae facilis, tenetur iste blanditiis laboriosam explicabo voluptatibus similique! Veritatis minus quasi enim magnam earum perferendis. alias explicabo totam, beatae quis, cupiditate maxime! Explicabo, consequatur odio? Neque, consequuntur debitis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, sequi iure amet voluptatem aspernatur tempora repellendus eligendi assumenda eaque sint est ut totam maiores quisquam nulla doloremque eveniet exercitationem molestias voluptas tenetur? Nesciunt magnam illum beatae porro adipisci. Voluptatum doloribus corrupti quo dicta saepe ipsa magnam voluptate animi ipsum minima.', '2023-05-18 09:45:32', '2023-05-18 10:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `account_expenses`
--

CREATE TABLE `account_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` int NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_incomes`
--

CREATE TABLE `account_incomes` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` int NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `enroll_id` bigint UNSIGNED DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_incomes`
--

INSERT INTO `account_incomes` (`id`, `amount`, `branch_id`, `enroll_id`, `note`, `created_at`, `updated_at`) VALUES
(2, 2222, 2, 2, NULL, '2023-05-17 06:53:29', '2023-05-17 06:53:29'),
(3, 1999, 1, 7, NULL, '2023-05-17 10:37:34', '2023-05-17 10:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `banner_parts`
--

CREATE TABLE `banner_parts` (
  `id` bigint UNSIGNED NOT NULL,
  `logo_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bottom_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_one_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_two_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_one_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_two_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_parts`
--

INSERT INTO `banner_parts` (`id`, `logo_image`, `banner_img`, `subtitle`, `title`, `bottom_text`, `button_one_name`, `button_two_name`, `button_one_link`, `button_two_link`, `created_at`, `updated_at`) VALUES
(1, 'logo-1.png', 'banner-1.jpg', 'Be Ready to get Pro', 'Learn to Drive with Confidence', 'Jpsum dolor sit amet, consectetur adipiscing elit, minim veniamsed sed do eiusmod tempor maksu eiusmod tempor maksu eiu', 'Check Courses', 'Learn More', '#', '#', '2023-05-16 08:29:04', '2023-05-16 08:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `booked_schedules`
--

CREATE TABLE `booked_schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `enroll_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booked_schedules`
--

INSERT INTO `booked_schedules` (`id`, `enroll_id`, `date`, `created_at`, `updated_at`) VALUES
(9, 2, '2010-07-22', '2023-05-17 06:53:29', '2023-05-17 06:53:29'),
(10, 2, '2010-07-23', '2023-05-17 06:53:29', '2023-05-17 06:53:29'),
(11, 2, '2010-07-24', '2023-05-17 06:53:29', '2023-05-17 06:53:29'),
(12, 2, '2010-07-25', '2023-05-17 06:53:29', '2023-05-17 06:53:29'),
(13, 2, '2010-07-26', '2023-05-17 06:53:29', '2023-05-17 06:53:29'),
(14, 2, '2010-07-27', '2023-05-17 06:53:29', '2023-05-17 06:53:29'),
(15, 2, '2010-07-28', '2023-05-17 06:53:29', '2023-05-17 06:53:29'),
(16, 2, '2010-07-29', '2023-05-17 06:53:29', '2023-05-17 06:53:29'),
(40, 7, '1998-10-21', '2023-05-17 10:37:34', '2023-05-17 10:37:34'),
(41, 7, '1998-10-22', '2023-05-17 10:37:34', '2023-05-17 10:37:34'),
(42, 7, '1998-10-23', '2023-05-17 10:37:34', '2023-05-17 10:37:34'),
(43, 7, '1998-10-24', '2023-05-17 10:37:34', '2023-05-17 10:37:34'),
(44, 7, '1998-10-25', '2023-05-17 10:37:34', '2023-05-17 10:37:34'),
(45, 7, '1998-10-26', '2023-05-17 10:37:34', '2023-05-17 10:37:34'),
(46, 7, '1998-10-27', '2023-05-17 10:37:34', '2023-05-17 10:37:34'),
(47, 7, '1998-10-28', '2023-05-17 10:37:34', '2023-05-17 10:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_manager_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `branch_address`, `email`, `phone`, `branch_manager_signature`, `created_at`, `updated_at`) VALUES
(1, 'Mirpur', 'BRTA Mirpur, Dhaka', 'example@email.com', '+88 01XXXXXXXXX', NULL, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(2, 'Banani', 'Banani, Dhaka', 'example@email.com', '+88 01XXXXXXXXX', NULL, '2023-05-16 08:29:04', '2023-05-16 08:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `branch_capabilities`
--

CREATE TABLE `branch_capabilities` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `available_vehical` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_capabilities`
--

INSERT INTO `branch_capabilities` (`id`, `branch_id`, `category_id`, `available_vehical`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 100, '2023-05-16 08:33:26', '2023-05-16 08:33:26'),
(2, 2, 3, 10, '2023-05-16 08:33:37', '2023-05-16 08:33:37'),
(3, 1, 3, 10, '2023-05-16 08:33:44', '2023-05-16 08:33:44'),
(4, 2, 1, 10, '2023-05-16 08:33:52', '2023-05-16 08:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `branch_parts`
--

CREATE TABLE `branch_parts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_parts`
--

INSERT INTO `branch_parts` (`id`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Our Branches', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit laboriosam laudantium iusitationem rerum neque officiis doloremque excepturi.', '2023-05-18 05:00:31', '2023-05-18 05:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint UNSIGNED NOT NULL,
  `certificate_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enroll_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `certificate_id`, `enroll_id`, `created_at`, `updated_at`) VALUES
(1, 'Car-96826', 2, '2023-05-18 11:07:50', '2023-05-18 11:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `certified_by_parts`
--

CREATE TABLE `certified_by_parts` (
  `id` bigint UNSIGNED NOT NULL,
  `certified_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certified_by_parts`
--

INSERT INTO `certified_by_parts` (`id`, `certified_by`, `certificate_image`, `created_at`, `updated_at`) VALUES
(1, 'Demo 1', 'certificate-1.png', '2023-05-20 05:00:10', NULL),
(2, 'Demo 2', 'certificate-1.png', '2023-05-20 05:00:10', NULL),
(3, 'Demo 3', 'certificate-1.png', '2023-05-20 05:00:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` bigint UNSIGNED NOT NULL,
  `question_id` int NOT NULL,
  `choice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_id`, `choice`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ratione dolores face', 0, '2023-05-17 11:19:42', NULL),
(2, 1, 'Pariatur Omnis dele', 0, '2023-05-17 11:19:42', NULL),
(3, 1, 'Illo quos quis neces', 1, '2023-05-17 11:19:42', NULL),
(4, 1, 'Consequatur veniam', 0, '2023-05-17 11:19:42', NULL),
(5, 2, 'Dolores illum labor', 0, '2023-05-17 11:19:51', NULL),
(6, 2, 'Possimus in omnis p', 0, '2023-05-17 11:19:51', NULL),
(7, 2, 'Sint aliqua Cupidi', 0, '2023-05-17 11:19:51', NULL),
(8, 2, 'Sapiente doloribus d', 1, '2023-05-17 11:19:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_videos`
--

CREATE TABLE `class_videos` (
  `id` bigint UNSIGNED NOT NULL,
  `vid_course_id` bigint UNSIGNED NOT NULL,
  `class_no` int NOT NULL,
  `video_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_parts`
--

CREATE TABLE `contact_parts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_parts`
--

INSERT INTO `contact_parts` (`id`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Get in Touch', 'For any emergency query, Please contact our Information Officer.', '2023-05-18 05:41:38', '2023-05-18 05:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `counter_facts`
--

CREATE TABLE `counter_facts` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` int NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counter_facts`
--

INSERT INTO `counter_facts` (`id`, `amount`, `text`, `icon`, `priority`, `created_at`, `updated_at`) VALUES
(1, 6500, 'GRADUATED FROM HERE', 'icofont icofont-hat-alt', 1, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(2, 56, 'TEACHERS NUMBER', 'icofont icofont-user-suited', 2, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(3, 11, 'YEARS ON MARKET', 'icofont icofont-history', 3, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(4, 550, 'PRESENT STUDENTS', 'icofont icofont-users-social', 4, '2023-05-16 08:29:04', '2023-05-16 08:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `type_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def-image.jpg',
  `price` int NOT NULL,
  `discount` int NOT NULL DEFAULT '0',
  `after_discount` int NOT NULL,
  `priority` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `type_id`, `image`, `price`, `discount`, `after_discount`, `priority`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'course-1.jpg', 4000, 0, 4000, 1, '2023-05-16 09:34:41', '2023-05-16 09:34:41'),
(2, 2, 2, 'course-2.jpg', 7000, 0, 7000, 2, '2023-05-16 09:36:17', '2023-05-16 09:36:17'),
(3, 1, 1, 'course-3.jpg', 5000, 0, 5000, 3, '2023-05-16 09:36:31', '2023-05-16 09:36:32'),
(4, 1, 2, 'course-4.jpg', 8000, 0, 8000, 4, '2023-05-16 09:36:44', '2023-05-16 09:36:44'),
(5, 3, 1, 'course-5.jpg', 4000, 0, 4000, 5, '2023-05-16 09:37:18', '2023-05-16 09:37:18'),
(6, 3, 2, 'course-6.jpg', 6000, 0, 6000, 6, '2023-05-16 09:38:02', '2023-05-16 09:38:02'),
(7, 4, 1, 'course-7.jpg', 4000, 0, 4000, 7, '2023-05-16 09:38:20', '2023-05-16 09:38:20'),
(8, 4, 2, 'course-8.webp', 5000, 0, 5000, 8, '2023-05-16 09:43:13', '2023-05-16 09:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def-image.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `category_name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Car (Manual)', 'image-1.jpg', '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(2, 'Car (Auto)', 'image-2.jpg', '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(3, 'Bike', 'image-3.jpg', '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(4, 'Scooter', 'image-4.jpg', '2023-05-16 08:29:04', '2023-05-16 08:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `course_slots`
--

CREATE TABLE `course_slots` (
  `id` bigint UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `type` int NOT NULL COMMENT '1 = Practical, 2 = Theory',
  `day` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_slots`
--

INSERT INTO `course_slots` (`id`, `start_time`, `end_time`, `branch_id`, `type`, `day`, `created_at`, `updated_at`) VALUES
(1, '10:00:00', '11:00:00', 1, 1, NULL, '2023-05-16 08:34:07', '2023-05-16 08:34:07'),
(2, '11:00:00', '12:00:00', 2, 1, NULL, '2023-05-16 08:34:23', '2023-05-16 08:34:23'),
(3, '14:00:00', '16:00:00', 1, 2, 1, '2023-05-17 08:14:34', '2023-05-17 08:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `course_types`
--

CREATE TABLE `course_types` (
  `id` bigint UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int NOT NULL,
  `max_duration` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_types`
--

INSERT INTO `course_types` (`id`, `type_name`, `duration`, `max_duration`, `created_at`, `updated_at`) VALUES
(1, 'Short Course', 5, 8, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(2, 'Long Course', 10, 15, '2023-05-16 08:29:04', '2023-05-16 08:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day`, `created_at`, `updated_at`) VALUES
(1, 'Saturday', '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(2, 'Sunday', '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(3, 'Monday', '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(4, 'Tuesday', '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(5, 'Wednesday', '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(6, 'Thursday', '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(7, 'Friday', '2023-05-16 08:29:04', '2023-05-16 08:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `director_speech_parts`
--

CREATE TABLE `director_speech_parts` (
  `id` bigint UNSIGNED NOT NULL,
  `director_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director_speech` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `director_speech_parts`
--

INSERT INTO `director_speech_parts` (`id`, `director_image`, `director_name`, `director_speech`, `created_at`, `updated_at`) VALUES
(1, 'director.jpg', 'Muhammad Shahin', 'I\'m Md. Shahin. I have joined \'Pathway\' 2014 as an Executive Director. From the very beginning of the Joining pathway, I\'m trying my best to uplift the image of \'pathway\' by hard work, passion, honesty, conscience, and steadiness from the last three consecutive sessions. The one & only aim of mine working with \'pathway\' is to do something good & wellbeing for mankind, humanity. To eradicate poverty, unemployment & uplift the socio-economic status of the third gender is basic concentration. I know how horrible it is to live with starvation because I was belonging to a lower-middle-class family. I tried my best and gave a lot of effort, hard work to reach this position. At that time, I promised myself that, \'if I could make my life sustainable then I will definitely do something for this poor, unprivileged population\'. \'Pathway\' has given me the opportunity to do for humanity. So we ( I & Pathway) will try heart and soul to make the socio-economic change of unprivileged, poor population. Because we believe, \'overall development of a country depends on the development of every single soul of a country\'.', '2023-05-18 09:59:39', '2023-05-18 12:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

CREATE TABLE `enrolls` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `course_category` bigint UNSIGNED NOT NULL,
  `course_type` bigint UNSIGNED NOT NULL,
  `course_slot` bigint UNSIGNED NOT NULL,
  `price` int NOT NULL,
  `payment_process` int NOT NULL COMMENT '1 = Online, 2 = Offline',
  `paid` int DEFAULT NULL,
  `payment_status` int NOT NULL DEFAULT '0' COMMENT '0 = Pending, 1 = Successful',
  `start_date` date NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 = Pending, 1 = Approved, 2 = Finished',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrolls`
--

INSERT INTO `enrolls` (`id`, `user_id`, `branch_id`, `course_id`, `course_category`, `course_type`, `course_slot`, `price`, `payment_process`, `paid`, `payment_status`, `start_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 2, 3, 1, 1, 2, 5000, 1, 2222, 1, '2010-07-22', 1, '2023-05-17 06:53:29', '2023-05-17 06:53:29'),
(7, 4, 1, 1, 2, 1, 1, 4000, 1, 1999, 1, '1998-10-21', 0, '2023-05-17 10:37:34', '2023-05-17 10:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `icon`, `title`, `text`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'icofont icofont-clock-time', 'Any Time Any Place', 'Lorem ipsum dolor sit amet to be consectetur adipiscing elit, sed do eiusmod tempor.', 1, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(2, 'icofont icofont-man-in-glasses', 'Experience Instructors', 'Lorem ipsum dolor sit amet to be consectetur adipiscing elit, sed do eiusmod tempor.', 2, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(3, 'icofont icofont-file-spreadsheet', 'Quick License', 'Lorem ipsum dolor sit amet to be consectetur adipiscing elit, sed do eiusmod tempor.', 3, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(4, 'icofont icofont-file-spreadsheet', 'Unlimited Car Support', 'Lorem ipsum dolor sit amet to be consectetur adipiscing elit, sed do eiusmod tempor.', 4, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(5, 'icofont icofont-file-spreadsheet', 'Learning Roads', 'Lorem ipsum dolor sit amet to be consectetur adipiscing elit, sed do eiusmod tempor.', 5, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(6, 'icofont icofont-file-spreadsheet', 'Video Classes', 'Lorem ipsum dolor sit amet to be consectetur adipiscing elit, sed do eiusmod tempor.', 6, '2023-05-16 08:29:04', '2023-05-16 08:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `feature_parts`
--

CREATE TABLE `feature_parts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_parts`
--

INSERT INTO `feature_parts` (`id`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Our Features', 'Lorem ipsum dolor sit amet, consectetur maksu rez do eiusmod tempor magna aliqua', '2023-05-16 08:29:04', '2023-05-16 08:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `i_d_cards`
--

CREATE TABLE `i_d_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `id_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager_signatures`
--

CREATE TABLE `manager_signatures` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_09_12_000000_create_branches_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_08_29_125246_create_permission_tables', 1),
(7, '2023_01_02_123212_create_days_table', 1),
(8, '2023_01_03_111202_create_course_categories_table', 1),
(9, '2023_01_03_111326_create_course_types_table', 1),
(10, '2023_01_14_094833_create_course_slots_table', 1),
(11, '2023_01_18_064637_create_branch_capabilities_table', 1),
(12, '2023_01_18_064638_create_courses_table', 1),
(13, '2023_01_21_105019_create_enrolls_table', 1),
(14, '2023_01_22_062130_create_booked_schedules_table', 1),
(15, '2023_02_02_132704_create_theory_classes_table', 1),
(16, '2023_02_06_155229_create_settings_table', 1),
(17, '2023_02_07_165609_create_i_d_cards_table', 1),
(18, '2023_02_11_113657_create_user_otps_table', 1),
(19, '2023_02_23_183946_create_manager_signatures_table', 1),
(20, '2023_03_06_155254_create_quizzes_table', 1),
(21, '2023_03_06_155602_create_questions_table', 1),
(22, '2023_03_06_170334_create_choices_table', 1),
(23, '2023_03_13_155720_create_banner_parts_table', 1),
(24, '2023_03_13_192704_create_feature_parts_table', 1),
(25, '2023_03_15_120904_create_quiz_scores_table', 1),
(26, '2023_03_25_120113_create_video_courses_table', 1),
(27, '2023_03_25_153453_create_class_videos_table', 1),
(28, '2023_03_27_230725_create_student_id_cards_table', 1),
(29, '2023_03_29_104927_create_features_table', 1),
(30, '2023_03_29_152709_create_counter_facts_table', 1),
(31, '2023_04_04_144915_create_training_process_videos_table', 1),
(32, '2023_04_05_120124_create_reviews_table', 1),
(33, '2023_04_10_132328_create_account_incomes_table', 1),
(34, '2023_04_10_132916_create_account_expenses_table', 1),
(35, '2023_04_13_105133_create_student_attendances_table', 1),
(36, '2023_04_16_154357_create_certificates_table', 1),
(37, '2023_05_18_105248_create_branch_parts_table', 2),
(38, '2023_05_18_112501_create_contact_parts_table', 3),
(39, '2023_05_18_153801_create_about_parts_table', 4),
(40, '2023_05_18_155351_create_director_speech_parts_table', 5),
(41, '2023_05_18_182419_create_certified_by_parts_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint UNSIGNED NOT NULL,
  `quiz_id` int NOT NULL,
  `course_id` int NOT NULL,
  `course_type` int DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type` int NOT NULL DEFAULT '0',
  `right_answer` int NOT NULL,
  `marks` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `course_id`, `course_type`, `question`, `question_type`, `right_answer`, `marks`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Tempora et ratione p?', 0, 3, 5, '2023-05-17 11:19:42', NULL),
(2, 1, 1, 1, 'Cupiditate ex ut eli?', 0, 4, 5, '2023-05-17 11:19:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `course_type` bigint UNSIGNED DEFAULT NULL,
  `quiz_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_questions` int NOT NULL DEFAULT '0',
  `total_marks` int NOT NULL DEFAULT '0',
  `time_limit` int DEFAULT NULL,
  `quiz_status` int NOT NULL DEFAULT '0',
  `quiz_privacy` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `course_id`, `course_type`, `quiz_name`, `total_questions`, `total_marks`, `time_limit`, `quiz_status`, `quiz_privacy`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Jena Charles Jena Charles', 2, 10, 20, 1, 0, '2023-05-17 11:18:24', '2023-05-17 11:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_scores`
--

CREATE TABLE `quiz_scores` (
  `id` bigint UNSIGNED NOT NULL,
  `enrollment_id` bigint UNSIGNED DEFAULT NULL,
  `quiz_id` bigint UNSIGNED NOT NULL,
  `score_in_num` int NOT NULL,
  `score_in_percentage` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `enrollment_id` bigint UNSIGNED DEFAULT NULL,
  `review` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(2, 'Branch Manager', 'web', '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(3, 'Instructor', 'web', '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(4, 'Student', 'web', '2023-05-16 08:29:04', '2023-05-16 08:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Pathway Driving School', '2023-05-16 08:29:04', '2023-05-18 07:56:21'),
(2, 'site_tagline', 'One of the leading driving school in Bangladesh', '2023-05-16 08:29:04', '2023-05-18 07:56:21'),
(3, 'head_office', '48/3, Senpara Parbata, Mirpur-13, Dhaka- 1216', '2023-05-16 08:29:04', '2023-05-18 07:56:21'),
(4, 'site_primary_color', '#2c31b4', '2023-05-16 08:29:04', '2023-05-18 07:56:21'),
(5, 'site_accent_color', '#1c1f76', '2023-05-16 08:29:04', '2023-05-18 07:56:21'),
(6, 'site_secondary_color', '#f5821f', '2023-05-16 08:29:04', '2023-05-18 07:56:21'),
(7, 'site_secondary_accent_color', '#d5690c', '2023-05-16 08:29:04', '2023-05-18 07:56:21'),
(8, 'logo_dark', 'logo-dark.png', '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(9, 'logo_light', 'logo-light.png', '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(10, 'favicon', 'favicon.png', '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(11, 'phone', '+8801321232982', '2023-05-18 05:28:36', '2023-05-18 07:56:21'),
(12, 'google_map_link', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2310.725900366271!2d90.37309233234191!3d23.805435306690985!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c12edf19290d%3A0x5125ec57891fb4d7!2sPathway!5e1!3m2!1sen!2sbd!4v1680585946197!5m2!1sen!2sbd', '2023-05-18 06:12:00', '2023-05-18 07:56:21'),
(13, 'email', 'pathwaydschool@gmail.com', '2023-05-18 07:20:35', '2023-05-18 07:56:21'),
(14, 'facebook_page', 'https://www.facebook.com/PathwayDrivingTrainingSchool', '2023-05-18 07:46:51', '2023-05-18 07:56:21'),
(15, 'youtube_channel', 'https://www.youtube.com/PathwayBD', '2023-05-18 07:46:51', '2023-05-18 07:56:21'),
(16, 'linkedin', 'https://www.linkedin.com/in/pathway-driving-training-school?fbclid=IwAR3cQbaOK4Ck2pfmSL0odk43BBR648LIYq93t2_6hIVR2FNG_FHPToUVQBM', '2023-05-18 07:46:51', '2023-05-18 07:56:21'),
(17, 'instagram', 'https://www.instagram.com/pathwaydrivingtrainingschool/?fbclid=IwAR0FEEOnQ-hPsKCC5TZmmhFpRn6KaADOgyL1G9wGhBuGhhiC6NQbJWugNvk', '2023-05-18 07:46:51', '2023-05-18 07:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `ssl_payments`
--

CREATE TABLE `ssl_payments` (
  `id` int NOT NULL,
  `enroll_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `status` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `currency` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `ssl_payments`
--

INSERT INTO `ssl_payments` (`id`, `enroll_id`, `name`, `email`, `phone`, `amount`, `status`, `transaction_id`, `currency`, `created_at`) VALUES
(1, 2, 'Shamim Ahmed', 'shamimsrk02@gmail.com', '01616531952', 2222, 'Processing', '646479e97b813', 'BDT', '2023-05-17 06:53:29'),
(2, 7, 'Shamim Ahmed', 'shamimsrk02@gmail.com', '01616531952', 1999, 'Processing', '6464ae6e9d0c6', 'BDT', '2023-05-17 10:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendances`
--

CREATE TABLE `student_attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `enroll_id` bigint UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `class_no` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_id_cards`
--

CREATE TABLE `student_id_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `enroll_id` bigint UNSIGNED NOT NULL,
  `verification_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theory_classes`
--

CREATE TABLE `theory_classes` (
  `id` bigint UNSIGNED NOT NULL,
  `day` bigint UNSIGNED DEFAULT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theory_classes`
--

INSERT INTO `theory_classes` (`id`, `day`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 7, 1, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(2, 1, 1, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(3, 7, 2, '2023-05-16 08:29:04', '2023-05-16 08:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `training_process_videos`
--

CREATE TABLE `training_process_videos` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_process_videos`
--

INSERT INTO `training_process_videos` (`id`, `title`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Our Training Process', 'https://www.youtube.com/watch?v=oSEkdLGGCSY', '2023-05-16 08:29:04', '2023-05-16 08:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `image`, `id_no`, `otp_verified_at`, `password`, `branch_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'RH Rony', 'rhrony0009@gmail.com', '01839096877', NULL, NULL, '2023-05-16 08:29:04', '$2y$10$uU.CEOFhaq6IM4fIhfvulO7PU1dIoMBmAy10YhjSAiRVgyTYoAG3e', NULL, NULL, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(2, 'Shahedul Islam Efty', 'efty@imbdagency.com', '01797463378', NULL, NULL, '2023-05-16 08:29:04', '$2y$10$IcxpcSnmowdXopQjBf610.9PyakjDYTL/l/9Cq/6zdcvYhS6XzR6C', 2, NULL, '2023-05-16 08:29:04', '2023-05-17 07:25:40'),
(3, 'Mahadi Hasan Fahim', 'fahim@imbdagency.com', '01881012561', NULL, NULL, '2023-05-16 08:29:04', '$2y$10$ptS.dDIOQmp/cDmXO6u7SuP6.rVYr8oTrUtbKIy.s8R09IKnV7UnK', NULL, NULL, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(4, 'Shamim Ahmed', 'shamimsrk02@gmail.com', '01616531952', NULL, NULL, '2023-05-16 08:29:04', '$2y$10$oSR8CZPs7RsQtqkH4aa7m.nZGTpTaTqjydlVw/LffEmiBP/11Ltkq', NULL, NULL, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(5, 'Phyllis Le', 'pewelymadi@mailinator.com', '01568956895', NULL, NULL, NULL, '$2y$10$Xhxxk6iRKJeFFXo/kjaQ4ec8r1BAzbLOxIqR8KDPf0EZKcPefha2O', 1, NULL, '2023-05-17 07:25:17', '2023-05-17 07:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_otps`
--

CREATE TABLE `user_otps` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_otps`
--

INSERT INTO `user_otps` (`id`, `user_id`, `otp`, `expire_at`, `created_at`, `updated_at`) VALUES
(1, 1, '9506', NULL, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(2, 2, '3310', NULL, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(3, 3, '7273', NULL, '2023-05-16 08:29:04', '2023-05-16 08:29:04'),
(4, 4, '4774', NULL, '2023-05-16 08:29:04', '2023-05-16 08:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `video_courses`
--

CREATE TABLE `video_courses` (
  `id` bigint UNSIGNED NOT NULL,
  `course_category` bigint UNSIGNED NOT NULL,
  `course_type` bigint UNSIGNED DEFAULT NULL,
  `course_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_parts`
--
ALTER TABLE `about_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_expenses`
--
ALTER TABLE `account_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_expenses_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `account_incomes`
--
ALTER TABLE `account_incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_incomes_branch_id_foreign` (`branch_id`),
  ADD KEY `account_incomes_enroll_id_foreign` (`enroll_id`);

--
-- Indexes for table `banner_parts`
--
ALTER TABLE `banner_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_schedules`
--
ALTER TABLE `booked_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booked_schedules_enroll_id_foreign` (`enroll_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_capabilities`
--
ALTER TABLE `branch_capabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_capabilities_branch_id_foreign` (`branch_id`),
  ADD KEY `branch_capabilities_category_id_foreign` (`category_id`);

--
-- Indexes for table `branch_parts`
--
ALTER TABLE `branch_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificates_enroll_id_foreign` (`enroll_id`);

--
-- Indexes for table `certified_by_parts`
--
ALTER TABLE `certified_by_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_videos`
--
ALTER TABLE `class_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_videos_vid_course_id_foreign` (`vid_course_id`);

--
-- Indexes for table `contact_parts`
--
ALTER TABLE `contact_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter_facts`
--
ALTER TABLE `counter_facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_category_id_foreign` (`category_id`),
  ADD KEY `courses_type_id_foreign` (`type_id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_slots`
--
ALTER TABLE `course_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_slots_branch_id_foreign` (`branch_id`),
  ADD KEY `course_slots_day_foreign` (`day`);

--
-- Indexes for table `course_types`
--
ALTER TABLE `course_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `director_speech_parts`
--
ALTER TABLE `director_speech_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrolls_user_id_foreign` (`user_id`),
  ADD KEY `enrolls_branch_id_foreign` (`branch_id`),
  ADD KEY `enrolls_course_id_foreign` (`course_id`),
  ADD KEY `enrolls_course_category_foreign` (`course_category`),
  ADD KEY `enrolls_course_type_foreign` (`course_type`),
  ADD KEY `enrolls_course_slot_foreign` (`course_slot`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_parts`
--
ALTER TABLE `feature_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i_d_cards`
--
ALTER TABLE `i_d_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `i_d_cards_user_id_foreign` (`user_id`);

--
-- Indexes for table `manager_signatures`
--
ALTER TABLE `manager_signatures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager_signatures_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_course_id_foreign` (`course_id`),
  ADD KEY `quizzes_course_type_foreign` (`course_type`);

--
-- Indexes for table `quiz_scores`
--
ALTER TABLE `quiz_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_scores_enrollment_id_foreign` (`enrollment_id`),
  ADD KEY `quiz_scores_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_course_id_foreign` (`course_id`),
  ADD KEY `reviews_enrollment_id_foreign` (`enrollment_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ssl_payments`
--
ALTER TABLE `ssl_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_attendances_enroll_id_foreign` (`enroll_id`);

--
-- Indexes for table `student_id_cards`
--
ALTER TABLE `student_id_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id_cards_user_id_foreign` (`user_id`),
  ADD KEY `student_id_cards_enroll_id_foreign` (`enroll_id`);

--
-- Indexes for table `theory_classes`
--
ALTER TABLE `theory_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theory_classes_day_foreign` (`day`),
  ADD KEY `theory_classes_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `training_process_videos`
--
ALTER TABLE `training_process_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD KEY `users_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `user_otps`
--
ALTER TABLE `user_otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_otps_user_id_foreign` (`user_id`);

--
-- Indexes for table `video_courses`
--
ALTER TABLE `video_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_courses_course_category_foreign` (`course_category`),
  ADD KEY `video_courses_course_type_foreign` (`course_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_parts`
--
ALTER TABLE `about_parts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account_expenses`
--
ALTER TABLE `account_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_incomes`
--
ALTER TABLE `account_incomes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banner_parts`
--
ALTER TABLE `banner_parts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booked_schedules`
--
ALTER TABLE `booked_schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branch_capabilities`
--
ALTER TABLE `branch_capabilities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branch_parts`
--
ALTER TABLE `branch_parts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certified_by_parts`
--
ALTER TABLE `certified_by_parts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `class_videos`
--
ALTER TABLE `class_videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_parts`
--
ALTER TABLE `contact_parts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counter_facts`
--
ALTER TABLE `counter_facts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_slots`
--
ALTER TABLE `course_slots`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_types`
--
ALTER TABLE `course_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `director_speech_parts`
--
ALTER TABLE `director_speech_parts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enrolls`
--
ALTER TABLE `enrolls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feature_parts`
--
ALTER TABLE `feature_parts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `i_d_cards`
--
ALTER TABLE `i_d_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager_signatures`
--
ALTER TABLE `manager_signatures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_scores`
--
ALTER TABLE `quiz_scores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ssl_payments`
--
ALTER TABLE `ssl_payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_id_cards`
--
ALTER TABLE `student_id_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theory_classes`
--
ALTER TABLE `theory_classes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `training_process_videos`
--
ALTER TABLE `training_process_videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_otps`
--
ALTER TABLE `user_otps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `video_courses`
--
ALTER TABLE `video_courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_expenses`
--
ALTER TABLE `account_expenses`
  ADD CONSTRAINT `account_expenses_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`);

--
-- Constraints for table `account_incomes`
--
ALTER TABLE `account_incomes`
  ADD CONSTRAINT `account_incomes_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `account_incomes_enroll_id_foreign` FOREIGN KEY (`enroll_id`) REFERENCES `enrolls` (`id`);

--
-- Constraints for table `booked_schedules`
--
ALTER TABLE `booked_schedules`
  ADD CONSTRAINT `booked_schedules_enroll_id_foreign` FOREIGN KEY (`enroll_id`) REFERENCES `enrolls` (`id`);

--
-- Constraints for table `branch_capabilities`
--
ALTER TABLE `branch_capabilities`
  ADD CONSTRAINT `branch_capabilities_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `branch_capabilities_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `course_categories` (`id`);

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_enroll_id_foreign` FOREIGN KEY (`enroll_id`) REFERENCES `enrolls` (`id`);

--
-- Constraints for table `class_videos`
--
ALTER TABLE `class_videos`
  ADD CONSTRAINT `class_videos_vid_course_id_foreign` FOREIGN KEY (`vid_course_id`) REFERENCES `video_courses` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `course_categories` (`id`),
  ADD CONSTRAINT `courses_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `course_types` (`id`);

--
-- Constraints for table `course_slots`
--
ALTER TABLE `course_slots`
  ADD CONSTRAINT `course_slots_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `course_slots_day_foreign` FOREIGN KEY (`day`) REFERENCES `days` (`id`);

--
-- Constraints for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD CONSTRAINT `enrolls_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `enrolls_course_category_foreign` FOREIGN KEY (`course_category`) REFERENCES `course_categories` (`id`),
  ADD CONSTRAINT `enrolls_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `enrolls_course_slot_foreign` FOREIGN KEY (`course_slot`) REFERENCES `course_slots` (`id`),
  ADD CONSTRAINT `enrolls_course_type_foreign` FOREIGN KEY (`course_type`) REFERENCES `course_types` (`id`),
  ADD CONSTRAINT `enrolls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `i_d_cards`
--
ALTER TABLE `i_d_cards`
  ADD CONSTRAINT `i_d_cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `manager_signatures`
--
ALTER TABLE `manager_signatures`
  ADD CONSTRAINT `manager_signatures_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `course_categories` (`id`),
  ADD CONSTRAINT `quizzes_course_type_foreign` FOREIGN KEY (`course_type`) REFERENCES `course_types` (`id`);

--
-- Constraints for table `quiz_scores`
--
ALTER TABLE `quiz_scores`
  ADD CONSTRAINT `quiz_scores_enrollment_id_foreign` FOREIGN KEY (`enrollment_id`) REFERENCES `enrolls` (`id`),
  ADD CONSTRAINT `quiz_scores_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `reviews_enrollment_id_foreign` FOREIGN KEY (`enrollment_id`) REFERENCES `enrolls` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD CONSTRAINT `student_attendances_enroll_id_foreign` FOREIGN KEY (`enroll_id`) REFERENCES `enrolls` (`id`);

--
-- Constraints for table `student_id_cards`
--
ALTER TABLE `student_id_cards`
  ADD CONSTRAINT `student_id_cards_enroll_id_foreign` FOREIGN KEY (`enroll_id`) REFERENCES `enrolls` (`id`),
  ADD CONSTRAINT `student_id_cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `theory_classes`
--
ALTER TABLE `theory_classes`
  ADD CONSTRAINT `theory_classes_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `theory_classes_day_foreign` FOREIGN KEY (`day`) REFERENCES `days` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`);

--
-- Constraints for table `user_otps`
--
ALTER TABLE `user_otps`
  ADD CONSTRAINT `user_otps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `video_courses`
--
ALTER TABLE `video_courses`
  ADD CONSTRAINT `video_courses_course_category_foreign` FOREIGN KEY (`course_category`) REFERENCES `course_categories` (`id`),
  ADD CONSTRAINT `video_courses_course_type_foreign` FOREIGN KEY (`course_type`) REFERENCES `course_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
