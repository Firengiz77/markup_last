-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 02:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `markup`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `detail`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, '{\"az\":\"Arter - Professional Biznes Həlləri\",\"de\":\"Arter - Professional Biznes Həlləri\"}', '{\"az\":\"<h4 style=\\\"text-align: center;\\\"><span style=\\\"font-weight: normal;\\\">Biznesinizi rahat və səmərəli idarə etmək üçün 15 illik təcrübəyə əsaslanan qabaqcıl ERP həlləri təqdim edirik.&nbsp;<span style=\\\"font-family: var(--bs-body-font-family);\\\">Məqsədimiz müəssisənizin proseslərini ölçülə bilən və effektiv hala gətirməkdir. Missiyamız, idarəetmə sistemlərini ən yüksək standartlara uyğun şəkildə təmin edərək, prosesləri sadələşdirmək və optimallaşdırmaqdır.&nbsp;</span><span style=\\\"font-family: var(--bs-body-font-family);\\\">Bu yanaşma, proseslərə uyğunlaşan, ölçülə bilən, sürətli məlumat axını və səmərəli resurs istifadəsi təmin edən həllər deməkdir.</span></span></h4>\"}', '{\"az\":\"Haqqımızda\",\"de\":\"Haqqımızda de\"}', '{\"az\":\"Haqqımızda\",\"de\":\"Haqqımızdade\"}', '{\"az\":\"Haqqımızda\",\"de\":\"Haqqımızdade\"}', '2024-04-25 11:09:45', '2024-05-29 12:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `desc`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, '{\"az\":\"test\",\"de\":\"testde\",\"en\":\"test en\"}', '{\"az\":\"test\",\"ru\":\"testde\",\"en\":\"test-en\",\"de\":\"testde\"}', '{\"az\":\"<p>aaaaaaaaaaaaaaaaa</p><p>bbbbbbbbbbbb</p><p>ccccccccccccc</p><p>dddddddddddddddd</p><p><br></p>\",\"de\":\"<p>test  editttt <span style=\\\"font-family: var(--bs-body-font-family); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\\\">vfdssdfsf</span></p><p><br></p><p>vfdssdfsf</p><p><br></p>\",\"en\":\"<p>test&nbsp; editttt&nbsp;<span style=\\\"font-family: var(--bs-body-font-family); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\\\">vfdssdfsf</span></p><p><br></p>\"}', 'uploads/blogs/blogs_image1713264885.jpg', '{\"az\":\"test\",\"de\":\"test de\",\"en\":\"test\"}', '{\"az\":\"test\",\"de\":\"test de\",\"en\":\"test\"}', '{\"az\":\"test\",\"de\":\"test de\",\"en\":\"test\"}', '2024-04-16 10:54:45', '2024-05-29 12:31:54'),
(2, '{\"az\":\"Test\"}', '{\"az\":\"test-1\",\"en\":\"testeen\",\"ru\":\"testeru\"}', '{\"az\":\"<p>Test<br></p>\"}', 'uploads/blogs/blogs_image1714043497.webp', '{\"az\":\"Test\"}', '{\"az\":\"Test\"}', '{\"az\":\"Test\"}', '2024-04-25 11:11:37', '2024-06-11 11:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `blog_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`blog_id`, `tag_id`) VALUES
(4, 14),
(6, 17),
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, '{\"az\":\"Kiçik ölçülü layihələr\"}', '{\"az\":\"kicik-olculu-layiheler\"}', NULL, NULL, NULL, '2024-04-12 10:41:17', '2024-04-16 11:03:34'),
(2, '{\"az\":\"Orta Ölçülü layihələr\"}', '{\"az\":\"orta-olculu-layiheler\"}', NULL, NULL, NULL, '2024-04-16 11:03:54', '2024-04-16 11:03:54'),
(3, '{\"az\":\"Böyük ölçülü layihələr\"}', '{\"az\":\"boyuk-olculu-layiheler\"}', NULL, NULL, NULL, '2024-04-16 11:04:06', '2024-04-16 11:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `map` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `phone`, `address`, `email`, `map`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, '+994 050 201 95 44', '{\"az\":\"Bakı şəhəri, Nərimanov rayonu, Yusif Vəzir Çəmənzəminli, 119C, Afen Plaza 3-cü mərtəbə\",\"de\":\"Bakı şəhəri, Nərimanov rayonu, Yusif Vəzir Çəmənzəminli, 119C, Afen Plaza 3-cü mərtəbə\"}', 'info@arter.az, sales@arter.az', 'https://maps.google.com/maps?q=hollwood&amp;t=&amp;z=11&amp;ie=UTF8&amp;iwloc=&amp;output=embedhttps://maps.google.com/maps?q=hollwood&amp;t=&amp;z=11&amp;ie=UTF8&amp;iwloc=&amp;output=embed', '{\"az\":\"Contact\",\"de\":\"Contact\"}', '{\"az\":\"Contact\",\"de\":\"Contact\"}', '{\"az\":\"Contact\",\"de\":\"Contact\"}', '2024-04-17 06:03:56', '2024-05-28 12:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` text DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `number`, `title`, `created_at`, `updated_at`) VALUES
(1, '1790', '{\"az\":\"XOSHBƏXT MÜŞTƏRI\"}', '2024-04-16 07:45:35', '2024-04-16 07:45:35'),
(2, '32', '{\"az\":\"TƏHVIL VERILMIŞ LAYIHƏ\"}', '2024-04-16 07:45:45', '2024-04-16 07:45:45'),
(3, '73', '{\"az\":\"TƏCRÜBƏLI MÜTƏXƏSSIS\"}', '2024-04-16 07:46:24', '2024-04-16 07:46:24'),
(4, '321', '{\"az\":\"TƏŞKIL EDILMIŞ TƏDBir s\",\"tr\":\"TƏŞKIL EDILMIŞ TƏDBir\"}', '2024-04-16 07:46:34', '2024-04-16 10:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `from` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `from`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Blog Created', 'New', 1, '2024-03-18 03:09:26', '2024-03-18 03:09:26'),
(2, 'Notification to subscriptions', 'New', 1, '2024-03-18 03:09:26', '2024-03-18 03:09:26'),
(5, 'Contact', 'New', 1, '2024-03-18 03:09:26', '2024-03-18 03:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `email_template_image`
--

CREATE TABLE `email_template_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_template_image`
--

INSERT INTO `email_template_image` (`id`, `parent_id`, `image`, `created_at`, `updated_at`) VALUES
(9, 2, 'http://localhost/storage/app/email_template_image/e8329e4b2b8a77b321c6eb111d3b0e34.png', '2024-03-25 08:05:09', '2024-03-25 08:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `email_template_langs`
--

CREATE TABLE `email_template_langs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_template_langs`
--

INSERT INTO `email_template_langs` (`id`, `parent_id`, `lang`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(5, 1, 'en', 'Blog', '?.\0\0VU\0\0\0\0\0\"\0\0\0\0\0\0Welcome to {app_name}.</p><p><br></p><p>Thanks,</p><p>{app_name}</p><p><br></p>', '2024-03-18 03:09:26', '2024-03-23 14:50:58'),
(15, 1, 'tr', 'Order Complete', '<p>Merhaba,&nbsp;</p><p>{app_name}\'e hoş geldiniz.</p><p><br></p><p>Teşekkürler,</p><p>{app_name}</p><p><br></p>', '2024-03-18 03:09:26', '2024-03-23 15:31:16'),
(21, 2, 'en', 'Order Status', '<p>Hello,&nbsp;</p><p>Welcome to {app_name}.</p><p><br></p><p>Thanks,</p><p>{app_name}</p><p><br></p>', '2024-03-18 03:09:26', '2024-03-23 15:26:55'),
(31, 2, 'tr', 'Order Status', '<p>Merhaba,&nbsp;</p><p>{app_name}\'e hoş geldiniz.</p><p><br></p><p>Teşekkürler,</p><p>{app_name}</p><p><br></p>', '2024-03-18 03:09:26', '2024-03-23 15:27:08'),
(65, 1, 'az', 'Order Complete', '<p>Hello,&nbsp;</p><p>Welcome to {app_name}.</p><p><br></p><p>Thanks,</p><p>{app_name}</p><p><br></p>', '2024-03-21 08:13:53', '2024-03-23 15:30:46'),
(66, 2, 'az', 'Hello', '<p style=\"text-align: center;\"><img src=\"https://www.markup.az/uploads/setting/logo/1739517519660738.png\" alt=\"markup logo\"></p><p style=\"text-align: center;\">MarkUp</p>', '2024-03-21 08:13:53', '2024-03-23 16:09:45'),
(69, 5, 'en', 'Contact', '<p>Ad : {form_name}<br></p><p>Email: {form_email}</p><p>Telefon: {form_phone}<span style=\"font-family: var(--bs-body-font-family); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"font-family: var(--bs-body-font-family); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Qeyd:&nbsp; {form_message}</span></p><p><br></p><p><br></p><p>Təşəkkürlər,</p><p>{app_name}</p><p><br></p>', '2024-03-18 03:09:26', '2024-03-29 03:31:30'),
(70, 5, 'az', 'Contact', '<p>Ad : {form_name}<br></p><p>Email: {form_email}</p><p>Telefon: <span style=\"font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">{</span><span style=\"text-align: var(--bs-body-text-align);\">form_</span><span style=\"font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">phone}</span></p><p>Qeyd: {form_message}</p><p><br></p><p>Təşəkkürlər,</p><p>{app_name}</p><p><br></p>', '2024-03-28 18:21:44', '2024-03-29 03:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `answer` text DEFAULT NULL,
  `question` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `answer`, `question`, `created_at`, `updated_at`) VALUES
(3, '{\"az\":\"ERP sistemindən istifadə etməyin faydaları nələrdir?\"}', '{\"az\":\"Təkmilləşdirilmiş səmərəlilik və məhsuldarlıq  Artan məlumat dəqiqliyi və görünürlük  Departamentlər arasında əməkdaşlığın gücləndirilməsi  Real vaxt anlayışları ilə daha yaxşı qərar qəbulu  Təkmilləşdirilmiş müştəri məmnuniyyəti  Biznesin böyüməsini təmin etmək üçün miqyaslılıq\"}', '2024-05-24 10:18:06', '2024-05-24 10:19:01'),
(4, '{\"az\":\"Hansı ölçülü müəssisələr adətən ERP-dən faydalanır?\"}', '{\"az\":\"ERP sistemləri bütün ölçülü müəssisələr üçün uyğundur. Kiçik müəssisələr əməliyyatları sadələşdirə və rəqabət üstünlüyü əldə edə bilər, böyük təşkilatlar isə səmərəliliyi artıra və mürəkkəb prosesləri idarə edə bilər.\"}', '2024-05-24 10:21:37', '2024-05-24 10:21:37'),
(5, '{\"az\":\"ERP tətbiqi kompleksdirmi?\"}', '{\"az\":\"ERP-nin tətbiqi planlaşdırma və səy tələb etsə də, mütəxəssis komandamız hər addımda sizə rəhbərlik edəcək. Biz düzgün sistemin seçimindən tutmuş məlumat miqrasiyasına və istifadəçi təliminə qədər hamar və səmərəli proses təklif edirik\"}', '2024-05-24 10:22:35', '2024-05-24 10:22:35'),
(6, '{\"az\":\"ERP sisteminin qiyməti nə qədərdir?\"}', '{\"az\":\"ERP sisteminin qiyməti biznesinizin ölçüsü və mürəkkəbliyi, tələb etdiyiniz xüsusiyyətlər və yerləşdirmə modeli kimi amillərdən asılı olaraq dəyişir. Büdcənizə uyğun çevik həllər təklif edirik.\"}', '2024-05-24 10:23:30', '2024-05-24 10:23:30'),
(7, '{\"az\":\"Həyata keçirdikdən sonra hansı dəstəyi təklif edirsiniz?\"}', '{\"az\":\"Davamlı dəstəyin çox vacib olduğunu başa düşürük. Biz istifadəçi təlimi, texniki yardım və sistemə davamlı texniki xidmət də daxil olmaqla hərtərəfli satış sonrası dəstəyi təqdim edirik.\"}', '2024-05-24 10:24:44', '2024-05-24 10:24:44'),
(8, '{\"az\":\"ERP nədir?\"}', '{\"az\":\"Enterprise Resource Planning (ERP) əsas korporativ prosesləri vahid sistemdə birləşdirən hərtərəfli proqram həllidir.\"}', '2024-05-24 10:27:21', '2024-05-24 10:27:21'),
(9, '{\"az\":\"Mənim kiçik bir şirkətim var. Mənə ERP lazımdır?\"}', '{\"az\":\"Qısa cavab HƏ-dir. Və uzun olanı: adətən kiçik şirkətlər böyük müəssisələr kimi prosesləri çətinləşdirməli deyillər. Bu o deməkdir ki, onların klassik ERP sistemlərinə ehtiyacları yoxdur, daha çox ERP proqramının mini versiyası kimidir. Bu sistem növü Biznes İdarəetmə Proqramı adlanır və Kompozisiya tam olaraq budur. Proqram təminatı biznesinizə xidmət etməlidir, əksinə deyil.\"}', '2024-05-27 10:21:20', '2024-05-27 10:21:20'),
(10, '{\"az\":\"stsrt\"}', '{\"az\":\"ret\"}', '2024-06-06 12:21:01', '2024-06-06 12:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `home_pages`
--

CREATE TABLE `home_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detail` longtext DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `signature_image` varchar(191) DEFAULT NULL,
  `title_1` text DEFAULT NULL,
  `title_2` text DEFAULT NULL,
  `title_3` text DEFAULT NULL,
  `title_4` text DEFAULT NULL,
  `detail_1` text DEFAULT NULL,
  `detail_2` text DEFAULT NULL,
  `detail_3` text DEFAULT NULL,
  `detail_4` text DEFAULT NULL,
  `kitchen` int(11) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `customer` int(11) DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_pages`
--

INSERT INTO `home_pages` (`id`, `detail`, `name`, `image`, `signature_image`, `title_1`, `title_2`, `title_3`, `title_4`, `detail_1`, `detail_2`, `detail_3`, `detail_4`, `kitchen`, `experience`, `customer`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, '{\"az\":\"Biz kiçik şirkətik amma ürəyimiz, arzularımız və hədəflərimiz böyükdür!\",\"tr\":\"Incididunt rerum vol\"}', '{\"az\":\"Jone Doe\",\"tr\":\"Brielle Hogan\"}', 'uploads/homepage/homepage_image1712416494.png', 'uploads/homepage/homepage_signature_image1712416494.png', '{\"az\":\"Distribyutorluq\",\"tr\":\"Nostrud elit quia p\"}', '{\"az\":\"Peşəkarlıq\",\"tr\":\"Consectetur velit a\"}', '{\"az\":\"Təcrübə\",\"tr\":\"Totam dolorem in mag\"}', '{\"az\":\"Servis Xidməti\",\"tr\":\"Magna suscipit sed a\"}', '{\"az\":\"Satışını etdiyimiz məhsulların Azərbaycanda rəsmi\\r\\n                    nümayəndəliyi bizə məxsusdur.\",\"tr\":\"Eum doloribus sed do\"}', '{\"az\":\"Satışını etdiyimiz məhsulların Azərbaycanda rəsmi\\r\\n                    nümayəndəliyi bizə məxsusdur.\",\"tr\":\"Dolorem repudiandae\"}', '{\"az\":\"Satışını etdiyimiz məhsulların Azərbaycanda rəsmi\\r\\n                    nümayəndəliyi bizə məxsusdur.\",\"tr\":\"Laborum Consequat\"}', '{\"az\":\"Satışını etdiyimiz məhsulların Azərbaycanda rəsmi\\r\\n                    nümayəndəliyi bizə məxsusdur.\",\"tr\":\"Omnis consequatur qu\"}', 50, 20, 150, '{\"az\":\"Ut sunt reprehenderi\",\"tr\":\"Ut sunt reprehenderi\"}', '{\"az\":\"Cupiditate ullam vel\",\"tr\":\"Cupiditate ullam vel\"}', '{\"az\":\"Sit aut autem vel vo\",\"tr\":\"Sit aut autem vel vo\"}', NULL, '2024-04-06 15:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `model` varchar(191) DEFAULT NULL,
  `model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `input` varchar(191) DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `model`, `model_id`, `input`, `type`, `status`, `created_at`, `updated_at`) VALUES
(21, 'page_1711392157.png', 'Page', 8, 'image', 2, 1, '2024-03-25 14:42:37', '2024-03-25 14:42:37'),
(69, 'about_1711402574.png', 'About', 1, 'image', 2, 1, '2024-03-25 17:36:14', '2024-03-25 17:36:14'),
(79, 'homepage_1711539370.png', 'HomePage', 1, 'video', 2, 1, '2024-03-27 07:36:10', '2024-03-27 07:36:10'),
(78, 'homepage_1711539361.png', 'HomePage', 1, 'hero', 2, 1, '2024-03-27 07:36:01', '2024-03-27 07:36:01'),
(80, 'service_1711553864.png', 'Service', 1, 'image', 2, 1, '2024-03-27 11:37:44', '2024-03-27 11:37:44'),
(81, 'service_1711553864.png', 'Service', 1, 'home', 2, 1, '2024-03-27 11:37:44', '2024-03-27 11:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `fullName` varchar(191) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `fullName`, `image`, `created_at`, `updated_at`) VALUES
(17, 'az', 'Azerbaijan', 'assets/images/flags/az.svg', '2024-03-21 08:13:53', '2024-03-21 08:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `maininformation`
--

CREATE TABLE `maininformation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_logo` text DEFAULT NULL,
  `footer_logo` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maininformation`
--

INSERT INTO `maininformation` (`id`, `header_logo`, `footer_logo`, `title`, `created_at`, `updated_at`) VALUES
(1, 'uploads/maininformation/maininformation_header_logo1715338124.png', 'uploads/maininformation/maininformation_footer_logo1715338124.png', '{\"en\":\"salam\",\"ru\":\"test\"}', '2024-05-10 14:48:45', '2024-05-30 14:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `metatag`
--

CREATE TABLE `metatag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metatag`
--

INSERT INTO `metatag` (`id`, `title`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Index', '{\"az\":\"Home page\"}', '{\"az\":\"Home page\"}', '{\"az\":\"Home page\"}', '2024-04-25 11:30:20', '2024-06-11 08:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_16_144239_create_plans_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_09_28_102009_create_settings_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2020_04_12_095629_create_coupons_table', 1),
(8, '2020_04_12_120749_create_user_coupons_table', 1),
(9, '2020_05_02_075614_create_email_templates_table', 1),
(10, '2020_05_02_075630_create_email_template_langs_table', 1),
(11, '2020_05_02_075647_create_user_email_templates_table', 1),
(12, '2020_05_21_065337_create_permission_tables', 1),
(13, '2021_02_02_085506_create_stores_table', 1),
(14, '2021_02_02_094240_create_user_stores_table', 1),
(15, '2021_02_03_093659_create_product_categories_table', 1),
(16, '2021_02_03_110342_create_product_taxes_table', 1),
(17, '2021_02_03_112228_create_shippings_table', 1),
(18, '2021_02_04_034943_create_products_table', 1),
(19, '2021_02_06_042547_create_subscriptions_table', 1),
(20, '2021_02_08_063716_create_product_images_table', 1),
(21, '2021_02_13_053126_create_orders_table', 1),
(22, '2021_02_15_071203_create_user_details_table', 1),
(23, '2021_02_17_070453_create_rattings_table', 1),
(24, '2021_02_26_061007_create_visits_table', 1),
(25, '2021_03_04_110817_create_plan_orders_table', 1),
(26, '2021_03_23_094310_create_product_variant_options_table', 1),
(27, '2021_04_03_063418_create_locations_table', 1),
(28, '2021_04_07_070019_create_page_options_table', 1),
(29, '2021_04_08_043538_create_blogs_table', 1),
(30, '2021_04_10_034521_create_product_coupons_table', 1),
(31, '2021_04_15_121323_create_blog_socials_table', 1),
(32, '2021_06_03_101323_create_admin_payment_settings', 1),
(33, '2021_06_25_041037_create_custom_massage_table', 1),
(34, '2021_07_07_084829_create_store_theme_settings_table', 1),
(35, '2021_11_17_115318_create_plan_requests_table', 1),
(36, '2022_01_10_052633_create__customers_table', 1),
(37, '2022_01_10_092146_create_purchased_products_table', 1),
(38, '2022_07_08_044639_create_store_payment_settings', 1),
(39, '2023_04_03_072342_create_pixel_fields_table', 1),
(40, '2023_05_25_062348_create_webhooks_table', 1),
(41, '2023_05_30_064523_create_express_checkout_table', 1),
(42, '2023_06_05_043450_create_landing_page_settings_table', 1),
(43, '2023_06_06_041522_create_template_table', 1),
(44, '2023_06_10_114031_create_join_us_table', 1),
(45, '2023_06_27_113741_create_languages_table', 1),
(46, '2023_12_11_110313_add_is_active_to_users_table', 1),
(47, '2024_01_27_032719_add_trial_plan_to_users_table', 1),
(48, '2024_01_27_032746_add_trial_to_plans_table', 1),
(49, '2024_01_29_101219_add_is_refund_to_plan_orders_table', 1),
(50, '2024_03_21_123049_create_pages_table', 2),
(51, '2024_03_23_094738_email_templates_image', 3),
(66, '2024_03_25_125246_create_home_pages_table', 14),
(53, '2024_03_25_150800_create_seo_table', 4),
(54, '2024_03_25_161204_create_images_table', 4),
(56, '2024_03_25_210404_create_abouts_table', 6),
(59, '2024_03_25_214144_create_services_table', 7),
(60, '2024_03_27_103421_create_home_page_images_table', 8),
(61, '2024_03_28_134238_create_social_settings_table', 9),
(62, '2024_03_28_195446_create_service_images_table', 10),
(63, '2024_04_01_124813_create_our_values_table', 11),
(64, '2024_04_01_144855_create_faqs_table', 12),
(65, '2024_04_05_113121_create_slides_table', 13),
(91, '1712601210_create_slide_table', 27),
(68, '1712648336_create_client_table', 16),
(69, '1712649417_create_brand_table', 17),
(89, '1712908935_create_product_attribute_table', 25),
(71, '1712661460_create_about_table', 19),
(73, '1712664426_create_service_table', 21),
(90, '1712906087_create_productimage_table', 26),
(87, '1712661683_create_product_table', 24),
(86, '1712652727_create_category_table', 24),
(88, '1712908935_create_attribute_table', 25),
(92, '1713250843_create_cooperation_table', 28),
(93, '1713251280_create_faq_table', 29),
(94, '1713251863_create_equipment_table', 30),
(95, '1713253236_create_whyu_table', 31),
(96, '1713253288_create_counter_table', 31),
(97, '1713253381_create_erppage_table', 31),
(98, '1713253437_create_erpsolution_table', 31),
(99, '1713264135_create_projectcategory_table', 32),
(100, '1713264346_create_news_table', 32),
(101, '1713264361_create_blog_table', 32),
(102, '1713268098_create_video_table', 33),
(103, '1713333025_create_sociallink_table', 34),
(104, '1713333092_create_contact_table', 34),
(105, '1713334908_create_appointment_table', 35),
(106, '1713420234_create_contactform_table', 36),
(107, '1713942147_create_praiseperson_table', 37),
(108, '1714044358_create_metatag_table', 38),
(109, '1718000595_create_reference_table', 39),
(110, '1718000657_create_team_table', 39);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `image`, `title`, `link`, `created_at`, `updated_at`) VALUES
(1, 'uploads/partners/partners_image1715585068.png', '{\"az\":\"Moon\",\"de\":\"Moon\"}', '#', '2024-05-13 07:24:28', '2024-06-06 12:21:10'),
(2, 'uploads/partners/partners_image1715585079.png', '{\"az\":\"Natuska\"}', '#', '2024-05-13 07:24:39', '2024-05-13 07:24:39'),
(3, 'uploads/partners/partners_image1715585089.png', '{\"az\":\"Avante\"}', '#', '2024-05-13 07:24:49', '2024-05-13 07:24:49'),
(4, 'uploads/partners/partners_image1715585101.png', '{\"az\":\"Good Well\"}', '#', '2024-05-13 07:25:01', '2024-05-13 07:25:01'),
(5, 'uploads/partners/partners_image1715585119.png', '{\"az\":\"Ricky Cobain 1997\"}', '#', '2024-05-13 07:25:19', '2024-05-13 07:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `praiseperson`
--

CREATE TABLE `praiseperson` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `profession` text DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `praiseperson`
--

INSERT INTO `praiseperson` (`id`, `name`, `profession`, `detail`, `image`, `created_at`, `updated_at`) VALUES
(1, '{\"az\":\"Hacı Qafarov Məşədi\"}', '{\"az\":\"Avtoritet\"}', '{\"az\":\"Bu şirkət çox zor işlər görür maşallah göz dəyməsin\"}', 'uploads/praisepeople/praisepeople_image1715345416.JPG', '2024-04-24 07:19:30', '2024-05-10 16:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(250) NOT NULL,
  `image` text NOT NULL,
  `title` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `category_id`, `image`, `title`, `desc`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, '', 'uploads/project/project_image1716965910.png', '{\"az\":\"Baku\",\"ru\":\"Baku\"}', '{\"az\":\"<p>Baku<br></p>\",\"ru\":\"<p>Baku<br></p>\"}', '{\"az\":\"baku\",\"ru\":\"baku\"}', '{\"ru\":\"Baku\"}', '{\"ru\":\"Baku3\"}', '{\"ru\":\"Bakudes\"}', '2024-05-13 12:17:14', '2024-05-30 11:50:13'),
(2, '', '', '{\"az\":\"Istanbul\"}', '{\"az\":\"<p>IstanbulIstanbulIstanbul</p><p>IstanbulIstanbulIstanbul<br></p>\"}', '{\"az\":\"istanbul\"}', '', '', '', '2024-05-14 05:58:12', '2024-05-14 05:58:12'),
(3, '', '', '{\"az\":\"istanbul\"}', '{\"az\":\"<p>istanbul</p><p>istanbul<br></p>\"}', '{\"az\":\"istanbul-1\"}', '', '', '', '2024-05-14 06:00:53', '2024-05-14 06:00:53'),
(7, '', '', '{\"az\":\"test\"}', '{\"az\":\"<p>test<br></p>\"}', '{\"az\":\"test\"}', '', '', '', '2024-05-14 06:07:33', '2024-05-14 06:07:33'),
(9, '', '', '{\"az\":\"test\"}', '{\"az\":\"<p>test<br></p>\"}', '{\"az\":\"test-1\"}', '', '', '', '2024-05-14 06:09:32', '2024-05-14 06:09:32'),
(21, '', '', '{\"az\":\"test\",\"ru\":\"test\"}', '{\"az\":\"<p>tset</p>\",\"ru\":\"<p>tset</p>\"}', '{\"az\":\"test-2\",\"en\":\"test-2\"}', '', '', '', '2024-05-14 06:23:08', '2024-05-14 06:23:37'),
(22, '', 'uploads/project/project_image1717055436.png', '{\"az\":\"test\"}', '{\"az\":\"<p>setst</p>\"}', '{\"az\":\"test-3\"}', '{\"az\":\"setst\"}', '{\"az\":\"setset\"}', '{\"az\":\"setste\"}', '2024-05-30 11:50:36', '2024-05-30 11:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `projectattribute`
--

CREATE TABLE `projectattribute` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` text DEFAULT NULL,
  `value` text DEFAULT NULL,
  `project_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projectattribute`
--

INSERT INTO `projectattribute` (`id`, `key`, `value`, `project_id`, `created_at`, `updated_at`) VALUES
(1, '{\"az\":\"key 1\",\"ru\":\"key 1\"}', '{\"az\":\"value 1\",\"ru\":\"value 1\"}', '1', '2024-05-13 12:17:14', '2024-05-13 12:20:58'),
(2, '{\"az\":\"key 2 en\",\"ru\":\"key 2 en\"}', '{\"az\":\"value 2 en\",\"ru\":\"value 2 en edit\"}', '1', '2024-05-13 12:17:14', '2024-05-13 12:20:58'),
(3, '{\"az\":\"Melumat 1\"}', '{\"az\":\"Melumat test\"}', '2', '2024-05-14 05:58:12', '2024-05-14 05:58:12'),
(4, '{\"az\":\"key 3 en\"}', '{\"az\":\"value 3 en\"}', '3', '2024-05-14 06:00:53', '2024-05-14 06:00:53'),
(5, '{\"az\":\"Information 1\"}', '{\"az\":\"Information 1 e\"}', '7', '2024-05-14 06:07:33', '2024-05-14 06:07:33'),
(6, '{\"az\":\"key 1 en\"}', '{\"az\":\"Information 1 e\"}', '9', '2024-05-14 06:09:32', '2024-05-14 06:09:32'),
(7, '{\"az\":\"Information 1\",\"ru\":\"Information 1\"}', '{\"az\":\"Melumat test\",\"ru\":\"Melumat test\"}', '21', '2024-05-14 06:23:08', '2024-05-14 06:23:37'),
(8, '{\"az\":\"rt\"}', '{\"az\":\"ertet\"}', '22', '2024-05-30 11:50:36', '2024-05-30 11:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `projectcategory`
--

CREATE TABLE `projectcategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projectcategory`
--

INSERT INTO `projectcategory` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '{\"az\":\"category 1\"}', '2024-06-10 08:38:38', '2024-06-10 08:38:38'),
(2, '{\"az\":\"cateogy2\"}', '2024-06-10 08:38:42', '2024-06-10 08:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `projectimage`
--

CREATE TABLE `projectimage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projectimage`
--

INSERT INTO `projectimage` (`id`, `project_id`, `image`, `created_at`, `updated_at`) VALUES
(1, '21', 'uploads/productimage/4SUnNJ0PRTIMTB27BOGL1GUY0BOqFg5TS8szz36L.jpg', '2024-05-14 06:23:08', '2024-05-14 06:23:08'),
(2, '21', 'uploads/projectimage/projectimage_image1715667937.jpg', '2024-05-14 06:23:08', '2024-05-14 06:25:37'),
(4, '22', 'uploads/projectimage/7UDyP82XmdnTUyFs2ITUALRmNuau6hS34F9x73rT.png', '2024-05-30 11:50:36', '2024-05-30 11:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `image`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 'uploads/reference/reference_image1718002217.png', '{\"az\":\"Asgardia\"}', 'google.com', '2024-06-10 06:50:17', '2024-06-10 06:50:17'),
(2, 'uploads/reference/reference_image1718002228.png', '{\"az\":\"Nirastate\"}', '#', '2024-06-10 06:50:28', '2024-06-10 06:50:28'),
(3, 'uploads/reference/reference_image1718002238.png', '{\"az\":\"Utosia\"}', '#', '2024-06-10 06:50:38', '2024-06-10 06:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `author` varchar(191) DEFAULT NULL,
  `robots` varchar(191) DEFAULT NULL,
  `canonical_url` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\HomePage', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 15:59:04', '2024-03-25 15:59:04'),
(2, 'App\\Models\\HomePage', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 17:24:03', '2024-03-25 17:24:03'),
(3, 'App\\Models\\HomePage', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 17:26:39', '2024-03-25 17:26:39'),
(4, 'App\\Models\\About', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 17:30:08', '2024-03-25 17:30:08'),
(5, 'App\\Models\\About', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 08:08:39', '2024-04-05 08:08:39'),
(6, 'App\\Models\\Slide', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-08 18:38:16', '2024-04-08 18:38:16'),
(7, 'App\\Models\\Slide', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-08 18:38:33', '2024-04-08 18:38:33'),
(8, 'App\\Models\\Client', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-09 07:45:24', '2024-04-09 07:45:24'),
(9, 'App\\Models\\Brand', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-09 08:21:06', '2024-04-09 08:21:06'),
(10, 'App\\Models\\Product', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-09 11:22:46', '2024-04-09 11:22:46'),
(11, 'App\\Models\\Category', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 07:01:21', '2024-04-12 07:01:21'),
(12, 'App\\Models\\ProductImage', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 07:46:32', '2024-04-12 07:46:32'),
(13, 'App\\Models\\Product', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 08:00:37', '2024-04-12 08:00:37'),
(14, 'App\\Models\\Category', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 08:36:08', '2024-04-12 08:36:08'),
(15, 'App\\Models\\Category', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 08:36:22', '2024-04-12 08:36:22'),
(16, 'App\\Models\\Category', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 08:36:36', '2024-04-12 08:36:36'),
(17, 'App\\Models\\Product', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 08:38:39', '2024-04-12 08:38:39'),
(18, 'App\\Models\\Attribute', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 09:18:53', '2024-04-12 09:18:53'),
(19, 'App\\Models\\Attribute', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 09:19:01', '2024-04-12 09:19:01'),
(20, 'App\\Models\\Category', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 10:41:17', '2024-04-12 10:41:17'),
(21, 'App\\Models\\Product', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 10:41:26', '2024-04-12 10:41:26'),
(22, 'App\\Models\\Attribute', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 10:59:39', '2024-04-12 10:59:39'),
(23, 'App\\Models\\Attribute', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 11:13:36', '2024-04-12 11:13:36'),
(24, 'App\\Models\\Attribute', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 11:13:39', '2024-04-12 11:13:39'),
(25, 'App\\Models\\ProductAttribute', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 11:24:14', '2024-04-12 11:24:14'),
(26, 'App\\Models\\ProductImage', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 11:30:21', '2024-04-12 11:30:21'),
(27, 'App\\Models\\Product', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:28:31', '2024-04-12 12:28:31'),
(28, 'App\\Models\\Product', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:28:57', '2024-04-12 12:28:57'),
(29, 'App\\Models\\Product', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:30:26', '2024-04-12 12:30:26'),
(30, 'App\\Models\\Product', 5, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:34:33', '2024-04-12 12:34:33'),
(31, 'App\\Models\\ProductImage', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:34:33', '2024-04-12 12:34:33'),
(32, 'App\\Models\\Product', 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:42:25', '2024-04-12 12:42:25'),
(33, 'App\\Models\\ProductImage', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:42:25', '2024-04-12 12:42:25'),
(34, 'App\\Models\\Product', 7, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:45:01', '2024-04-12 12:45:01'),
(35, 'App\\Models\\ProductImage', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:45:01', '2024-04-12 12:45:01'),
(36, 'App\\Models\\Product', 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:46:34', '2024-04-12 12:46:34'),
(37, 'App\\Models\\ProductImage', 5, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:46:35', '2024-04-12 12:46:35'),
(38, 'App\\Models\\Product', 9, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:18:34', '2024-04-13 16:18:34'),
(39, 'App\\Models\\ProductImage', 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:18:34', '2024-04-13 16:18:34'),
(40, 'App\\Models\\Product', 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:21:35', '2024-04-13 16:21:35'),
(41, 'App\\Models\\ProductImage', 7, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:21:35', '2024-04-13 16:21:35'),
(42, 'App\\Models\\Product', 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:21:44', '2024-04-13 16:21:44'),
(43, 'App\\Models\\ProductImage', 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:21:44', '2024-04-13 16:21:44'),
(44, 'App\\Models\\Product', 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:22:20', '2024-04-13 16:22:20'),
(45, 'App\\Models\\ProductImage', 9, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:22:20', '2024-04-13 16:22:20'),
(46, 'App\\Models\\Product', 13, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:22:24', '2024-04-13 16:22:24'),
(47, 'App\\Models\\ProductImage', 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:22:24', '2024-04-13 16:22:24'),
(48, 'App\\Models\\Product', 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:24:10', '2024-04-13 16:24:10'),
(49, 'App\\Models\\ProductImage', 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:24:10', '2024-04-13 16:24:10'),
(50, 'App\\Models\\Product', 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:25:02', '2024-04-13 16:25:02'),
(51, 'App\\Models\\ProductImage', 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:25:02', '2024-04-13 16:25:02'),
(52, 'App\\Models\\Product', 16, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:12:47', '2024-04-13 17:12:47'),
(53, 'App\\Models\\Product', 17, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:14:35', '2024-04-13 17:14:35'),
(54, 'App\\Models\\Product', 18, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:14:47', '2024-04-13 17:14:47'),
(55, 'App\\Models\\Product', 19, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:15:07', '2024-04-13 17:15:07'),
(56, 'App\\Models\\Product', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:15:22', '2024-04-13 17:15:22'),
(57, 'App\\Models\\Product', 21, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:15:44', '2024-04-13 17:15:44'),
(58, 'App\\Models\\Product', 22, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:17:21', '2024-04-13 17:17:21'),
(59, 'App\\Models\\Product', 23, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:17:38', '2024-04-13 17:17:38'),
(60, 'App\\Models\\Product', 24, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:02:17', '2024-04-13 21:02:17'),
(61, 'App\\Models\\Product', 25, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:04:22', '2024-04-13 21:04:22'),
(62, 'App\\Models\\Product', 26, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:04:25', '2024-04-13 21:04:25'),
(63, 'App\\Models\\Product', 27, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:04:39', '2024-04-13 21:04:39'),
(64, 'App\\Models\\Product', 28, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:06:25', '2024-04-13 21:06:25'),
(65, 'App\\Models\\Product', 29, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:08:55', '2024-04-13 21:08:55'),
(66, 'App\\Models\\Product', 30, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:09:21', '2024-04-13 21:09:21'),
(67, 'App\\Models\\Product', 31, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:09:34', '2024-04-13 21:09:34'),
(68, 'App\\Models\\Product', 32, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:09:47', '2024-04-13 21:09:47'),
(69, 'App\\Models\\Product', 33, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:09:58', '2024-04-13 21:09:58'),
(70, 'App\\Models\\Product', 34, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:10:04', '2024-04-13 21:10:04'),
(71, 'App\\Models\\Product', 35, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:10:13', '2024-04-13 21:10:13'),
(72, 'App\\Models\\Product', 36, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:11:43', '2024-04-13 21:11:43'),
(73, 'App\\Models\\ProductImage', 13, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:11:43', '2024-04-13 21:11:43'),
(74, 'App\\Models\\Product', 37, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:12:06', '2024-04-13 21:12:06'),
(75, 'App\\Models\\Product', 38, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:14:51', '2024-04-13 21:14:51'),
(76, 'App\\Models\\Product', 39, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:15:33', '2024-04-13 21:15:33'),
(77, 'App\\Models\\Product', 40, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:17:23', '2024-04-13 21:17:23'),
(78, 'App\\Models\\ProductImage', 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:17:23', '2024-04-13 21:17:23'),
(79, 'App\\Models\\ProductImage', 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:17:23', '2024-04-13 21:17:23'),
(80, 'App\\Models\\ProductImage', 16, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:17:23', '2024-04-13 21:17:23'),
(81, 'App\\Models\\ProductImage', 17, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:17:23', '2024-04-13 21:17:23'),
(82, 'App\\Models\\Product', 41, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:18:50', '2024-04-13 21:18:50'),
(83, 'App\\Models\\ProductImage', 18, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:18:50', '2024-04-13 21:18:50'),
(84, 'App\\Models\\ProductImage', 19, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:18:50', '2024-04-13 21:18:50'),
(85, 'App\\Models\\ProductImage', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:18:50', '2024-04-13 21:18:50'),
(86, 'App\\Models\\ProductImage', 21, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:18:50', '2024-04-13 21:18:50'),
(87, 'App\\Models\\Product', 42, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:20:08', '2024-04-13 21:20:08'),
(88, 'App\\Models\\ProductImage', 22, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:20:08', '2024-04-13 21:20:08'),
(89, 'App\\Models\\ProductImage', 23, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:20:08', '2024-04-13 21:20:08'),
(90, 'App\\Models\\ProductImage', 24, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:20:08', '2024-04-13 21:20:08'),
(91, 'App\\Models\\ProductImage', 25, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:20:08', '2024-04-13 21:20:08'),
(92, 'App\\Models\\Slide', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-14 21:30:40', '2024-04-14 21:30:40'),
(93, 'App\\Models\\Brand', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-14 21:44:44', '2024-04-14 21:44:44'),
(94, 'App\\Models\\Brand', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-14 21:44:50', '2024-04-14 21:44:50'),
(95, 'App\\Models\\Brand', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-14 21:44:57', '2024-04-14 21:44:57'),
(96, 'App\\Models\\Brand', 5, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-14 21:45:02', '2024-04-14 21:45:02'),
(97, 'App\\Models\\Teams', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 06:39:50', '2024-04-16 06:39:50'),
(98, 'App\\Models\\Teams', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 06:45:18', '2024-04-16 06:45:18'),
(99, 'App\\Models\\Teams', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 06:45:34', '2024-04-16 06:45:34'),
(100, 'App\\Models\\Teams', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 06:45:54', '2024-04-16 06:45:54'),
(101, 'App\\Models\\Client', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 06:58:48', '2024-04-16 06:58:48'),
(102, 'App\\Models\\Client', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 06:58:59', '2024-04-16 06:58:59'),
(103, 'App\\Models\\Client', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 06:59:07', '2024-04-16 06:59:07'),
(104, 'App\\Models\\Faq', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:11:27', '2024-04-16 07:11:27'),
(105, 'App\\Models\\Faq', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:11:35', '2024-04-16 07:11:35'),
(106, 'App\\Models\\Equipment', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:19:54', '2024-04-16 07:19:54'),
(107, 'App\\Models\\Equipment', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:20:08', '2024-04-16 07:20:08'),
(108, 'App\\Models\\Equipment', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:20:23', '2024-04-16 07:20:23'),
(109, 'App\\Models\\Equipment', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:20:37', '2024-04-16 07:20:37'),
(110, 'App\\Models\\Counter', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:45:35', '2024-04-16 07:45:35'),
(111, 'App\\Models\\Counter', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:45:45', '2024-04-16 07:45:45'),
(112, 'App\\Models\\Counter', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:46:24', '2024-04-16 07:46:24'),
(113, 'App\\Models\\Counter', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:46:34', '2024-04-16 07:46:34'),
(114, 'App\\Models\\WhyUs', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:53:06', '2024-04-16 07:53:06'),
(115, 'App\\Models\\WhyUs', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:56:01', '2024-04-16 07:56:01'),
(116, 'App\\Models\\WhyUs', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:56:17', '2024-04-16 07:56:17'),
(117, 'App\\Models\\WhyUs', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:56:31', '2024-04-16 07:56:31'),
(118, 'App\\Models\\WhyUs', 5, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:56:45', '2024-04-16 07:56:45'),
(119, 'App\\Models\\WhyUs', 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:56:56', '2024-04-16 07:56:56'),
(120, 'App\\Models\\ErpPage', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:59:48', '2024-04-16 07:59:48'),
(121, 'App\\Models\\ErpSolution', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 08:00:52', '2024-04-16 08:00:52'),
(122, 'App\\Models\\ErpSolution', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 08:01:01', '2024-04-16 08:01:01'),
(123, 'App\\Models\\ErpSolution', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 08:01:10', '2024-04-16 08:01:10'),
(124, 'App\\Models\\ErpSolution', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 08:01:19', '2024-04-16 08:01:19'),
(125, 'App\\Models\\ErpSolution', 5, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 08:01:27', '2024-04-16 08:01:27'),
(126, 'App\\Models\\ErpSolution', 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 08:01:35', '2024-04-16 08:01:35'),
(127, 'App\\Models\\Cooperation', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 10:23:04', '2024-04-16 10:23:04'),
(128, 'App\\Models\\ProductImage', 26, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 10:44:03', '2024-04-16 10:44:03'),
(129, 'App\\Models\\Blog', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 10:54:45', '2024-04-16 10:54:45'),
(130, 'App\\Models\\News', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 10:59:46', '2024-04-16 10:59:46'),
(131, 'App\\Models\\Category', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 11:03:54', '2024-04-16 11:03:54'),
(132, 'App\\Models\\Category', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 11:04:06', '2024-04-16 11:04:06'),
(133, 'App\\Models\\Attribute', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 11:08:13', '2024-04-16 11:08:13'),
(134, 'App\\Models\\Product', 43, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 11:22:56', '2024-04-16 11:22:56'),
(135, 'App\\Models\\ProductImage', 27, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 11:22:56', '2024-04-16 11:22:56'),
(136, 'App\\Models\\ProductImage', 28, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 11:22:56', '2024-04-16 11:22:56'),
(137, 'App\\Models\\ProductImage', 29, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 11:22:56', '2024-04-16 11:22:56'),
(138, 'App\\Models\\ProductImage', 30, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 11:24:18', '2024-04-16 11:24:18'),
(139, 'App\\Models\\ProductAttribute', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 11:38:04', '2024-04-16 11:38:04'),
(140, 'App\\Models\\Video', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 11:52:51', '2024-04-16 11:52:51'),
(141, 'App\\Models\\Service', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 12:45:22', '2024-04-16 12:45:22'),
(142, 'App\\Models\\Contact', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 06:03:56', '2024-04-17 06:03:56'),
(143, 'App\\Models\\SocialLink', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 06:11:49', '2024-04-17 06:11:49'),
(144, 'App\\Models\\SocialLink', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 06:12:02', '2024-04-17 06:12:02'),
(145, 'App\\Models\\Service', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:03:22', '2024-04-17 08:03:22'),
(146, 'App\\Models\\Service', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:03:40', '2024-04-17 08:03:40'),
(147, 'App\\Models\\Service', 5, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:03:57', '2024-04-17 08:03:57'),
(148, 'App\\Models\\Service', 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:04:17', '2024-04-17 08:04:17'),
(149, 'App\\Models\\Service', 7, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:04:37', '2024-04-17 08:04:37'),
(150, 'App\\Models\\Service', 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:04:50', '2024-04-17 08:04:50'),
(151, 'App\\Models\\Service', 9, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:05:07', '2024-04-17 08:05:07'),
(152, 'App\\Models\\Service', 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:05:24', '2024-04-17 08:05:24'),
(153, 'App\\Models\\Service', 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:05:43', '2024-04-17 08:05:43'),
(154, 'App\\Models\\Service', 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:05:59', '2024-04-17 08:05:59'),
(155, 'App\\Models\\Service', 13, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:06:13', '2024-04-17 08:06:13'),
(156, 'App\\Models\\Service', 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:06:29', '2024-04-17 08:06:29'),
(157, 'App\\Models\\Service', 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:06:42', '2024-04-17 08:06:42'),
(158, 'App\\Models\\Service', 16, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:06:57', '2024-04-17 08:06:57'),
(159, 'App\\Models\\Service', 17, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:07:11', '2024-04-17 08:07:11'),
(160, 'App\\Models\\Service', 18, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:08:27', '2024-04-17 08:08:27'),
(161, 'App\\Models\\Service', 19, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:08:49', '2024-04-17 08:08:49'),
(162, 'App\\Models\\Service', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:09:05', '2024-04-17 08:09:05'),
(163, 'App\\Models\\Service', 21, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:11:31', '2024-04-17 08:11:31'),
(164, 'App\\Models\\Service', 22, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:13:28', '2024-04-17 08:13:28'),
(165, 'App\\Models\\Service', 23, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:13:53', '2024-04-17 08:13:53'),
(166, 'App\\Models\\Service', 24, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:14:02', '2024-04-17 08:14:02'),
(167, 'App\\Models\\Service', 25, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:14:17', '2024-04-17 08:14:17'),
(168, 'App\\Models\\Service', 26, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:14:26', '2024-04-17 08:14:26'),
(169, 'App\\Models\\Service', 27, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:14:35', '2024-04-17 08:14:35'),
(170, 'App\\Models\\Service', 28, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:14:47', '2024-04-17 08:14:47'),
(171, 'App\\Models\\Service', 29, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:14:58', '2024-04-17 08:14:58'),
(172, 'App\\Models\\Service', 30, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:15:06', '2024-04-17 08:15:06'),
(173, 'App\\Models\\Service', 31, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:15:18', '2024-04-17 08:15:18'),
(174, 'App\\Models\\Service', 32, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:15:26', '2024-04-17 08:15:26'),
(175, 'App\\Models\\Service', 33, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:15:33', '2024-04-17 08:15:33'),
(176, 'App\\Models\\Service', 34, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:15:46', '2024-04-17 08:15:46'),
(177, 'App\\Models\\Service', 35, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:16:04', '2024-04-17 08:16:04'),
(178, 'App\\Models\\Service', 36, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:16:12', '2024-04-17 08:16:12'),
(179, 'App\\Models\\Service', 37, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:16:21', '2024-04-17 08:16:21'),
(180, 'App\\Models\\Service', 38, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:16:29', '2024-04-17 08:16:29'),
(181, 'App\\Models\\Service', 39, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:16:56', '2024-04-17 08:16:56'),
(182, 'App\\Models\\Service', 40, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:16:56', '2024-04-17 08:16:56'),
(183, 'App\\Models\\Service', 41, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:17:57', '2024-04-17 08:17:57'),
(184, 'App\\Models\\Service', 42, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:18:05', '2024-04-17 08:18:05'),
(185, 'App\\Models\\Service', 43, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-17 08:18:14', '2024-04-17 08:18:14'),
(186, 'App\\Models\\News', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-23 10:09:50', '2024-04-23 10:09:50'),
(187, 'App\\Models\\PraisePerson', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-24 07:19:30', '2024-04-24 07:19:30'),
(188, 'App\\Models\\Appointment', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-25 09:49:20', '2024-04-25 09:49:20'),
(189, 'App\\Models\\Service', 44, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-25 10:20:19', '2024-04-25 10:20:19'),
(190, 'App\\Models\\Blog', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-25 11:11:37', '2024-04-25 11:11:37'),
(191, 'App\\Models\\MetaTag', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-25 11:30:20', '2024-04-25 11:30:20'),
(192, 'App\\Models\\Appointment', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 15:21:45', '2024-04-26 15:21:45'),
(193, 'App\\Models\\SocialLink', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-09 11:51:05', '2024-05-09 11:51:05'),
(194, 'App\\Models\\Appointment', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-10 13:14:11', '2024-05-10 13:14:11'),
(195, 'App\\Models\\Faq', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-24 10:18:06', '2024-05-24 10:18:06'),
(196, 'App\\Models\\Faq', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-24 10:21:37', '2024-05-24 10:21:37'),
(197, 'App\\Models\\Faq', 5, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-24 10:22:35', '2024-05-24 10:22:35'),
(198, 'App\\Models\\Faq', 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-24 10:23:30', '2024-05-24 10:23:30'),
(199, 'App\\Models\\Faq', 7, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-24 10:24:44', '2024-05-24 10:24:44'),
(200, 'App\\Models\\Faq', 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-24 10:27:21', '2024-05-24 10:27:21'),
(201, 'App\\Models\\Client', 5, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-24 14:05:49', '2024-05-24 14:05:49'),
(202, 'App\\Models\\Client', 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-24 14:07:11', '2024-05-24 14:07:11'),
(203, 'App\\Models\\Client', 7, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-24 14:09:41', '2024-05-24 14:09:41'),
(204, 'App\\Models\\Client', 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-24 14:12:13', '2024-05-24 14:12:13'),
(205, 'App\\Models\\Client', 9, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-24 14:28:49', '2024-05-24 14:28:49'),
(206, 'App\\Models\\Client', 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-24 14:30:50', '2024-05-24 14:30:50'),
(207, 'App\\Models\\Client', 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-24 16:20:34', '2024-05-24 16:20:34'),
(208, 'App\\Models\\Faq', 9, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 10:21:20', '2024-05-27 10:21:20'),
(209, 'App\\Models\\Faq', 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-06 12:21:01', '2024-06-06 12:21:01'),
(210, 'App\\Models\\Reference', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 06:50:18', '2024-06-10 06:50:18'),
(211, 'App\\Models\\Reference', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 06:50:28', '2024-06-10 06:50:28'),
(212, 'App\\Models\\Reference', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 06:50:38', '2024-06-10 06:50:38'),
(213, 'App\\Models\\Team', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 06:55:06', '2024-06-10 06:55:06'),
(214, 'App\\Models\\Team', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 06:55:38', '2024-06-10 06:55:38'),
(215, 'App\\Models\\Service', 45, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 07:57:15', '2024-06-10 07:57:15'),
(216, 'App\\Models\\ProjectCategory', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 08:38:38', '2024-06-10 08:38:38'),
(217, 'App\\Models\\ProjectCategory', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 08:38:42', '2024-06-10 08:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `image` text NOT NULL,
  `slug` text DEFAULT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `title`, `detail`, `icon`, `image`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`, `image2`) VALUES
(45, '{\"az\":\"Web Development.\"}', '{\"az\":\"<h4 style=\\\"margin-right: 0px; margin-bottom: 0.2rem; margin-left: 0px; padding: 0px; outline: none; list-style: none; font-weight: 500; line-height: 1.3; font-size: 30px; color: rgb(26, 26, 26); font-family: Satoshi-Variable; text-align: center;\\\"><div class=\\\"col-lg-4\\\" style=\\\"margin: 0px; padding: 0px 15px; outline: none; list-style: none; width: 439.987px; max-width: 100%; font-size: 16px; text-align: start;\\\"><div class=\\\"text md-mb50\\\" style=\\\"margin: 0px; padding: 0px; outline: none; list-style: none;\\\"><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline: none; list-style: none; line-height: 1.8; font-size: 15px; font-family: Poppins, sans-serif; color: rgb(119, 119, 119);\\\">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p></div></div><div class=\\\"col-lg-8\\\" style=\\\"margin: 0px; padding: 0px 15px; outline: none; list-style: none; width: 879.987px; max-width: 100%; font-size: 16px; text-align: start;\\\"><div class=\\\"row\\\" style=\\\"margin-top: calc(var(--bs-gutter-y) * -1); margin-right: calc(var(--bs-gutter-x) * -.5); margin-bottom: 0px; margin-left: calc(var(--bs-gutter-x) * -.5); padding: 0px; outline: none; list-style: none; --bs-gutter-x: 1.5rem; --bs-gutter-y: 0;\\\"><div class=\\\"col-md-6\\\" style=\\\"margin: 0px; padding: 0px 15px; outline: none; list-style: none; width: 436.987px;\\\"><ul class=\\\"rest list-arrow\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline: none; list-style: none;\\\"><li class=\\\"nowrap\\\" style=\\\"margin: 0px; padding: 0px; outline: none; list-style: none; text-wrap: nowrap;\\\"><span class=\\\"icon\\\" style=\\\"margin: 0px 10px 0px 0px; padding: 0px; outline: none; list-style: none; display: inline-block; width: 15px;\\\"><svg width=\\\"100%\\\" height=\\\"100%\\\" viewBox=\\\"0 0 9 8\\\" fill=\\\"none\\\" xmlns=\\\"http://www.w3.org/2000/svg\\\"><path fill-rule=\\\"evenodd\\\" clip-rule=\\\"evenodd\\\" d=\\\"M7.71108 3.78684L8.22361 4.29813L7.71263 4.80992L4.64672 7.87832L4.13433 7.36688L6.87531 4.62335H1.11181H0.750039H0.388177L0.382812 0.718232H1.10645L1.11082 3.90005H6.80113L4.12591 1.22972L4.63689 0.718262L7.71108 3.78684Z\\\" fill=\\\"#14cf93\\\"></path></svg></span>&nbsp;</li></ul></div></div></div></h4><h6 class=\\\"inline fw-400\\\" style=\\\"margin-right: 0px; margin-bottom: 0.2rem; margin-left: 0px; padding: 0px; outline: none; list-style: none; line-height: 1.3; font-size: 20px; display: inline-block; font-weight: 400 !important;\\\">Amazing communication.</h6><h4 style=\\\"margin-right: 0px; margin-bottom: 0.2rem; margin-left: 0px; padding: 0px; outline: none; list-style: none; font-weight: 500; line-height: 1.3; font-size: 30px; color: rgb(26, 26, 26); font-family: Satoshi-Variable; text-align: center;\\\"><div class=\\\"col-lg-8\\\" style=\\\"margin: 0px; padding: 0px 15px; outline: none; list-style: none; width: 879.987px; max-width: 100%; font-size: 16px; text-align: start;\\\"><div class=\\\"row\\\" style=\\\"margin-top: calc(var(--bs-gutter-y) * -1); margin-right: calc(var(--bs-gutter-x) * -.5); margin-bottom: 0px; margin-left: calc(var(--bs-gutter-x) * -.5); padding: 0px; outline: none; list-style: none; --bs-gutter-x: 1.5rem; --bs-gutter-y: 0;\\\"><div class=\\\"col-md-6\\\" style=\\\"margin: 0px; padding: 0px 15px; outline: none; list-style: none; width: 436.987px;\\\"><ul class=\\\"rest list-arrow\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline: none; list-style: none;\\\"><li class=\\\"nowrap\\\" style=\\\"margin: 0px; padding: 0px; outline: none; list-style: none; text-wrap: nowrap;\\\"></li><li class=\\\"mt-10 nowrap\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline: none; list-style: none; text-wrap: nowrap; margin-top: 10px !important;\\\"><span class=\\\"icon\\\" style=\\\"margin: 0px 10px 0px 0px; padding: 0px; outline: none; list-style: none; display: inline-block; width: 15px;\\\"><svg width=\\\"100%\\\" height=\\\"100%\\\" viewBox=\\\"0 0 9 8\\\" fill=\\\"none\\\" xmlns=\\\"http://www.w3.org/2000/svg\\\"><path fill-rule=\\\"evenodd\\\" clip-rule=\\\"evenodd\\\" d=\\\"M7.71108 3.78684L8.22361 4.29813L7.71263 4.80992L4.64672 7.87832L4.13433 7.36688L6.87531 4.62335H1.11181H0.750039H0.388177L0.382812 0.718232H1.10645L1.11082 3.90005H6.80113L4.12591 1.22972L4.63689 0.718262L7.71108 3.78684Z\\\" fill=\\\"#14cf93\\\"></path></svg></span>&nbsp;</li></ul></div></div></div></h4><h6 class=\\\"inline fw-400\\\" style=\\\"margin-right: 0px; margin-bottom: 0.2rem; margin-left: 0px; padding: 0px; outline: none; list-style: none; line-height: 1.3; font-size: 20px; display: inline-block; font-weight: 400 !important;\\\">Best trendinf designing experience.</h6><h4 style=\\\"margin-right: 0px; margin-bottom: 0.2rem; margin-left: 0px; padding: 0px; outline: none; list-style: none; font-weight: 500; line-height: 1.3; font-size: 30px; color: rgb(26, 26, 26); font-family: Satoshi-Variable; text-align: center;\\\"><div class=\\\"col-lg-8\\\" style=\\\"margin: 0px; padding: 0px 15px; outline: none; list-style: none; width: 879.987px; max-width: 100%; font-size: 16px; text-align: start;\\\"><div class=\\\"row\\\" style=\\\"margin-top: calc(var(--bs-gutter-y) * -1); margin-right: calc(var(--bs-gutter-x) * -.5); margin-bottom: 0px; margin-left: calc(var(--bs-gutter-x) * -.5); padding: 0px; outline: none; list-style: none; --bs-gutter-x: 1.5rem; --bs-gutter-y: 0;\\\"><div class=\\\"col-md-6\\\" style=\\\"margin: 0px; padding: 0px 15px; outline: none; list-style: none; width: 436.987px;\\\"><ul class=\\\"rest list-arrow\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline: none; list-style: none;\\\"><li class=\\\"mt-10 nowrap\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline: none; list-style: none; text-wrap: nowrap; margin-top: 10px !important;\\\"></li><li class=\\\"mt-10 nowrap\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline: none; list-style: none; text-wrap: nowrap; margin-top: 10px !important;\\\"><span class=\\\"icon\\\" style=\\\"margin: 0px 10px 0px 0px; padding: 0px; outline: none; list-style: none; display: inline-block; width: 15px;\\\"><svg width=\\\"100%\\\" height=\\\"100%\\\" viewBox=\\\"0 0 9 8\\\" fill=\\\"none\\\" xmlns=\\\"http://www.w3.org/2000/svg\\\"><path fill-rule=\\\"evenodd\\\" clip-rule=\\\"evenodd\\\" d=\\\"M7.71108 3.78684L8.22361 4.29813L7.71263 4.80992L4.64672 7.87832L4.13433 7.36688L6.87531 4.62335H1.11181H0.750039H0.388177L0.382812 0.718232H1.10645L1.11082 3.90005H6.80113L4.12591 1.22972L4.63689 0.718262L7.71108 3.78684Z\\\" fill=\\\"#14cf93\\\"></path></svg></span>&nbsp;</li></ul></div></div></div></h4><h6 class=\\\"inline fw-400\\\" style=\\\"margin-right: 0px; margin-bottom: 0.2rem; margin-left: 0px; padding: 0px; outline: none; list-style: none; line-height: 1.3; font-size: 20px; display: inline-block; font-weight: 400 !important;\\\">Email &amp; Live chat.</h6><h4 style=\\\"margin-right: 0px; margin-bottom: 0.2rem; margin-left: 0px; padding: 0px; outline: none; list-style: none; font-weight: 500; line-height: 1.3; font-size: 30px; color: rgb(26, 26, 26); font-family: Satoshi-Variable; text-align: center;\\\"><div class=\\\"col-lg-8\\\" style=\\\"margin: 0px; padding: 0px 15px; outline: none; list-style: none; width: 879.987px; max-width: 100%; font-size: 16px; text-align: start;\\\"><div class=\\\"row\\\" style=\\\"margin-top: calc(var(--bs-gutter-y) * -1); margin-right: calc(var(--bs-gutter-x) * -.5); margin-bottom: 0px; margin-left: calc(var(--bs-gutter-x) * -.5); padding: 0px; outline: none; list-style: none; --bs-gutter-x: 1.5rem; --bs-gutter-y: 0;\\\"><div class=\\\"col-md-6\\\" style=\\\"margin: 0px; padding: 0px 15px; outline: none; list-style: none; width: 436.987px;\\\"><ul class=\\\"rest list-arrow\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline: none; list-style: none;\\\"><li class=\\\"mt-10 nowrap\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline: none; list-style: none; text-wrap: nowrap; margin-top: 10px !important;\\\"></li></ul></div><div class=\\\"col-md-6\\\" style=\\\"margin: 0px; padding: 0px 15px; outline: none; list-style: none; width: 436.987px;\\\"><ul class=\\\"rest list-arrow\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline: none; list-style: none;\\\"><li class=\\\"nowrap\\\" style=\\\"margin: 0px; padding: 0px; outline: none; list-style: none; text-wrap: nowrap;\\\"><span class=\\\"icon\\\" style=\\\"margin: 0px 10px 0px 0px; padding: 0px; outline: none; list-style: none; display: inline-block; width: 15px;\\\"><svg width=\\\"100%\\\" height=\\\"100%\\\" viewBox=\\\"0 0 9 8\\\" fill=\\\"none\\\" xmlns=\\\"http://www.w3.org/2000/svg\\\"><path fill-rule=\\\"evenodd\\\" clip-rule=\\\"evenodd\\\" d=\\\"M7.71108 3.78684L8.22361 4.29813L7.71263 4.80992L4.64672 7.87832L4.13433 7.36688L6.87531 4.62335H1.11181H0.750039H0.388177L0.382812 0.718232H1.10645L1.11082 3.90005H6.80113L4.12591 1.22972L4.63689 0.718262L7.71108 3.78684Z\\\" fill=\\\"#14cf93\\\"></path></svg></span>&nbsp;</li></ul></div></div></div></h4><h6 class=\\\"inline fw-400\\\" style=\\\"margin-right: 0px; margin-bottom: 0.2rem; margin-left: 0px; padding: 0px; outline: none; list-style: none; line-height: 1.3; font-size: 20px; display: inline-block; font-weight: 400 !important;\\\">Amazing communication.</h6><h4 style=\\\"margin-right: 0px; margin-bottom: 0.2rem; margin-left: 0px; padding: 0px; outline: none; list-style: none; font-weight: 500; line-height: 1.3; font-size: 30px; color: rgb(26, 26, 26); font-family: Satoshi-Variable; text-align: center;\\\"><div class=\\\"col-lg-8\\\" style=\\\"margin: 0px; padding: 0px 15px; outline: none; list-style: none; width: 879.987px; max-width: 100%; font-size: 16px; text-align: start;\\\"><div class=\\\"row\\\" style=\\\"margin-top: calc(var(--bs-gutter-y) * -1); margin-right: calc(var(--bs-gutter-x) * -.5); margin-bottom: 0px; margin-left: calc(var(--bs-gutter-x) * -.5); padding: 0px; outline: none; list-style: none; --bs-gutter-x: 1.5rem; --bs-gutter-y: 0;\\\"><div class=\\\"col-md-6\\\" style=\\\"margin: 0px; padding: 0px 15px; outline: none; list-style: none; width: 436.987px;\\\"><ul class=\\\"rest list-arrow\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline: none; list-style: none;\\\"><li class=\\\"nowrap\\\" style=\\\"margin: 0px; padding: 0px; outline: none; list-style: none; text-wrap: nowrap;\\\"></li><li class=\\\"mt-10 nowrap\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline: none; list-style: none; text-wrap: nowrap; margin-top: 10px !important;\\\"><span class=\\\"icon\\\" style=\\\"margin: 0px 10px 0px 0px; padding: 0px; outline: none; list-style: none; display: inline-block; width: 15px;\\\"><svg width=\\\"100%\\\" height=\\\"100%\\\" viewBox=\\\"0 0 9 8\\\" fill=\\\"none\\\" xmlns=\\\"http://www.w3.org/2000/svg\\\"><path fill-rule=\\\"evenodd\\\" clip-rule=\\\"evenodd\\\" d=\\\"M7.71108 3.78684L8.22361 4.29813L7.71263 4.80992L4.64672 7.87832L4.13433 7.36688L6.87531 4.62335H1.11181H0.750039H0.388177L0.382812 0.718232H1.10645L1.11082 3.90005H6.80113L4.12591 1.22972L4.63689 0.718262L7.71108 3.78684Z\\\" fill=\\\"#14cf93\\\"></path></svg></span>&nbsp;</li></ul></div></div></div></h4><h6 class=\\\"inline fw-400\\\" style=\\\"margin-right: 0px; margin-bottom: 0.2rem; margin-left: 0px; padding: 0px; outline: none; list-style: none; line-height: 1.3; font-size: 20px; display: inline-block; font-weight: 400 !important;\\\">Best trendinf designing experience.</h6><h4 style=\\\"margin-right: 0px; margin-bottom: 0.2rem; margin-left: 0px; padding: 0px; outline: none; list-style: none; font-weight: 500; line-height: 1.3; font-size: 30px; color: rgb(26, 26, 26); font-family: Satoshi-Variable; text-align: center;\\\"><div class=\\\"col-lg-8\\\" style=\\\"margin: 0px; padding: 0px 15px; outline: none; list-style: none; width: 879.987px; max-width: 100%; font-size: 16px; text-align: start;\\\"><div class=\\\"row\\\" style=\\\"margin-top: calc(var(--bs-gutter-y) * -1); margin-right: calc(var(--bs-gutter-x) * -.5); margin-bottom: 0px; margin-left: calc(var(--bs-gutter-x) * -.5); padding: 0px; outline: none; list-style: none; --bs-gutter-x: 1.5rem; --bs-gutter-y: 0;\\\"><div class=\\\"col-md-6\\\" style=\\\"margin: 0px; padding: 0px 15px; outline: none; list-style: none; width: 436.987px;\\\"><ul class=\\\"rest list-arrow\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline: none; list-style: none;\\\"><li class=\\\"mt-10 nowrap\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline: none; list-style: none; text-wrap: nowrap; margin-top: 10px !important;\\\"></li><li class=\\\"mt-10 nowrap\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline: none; list-style: none; text-wrap: nowrap; margin-top: 10px !important;\\\"><span class=\\\"icon\\\" style=\\\"margin: 0px 10px 0px 0px; padding: 0px; outline: none; list-style: none; display: inline-block; width: 15px;\\\"><svg width=\\\"100%\\\" height=\\\"100%\\\" viewBox=\\\"0 0 9 8\\\" fill=\\\"none\\\" xmlns=\\\"http://www.w3.org/2000/svg\\\"><path fill-rule=\\\"evenodd\\\" clip-rule=\\\"evenodd\\\" d=\\\"M7.71108 3.78684L8.22361 4.29813L7.71263 4.80992L4.64672 7.87832L4.13433 7.36688L6.87531 4.62335H1.11181H0.750039H0.388177L0.382812 0.718232H1.10645L1.11082 3.90005H6.80113L4.12591 1.22972L4.63689 0.718262L7.71108 3.78684Z\\\" fill=\\\"#14cf93\\\"></path></svg></span>&nbsp;</li></ul></div></div></div></h4><h6 class=\\\"inline fw-400\\\" style=\\\"box-sizing: border-box; margin: 0px 0px 0.2rem; padding: 0px; outline: none; list-style: none; font-weight: 400 !important; line-height: 1.3; font-size: 20px; display: inline-block;\\\">Email &amp; Live chat.</h6>\"}', 'uploads/service/service_icon1718006235.png', 'uploads/service/service_image1718006235.jpg', '{\"az\":\"web-development\"}', '', '', '', '2024-06-10 07:57:15', '2024-06-10 07:57:15', 'uploads/service/service_image21718006235.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `value` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'local_storage_validation', 'csv,jpeg,jpg,pdf,png,webp,xls,xlsx,svg', 1, '2024-03-17 23:09:26', '2024-04-16 07:53:25'),
(2, 'wasabi_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2024-03-17 23:09:26', '2024-03-17 23:09:26'),
(3, 's3_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2024-03-17 23:09:26', '2024-03-17 23:09:26'),
(4, 'local_storage_max_upload_size', '2048000', 1, '2024-03-17 23:09:26', '2024-03-17 23:09:26'),
(5, 'wasabi_max_upload_size', '2048000', 1, '2024-03-17 23:09:26', '2024-03-17 23:09:26'),
(6, 's3_max_upload_size', '2048000', 1, '2024-03-17 23:09:26', '2024-03-17 23:09:26'),
(7, 'storage_setting', 'local', 1, '2024-03-17 23:09:26', '2024-03-17 23:09:26'),
(8, 'SITE_RTL', 'off', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(9, 'title_text', 'New', 1, NULL, '2024-03-25 05:04:03'),
(10, 'footer_text', 'New', 1, NULL, '2024-03-25 05:04:03'),
(11, 'default_language', 'az', 1, '0000-00-00 00:00:00', '2024-03-29 06:49:03'),
(12, 'currency_symbol', 'aa', 1, NULL, NULL),
(13, 'currency', 'AZN', 1, NULL, NULL),
(14, 'display_landing_page', 'off', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(15, 'signup_button', 'off', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(16, 'email_verification', 'off', 1, '0000-00-00 00:00:00', '2024-03-28 17:25:11'),
(17, 'color', 'theme-6', 1, '0000-00-00 00:00:00', '2024-03-28 17:26:15'),
(18, 'color_flag', 'false', 1, '0000-00-00 00:00:00', '2024-03-28 17:26:15'),
(19, 'cust_theme_bg', 'off', 1, '0000-00-00 00:00:00', '2024-03-28 17:25:11'),
(20, 'cust_darklayout', 'off', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(21, 'mail_driver', 'smtp', 1, NULL, NULL),
(22, 'mail_host', 'smtp.hostinger.com', 1, NULL, NULL),
(23, 'mail_port', '465', 1, NULL, NULL),
(24, 'mail_username', 'test@markup.az', 1, NULL, NULL),
(25, 'mail_password', 'Salam123!', 1, NULL, NULL),
(26, 'mail_encryption', 'SSL', 1, NULL, NULL),
(27, 'mail_from_name', 'test@markup.az', 1, NULL, NULL),
(28, 'mail_from_address', 'test@markup.az', 1, NULL, NULL),
(29, 'blog_notifications', 'off', 1, '0000-00-00 00:00:00', '2024-03-28 17:25:11'),
(55, 'custom_color', '#000000', 1, '0000-00-00 00:00:00', '2024-03-28 17:29:17'),
(56, 'social_text', '333', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(57, 'email_text', '333333333333333333', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(58, 'contact_text', '333333333333', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(59, 'phone', '+994555555555', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(60, 'email', 'aga.mustafayevvv@gmail.com', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(61, 'contact_image1', 'uploads/contact/contact_contact_image11711660321.png', 1, '2024-03-28 07:46:59', '2024-03-28 17:12:01'),
(62, 'contact_image2', 'uploads/contact/contact_contact_image21711660321.png', 1, '2024-03-28 07:47:24', '2024-03-28 17:12:01'),
(63, 'map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.832395929507!2d-73.99053220947113!3d40.743713361911816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a7adf1fcf3%3A0xb9fa8d899b755215!2s71%20Madison%20Ave%2C%20New%20York%2C%20NY%2010016%2C%20USA!5e0!3m2!1sen!2sin!4v1688107889372!5m2!1sen!2sin\" width=\"1920\" height=\"690\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2024-03-28 17:25:11', '2024-03-28 17:25:41'),
(64, 'SITE_RTL', 'off', 1, NULL, NULL),
(65, 'SITE_RTL', 'off', 1, NULL, NULL),
(66, 'SITE_RTL', 'off', 1, NULL, NULL),
(67, 'SITE_RTL', 'off', 1, NULL, NULL),
(68, 'SITE_RTL', 'off', 1, NULL, NULL),
(69, 'SITE_RTL', 'off', 1, NULL, NULL),
(70, 'SITE_RTL', 'off', 1, NULL, NULL),
(71, 'SITE_RTL', 'off', 1, NULL, NULL),
(72, 'SITE_RTL', 'off', 1, NULL, NULL),
(73, 'SITE_RTL', 'off', 1, NULL, NULL),
(74, 'SITE_RTL', 'off', 1, NULL, NULL),
(75, 'SITE_RTL', 'off', 1, NULL, NULL),
(76, 'SITE_RTL', 'off', 1, NULL, NULL),
(77, 'SITE_RTL', 'off', 1, NULL, NULL),
(78, 'SITE_RTL', 'off', 1, NULL, NULL),
(79, 'SITE_RTL', 'off', 1, NULL, NULL),
(80, 'SITE_RTL', 'off', 1, NULL, NULL),
(81, 'SITE_RTL', 'off', 1, NULL, NULL),
(82, 'SITE_RTL', 'off', 1, NULL, NULL),
(83, 'SITE_RTL', 'off', 1, NULL, NULL),
(84, 'SITE_RTL', 'off', 1, NULL, NULL),
(85, 'SITE_RTL', 'off', 1, NULL, NULL),
(86, 'SITE_RTL', 'off', 1, NULL, NULL),
(87, 'SITE_RTL', 'off', 1, NULL, NULL),
(88, 'SITE_RTL', 'off', 1, NULL, NULL),
(89, 'SITE_RTL', 'off', 1, NULL, NULL),
(90, 'SITE_RTL', 'off', 1, NULL, NULL),
(91, 'SITE_RTL', 'off', 1, NULL, NULL),
(92, 'SITE_RTL', 'off', 1, NULL, NULL),
(93, 'SITE_RTL', 'off', 1, NULL, NULL),
(94, 'SITE_RTL', 'off', 1, NULL, NULL),
(95, 'SITE_RTL', 'off', 1, NULL, NULL),
(96, 'SITE_RTL', 'off', 1, NULL, NULL),
(97, 'SITE_RTL', 'off', 1, NULL, NULL),
(98, 'SITE_RTL', 'off', 1, NULL, NULL),
(99, 'SITE_RTL', 'off', 1, NULL, NULL),
(100, 'SITE_RTL', 'off', 1, NULL, NULL),
(101, 'SITE_RTL', 'off', 1, NULL, NULL),
(102, 'SITE_RTL', 'off', 1, NULL, NULL),
(103, 'SITE_RTL', 'off', 1, NULL, NULL),
(104, 'SITE_RTL', 'off', 1, NULL, NULL),
(105, 'SITE_RTL', 'off', 1, NULL, NULL),
(106, 'SITE_RTL', 'off', 1, NULL, NULL),
(107, 'SITE_RTL', 'off', 1, NULL, NULL),
(108, 'SITE_RTL', 'off', 1, NULL, NULL),
(109, 'SITE_RTL', 'off', 1, NULL, NULL),
(110, 'SITE_RTL', 'off', 1, NULL, NULL),
(111, 'SITE_RTL', 'off', 1, NULL, NULL),
(112, 'SITE_RTL', 'off', 1, NULL, NULL),
(113, 'SITE_RTL', 'off', 1, NULL, NULL),
(114, 'SITE_RTL', 'off', 1, NULL, NULL),
(115, 'SITE_RTL', 'off', 1, NULL, NULL),
(116, 'SITE_RTL', 'off', 1, NULL, NULL),
(117, 'SITE_RTL', 'off', 1, NULL, NULL),
(118, 'SITE_RTL', 'off', 1, NULL, NULL),
(119, 'SITE_RTL', 'off', 1, NULL, NULL),
(120, 'SITE_RTL', 'off', 1, NULL, NULL),
(121, 'SITE_RTL', 'off', 1, NULL, NULL),
(122, 'SITE_RTL', 'off', 1, NULL, NULL),
(123, 'SITE_RTL', 'off', 1, NULL, NULL),
(124, 'SITE_RTL', 'off', 1, NULL, NULL),
(125, 'SITE_RTL', 'off', 1, NULL, NULL),
(126, 'SITE_RTL', 'off', 1, NULL, NULL),
(127, 'SITE_RTL', 'off', 1, NULL, NULL),
(128, 'SITE_RTL', 'off', 1, NULL, NULL),
(129, 'SITE_RTL', 'off', 1, NULL, NULL),
(130, 'SITE_RTL', 'off', 1, NULL, NULL),
(131, 'SITE_RTL', 'off', 1, NULL, NULL),
(132, 'SITE_RTL', 'off', 1, NULL, NULL),
(133, 'SITE_RTL', 'off', 1, NULL, NULL),
(134, 'SITE_RTL', 'off', 1, NULL, NULL),
(135, 'SITE_RTL', 'off', 1, NULL, NULL),
(136, 'SITE_RTL', 'off', 1, NULL, NULL),
(137, 'SITE_RTL', 'off', 1, NULL, NULL),
(138, 'SITE_RTL', 'off', 1, NULL, NULL),
(139, 'SITE_RTL', 'off', 1, NULL, NULL),
(140, 'SITE_RTL', 'off', 1, NULL, NULL),
(141, 'SITE_RTL', 'off', 1, NULL, NULL),
(142, 'SITE_RTL', 'off', 1, NULL, NULL),
(143, 'SITE_RTL', 'off', 1, NULL, NULL),
(144, 'SITE_RTL', 'off', 1, NULL, NULL),
(145, 'SITE_RTL', 'off', 1, NULL, NULL),
(146, 'SITE_RTL', 'off', 1, NULL, NULL),
(147, 'SITE_RTL', 'off', 1, NULL, NULL),
(148, 'SITE_RTL', 'off', 1, NULL, NULL),
(149, 'SITE_RTL', 'off', 1, NULL, NULL),
(150, 'SITE_RTL', 'off', 1, NULL, NULL),
(151, 'SITE_RTL', 'off', 1, NULL, NULL),
(152, 'SITE_RTL', 'off', 1, NULL, NULL),
(153, 'SITE_RTL', 'off', 1, NULL, NULL),
(154, 'SITE_RTL', 'off', 1, NULL, NULL),
(155, 'SITE_RTL', 'off', 1, NULL, NULL),
(156, 'SITE_RTL', 'off', 1, NULL, NULL),
(157, 'SITE_RTL', 'off', 1, NULL, NULL),
(158, 'SITE_RTL', 'off', 5, NULL, NULL),
(159, 'SITE_RTL', 'off', 5, NULL, NULL),
(160, 'SITE_RTL', 'off', 1, NULL, NULL),
(161, 'SITE_RTL', 'off', 5, NULL, NULL),
(162, 'SITE_RTL', 'off', 5, NULL, NULL),
(163, 'SITE_RTL', 'off', 5, NULL, NULL),
(164, 'SITE_RTL', 'off', 5, NULL, NULL),
(165, 'SITE_RTL', 'off', 5, NULL, NULL),
(166, 'SITE_RTL', 'off', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `button_text` text DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `button_link` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `button_text`, `detail`, `title`, `button_link`, `created_at`, `updated_at`) VALUES
(1, '{\"az\":\"Məlumat əldə et!\"}', '{\"az\":\"Professional Bisnes Həlləri\"}', '{\"az\":\"Arter\"}', 'google.com', '2024-04-14 21:30:40', '2024-05-10 16:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `sociallink`
--

CREATE TABLE `sociallink` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sociallink`
--

INSERT INTO `sociallink` (`id`, `icon`, `link`, `name`, `created_at`, `updated_at`) VALUES
(1, 'fab fa-facebook-fab fa-facebook-f', 'https://www.facebook.com/ArterERP', 'Facebook', '2024-04-17 06:11:49', '2024-05-09 11:18:42'),
(2, 'fab fa-instagram', 'https://www.instagram.com/artererp?igsh=dW9jYm5qMzdvd2Q1&utm_source=qr', 'Instagram', '2024-04-17 06:12:02', '2024-05-09 11:23:05'),
(3, 'fab fa-linkedin-in', 'https://www.linkedin.com/company/artererp/', 'Linkedin', '2024-05-09 11:51:05', '2024-05-09 12:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `social_settings`
--

CREATE TABLE `social_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) NOT NULL,
  `value` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_settings`
--

INSERT INTO `social_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(39, 'https://www.instagram.com/markup.az/', 'fa-brands fa-instagram', '2024-03-29 09:01:58', '2024-03-29 09:01:58'),
(40, 'https://www.instagram.com/markup.az/', 'fa-brands fa-instagram', '2024-03-29 09:01:58', '2024-03-29 09:01:58'),
(41, 'https://www.instagram.com/markup.az/', 'fa-brands fa-instagram', '2024-03-29 09:01:58', '2024-03-29 09:01:58'),
(42, 'https://www.instagram.com/markup.az/', 'fa-brands fa-instagram', '2024-03-29 09:01:58', '2024-03-29 09:01:58'),
(43, 'https://www.instagram.com/markup.az/', 'fa-brands fa-instagram', '2024-03-29 09:01:58', '2024-03-29 09:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `created_at`, `updated_at`) VALUES
(4, 'test@gmail.com', '2024-04-24 12:56:47', '2024-04-24 12:56:47'),
(5, 'superadmin@example.com', '2024-04-25 07:57:47', '2024-04-25 07:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, '{\"az\":\"Tourist\"}', '{\"az\":\"tourist\"}', '2024-05-10 12:27:33', '2024-05-10 12:27:33'),
(2, '{\"az\":\"Book\"}', '{\"az\":\"book\"}', '2024-05-10 12:31:47', '2024-05-10 12:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `profession` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `profession`, `image`, `facebook`, `linkedin`, `instagram`, `created_at`, `updated_at`) VALUES
(1, '{\"az\":\"Robert de Niro\"}', '{\"az\":\"Actor\"}', 'uploads/team/team_image1718002506.jpg', '#', '#', '#', '2024-06-10 06:55:06', '2024-06-10 06:55:06'),
(2, '{\"az\":\"Test ucun ad ve soyad\"}', '{\"az\":\"Test Profession\"}', 'uploads/team/team_image1718002538.jpg', '#', '#', '#', '2024-06-10 06:55:38', '2024-06-10 06:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `lang` varchar(191) DEFAULT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `mode` varchar(191) NOT NULL DEFAULT 'light',
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_enable_login` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `lang`, `avatar`, `type`, `is_admin`, `created_by`, `mode`, `is_active`, `is_enable_login`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@example.com', '2024-03-18 03:09:25', '$2y$10$kML5EmryMGvA0PwyzPxSHOzokYlago8eE51TKthrSX3aahvLXpiCe', NULL, 'az', NULL, 1, 1, 0, 'light', 1, 1, '2024-03-18 03:09:26', '2024-05-09 11:05:13'),
(4, 'Aga Mustafayev', 'aga.mustafayevvv@gmail.com', '2024-03-25 08:03:43', NULL, NULL, 'az', NULL, 1, 0, 1, 'light', 1, 0, '2024-03-25 08:03:43', '2024-03-25 08:03:43'),
(5, 'Arter', 'arter@gmail.com', '2024-04-29 09:49:45', '$2y$10$EYZ2g.rFgWjQFSfV0PGlOe2cxb3l0Jc0Y064xVjejuoi.2HaS3SSi', NULL, 'az', NULL, 1, 1, 0, 'light', 1, 1, NULL, '2024-05-28 11:54:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template_image`
--
ALTER TABLE `email_template_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template_langs`
--
ALTER TABLE `email_template_langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_model_id_foreign` (`model_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maininformation`
--
ALTER TABLE `maininformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metatag`
--
ALTER TABLE `metatag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `praiseperson`
--
ALTER TABLE `praiseperson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projectattribute`
--
ALTER TABLE `projectattribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projectcategory`
--
ALTER TABLE `projectcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projectimage`
--
ALTER TABLE `projectimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seo_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sociallink`
--
ALTER TABLE `sociallink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_settings`
--
ALTER TABLE `social_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email_template_image`
--
ALTER TABLE `email_template_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `email_template_langs`
--
ALTER TABLE `email_template_langs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `home_pages`
--
ALTER TABLE `home_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `maininformation`
--
ALTER TABLE `maininformation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `metatag`
--
ALTER TABLE `metatag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `praiseperson`
--
ALTER TABLE `praiseperson`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `projectattribute`
--
ALTER TABLE `projectattribute`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projectcategory`
--
ALTER TABLE `projectcategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projectimage`
--
ALTER TABLE `projectimage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sociallink`
--
ALTER TABLE `sociallink`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_settings`
--
ALTER TABLE `social_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
