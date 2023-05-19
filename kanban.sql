-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 11:00 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kanban`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `name`, `file_path`, `created_at`, `updated_at`) VALUES
(1, '1611019679_intro.docx', '/storage/uploads/1611019678_intro.docx', '2021-01-18 17:27:59', '2021-01-18 17:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` int(10) UNSIGNED NOT NULL,
  `boardId` int(11) NOT NULL,
  `totalTaskFilter` int(11) NOT NULL,
  `tasksDoneFilter` int(11) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `charts`
--

CREATE TABLE `charts` (
  `id` int(10) UNSIGNED NOT NULL,
  `boardId` int(11) NOT NULL,
  `sprintname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storyPointsTotal` double(5,1) NOT NULL,
  `tasksTotal` double(5,1) NOT NULL,
  `tasksDone` double(5,1) NOT NULL,
  `storyPointsDone` double(5,1) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `sprintDay` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coding_standards`
--

CREATE TABLE `coding_standards` (
  `codestand_id` bigint(20) UNSIGNED NOT NULL,
  `codestand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coding_standards`
--

INSERT INTO `coding_standards` (`codestand_id`, `codestand_name`, `created_at`, `updated_at`) VALUES
(1, 'Security includes', NULL, '2021-06-26 04:32:05'),
(4, 'QR code', '2021-06-14 21:00:39', '2021-06-14 21:00:39'),
(6, 'example', '2021-06-26 18:53:35', '2021-06-26 18:53:35'),
(7, 'Coding Standard Example', '2023-04-12 21:02:51', '2023-04-12 21:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `defect_features`
--

CREATE TABLE `defect_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `defect_features`
--

INSERT INTO `defect_features` (`id`, `title`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'login', 'cannot input email', '2021-06-26 16:25:51', '2021-06-26 16:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mappings`
--

CREATE TABLE `mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ustory_id` int(11) NOT NULL,
  `type_NFR` int(11) NOT NULL,
  `id_NFR` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mappings`
--

INSERT INTO `mappings` (`id`, `ustory_id`, `type_NFR`, `id_NFR`, `created_at`, `updated_at`) VALUES
(1, 25, 1, 1, '2021-06-26 01:50:17', '2021-06-26 01:50:17'),
(2, 25, 1, 1, '2021-06-26 01:50:40', '2021-06-26 01:50:40'),
(3, 25, 2, 2, '2021-06-26 01:50:40', '2021-06-26 01:50:40'),
(4, 25, 1, 1, '2021-06-26 01:51:08', '2021-06-26 01:51:08'),
(5, 25, 2, 2, '2021-06-26 01:51:08', '2021-06-26 01:51:08'),
(6, 25, 1, 1, '2021-06-26 01:51:50', '2021-06-26 01:51:50'),
(7, 25, 2, 2, '2021-06-26 01:51:50', '2021-06-26 01:51:50'),
(8, 25, 1, 1, '2021-06-26 01:52:18', '2021-06-26 01:52:18'),
(9, 25, 2, 2, '2021-06-26 01:52:18', '2021-06-26 01:52:18'),
(10, 25, 1, 1, '2021-06-26 02:01:26', '2021-06-26 02:01:26'),
(11, 25, 2, 2, '2021-06-26 02:01:26', '2021-06-26 02:01:26'),
(12, 38, 1, 1, '2021-06-26 07:45:51', '2021-06-26 07:45:51'),
(13, 38, 2, 2, '2021-06-26 07:45:51', '2021-06-26 07:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_03_16_084930_create_roles_table', 1),
(3, '2019_03_27_154105_create_projects_table', 1),
(4, '2019_05_05_171853_create_priorities_table', 1),
(5, '2019_05_05_174636_create_security_features_table', 1),
(6, '2019_05_07_143235_create_performance_features_table', 1),
(7, '2019_05_09_031717_create_product_features_table', 1),
(8, '2019_05_26_195719_create_defect_features_table', 1),
(9, '2019_06_29_163059_create_mappings_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2020_05_27_040214_create_tasks_table', 1),
(12, '2020_05_27_042541_create_statuses_table', 1),
(13, '2020_08_09_024542_create_teams_table', 1),
(14, '2020_08_18_123517_create_users_table', 1),
(15, '2020_08_20_012325_create_attachments_table', 1),
(16, '2020_08_23_090144_create_team_mappings_table', 1),
(17, '2020_09_12_015732_create_sprint_table', 1),
(18, '2020_09_14_083251_create_user_stories_table', 1),
(19, '2020_09_17_133209_create_coding_standards_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('01246d0fd76bfd39ff2527a9393aab9032f6648d69d57e42ed9679e96ef66167852b90c51e556acd', 17, 1, 'MyApp', '[]', 0, '2023-05-17 09:00:31', '2023-05-17 09:00:31', '2024-05-17 17:00:31'),
('08e435fd4c3a2ae2b7b73cae0a04a9c8a952b2bdf66ed31d2c451f884acbeaf54439eea5ed63bf05', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:47:26', '2023-05-01 12:47:26', '2024-05-01 20:47:26'),
('175b36cc482f60b5267856adf2b548643e3df2cd3c554b95158202d98ced92584fc0cfef893c951b', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:32:39', '2023-05-01 12:32:39', '2024-05-01 20:32:39'),
('1817b194caa40bf6bd7a0831e7e5d0bae44edb116ea71785b53076ad7ed36e685ffb64fcbf409649', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:29:06', '2023-05-01 12:29:06', '2024-05-01 20:29:06'),
('1d622154f3a05cbc040abe794e597925fd8f6d4b74ba7d73452cee044a1c1c8eb3edaf0c1a735253', 20, 1, 'MyApp', '[]', 0, '2023-05-01 17:04:00', '2023-05-01 17:04:00', '2024-05-02 01:04:00'),
('1df707395a3504f426d51d4a365afcd352234dbc899030df5d3c0436f00b515c1bb0a062db32bcae', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:43:35', '2023-05-01 13:43:35', '2024-05-01 21:43:35'),
('1f8a2ab4729c25765da49c39860d17d0d57ad9e1248b40eb5c0c3872f6da5e52edbe57cc49c4c2c1', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:44:07', '2023-05-01 13:44:07', '2024-05-01 21:44:07'),
('217bd2ec5c40a0cbc4980cdb066f75e86afdb26ea402b6348d6bcff8e156c9dbfed12a9b02f38b02', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:11:53', '2023-05-01 13:11:53', '2024-05-01 21:11:53'),
('25397a489d5f499e96b220da4e93b4b0640a3fb7b9cd63e8a088340245bac694adf3bb9b6b476d76', 17, 1, 'MyApp', '[]', 0, '2023-05-18 16:22:12', '2023-05-18 16:22:12', '2024-05-19 00:22:12'),
('2a7d795daa2f39b210ed58e46f27cff5bb5c15862c14e0f8683006ba3965a9bc5c42c7ca9815a86e', 17, 1, 'MyApp', '[]', 0, '2023-05-01 17:16:11', '2023-05-01 17:16:11', '2024-05-02 01:16:11'),
('2ac2b7e639d72c4906b7f029449b6369c6bcf31ed405670679af9da0ef43bd2441096028bdf746c6', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:02:42', '2023-05-01 13:02:42', '2024-05-01 21:02:42'),
('2bae52576de9952f37d95e046896215b429843ef8ee401dbbf3a307e6a222554b29e1358f2f000a6', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:49:20', '2023-05-01 13:49:20', '2024-05-01 21:49:20'),
('2bb9a0368bd7a3916aa6094f73fc4d276adf1fb94ba6f408791643994c2f0d0ecaf177dee9761828', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:54:22', '2023-05-01 12:54:22', '2024-05-01 20:54:22'),
('2d36e0d9b7fd33cea1e904d9a88ed2f162d1efa1a1c00c04804af01338e724eaf0b39073f7b512a8', 17, 1, 'MyApp', '[]', 0, '2023-05-17 09:01:57', '2023-05-17 09:01:57', '2024-05-17 17:01:57'),
('2df2a5b99ea165e7a123ea6354bbd2a22bae70109cfefd709f6c906082021653d0c9ffc161faa6b9', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:47:55', '2023-05-01 12:47:55', '2024-05-01 20:47:55'),
('2e9cf572f738f2001d2c5bf5ac7845b13434b8728a26865495bf33f3b7363add2a25621ff8de5ee2', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:30:14', '2023-05-01 12:30:14', '2024-05-01 20:30:14'),
('2facd04bd6cdda54ea80257bc5411a6bf3d6f7010ca7035a628ce47b0393894007cac03b904db728', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:56:31', '2023-05-01 12:56:31', '2024-05-01 20:56:31'),
('380c36971e61def4b4e7b78905b8bd800b3e065e57485697b277064c2a2d8f87d8147fda489945a5', 17, 1, 'MyApp', '[]', 0, '2023-05-18 16:46:35', '2023-05-18 16:46:35', '2024-05-19 00:46:35'),
('395bd5e47acd7236d5d26e5edb01caa1c55f526ef2e414b7775081d87726481a2a70b58fa7766d09', 17, 1, 'MyApp', '[]', 0, '2023-05-17 09:03:30', '2023-05-17 09:03:30', '2024-05-17 17:03:30'),
('3b53935015c729c5a4b509a26414c58c478bb71231455f3c5191fe3449546d45e56da170cbeb75bb', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:40:53', '2023-05-01 13:40:53', '2024-05-01 21:40:53'),
('3c77d32cd5978484657aeef05012f9d8d38315ccdd937fc816dc7864e751da6fc5c478cc7102f3b9', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:28:08', '2023-05-01 12:28:08', '2024-05-01 20:28:08'),
('3df649f0a0009083f84c6ab0c937103de33c4aa60719aa122cb2f277ef00fdb64d42f1788923c49e', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:08:50', '2023-05-01 13:08:50', '2024-05-01 21:08:50'),
('418e051994b203d3713a3bd3ad421b51613f841d9bdec3619f5525d4fde043eb674609a4ddbf2593', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:00:42', '2023-05-01 13:00:42', '2024-05-01 21:00:42'),
('482394b1df90a4cfec0293ce6be4099bb1d08869b2920ef33e88e6f7eb87dbc887fc76355d97836a', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:44:42', '2023-05-01 13:44:42', '2024-05-01 21:44:42'),
('4b0338f2c7fd05b47faa586689968fe01d71d26110ac1dc23428382872980cb1507bf81ec0baf8c9', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:36:50', '2023-05-01 13:36:50', '2024-05-01 21:36:50'),
('5630888062f89597827a92594b293cc8f8466db8cdf6b9a613646658f23b334f3e1c00e2ae472723', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:56:09', '2023-05-01 12:56:09', '2024-05-01 20:56:09'),
('5e7e45596cee241ab26d6139430f31e7163d3ff81634085d6d030a14d280cd6f22866e2c6689cfdd', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:03:25', '2023-05-01 13:03:25', '2024-05-01 21:03:25'),
('5e8062aff7066955deb43c88a905434b4509cf7308c77096230ffb29741d90a8033b0fb46a670d02', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:27:35', '2023-05-01 12:27:35', '2024-05-01 20:27:35'),
('5eebce4d1508fda53c87cbf326abfdaf64b3910808d9cb3f0e3759668c064a2d8ee28e04497671cd', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:53:35', '2023-05-01 12:53:35', '2024-05-01 20:53:35'),
('5f9f03e78d4d07f645459ca75542f4f5345132a4d27ea78c1d05fb6c1e165e5abeae14b882757aea', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:52:44', '2023-05-01 12:52:44', '2024-05-01 20:52:44'),
('6709968a05dbc8cb0d5b25f81bbd9213c70edc5c77de97a3d7229a85cfdad8e606d8624b7e56fc47', 20, 1, 'MyApp', '[]', 0, '2023-05-01 17:01:34', '2023-05-01 17:01:34', '2024-05-02 01:01:34'),
('6a429c8bfdf6a7aba57925c98e1dd87e5e231f21180d47f31af9424ef36c613ad17b32720972e18b', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:08:44', '2023-05-01 13:08:44', '2024-05-01 21:08:44'),
('6c85ea80d5daca9f64d86d433a0534db53ee23ec95075683f327ff87b462246d9ae21a86886e23a9', 17, 1, 'MyApp', '[]', 0, '2023-05-01 11:54:42', '2023-05-01 11:54:42', '2024-05-01 19:54:42'),
('70f12a724d4645585b0945fc985ab12b144648d71f693cef36afa33a7d336300fb2d07ec6ec5b165', 17, 1, 'MyApp', '[]', 0, '2023-05-18 16:20:16', '2023-05-18 16:20:16', '2024-05-19 00:20:16'),
('739a8990ff830fce97b2f9ca6c202b0bf07b965d4ef33d8f83a685ec0b5149421ce20207716382f0', 17, 1, 'MyApp', '[]', 0, '2023-05-18 16:45:56', '2023-05-18 16:45:56', '2024-05-19 00:45:56'),
('748a39cc971423a047d7d46a0505d8c96eda50512957b5ab857f9a157e4d4944de2ef4ffd4681ba7', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:01:55', '2023-05-01 13:01:55', '2024-05-01 21:01:55'),
('7ada60297dbbfaabf8cd5b1b5e80368c8aa1053a2096ffaec3b9c827855ffe9dd3ad9bf551b825ff', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:31:11', '2023-05-01 13:31:11', '2024-05-01 21:31:11'),
('7de3fd4ed509276e4d68f654b895b9e6019da9b6fd1c5f3a6059147461e82f2a67f940d4f2aa341d', 17, 1, 'MyApp', '[]', 0, '2023-05-18 16:48:11', '2023-05-18 16:48:11', '2024-05-19 00:48:11'),
('82177e9aba24fb59b48f203b58fd70e83330fd8319f351a8f5254d3a2831ee3aea6dae4b18e76329', 17, 1, 'MyApp', '[]', 0, '2023-05-18 15:56:39', '2023-05-18 15:56:39', '2024-05-18 23:56:39'),
('8c199f32667fa466a06d8270514d821792fc7e033e84e1fc724f05f42a1f237ffbac3df1270ee0f6', 17, 1, 'MyApp', '[]', 0, '2023-05-18 15:58:06', '2023-05-18 15:58:06', '2024-05-18 23:58:06'),
('9366f63786044589d82b03de7d5823639a55a12354e2b1af71b1df50cd2239aa0a2c008664b18110', 20, 1, 'MyApp', '[]', 0, '2023-05-01 17:02:45', '2023-05-01 17:02:45', '2024-05-02 01:02:45'),
('954820e733553493831bf8ae2c33d98a81331d3f275825e2e7d6d6b46227c64bd3db118bc2feb114', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:03:10', '2023-05-01 13:03:10', '2024-05-01 21:03:10'),
('9893138009c49025dce8e78910f60922a3c0116f7a3f05bfd485195805ac541f5e466ea9828b81d6', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:47:32', '2023-05-01 12:47:32', '2024-05-01 20:47:32'),
('9efcbc5967c8c1b0108c1babbfd63926f9f58842b85dc29191a75328566eafda2edc65fc4999782e', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:41:39', '2023-05-01 13:41:39', '2024-05-01 21:41:39'),
('a48e3259653a80261d522bcb73c2f3788e664d58fd558e99e02bbf8da1bf306dd1d921b55a368a02', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:57:31', '2023-05-01 12:57:31', '2024-05-01 20:57:31'),
('a5d8c71161fda54e2d9964b75d6713de37831f4af84b994fbc96430057451a4e426133509a44f442', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:24:33', '2023-05-01 12:24:33', '2024-05-01 20:24:33'),
('a854aded26b4aa0535adb6194ba157191bfd184d3e595bf4820982c2281e7c269ff6eb022ee00117', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:54:25', '2023-05-01 12:54:25', '2024-05-01 20:54:25'),
('ac7f659c89970f606321d078ea9321ceeec8321ec9a8a2c338a0c736b2fb603f15d9adad313c73f3', 20, 1, 'MyApp', '[]', 0, '2023-05-01 17:15:18', '2023-05-01 17:15:18', '2024-05-02 01:15:18'),
('ad49f052e0c087e25fd06d03f3e54c5a4a12d1bfc09deb51667a84e38550df9738b6f1131e98b876', 17, 1, 'MyApp', '[]', 0, '2023-05-18 16:52:57', '2023-05-18 16:52:57', '2024-05-19 00:52:57'),
('b0a53d6890e88f25bd8ab5cd28991f0006cca349d2772082768ecf4405549da01a581980c2b3c07f', 17, 1, 'MyApp', '[]', 0, '2023-05-18 16:43:56', '2023-05-18 16:43:56', '2024-05-19 00:43:56'),
('b1c21b5574cfffdeba76dd603503c40699273147b8caa4aa28b7d5f50f75dd1cd485acb809656cec', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:09:31', '2023-05-01 13:09:31', '2024-05-01 21:09:31'),
('b4a95d96d2219a3f8ab926143838348ec7c78589d46cfb6249852c3b85f8d028b2d0897ae8dfa75a', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:30:37', '2023-05-01 12:30:37', '2024-05-01 20:30:37'),
('b7904144df9ca8e555bead5d5882f5d90acb4c76bcac3bd0a4a1b0e0f9991139c4bd047aa24c4104', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:28:22', '2023-05-01 12:28:22', '2024-05-01 20:28:22'),
('b865d3a51958ac75b4e29544d014e55fa84f976ab83235980307371cbd6b8c7d9af27071625b54c0', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:55:11', '2023-05-01 12:55:11', '2024-05-01 20:55:11'),
('b92da46fa3a64ef19909ba697501a449950477e0c0f0a9938f69711e1c5e624a5b9103ff3e2d23ab', 17, 1, 'MyApp', '[]', 0, '2023-05-17 08:57:52', '2023-05-17 08:57:52', '2024-05-17 16:57:52'),
('be9c9f4b7d4322609dce619856ba682f810a7c32e97c5609dbce3e5d7f5a9ec8d372ccae01d9d84a', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:33:33', '2023-05-01 13:33:33', '2024-05-01 21:33:33'),
('bf0f719a88be919e13ff01c46314f2c41ba0ab372707714bf6719f283769c6af7c3d0e74b15ac053', 17, 1, 'MyApp', '[]', 0, '2023-05-18 16:53:17', '2023-05-18 16:53:17', '2024-05-19 00:53:17'),
('c4b8f423fdf38b2273d06716949b53bb5d1a75d3bc3efefc8560ae1c9a662f7ce78ff1813e6aeb4a', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:39:02', '2023-05-01 13:39:02', '2024-05-01 21:39:02'),
('d263397556e798700dec005df47ebfa8d2fb854298655da494104b828aa01712fe0fbf5ae32cff94', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:40:27', '2023-05-01 13:40:27', '2024-05-01 21:40:27'),
('d819d1b5d0f8182f377c00b57324e429c83e92dcc059236730889e6b45562c20c2149952dada3e50', 20, 1, 'MyApp', '[]', 0, '2023-05-01 17:02:05', '2023-05-01 17:02:05', '2024-05-02 01:02:05'),
('d849bc3d77da08463d6f98880f757599c91f22fee01c1cd40bd3ed17643116e9dca3851cc707b9a8', 17, 1, 'MyApp', '[]', 0, '2023-05-18 16:02:26', '2023-05-18 16:02:26', '2024-05-19 00:02:26'),
('dda6111c19868967499c259a970cfb846d48b81f92da29ce0dcae2d8ae3406d9f3668dee09af674b', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:42:25', '2023-05-01 13:42:25', '2024-05-01 21:42:25'),
('decfaf6c1b3e4877e777642756c8045208325b0ad279f51b88965801a715ba525a8a834f348815e8', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:39:42', '2023-05-01 13:39:42', '2024-05-01 21:39:42'),
('e3f3f45fd9fbf78e11ada26bbd059b417589fe8963ad430e51868ad1125ce03992e2b4d5aec3165f', 17, 1, 'MyApp', '[]', 0, '2023-05-18 16:18:41', '2023-05-18 16:18:41', '2024-05-19 00:18:41'),
('e8b07a40442e38b1d47f08448d18a16f5137f09c35a58986369e68f3a304f594440f8fdc4e02a194', 17, 1, 'MyApp', '[]', 0, '2023-05-18 16:47:57', '2023-05-18 16:47:57', '2024-05-19 00:47:57'),
('ed1c464e5669daa85d1efc16dcddcf2fc368c761614ea9adb1d92e67816ad7000b9633c0b0cbae16', 17, 1, 'MyApp', '[]', 0, '2023-05-01 12:23:51', '2023-05-01 12:23:51', '2024-05-01 20:23:51'),
('efb1d1274c3577bf3a65f479e4f7b098bfffd98ad82c9174d07a5c72f8a0d89a1907de64a44b7dc8', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:39:22', '2023-05-01 13:39:22', '2024-05-01 21:39:22'),
('efe70ddad4ac3338f7b3f4c1f1029b7c78886398e8b257de47a32af7ff37256525851dbfab079113', 17, 1, 'MyApp', '[]', 0, '2023-05-18 16:23:47', '2023-05-18 16:23:47', '2024-05-19 00:23:47'),
('f567ffbc9b858787407bbb0d1715c14c4579ced4a14aace1efc33e41571d1bc12b9f4b51e59e7ced', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:45:34', '2023-05-01 13:45:34', '2024-05-01 21:45:34'),
('f6d5fcb23de7402a12999b87ec9d9a31a91005642fc85d5b041858c84d9f14eba8397e2377140df2', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:10:26', '2023-05-01 13:10:26', '2024-05-01 21:10:26'),
('fede000097599dc3cd22fed13a04f173c3d53a0762caaf0d70f08618d343c33ca6ed9c1dadc41d1d', 17, 1, 'MyApp', '[]', 0, '2023-05-01 13:14:21', '2023-05-01 13:14:21', '2024-05-01 21:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'user', 'TerivfYirjTVFxrEEGZRbXW9Dm3e8gxKu8wjANkb', NULL, 'http://localhost', 1, 0, 0, '2023-04-17 17:24:00', '2023-04-17 17:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-04-17 17:24:00', '2023-04-17 17:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('nadia.nzr26@gmail.com', '$2y$10$yKi0wckYnSUcWTgvOF7oLul7Cg9bWg5fRUqNq2Y/HbFBXY89rifmW', '2021-06-12 23:02:51'),
('nadia.nzr26@gmail.com', '$2y$10$yKi0wckYnSUcWTgvOF7oLul7Cg9bWg5fRUqNq2Y/HbFBXY89rifmW', '2021-06-12 23:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `performance_features`
--

CREATE TABLE `performance_features` (
  `perfeature_id` bigint(20) UNSIGNED NOT NULL,
  `perfeature_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `performance_features`
--

INSERT INTO `performance_features` (`perfeature_id`, `perfeature_name`, `created_at`, `updated_at`) VALUES
(1, 'Loading Time', '2021-01-18 16:39:02', '2021-01-18 16:39:02'),
(2, 'Buffering Time', '2021-01-18 16:39:09', '2021-01-18 16:39:09'),
(3, 'Response Time', '2021-01-18 16:39:22', '2021-01-18 16:39:22'),
(4, 'Time', '2021-01-18 17:26:55', '2021-01-18 17:26:55'),
(6, 'Loadings times', '2021-06-14 20:59:39', '2021-06-14 20:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `prio_id` bigint(20) UNSIGNED NOT NULL,
  `prio_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`prio_id`, `prio_name`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, NULL),
(2, '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_features`
--

CREATE TABLE `product_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profeature_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `team_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proj_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proj_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `team_name`, `proj_name`, `proj_desc`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Java', 'Programming', '2021-01-05', '2021-07-30', NULL, '2021-06-14 20:51:45'),
(2, 1, NULL, 'Newy', 'New', '2021-06-10', '2021-07-10', '2021-06-10 00:03:17', '2021-06-13 22:44:05'),
(13, 3, NULL, 'fs', 'ad', '2021-06-23', '2021-07-23', '2021-06-22 22:27:33', '2021-06-22 22:27:33'),
(17, 1, NULL, 'New', 'Project', '2021-06-27', '2021-07-27', '2021-06-26 18:47:11', '2021-06-26 18:47:11'),
(18, 1, NULL, 'SDA', 'SDA prototype', '2022-01-25', '2022-02-25', '2022-01-25 05:52:01', '2022-01-25 05:52:01'),
(19, 17, 'Team Test 1', 'Project A', 'Project A', '2023-04-06', '2023-05-06', '2023-04-05 19:26:15', '2023-04-06 23:15:10'),
(24, 17, NULL, 'Project C', 'Project C', '2023-04-10', '2023-04-20', '2023-04-09 19:10:59', '2023-04-09 19:10:59'),
(23, 17, 'Team Test 2', 'Project B', 'Project B', '2023-04-10', '2023-05-10', '2023-04-09 18:54:47', '2023-04-09 19:21:08'),
(25, 17, NULL, 'Project D', 'Project D', '2023-04-12', '2023-04-28', '2023-04-09 19:14:18', '2023-04-09 19:14:18'),
(26, 17, 'Team Test Z', 'Project Z', 'Project Z', '2023-04-10', '2023-04-20', '2023-04-10 07:15:42', '2023-04-10 07:16:26'),
(34, 20, NULL, 'Project 1', 'Project 1', '2023-04-11', '2023-04-20', '2023-04-10 16:54:40', '2023-04-10 16:54:40'),
(42, 17, 'Team Test Status', 'Project 55', 'Project 55', '2023-04-19', '2023-04-27', '2023-04-18 23:19:36', '2023-04-18 23:20:52'),
(43, 17, '300', 'Project 300', 'Project 300', '2023-04-19', '2023-04-28', '2023-04-19 00:13:25', '2023-04-19 00:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Project Manager', NULL, NULL),
(2, 'Scrum Master', '2021-01-04 08:43:41', '2021-01-04 08:43:41'),
(11, 'User', '2021-06-26 18:53:48', '2021-06-26 18:53:48'),
(10, 'Admin', '2021-06-26 08:35:39', '2023-03-27 19:24:30'),
(12, 'Product Owner', '2023-03-27 19:22:47', '2023-03-27 19:22:47'),
(14, 'Developer', '2023-03-27 19:23:01', '2023-03-27 19:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `security_features`
--

CREATE TABLE `security_features` (
  `secfeature_id` bigint(20) UNSIGNED NOT NULL,
  `secfeature_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secfeature_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `security_features`
--

INSERT INTO `security_features` (`secfeature_id`, `secfeature_name`, `secfeature_desc`, `created_at`, `updated_at`) VALUES
(1, 'SQL Injection', 'Avoid any hacker', '2021-01-18 16:37:58', '2021-01-18 16:37:58'),
(2, 'Cross_Site Scripting', 'Malicious Scripts', '2021-01-18 16:38:24', '2021-01-18 16:38:24'),
(3, 'SQL', 'sql', '2021-01-18 17:27:10', '2021-01-18 17:27:10'),
(6, 'DDos', 'asdasd', '2021-06-26 04:29:39', '2021-06-26 04:29:39'),
(7, 'test', 'test', '2021-06-26 08:34:30', '2021-06-26 08:34:30'),
(8, 'example', 'ex', '2021-06-26 18:52:51', '2021-06-26 18:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `sprint`
--

CREATE TABLE `sprint` (
  `sprint_id` bigint(20) UNSIGNED NOT NULL,
  `sprint_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sprint_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_sprint` date NOT NULL,
  `end_sprint` date NOT NULL,
  `proj_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sprint`
--

INSERT INTO `sprint` (`sprint_id`, `sprint_name`, `sprint_desc`, `start_sprint`, `end_sprint`, `proj_name`, `users_name`, `created_at`, `updated_at`) VALUES
(1, 'Sprint 1', 'Sprint 1', '2021-01-05', '2021-02-05', 'Java', 'nadianazri', NULL, NULL),
(2, 'Sprint 2', 'Sprint 2', '2021-01-12', '2021-02-05', 'Java', 'diyana', '2021-02-12 06:07:36', '2021-02-12 06:07:36'),
(3, 'Sprint 3', 'Sprint 3', '2021-02-01', '2021-02-28', 'Java', 'haniza', '2021-06-10 19:10:06', '2021-06-10 19:10:06'),
(8, 'Sprint 4', 'Sprint 4', '2021-06-15', '2021-07-15', 'Java', 'nazirah', '2021-06-14 20:55:33', '2021-06-14 20:55:33'),
(9, 'Sprint 1', 'Sprint 1', '2021-06-11', '2021-06-18', 'Newy', 'diyana', '2021-06-25 20:29:27', '2021-06-25 20:29:27'),
(10, 'Sprint 1', 'Sprint 1', '2021-06-24', '2021-07-01', 'fs', 'haniza', '2021-06-25 20:30:06', '2021-06-25 20:30:06'),
(11, 'Sprint 1', 'Sprint 1', '2021-06-27', '2021-07-03', 'adas', 'diyana', '2021-06-26 04:05:29', '2021-06-26 04:05:29'),
(13, 'Sprint 1', 'Sprint 1', '2021-06-27', '2021-07-04', 'ada', 'diyana', '2021-06-26 05:00:02', '2021-06-26 05:00:02'),
(14, 'Sprint 1', 'Sprint', '2021-06-27', '2021-07-04', 'asasdas', 'nazirah', '2021-06-26 05:04:36', '2021-06-26 05:08:11'),
(16, 'Sprint 2', 'Sprint 2', '2021-07-11', '2021-07-18', 'asasdas', 'nazirah', '2021-06-26 05:27:38', '2021-06-26 05:27:38'),
(17, 'Sprint 4', 'Sprint 4', '2021-06-27', '2021-07-04', 'asasdas', 'haniza', '2021-06-26 05:37:55', '2021-06-26 05:37:55'),
(21, 'Sprint 1001', 'Sprint 1', '2021-06-28', '2021-07-04', 'New', 'nazirah', '2021-06-26 18:48:15', '2021-06-26 18:48:15'),
(23, 'Sprint 100', 'Sprint 100', '2021-01-12', '2021-01-21', 'Java', 'haniza', '2022-01-23 08:51:30', '2022-01-23 08:51:30'),
(27, 'Sprint 1', 'Sprint 1', '2023-04-12', '2023-04-27', 'Project A', NULL, '2023-04-11 19:46:08', '2023-04-11 22:35:56'),
(28, 'Sprint 2', 'Sprint 2', '2023-04-12', '2023-04-20', 'Project A', NULL, '2023-04-11 19:48:02', '2023-04-11 19:48:02'),
(29, 'Sprint 3', 'Sprint 3', '2023-04-12', '2023-04-28', 'Project A', NULL, '2023-04-11 19:53:06', '2023-04-11 19:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` smallint(6) NOT NULL DEFAULT 0,
  `project_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `title`, `slug`, `order`, `project_id`) VALUES
(109, 'Baru', 'baru', 5, 19),
(105, 'Done', 'done', 4, 19),
(104, 'In Progress', 'in-progress', 3, 19),
(103, 'Up Next', 'up-next', 2, 19),
(102, 'Backlog', 'backlog', 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `order` smallint(6) DEFAULT 0,
  `user_name` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_name` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userstory_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sprint_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proj_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `start_date`, `end_date`, `order`, `user_name`, `status_name`, `userstory_id`, `sprint_id`, `proj_id`, `created_at`, `updated_at`) VALUES
(1, 'Register', 'Registration form', '0000-00-00', '0000-00-00', 2, '', '', '1', '', '0', '2021-01-18 16:45:49', '2021-08-19 19:41:21'),
(2, 'Login', 'Login form', '0000-00-00', '0000-00-00', 1, '', '', '1', '', '0', '2021-01-18 16:46:04', '2021-01-30 04:58:04'),
(3, 'Project', 'Project', '0000-00-00', '0000-00-00', 2, '', '', '1', '', '0', '2021-01-18 17:28:29', '2021-01-30 04:58:04'),
(4, 'Pro', 'a', '0000-00-00', '0000-00-00', 2, '', '', '1', '', '0', '2021-01-30 04:55:46', '2021-08-19 17:59:12'),
(5, 'a', 'a', '0000-00-00', '0000-00-00', 1, '', '', '2', '', '0', '2021-02-12 06:11:14', '2021-08-19 17:59:12'),
(6, 'jhkjhl', 'jhbkj', '0000-00-00', '0000-00-00', 2, '', '', '2', '', '0', '2021-04-18 06:58:34', '2021-08-19 19:41:10'),
(7, 'login', 'login', '0000-00-00', '0000-00-00', 1, '', '', '2', '', '0', '2021-06-14 20:58:45', '2021-08-19 19:41:21'),
(8, 'login', 'login', '0000-00-00', '0000-00-00', 1, '', '', '2', '', '0', '2021-06-26 18:51:25', '2021-06-26 19:00:29'),
(9, 'Task Test 1', 'Task Test Satu', '2023-04-13', '2023-04-19', 0, 'azamproductowner', 'In Progress', '52', '27', '19', '2023-04-30 03:03:31', '2023-05-01 16:09:04'),
(11, 'Task Test 3', 'Task Test 3', '2023-04-13', '2023-04-19', 0, 'khainorazam', 'Done', '52', '27', '19', '2023-04-30 03:06:48', '2023-04-30 03:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `teammappings`
--

CREATE TABLE `teammappings` (
  `teammapping_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teammappings`
--

INSERT INTO `teammappings` (`teammapping_id`, `username`, `role_name`, `team_name`, `created_at`, `updated_at`) VALUES
(1, 'diyana', 'Software Tester', 'Ab', NULL, NULL),
(11, 'nadianazri', 'Project Manager', 'Ab', '2021-06-12 19:50:42', '2021-06-12 19:50:42'),
(5, 'nadia', 'Project Manager', 'B', NULL, NULL),
(19, 'nazirah', 'Programmer', 'Ab', '2021-06-26 18:49:58', '2021-06-26 18:49:58'),
(18, 'Atiqah', 'Software Tester', 'E', NULL, NULL),
(17, 'misha', 'Scrum Master', 'CA', NULL, NULL),
(25, 'khainorazam', 'Project Manager', 'Team Test 1', '2023-04-06 17:48:57', '2023-04-06 17:48:57'),
(26, 'azamproductowner', 'Product Owner', 'Team Test 1', '2023-04-06 18:02:29', '2023-04-06 18:02:29'),
(34, 'khainorazam', 'Project Manager', 'Team Test Z', '2023-04-10 07:16:46', '2023-04-10 07:16:46'),
(37, 'khainorazam', 'Scrum Master', 'Team Test Status', '2023-04-18 23:23:31', '2023-04-18 23:23:31'),
(38, 'khainorazam', 'Project Manager', '300', '2023-04-19 00:13:54', '2023-04-19 00:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(10) UNSIGNED NOT NULL,
  `team_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proj_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `proj_name`, `created_at`, `updated_at`) VALUES
(1, 'Ab', NULL, '2021-01-04 07:43:54', '2021-01-05 02:06:25'),
(4, 'B', NULL, '2021-01-04 23:56:37', '2021-01-04 23:56:37'),
(13, 'CA', NULL, '2021-06-26 04:18:30', '2021-06-26 04:18:35'),
(14, 'D', NULL, '2021-06-26 08:11:06', '2021-06-26 08:11:06'),
(16, 'E', NULL, '2021-06-26 18:49:08', '2021-06-26 18:49:08'),
(26, 'Team Test Z', 'Project Z', '2023-04-10 07:16:26', '2023-04-10 07:16:26'),
(20, 'Team Test 1', 'Project A', '2023-04-05 22:59:05', '2023-04-05 23:30:12'),
(25, 'Team Test 2', 'Project B', '2023-04-09 19:21:08', '2023-04-09 19:21:08'),
(27, 'Team Test Status', 'Project 55', '2023-04-18 23:20:52', '2023-04-18 23:20:52'),
(28, '300', 'Project 300', '2023-04-19 00:13:42', '2023-04-19 00:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `country`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nadiah Nazri', 'nadianazri', 'Malaysia', 'nadia.nzr26@gmail.com', NULL, '$2y$10$b4HqpmJjGcXKqsfhz2AMEOxV3FMHzeoNsYCDmR5YntdP1fXNjMCni', 'D2ko2yiyknIKJIIrs9ew8DOGg7vb5e6e6VmDLdtJ25j4yz3cQTTrckidEPyJ', '2020-12-30 18:07:57', '2020-12-30 18:07:57'),
(12, 'Nadiah', 'nadia', 'Australia', 'nadia@gmail.com', NULL, '$2y$10$sC5Px3ngFS8tt0CmQEAG9.Dl1N6TZBYkk5/MM20TL3kZU9KoiMY.C', NULL, '2021-01-18 17:23:09', '2021-01-18 17:23:09'),
(3, 'Diyana', 'diyana', 'Finland', 'diyana@gmail.com', NULL, '$2y$10$V4s/rCNaU/OW6sjXWf6ZKeA/jJ20RJ1kdyTfeMLGEBBneQYQxrrIq', NULL, '2021-01-05 00:03:57', '2021-01-05 00:03:57'),
(4, 'Haniza', 'haniza', 'Australia', 'haniza@gmail.com', NULL, '$2y$10$A3msmyq2clwpzivyNV28zOfCHCIv/JThF95KzymxzUvmocglmeb6m', NULL, '2021-01-05 00:04:36', '2021-01-05 00:04:36'),
(5, 'Misha', 'misha', 'Liberia', 'misha@gmail.com', NULL, '$2y$10$NEItS8NMTvVJhKkNnbQoguCqB4zLWccnehbJh4IRwJKVEoYPsCJuW', NULL, '2021-01-05 00:05:09', '2021-01-05 00:05:09'),
(9, 'Hafizah', 'hafizah', 'Liberia', 'hafizah@gmail.com', NULL, '$2y$10$UIi0X86rHTJjkdZGi8kNDu8o1A072umT3uvrDOHt9BL1jcgakvhOi', NULL, '2021-01-18 16:17:55', '2021-01-18 16:17:55'),
(10, 'Atiqah', 'atiqah', 'Vietnam', 'atiqah@gmail.com', NULL, '$2y$10$MVXkIfsvNdgHR58lh4sM7uNgEO4YmPxDj1lGjfOoe4CDqUrSFkknW', NULL, '2021-01-18 16:18:44', '2021-01-18 16:18:44'),
(14, 'Nazirah', 'nazirah', 'Malaysia', 'nazirah@gmail.com', NULL, '$2y$10$N7E1jhW4Aar7fdr0HvpQfOgt8tTz1/ucFEoH9Nq4BoaCCJW/FqRgq', NULL, '2021-06-13 20:50:04', '2021-06-13 20:50:04'),
(15, 'Nadiah', 'nadiahnzr', 'Malaysia', 'nadia26@gmail.com', NULL, '$2y$10$uyePCq0Rbwk1rCGThFZBH.RZ2Buk9Hl4OUeXHtGiqUkSo9W8ww5TG', NULL, '2021-06-14 20:43:55', '2021-06-14 20:43:55'),
(16, 'Nazira', 'nazira', 'Malaysia', 'nazirah99@gmail.com', NULL, '$2y$10$NJfQ1s5aDAcelL7yBGT7VeYEFoqVUvf7co9CPBDYD8.vfLkeye/Vq', NULL, '2021-06-26 18:46:08', '2021-06-26 18:46:08'),
(17, 'Khainor Azam', 'khainorazam', 'Afghanistan', 'khainorazam25@gmail.com', NULL, '$2y$10$sUUFG1y64SR36V9A1yG6ROz2iV5ti/78rjkTXmwH6faEzkZ4MCxsa', 'BQVehC9ooVkZNqUGxYzH6gVgww6JHdeL2fsRc7AoFj8F1xU3YjR3yZZpGwZg', '2023-03-29 23:57:46', '2023-04-06 17:48:57'),
(18, 'Azam Khainor', 'azamproductowner', 'Afghanistan', 'azamkhainor@gmail.com', NULL, '$2y$10$bRoRKltC/IAWKfD3bSCpj.ssClk36hHWv6V4uxgOfvk9yiEjksLh2', '7sMzY9IkVY0aZBoaW853JtFh6D4r2M7f1tTn1q05hzlRSmCthgG3x4eP2hGE', '2023-03-30 00:02:21', '2023-04-06 18:02:29'),
(19, 'Zaman', 'zamanscrummaster', 'Afghanistan', 'zaman@gmail.com', NULL, '$2y$10$Z5KLWtoAGT75BHIX7JDGauys2Wd7zlb4IZ0IGAkuaHoCzk92Lmg7a', 'j7TfB63zIVApp5MLzZGja6FFfvufky3lXaD3q00m1fqt6JgVXwHb2wuJTegG', '2023-03-30 00:07:16', '2023-03-30 00:07:16'),
(20, 'Manza', 'manzadeveloper', 'Afghanistan', 'manza@gmail.com', NULL, '$2y$10$xgQaErK4dpuv0LB.rRU2h.vbFV4uj6mqsSPjfwlNg3eGLQynDYaQu', 'yV9KiRgWJG5JXYQW7MGdCIiMfteWisHtTe8XUS2CVgVfRfimcRGVeaghm5SF', '2023-03-30 00:10:03', '2023-03-30 00:10:03'),
(21, 'Ali Rahman', 'alirahman', 'Barbados', 'alirahman@gmail.com', NULL, '$2y$10$g4k8IZkRY1Ftbhn.hy0QXeH19gD3snTw/66JUQM91NqqJTujUzHTm', NULL, '2023-04-05 17:31:57', '2023-04-05 17:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_stories`
--

CREATE TABLE `user_stories` (
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `user_story` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `means` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prio_story` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proj_id` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sprint_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perfeature_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secfeature_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_stories`
--

INSERT INTO `user_stories` (`u_id`, `user_story`, `means`, `prio_story`, `title`, `proj_id`, `sprint_id`, `perfeature_id`, `secfeature_id`, `created_at`, `updated_at`) VALUES
(1, 'Team feature', 'Team', '2', 'Backlog', '', '1', '', '', '2021-06-10 05:28:50', '2022-01-10 07:14:25'),
(2, 'login', 'login', '2', 'Backlog', '', '1', '', '', '2021-06-10 05:29:31', '2021-06-10 05:29:31'),
(3, 'reg', 'reg', '2', 'Backlog', '', '1', '', '', '2021-06-10 05:33:34', '2021-06-10 05:33:34'),
(21, 'new', 'new', '2', 'In Progress', '', '1', '', '', '2021-06-12 23:25:57', '2021-06-12 23:25:57'),
(22, 'Team feature', 'Team', '2', 'Up Next', '', '1', '', '', '2021-06-14 20:56:16', '2021-06-14 20:56:16'),
(24, 'sda', 'qwq', '2', 'Done', '', '10', '', '', '2021-06-25 21:33:09', '2021-06-25 21:33:09'),
(25, 'asef', 'asfdasdf', '2', 'Backlog', '', '9', '', '', '2021-06-25 21:38:13', '2021-06-26 01:22:55'),
(26, 'aweda', 'dawdaw', '2', 'In Progress', '', '11', '', '', '2021-06-26 04:53:19', '2021-06-26 04:53:19'),
(42, 'Login', 'login', '1', 'In Progress', '', '21', '[\"Loading Time\",\"Buffering Time\"]', '[\"SQL Injection\",\"Cross_Site Scripting\"]', '2021-06-26 18:48:51', '2021-06-26 18:48:51'),
(52, 'US3', 'User story 3', NULL, 'Backlog', '', '27', '[\"Loading Time\"]', '[\"SQL Injection\"]', '2023-04-12 08:25:32', '2023-04-17 17:07:26'),
(53, 'As a Project Manager, I am able to test this so that I can to ensure I get this right', NULL, NULL, 'In Progress', '19', '27', '[\"Loading Time\"]', '[\"SQL Injection\"]', '2023-05-15 06:28:12', '2023-05-15 07:05:17'),
(55, 'As a Project Manager, I am able to test out the backlog so that I can make sure it works', NULL, NULL, 'Backlog', '19', '27', '[\"Loading Time\"]', '[\"SQL Injection\",\"Cross_Site Scripting\"]', '2023-05-15 08:20:09', '2023-05-17 19:52:42'),
(57, 'As a Product Owner, I am able to test second backlog', NULL, NULL, 'Backlog', '19', NULL, '[\"Loading Time\"]', 'null', '2023-05-17 19:46:57', '2023-05-17 19:46:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `boards_slug_unique` (`slug`);

--
-- Indexes for table `charts`
--
ALTER TABLE `charts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `charts_sprintname_index` (`sprintname`),
  ADD KEY `charts_slug_index` (`slug`);

--
-- Indexes for table `coding_standards`
--
ALTER TABLE `coding_standards`
  ADD PRIMARY KEY (`codestand_id`);

--
-- Indexes for table `defect_features`
--
ALTER TABLE `defect_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mappings`
--
ALTER TABLE `mappings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `performance_features`
--
ALTER TABLE `performance_features`
  ADD PRIMARY KEY (`perfeature_id`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`prio_id`);

--
-- Indexes for table `product_features`
--
ALTER TABLE `product_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `security_features`
--
ALTER TABLE `security_features`
  ADD PRIMARY KEY (`secfeature_id`);

--
-- Indexes for table `sprint`
--
ALTER TABLE `sprint`
  ADD PRIMARY KEY (`sprint_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teammappings`
--
ALTER TABLE `teammappings`
  ADD PRIMARY KEY (`teammapping_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`),
  ADD UNIQUE KEY `team_name` (`team_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_stories`
--
ALTER TABLE `user_stories`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `charts`
--
ALTER TABLE `charts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coding_standards`
--
ALTER TABLE `coding_standards`
  MODIFY `codestand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `defect_features`
--
ALTER TABLE `defect_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mappings`
--
ALTER TABLE `mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `performance_features`
--
ALTER TABLE `performance_features`
  MODIFY `perfeature_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `prio_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `security_features`
--
ALTER TABLE `security_features`
  MODIFY `secfeature_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sprint`
--
ALTER TABLE `sprint`
  MODIFY `sprint_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teammappings`
--
ALTER TABLE `teammappings`
  MODIFY `teammapping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_stories`
--
ALTER TABLE `user_stories`
  MODIFY `u_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
