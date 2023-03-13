-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 01:52 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office_quize`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'farhan@gmail.com', '$2a$12$VBQf/E2t/cCf/9JN15dzGO52UAdtP/xivDLNqp4.4vu9Fo6HOOdFO', 1, '2023-03-07 05:59:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_bangla_grammers`
--

CREATE TABLE `category_bangla_grammers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_bangla_grammers`
--

INSERT INTO `category_bangla_grammers` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'সন্ধি', '2023-03-13 05:10:42', '2023-03-13 05:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `category_bangla_literatures`
--

CREATE TABLE `category_bangla_literatures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_bangla_literatures`
--

INSERT INTO `category_bangla_literatures` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Rabindro', '2023-03-13 05:37:13', '2023-03-13 05:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `category_englishes`
--

CREATE TABLE `category_englishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `english_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_englishes`
--

INSERT INTO `category_englishes` (`id`, `english_category`, `created_at`, `updated_at`) VALUES
(1, 'Noun', NULL, NULL),
(4, 'Pronoun', '2023-03-13 00:56:46', '2023-03-13 00:56:46'),
(5, 'Verb', '2023-03-13 01:28:47', '2023-03-13 01:28:47'),
(6, 'Adverb', '2023-03-13 02:13:51', '2023-03-13 02:13:51'),
(7, 'Adjective', '2023-03-13 02:31:58', '2023-03-13 02:31:58'),
(8, 'Preposition', '2023-03-13 02:33:33', '2023-03-13 02:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `category_english_literatures`
--

CREATE TABLE `category_english_literatures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_english_literatures`
--

INSERT INTO `category_english_literatures` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(2, 'Medium', '2023-03-13 04:11:09', '2023-03-13 04:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `category_maths`
--

CREATE TABLE `category_maths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_maths`
--

INSERT INTO `category_maths` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Algbera', '2023-03-13 06:09:01', '2023-03-13 06:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `currentaffairs`
--

CREATE TABLE `currentaffairs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currentaffairs`
--

INSERT INTO `currentaffairs` (`id`, `subject_name`, `title`, `month_year`, `pdf_file_path`, `created_at`, `updated_at`) VALUES
(3, 'Bangladesh', 'Dsdfsg', 'March 2023', 'file/pdf/Currentaffair/bangladesh-march-2023-dsdfsg.pdf', '2023-03-12 07:42:20', '2023-03-12 07:42:20'),
(4, 'International', 'Iwssdfsdf', 'March 2023', 'file/pdf/Currentaffair/international-march-2023-iwssdfsdf.pdf', '2023-03-12 07:51:52', '2023-03-12 07:51:52'),
(5, 'Misc', 'Masdsadfsdfsdf', 'March 2023', 'file/pdf/Currentaffair/misc-march-2023-masdsadfsdfsdf.pdf', '2023-03-12 07:52:21', '2023-03-12 07:52:21'),
(6, 'Bangladesh', 'Bangladesh one', 'April 2023', 'file/pdf/Currentaffair/bangladesh-april-2023-bangladesh-one.pdf', '2023-03-12 23:30:10', '2023-03-12 23:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE `ebooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapter_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`id`, `class_name`, `subject_name`, `chapter_name`, `pdf_file_path`, `created_at`, `updated_at`) VALUES
(2, 'Nine-Ten', 'General Math', 'Chapter 2', 'file/pdf/ebook/nine-ten-general-math-chapter-2.pdf', '2023-03-12 06:26:52', '2023-03-12 06:26:52'),
(3, 'Nine-Ten', 'Higher Math', 'Chapter 1', 'file/pdf/ebook/nine-ten-higher-math-chapter-1.pdf', '2023-03-12 06:32:05', '2023-03-12 06:32:05'),
(4, 'Nine-Ten', 'General Science', 'Chapter 1', 'file/pdf/ebook/nine-ten-general-science-chapter-1.pdf', '2023-03-12 06:33:09', '2023-03-12 06:33:09'),
(5, 'Eight', 'General Math', 'Chapter 1', 'file/pdf/ebook/eight-general-math-chapter-1.pdf', '2023-03-12 06:46:50', '2023-03-12 06:46:50'),
(6, 'Eight', 'Higher Math', 'Chapter 1', 'file/pdf/ebook/eight-higher-math-chapter-1.pdf', '2023-03-12 06:48:11', '2023-03-12 06:48:11'),
(7, 'Eight', 'General Science', 'Chapter 1', 'file/pdf/ebook/eight-general-science-chapter-1.pdf', '2023-03-12 06:48:23', '2023-03-12 06:48:23'),
(8, 'Seven', 'General Math', 'Chapter 1', 'file/pdf/ebook/seven-general-math-chapter-1.pdf', '2023-03-12 06:50:17', '2023-03-12 06:50:17'),
(9, 'Seven', 'General Science', 'Chapter 1', 'file/pdf/ebook/seven-general-science-chapter-1.pdf', '2023-03-12 07:49:34', '2023-03-12 07:49:34'),
(10, 'Seven', 'Higher Math', 'Chapter 1', 'file/pdf/ebook/seven-higher-math-chapter-1.pdf', '2023-03-12 07:49:54', '2023-03-12 07:49:54'),
(11, 'Nine-Ten', 'General Math', 'Chapter 1', 'file/pdf/ebook/nine-ten-general-math-chapter-1.pdf', '2023-03-12 23:36:28', '2023-03-12 23:36:28'),
(12, 'Nine-Ten', 'General Math', 'Chapter 3', 'file/pdf/ebook/nine-ten-general-math-chapter-3.pdf', '2023-03-12 23:36:42', '2023-03-12 23:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `exam_mcqs`
--

CREATE TABLE `exam_mcqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_ans` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_mcq_results`
--

CREATE TABLE `exam_mcq_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `total_correct` int(11) NOT NULL,
  `exam_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`exam_info`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_subjects`
--

CREATE TABLE `exam_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_subject_topics`
--

CREATE TABLE `exam_subject_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` int(11) NOT NULL,
  `topic_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learns`
--

CREATE TABLE `learns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_name` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learns`
--

INSERT INTO `learns` (`id`, `subject_name`, `topic_name`, `title`, `pdf_file_path`, `created_at`, `updated_at`) VALUES
(6, 'English Grammer', 7, 'sdfgsfdgsdfg', 'file/pdf/learn/english_grammer/sdfgsfdgsdfg.pdf', '2023-03-13 02:32:17', '2023-03-13 02:32:17'),
(7, 'English Grammer', 1, 'asdfsdf', 'file/pdf/learn/english_grammer/asdfsdf.pdf', '2023-03-13 02:32:56', '2023-03-13 02:32:56'),
(8, 'English Grammer', 8, 'Dafdadsfsdfsdf', 'file/pdf/learn/english_grammer/dafdadsfsdfsdf.pdf', '2023-03-13 02:33:58', '2023-03-13 02:33:58'),
(12, 'English Literature', 1, 'sfsdfsdf', 'file/pdf/bangla_grammer/sfsdfsdf.pdf', '2023-03-13 05:20:35', '2023-03-13 05:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `learn_bangla_grammers`
--

CREATE TABLE `learn_bangla_grammers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_name` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learn_bangla_grammers`
--

INSERT INTO `learn_bangla_grammers` (`id`, `subject_name`, `topic_name`, `title`, `pdf_file_path`, `created_at`, `updated_at`) VALUES
(2, 'Language Grammer', 1, 'fcsdfsdf', 'file/pdf/bangla_grammer/fcsdfsdf.pdf', '2023-03-13 05:22:44', '2023-03-13 05:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `learn_bangla_literatures`
--

CREATE TABLE `learn_bangla_literatures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_name` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learn_bangla_literatures`
--

INSERT INTO `learn_bangla_literatures` (`id`, `subject_name`, `topic_name`, `title`, `pdf_file_path`, `created_at`, `updated_at`) VALUES
(1, 'Bangla Literature', 1, 'fsdfsdf', 'file/pdf/learn/bangla_literature/fsdfsdf.pdf', '2023-03-13 05:52:07', '2023-03-13 05:52:07'),
(2, 'Bangla Literature', 1, 'fdgdfgdfg', 'file/pdf/learn/bangla_literature/fdgdfgdfg.pdf', '2023-03-13 06:18:11', '2023-03-13 06:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `learn_english_literatures`
--

CREATE TABLE `learn_english_literatures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_name` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learn_english_literatures`
--

INSERT INTO `learn_english_literatures` (`id`, `subject_name`, `topic_name`, `title`, `pdf_file_path`, `created_at`, `updated_at`) VALUES
(1, 'English Literature', 2, 'Dsdfsf', 'file/pdf/learn/english_literature/dsdfsf.pdf', '2023-03-13 04:45:25', '2023-03-13 04:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `learn_maths`
--

CREATE TABLE `learn_maths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_name` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learn_maths`
--

INSERT INTO `learn_maths` (`id`, `subject_name`, `topic_name`, `title`, `pdf_file_path`, `created_at`, `updated_at`) VALUES
(1, 'Math', 1, 'rgdgdfgdfg', 'file/pdf/learn/math/rgdgdfgdfg.pdf', '2023-03-13 06:33:03', '2023-03-13 06:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_29_221737_create_video_courses_table', 1),
(6, '2022_07_30_164718_create_exam_subjects_table', 1),
(7, '2022_07_30_165836_create_exam_subject_topics_table', 1),
(8, '2022_07_30_192502_create_exam_mcqs', 1),
(9, '2022_07_30_194127_modife_name_to_topic_name', 1),
(10, '2022_07_30_200450_create_exam_mcq_results', 1),
(11, '2022_07_30_203129_create_model_test_titles', 1),
(12, '2022_07_30_203346_create_model_test_subjects', 1),
(13, '2022_07_30_204158_create_model_test_topics', 1),
(14, '2022_07_30_211042_create_model_test_mcqs', 1),
(15, '2022_07_30_211737_create_model_test_results', 1),
(16, '2022_07_30_213647_create_quiz_subject_table', 1),
(17, '2022_07_30_213731_create_quiz_topics_table', 1),
(18, '2022_07_30_213844_create_quizs_table', 1),
(19, '2022_07_30_215524_create_quiz_results_table', 1),
(20, '2022_07_30_222845_create_products_table', 1),
(21, '2022_08_02_214741_create_orders_table', 1),
(22, '2022_08_10_075354_add_colleage_to_users_table', 1),
(23, '2022_08_10_085405_create_notifications_table', 1),
(24, '2022_08_14_185811_create_admins_tables', 1),
(25, '2022_08_19_151202_create_payments_table', 1),
(29, '2023_03_12_065853_create_vocabulary_table', 3),
(30, '2023_03_12_073503_create_vocabularies_table', 4),
(33, '2023_03_12_090030_create_ebooks_table', 5),
(34, '2023_03_12_130429_create_currentaffairs_table', 6),
(35, '2023_03_13_062936_create_englishcategories_table', 7),
(36, '2023_03_13_063232_create_categoryenglishes_table', 8),
(37, '2023_03_13_063828_create_category_englishes_table', 9),
(39, '2023_03_09_080439_create_learns_table', 10),
(40, '2023_03_13_100247_create_category_english_literatures_table', 11),
(41, '2023_03_13_103810_create_learn_english_literatures_table', 12),
(42, '2023_03_13_105607_create_category_bangla_grammers_table', 13),
(43, '2023_03_13_111804_create_learn_bangla_grammers_table', 14),
(44, '2023_03_13_113516_create_category_bangla_literatures_table', 15),
(45, '2023_03_13_114504_create_learn_bangla_literatures_table', 16),
(46, '2023_03_13_120620_create_category_maths_table', 17),
(47, '2023_03_13_121419_create_learn_maths_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_test_mcqs`
--

CREATE TABLE `model_test_mcqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_id` int(11) NOT NULL,
  `test_subject_id` int(11) NOT NULL,
  `test_topic_id` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_ans` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_test_results`
--

CREATE TABLE `model_test_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `test_subject_id` int(11) NOT NULL,
  `test_topic_id` int(11) NOT NULL,
  `total_correct` int(11) NOT NULL,
  `exam_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`exam_info`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_test_subjects`
--

CREATE TABLE `model_test_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_id` int(11) NOT NULL,
  `test_subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_test_titles`
--

CREATE TABLE `model_test_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_test_topics`
--

CREATE TABLE `model_test_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_id` int(11) NOT NULL,
  `test_subject_id` int(11) NOT NULL,
  `test_topic_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ALL',
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `type`, `title`, `message`, `created_at`, `updated_at`) VALUES
(1, NULL, 'ALL', 'FarhaN Fahidur Rahim', 'FFFFFF', '2023-03-09 04:06:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_bill` int(11) NOT NULL,
  `info` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trx_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizs`
--

CREATE TABLE `quizs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_subject_id` int(11) NOT NULL,
  `quiz_topics_id` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_ans` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_topics_id` int(11) NOT NULL,
  `quiz_subject_id` int(11) NOT NULL,
  `total_correct` int(11) NOT NULL,
  `exam_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`exam_info`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_subject`
--

CREATE TABLE `quiz_subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_topics`
--

CREATE TABLE `quiz_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_subject_id` int(11) NOT NULL,
  `topic_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `institute` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_courses`
--

CREATE TABLE `video_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_courses`
--

INSERT INTO `video_courses` (`id`, `title`, `class`, `subject_name`, `url`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Ut enim et deserunt', 'Bond', 'Alea Knowles', 'Atque id officia no', 'C:\\xampp\\htdocs\\office\\Nahid24\\public\\/upload/video_course_thumbnail/1678169399975513.jpg', '2023-03-07 06:09:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vocabularies`
--

CREATE TABLE `vocabularies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vocabularies`
--

INSERT INTO `vocabularies` (`id`, `topic_name`, `title`, `pdf_file_path`, `created_at`, `updated_at`) VALUES
(11, 'Barrons 333', 'Part 3', 'file/pdf/vocabulary/barrons-333part-3-bOk.pdf', '2023-03-12 01:57:52', '2023-03-12 01:57:52'),
(12, 'Barrons 800', 'Part 1', 'file/pdf/vocabulary/barrons-800part-1-vYG.pdf', '2023-03-12 02:01:03', '2023-03-12 02:01:03'),
(14, 'Word Smart 1', 'Part 1', 'file/pdf/vocabulary/word-smart-1part-1-vjb.pdf', '2023-03-12 02:07:39', '2023-03-12 02:07:39'),
(15, 'Word Smart 2', 'Part 1', 'file/pdf/vocabulary/word-smart-2part-1-2xS.pdf', '2023-03-12 02:08:53', '2023-03-12 02:08:53'),
(16, 'Manhattan-1000', 'Part 1', 'file/pdf/vocabulary/manhattan-1000part-1-8f6.pdf', '2023-03-12 02:12:27', '2023-03-12 02:12:27'),
(17, 'Magoosh-1000', 'Part 1', 'file/pdf/vocabulary/magoosh-1000part-1-JOC.pdf', '2023-03-12 02:13:57', '2023-03-12 02:13:57'),
(20, 'Daily Editorial', 'Part 2', 'file/pdf/vocabulary/daily-editorialpart-2-0P3.pdf', '2023-03-12 02:16:59', '2023-03-12 02:16:59'),
(21, 'Barrons 333', 'Part 1', 'file/pdf/vocabulary/barrons-333part-1-J7z.pdf', '2023-03-12 23:37:45', '2023-03-12 23:37:45'),
(22, 'Barrons 333', 'FFFFFRfdfsdf', 'file/pdf/vocabulary/barrons-333fffffrfdfsdf-web.pdf', '2023-03-12 23:38:05', '2023-03-12 23:38:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_bangla_grammers`
--
ALTER TABLE `category_bangla_grammers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_bangla_literatures`
--
ALTER TABLE `category_bangla_literatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_englishes`
--
ALTER TABLE `category_englishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_english_literatures`
--
ALTER TABLE `category_english_literatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_maths`
--
ALTER TABLE `category_maths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currentaffairs`
--
ALTER TABLE `currentaffairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_mcqs`
--
ALTER TABLE `exam_mcqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_mcq_results`
--
ALTER TABLE `exam_mcq_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_subjects`
--
ALTER TABLE `exam_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_subject_topics`
--
ALTER TABLE `exam_subject_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `learns`
--
ALTER TABLE `learns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learns_topic_name_foreign` (`topic_name`);

--
-- Indexes for table `learn_bangla_grammers`
--
ALTER TABLE `learn_bangla_grammers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learn_bangla_grammers_topic_name_foreign` (`topic_name`);

--
-- Indexes for table `learn_bangla_literatures`
--
ALTER TABLE `learn_bangla_literatures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learn_bangla_literatures_topic_name_foreign` (`topic_name`);

--
-- Indexes for table `learn_english_literatures`
--
ALTER TABLE `learn_english_literatures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learn_english_literatures_topic_name_foreign` (`topic_name`);

--
-- Indexes for table `learn_maths`
--
ALTER TABLE `learn_maths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learn_maths_topic_name_foreign` (`topic_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_test_mcqs`
--
ALTER TABLE `model_test_mcqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_test_results`
--
ALTER TABLE `model_test_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_test_subjects`
--
ALTER TABLE `model_test_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_test_titles`
--
ALTER TABLE `model_test_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_test_topics`
--
ALTER TABLE `model_test_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizs`
--
ALTER TABLE `quizs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_subject`
--
ALTER TABLE `quiz_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_topics`
--
ALTER TABLE `quiz_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_number_unique` (`number`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video_courses`
--
ALTER TABLE `video_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vocabularies`
--
ALTER TABLE `vocabularies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_bangla_grammers`
--
ALTER TABLE `category_bangla_grammers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_bangla_literatures`
--
ALTER TABLE `category_bangla_literatures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_englishes`
--
ALTER TABLE `category_englishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_english_literatures`
--
ALTER TABLE `category_english_literatures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_maths`
--
ALTER TABLE `category_maths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currentaffairs`
--
ALTER TABLE `currentaffairs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam_mcqs`
--
ALTER TABLE `exam_mcqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_mcq_results`
--
ALTER TABLE `exam_mcq_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_subjects`
--
ALTER TABLE `exam_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_subject_topics`
--
ALTER TABLE `exam_subject_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learns`
--
ALTER TABLE `learns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `learn_bangla_grammers`
--
ALTER TABLE `learn_bangla_grammers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `learn_bangla_literatures`
--
ALTER TABLE `learn_bangla_literatures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `learn_english_literatures`
--
ALTER TABLE `learn_english_literatures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learn_maths`
--
ALTER TABLE `learn_maths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `model_test_mcqs`
--
ALTER TABLE `model_test_mcqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_test_results`
--
ALTER TABLE `model_test_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_test_subjects`
--
ALTER TABLE `model_test_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_test_titles`
--
ALTER TABLE `model_test_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_test_topics`
--
ALTER TABLE `model_test_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizs`
--
ALTER TABLE `quizs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_subject`
--
ALTER TABLE `quiz_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_topics`
--
ALTER TABLE `quiz_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_courses`
--
ALTER TABLE `video_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vocabularies`
--
ALTER TABLE `vocabularies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `learns`
--
ALTER TABLE `learns`
  ADD CONSTRAINT `learns_topic_name_foreign` FOREIGN KEY (`topic_name`) REFERENCES `category_englishes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learn_bangla_grammers`
--
ALTER TABLE `learn_bangla_grammers`
  ADD CONSTRAINT `learn_bangla_grammers_topic_name_foreign` FOREIGN KEY (`topic_name`) REFERENCES `category_bangla_grammers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learn_bangla_literatures`
--
ALTER TABLE `learn_bangla_literatures`
  ADD CONSTRAINT `learn_bangla_literatures_topic_name_foreign` FOREIGN KEY (`topic_name`) REFERENCES `category_bangla_literatures` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learn_english_literatures`
--
ALTER TABLE `learn_english_literatures`
  ADD CONSTRAINT `learn_english_literatures_topic_name_foreign` FOREIGN KEY (`topic_name`) REFERENCES `category_english_literatures` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learn_maths`
--
ALTER TABLE `learn_maths`
  ADD CONSTRAINT `learn_maths_topic_name_foreign` FOREIGN KEY (`topic_name`) REFERENCES `category_maths` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
