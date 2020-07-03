-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2019 at 06:41 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.1.30-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sc_tubenow-backend-base`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('male','female','others') COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token_expiry` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `user_id` int(11) NOT NULL,
  `timezone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `unique_id`, `name`, `email`, `password`, `picture`, `gender`, `mobile`, `address`, `description`, `token`, `token_expiry`, `status`, `role`, `user_id`, `timezone`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '', 'Admin', 'admin@tubenow.com', '$2y$10$cAclo916Fct13TIMeh6C3uPlKL8cq9fqMIKd984tzc593kVKEto2.', 'https://tubenow.streamhash.com/placeholder.png', 'male', '', '', '', '', '', 0, 'admin', 0, '', NULL, NULL, '2019-09-26 07:40:38', '2019-09-26 07:40:38'),
(2, '', 'Test', 'test@streamtube.com', '$2y$10$TJUd5PxDFK6wzcLCttsB2OJ0ETuSqustlsUSdf1IrE8anHIEA34c2', '', 'male', '', '', '', '', '', 0, 'admin', 0, '', NULL, NULL, '2019-09-26 07:40:38', '2019-09-26 07:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `ads_details`
--

CREATE TABLE `ads_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ad_time` int(11) NOT NULL DEFAULT '0' COMMENT 'In Seconds',
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ad_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_video_ads`
--

CREATE TABLE `assign_video_ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `video_ad_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `ad_type` int(11) NOT NULL DEFAULT '0',
  `ad_time` int(11) NOT NULL DEFAULT '0' COMMENT 'In Sec',
  `video_time` time DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banner_ads`
--

CREATE TABLE `banner_ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bell_notifications`
--

CREATE TABLE `bell_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `notification_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `channel_id` int(11) NOT NULL DEFAULT '0',
  `video_tape_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bell_notification_templates`
--

CREATE TABLE `bell_notification_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bell_notification_templates`
--

INSERT INTO `bell_notification_templates` (`id`, `unique_id`, `type`, `title`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, '5d8cb8d5c90ba', 'NEW_VIDEO', 'New video upload - Notification', '{channel_name} uploaded: {video_title}', 1, '2019-09-26 07:40:45', '2019-09-26 07:40:45'),
(2, '5d8cb8d5ce3f5', 'NEW_SUBSCRIBER', 'New Subscriber - Notification', 'The {username} subscribed your channel: {channel_name}', 1, '2019-09-26 07:40:45', '2019-09-26 07:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_four` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_uploads` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_approved` int(11) NOT NULL COMMENT 'Admin can enable or disable',
  `status` int(11) NOT NULL COMMENT 'User can enable and disable the channel',
  `youtube_channel_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `youtube_channel_updated_at` datetime DEFAULT NULL,
  `youtube_channel_created_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `channel_subscriptions`
--

CREATE TABLE `channel_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `live_video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `live_video_viewer_id` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('uv','vu') COLLATE utf8_unicode_ci NOT NULL COMMENT 'uv - User To Viewer , pu - Viewer to User',
  `delivered` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `no_of_users_limit` smallint(6) NOT NULL,
  `per_users_limit` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_live_videos`
--

CREATE TABLE `custom_live_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `rtmp_video_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hls_video_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Primary Key, It is an unique key',
  `user_id` int(10) UNSIGNED NOT NULL,
  `video_tape_id` int(10) UNSIGNED NOT NULL,
  `reason` longtext COLLATE utf8_unicode_ci COMMENT 'Reason for flagging the video',
  `status` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Status of the flag table',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `folder_name` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `folder_name`, `language`, `status`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', 1, '2019-09-26 07:40:43', '2019-09-26 07:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `like_dislike_videos`
--

CREATE TABLE `like_dislike_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `video_tape_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `like_status` int(11) NOT NULL,
  `dislike_status` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_videos`
--

CREATE TABLE `live_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `channel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `virtual_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Public, Private',
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `browser_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Store Streamer Browser Name',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `is_streaming` int(11) NOT NULL DEFAULT '0',
  `snapshot` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` text COLLATE utf8_unicode_ci NOT NULL,
  `viewer_cnt` int(11) NOT NULL DEFAULT '0',
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `no_of_minutes` int(11) DEFAULT '0',
  `port_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_video_payments`
--

CREATE TABLE `live_video_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `live_video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `live_video_viewer_id` int(11) NOT NULL,
  `payment_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `admin_amount` double(8,2) NOT NULL,
  `user_amount` double(8,2) NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `is_coupon_applied` tinyint(4) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_amount` double NOT NULL,
  `live_video_amount` double NOT NULL,
  `coupon_reason` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_08_25_172600_create_settings_table', 1),
('2016_07_25_142335_create_admins_table', 1),
('2016_08_02_134552_create_user_ratings_table', 1),
('2016_08_02_143110_create_wishlists_table', 1),
('2016_08_02_144545_create_user_histories_table', 1),
('2016_08_07_122712_create_pages_table', 1),
('2016_08_19_134019_create_user_payments_table', 1),
('2016_08_29_073204_create_mobile_registers_table', 1),
('2016_08_29_082431_create_page_counters_table', 1),
('2016_09_15_070030_create_jobs_table', 1),
('2016_09_15_070051_create_failed_jobs_table', 1),
('2017_01_31_114409_create_user_tracks_table', 1),
('2017_03_22_124504_create_flags_table', 1),
('2017_03_23_093118_create_pay_per_views_table', 1),
('2017_03_29_135241_create_subscriptions_table', 1),
('2017_04_12_085551_create_language_table', 1),
('2017_05_03_071458_create_channels_table', 1),
('2017_05_03_073235_create_video_tapes_table', 1),
('2017_05_12_133310_added_picture_field_in_subscription', 1),
('2017_05_15_065503_create_ads_table', 1),
('2017_05_15_065932_create_ads_details', 1),
('2017_05_15_111308_added_ads_status_in_users_table', 1),
('2017_05_16_051837_added_ratings_field_in_videos_taps', 1),
('2017_05_19_092338_add_video_path_in_video_tapes', 1),
('2017_05_19_112414_create_video_tap_images_table', 1),
('2017_05_23_064843_zero_subscription_status', 1),
('2017_05_23_080552_added_compress_status_in_video_tapes', 1),
('2017_05_23_082939_added_ad_stauts_in_video_tapes', 1),
('2017_05_23_091725_added_title_in_pages', 1),
('2017_05_23_104425_added_amount_field_in_video_tapes', 1),
('2017_05_24_151437_create_redeems_table', 1),
('2017_05_24_161212_create_redeem_requests_table', 1),
('2017_05_27_060308_added_is_banner_field_in_video_tapes', 1),
('2017_05_29_070120_added_redeem_count_in_video_tapes_table', 1),
('2017_05_29_192415_create_assign_ad_table', 1),
('2017_05_31_101056_add_user_id_to_video_tapes_table', 1),
('2017_05_31_152258_add_ad_url_key_in_ad_details', 1),
('2017_07_14_121322_create_add_cards_table', 1),
('2017_08_14_085732_added_subtitle_to_video_tapes', 1),
('2017_08_14_091703_create_channel_subscriptions', 1),
('2017_08_14_092159_create_like_dislike_videos', 1),
('2017_08_25_141223_added_dob_in_users', 1),
('2017_08_26_083313_added_user_ratings_in_video_tapes', 1),
('2017_08_27_091840_added_age_limit_in_users', 1),
('2017_09_01_114848_create_live_video_table', 1),
('2017_09_01_121044_added_commission_split_in_users', 1),
('2017_09_01_121342_create_viewers_table', 1),
('2017_09_01_121541_create_live_video_payments_table', 1),
('2017_09_02_113900_create_chat_messages_table', 1),
('2017_10_12_060457_added_video_type_in_video_tapes', 1),
('2017_10_12_062908_create_banner_ads', 1),
('2017_10_12_075539_added_position_in_banner_ads', 1),
('2017_10_12_122246_added_link_in_banner_ads', 1),
('2017_10_23_131137_add_is_master_user_field_to_users_table', 1),
('2017_10_23_141725_add_user_id_to_admin_table', 1),
('2017_11_15_102653_added_ppv_in_videos_tapes_table', 1),
('2017_11_16_164136_added_amount_fields_in_users', 1),
('2017_12_13_094327_added_fields_in_pay_perviews', 1),
('2017_12_22_182954_add_notes_to_user_payments_table', 1),
('2017_12_22_183016_add_notes_to_pay_per_views_table', 1),
('2017_12_27_074050_add_commission_fields_to_pay_per_views_table', 1),
('2017_12_27_085914_add_commission_spilit_details_to_redeems', 1),
('2018_01_07_061707_added_fields_in_card_details', 1),
('2018_01_07_135716_added_enu_values_pages', 1),
('2018_02_19_071800_added_browser_type_in_live_videos', 1),
('2018_03_18_072037_create_coupons_table', 1),
('2018_07_07_103929_add_coupon_fields_in_live_video_payments_table', 1),
('2018_08_24_095044_create_categories_table', 1),
('2018_08_24_095138_add_category_fields_in_video_tapes', 1),
('2018_08_25_051053_create_tags_table', 1),
('2018_08_27_050124_add_coupon_fields_in_user_payments_table', 1),
('2018_08_27_050201_add_coupon_fields_in_ppv_table', 1),
('2018_08_27_073717_create_video_tape_tags_table', 1),
('2018_08_27_095158_add_coupon_fields_in_coupons_table', 1),
('2018_08_27_095241_create_user_coupons_table', 1),
('2018_08_27_114222_add_date_fields_in_pay_per_views', 1),
('2018_08_27_130030_add_ppv_fields_in_video_tapes', 1),
('2018_08_28_094553_create_custom_live_videos_table', 1),
('2018_09_03_043721_add_unique_fields_in_categories', 1),
('2018_09_19_095452_add_status_fields_in_video_tap_tags', 1),
('2018_12_06_063311_add_version3_1_to_tables', 1),
('2019_02_13_055116_create_playlists_table', 1),
('2019_02_13_055849_create_playlist_videos_table', 1),
('2019_02_20_105628_add_version4_migration', 1),
('2019_04_04_095327_add_v5_migration', 1),
('2019_05_27_042549_add_api_revamp_migrations', 1),
('2019_09_24_114300_remove_card_details_in_cards_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_registers`
--

CREATE TABLE `mobile_registers` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mobile_registers`
--

INSERT INTO `mobile_registers` (`id`, `type`, `count`, `created_at`, `updated_at`) VALUES
(1, 'android', 0, NULL, NULL),
(2, 'ios', 0, NULL, NULL),
(3, 'web', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('about','privacy','terms','help','others','contact') COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_counters`
--

CREATE TABLE `page_counters` (
  `id` int(10) UNSIGNED NOT NULL,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_per_views`
--

CREATE TABLE `pay_per_views` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Primary Key, It is an unique key',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'User table Primary key given as Foreign Key',
  `video_id` int(10) UNSIGNED NOT NULL COMMENT 'Admin Video table Primary key given as Foreign Key',
  `payment_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `payment_mode` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `admin_ppv_amount` double(8,2) NOT NULL,
  `user_ppv_amount` double(8,2) NOT NULL,
  `type_of_subscription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_of_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expiry_date` datetime NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Status of the per_per_view table',
  `ppv_date` datetime NOT NULL,
  `is_coupon_applied` tinyint(4) NOT NULL,
  `coupon_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_amount` double NOT NULL,
  `ppv_amount` double NOT NULL,
  `coupon_reason` text COLLATE utf8_unicode_ci NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `is_watched` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `playlist_display_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Public, Private',
  `playlist_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User, Channel',
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlist_videos`
--

CREATE TABLE `playlist_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_tape_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redeems`
--

CREATE TABLE `redeems` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `total_admin_amount` double(8,2) NOT NULL,
  `total_user_amount` double(8,2) NOT NULL,
  `paid` double(8,2) NOT NULL,
  `remaining` double(8,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redeem_requests`
--

CREATE TABLE `redeem_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_amount` double(8,2) NOT NULL,
  `paid_amount` double(8,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_user_id` int(11) NOT NULL,
  `user_referrer_id` int(11) NOT NULL,
  `referral_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'StreamHash', NULL, NULL),
(2, 'site_logo', '', NULL, NULL),
(3, 'site_icon', '', NULL, NULL),
(4, 'browser_key', '', NULL, NULL),
(5, 'default_lang', 'en', NULL, NULL),
(6, 'currency', '$', NULL, NULL),
(7, 'admin_delete_control', '0', NULL, NULL),
(8, 'email_verify_control', '0', NULL, NULL),
(9, 'is_subscription', '0', NULL, NULL),
(10, 'installation_process', '0', NULL, NULL),
(11, 'amount', '10', NULL, NULL),
(12, 'expiry_days', '28', NULL, NULL),
(13, 'admin_take_count', '12', NULL, NULL),
(14, 'google_analytics', '', NULL, NULL),
(15, 'streaming_url', '', NULL, NULL),
(16, 'video_compress_size', '50', NULL, NULL),
(17, 'image_compress_size', '8', NULL, NULL),
(18, 'track_user_mail', '', NULL, NULL),
(19, 'REPORT_VIDEO', 'Sexual content', NULL, NULL),
(20, 'REPORT_VIDEO', 'Violent or repulsive content.', NULL, NULL),
(21, 'REPORT_VIDEO', 'Hateful or abusive content.', NULL, NULL),
(22, 'REPORT_VIDEO', 'Harmful dangerous acts.', NULL, NULL),
(23, 'REPORT_VIDEO', 'Child abuse.', NULL, NULL),
(24, 'REPORT_VIDEO', 'Spam or misleading.', NULL, NULL),
(25, 'REPORT_VIDEO', 'Infringes my rights.', NULL, NULL),
(26, 'REPORT_VIDEO', 'Captions issue.', NULL, NULL),
(27, 'VIDEO_RESOLUTIONS', '426x240', NULL, NULL),
(28, 'VIDEO_RESOLUTIONS', '640x360', NULL, NULL),
(29, 'VIDEO_RESOLUTIONS', '854x480', NULL, NULL),
(30, 'VIDEO_RESOLUTIONS', '1280x720', NULL, NULL),
(31, 'VIDEO_RESOLUTIONS', '1920x1080', NULL, NULL),
(32, 'is_spam', '1', NULL, NULL),
(33, 'viewers_count_per_video', '10', NULL, NULL),
(34, 'amount_per_video', '100', NULL, NULL),
(35, 'minimum_redeem', '1', NULL, NULL),
(36, 'redeem_control', '1', NULL, NULL),
(37, 'header_scripts', '', NULL, NULL),
(38, 'body_scripts', '', NULL, NULL),
(39, 'multi_channel_status', '0', NULL, NULL),
(40, 'admin_login', 'admin@tubenow.com', '2019-09-26 07:40:40', '2019-09-26 07:40:40'),
(41, 'admin_password', '123456', '2019-09-26 07:40:40', '2019-09-26 07:40:40'),
(42, 'no_of_static_pages', '8', NULL, NULL),
(43, 'JWPLAYER_KEY', 'M2NCefPoiiKsaVB8nTttvMBxfb1J3Xl7PDXSaw==', '2019-09-26 07:40:40', '2019-09-26 07:40:40'),
(44, 'HLS_STREAMING_URL', '', '2019-09-26 07:40:40', '2019-09-26 07:40:40'),
(45, 'post_max_size', '2000M', NULL, NULL),
(46, 'upload_max_size', '2000M', NULL, NULL),
(47, 'admin_language_control', '1', NULL, NULL),
(48, 'stripe_publishable_key', 'pk_test_uDYrTXzzAuGRwDYtu7dkhaF3', NULL, NULL),
(49, 'stripe_secret_key', 'sk_test_lRUbYflDyRP3L2UbnsehTUHW', NULL, NULL),
(50, 'age_limit', '18', NULL, NULL),
(51, 'SOCKET_URL', '', '2019-09-26 07:40:41', '2019-09-26 07:40:41'),
(52, 'BASE_URL', '/', '2019-09-26 07:40:41', '2019-09-26 07:40:41'),
(53, 'cross_platform_url', '', NULL, NULL),
(54, 'mobile_rtsp', '', NULL, NULL),
(55, 'wowza_server_url', '', NULL, NULL),
(56, 'kurento_socket_url', '', NULL, NULL),
(57, 'admin_commission', '10', NULL, NULL),
(58, 'user_commission', '90', NULL, NULL),
(59, 'max_register_age_limit', '15', NULL, NULL),
(60, 'chat_socket_url', '', NULL, NULL),
(61, 'chat_url', '', NULL, NULL),
(62, 'is_banner_video', '0', NULL, NULL),
(63, 'is_banner_ad', '1', NULL, NULL),
(64, 'is_vod', '0', '2019-09-26 07:40:42', '2019-09-26 07:40:42'),
(65, 'wowza_ip_address', '', '2019-09-26 07:40:42', '2019-09-26 07:40:42'),
(66, 'create_channel_by_user', '1', NULL, NULL),
(67, 'broadcast_by_user', '1', NULL, NULL),
(68, 'master_user_login', '1', NULL, NULL),
(69, 'delete_video_hour', '2', NULL, NULL),
(70, 'admin_ppv_commission', '10', '2019-09-26 07:40:42', '2019-09-26 07:40:42'),
(71, 'user_ppv_commission', '90', '2019-09-26 07:40:42', '2019-09-26 07:40:42'),
(72, 'is_payper_view', '1', NULL, NULL),
(73, 'facebook_link', '', NULL, NULL),
(74, 'linkedin_link', '', NULL, NULL),
(75, 'twitter_link', '', NULL, NULL),
(76, 'google_plus_link', '', NULL, NULL),
(77, 'pinterest_link', '', NULL, NULL),
(78, 'appstore', '', NULL, NULL),
(79, 'playstore', '', NULL, NULL),
(80, 'push_notification', '1', NULL, NULL),
(81, 'RTMP_SECURE_VIDEO_URL', '', '2019-09-26 07:40:43', '2019-09-26 07:40:43'),
(82, 'HLS_SECURE_VIDEO_URL', '', '2019-09-26 07:40:43', '2019-09-26 07:40:43'),
(83, 'VIDEO_SMIL_URL', '', '2019-09-26 07:40:44', '2019-09-26 07:40:44'),
(84, 'MAILGUN_PUBLIC_KEY', 'pubkey-7dc021cf4689a81a4afb340d1a055021', NULL, NULL),
(85, 'MAILGUN_PRIVATE_KEY', '', NULL, NULL),
(86, 'ios_payment_subscription_status', '0', NULL, NULL),
(87, 'payment_type', 'stripe', NULL, NULL),
(88, 'ffmpeg_installed', '0', NULL, NULL),
(89, 'wowza_port_number', '1935', NULL, NULL),
(90, 'wowza_app_name', 'live', NULL, NULL),
(91, 'wowza_username', 'streamnow', NULL, NULL),
(92, 'wowza_password', 'streamnow', NULL, NULL),
(93, 'wowza_license_key', 'GOSK-8F45-010C-C962-ABB0-264A', NULL, NULL),
(94, 'is_wowza_configured', '0', NULL, NULL),
(95, 'email_notification', '1', '2019-09-26 07:40:45', '2019-09-26 07:40:45'),
(96, 'is_admin_needs_to_approve_channel_video', '0', NULL, NULL),
(97, 'is_direct_upload_button', '0', NULL, NULL),
(98, 'live_url', 'https://tubenow.bytecollar.com/', NULL, NULL),
(99, 'meta_title', 'STREAMTUBE', '2019-09-26 07:40:45', '2019-09-26 07:40:45'),
(100, 'meta_description', 'STREAMTUBE', '2019-09-26 07:40:45', '2019-09-26 07:40:45'),
(101, 'meta_author', 'STREAMTUBE', '2019-09-26 07:40:45', '2019-09-26 07:40:45'),
(102, 'meta_keywords', 'STREAMTUBE', '2019-09-26 07:40:45', '2019-09-26 07:40:45'),
(103, 'referral_commission', '1', '2019-09-26 07:40:46', '2019-09-26 07:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `subscription_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'month,year,days',
  `plan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `total_subscription` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `search_count` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `token_expiry` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` int(11) NOT NULL,
  `paypal_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chat_picture` text COLLATE utf8_unicode_ci,
  `dob` date NOT NULL,
  `age_limit` int(11) NOT NULL DEFAULT '0',
  `device_type` enum('web','android','ios') COLLATE utf8_unicode_ci NOT NULL,
  `device_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `register_type` enum('web','android','ios') COLLATE utf8_unicode_ci NOT NULL,
  `login_by` enum('manual','facebook','twitter','google','linkedin') COLLATE utf8_unicode_ci NOT NULL,
  `social_unique_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('male','female','others') COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double(15,8) NOT NULL,
  `longitude` double(15,8) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 - Approve , 0 - Decline',
  `is_master_user` int(11) NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `total_admin_amount` double(8,2) NOT NULL,
  `total_user_amount` double(8,2) NOT NULL,
  `paid_amount` double(8,2) NOT NULL,
  `remaining_amount` double(8,2) NOT NULL,
  `role` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zero_subscription_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `push_status` int(11) NOT NULL COMMENT 'Mobile Purpose',
  `email_notification_status` int(11) NOT NULL DEFAULT '1',
  `verification_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verification_code_expiry` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0' COMMENT '1 - verified , 0 - No',
  `is_moderator` int(11) NOT NULL,
  `moderator_id` int(11) NOT NULL,
  `timezone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ads_status` int(11) NOT NULL DEFAULT '0' COMMENT ' 0 - Disabled, 1 - Enabled',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount_paid` double(8,2) NOT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `no_of_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `name`, `email`, `password`, `token`, `token_expiry`, `user_type`, `paypal_email`, `picture`, `chat_picture`, `dob`, `age_limit`, `device_type`, `device_token`, `register_type`, `login_by`, `social_unique_id`, `description`, `gender`, `mobile`, `latitude`, `longitude`, `address`, `payment_mode`, `card_id`, `status`, `is_master_user`, `total_amount`, `total_admin_amount`, `total_user_amount`, `paid_amount`, `remaining_amount`, `role`, `zero_subscription_status`, `push_status`, `email_notification_status`, `verification_code`, `verification_code_expiry`, `is_verified`, `is_moderator`, `moderator_id`, `timezone`, `ads_status`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `amount_paid`, `expiry_date`, `no_of_days`) VALUES
(1, '', 'User', 'user@tubenow.com', '$2y$10$AwCum7jtQRyWodj1bAMImeOum53EtcxMWTvxjmpgTeNehDtN7N4n.', '2y10blUYBqNH3NXshc1Koky8evZdMnV2RX7gA53vvHYms72WukVHG7a', '1572095439', 0, '', 'https://tubenow.streamhash.com/placeholder.png', 'https://tubenow.streamhash.com/placeholder.png', '1992-01-01', 25, 'web', '', 'web', 'manual', '', '', 'male', '', 0.00000000, 0.00000000, '', '', 0, 1, 0, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '0', 0, 1, '', '', 1, 0, 0, '', 0, NULL, NULL, '2019-09-26 07:40:39', '2019-09-26 07:40:39', 0.00, NULL, 0),
(2, '', 'Test', 'test@tubenow.com', '$2y$10$SHx2sgT6cUTWn4fDteqDhOysZSL5yl2FixcxTqH2aZ3CNxdQp8k2S', '2y10sJz64ITuz5lxDe3ZvdDtBNl7I2qRH0NjFXKyrgVherHQdIWsNy', '1572095439', 0, '', 'https://tubenow.streamhash.com/placeholder.png', 'https://tubenow.streamhash.com/placeholder.png', '1992-01-01', 25, 'web', '', 'web', 'manual', '', '', 'male', '', 0.00000000, 0.00000000, '', '', 0, 1, 0, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '0', 0, 1, '', '', 1, 0, 0, '', 0, NULL, NULL, '2019-09-26 07:40:39', '2019-09-26 07:40:39', 0.00, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_coupons`
--

CREATE TABLE `user_coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_times_used` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_histories`
--

CREATE TABLE `user_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_tape_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `payment_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '$',
  `payment_mode` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `expiry_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `is_current` int(11) NOT NULL DEFAULT '0',
  `is_coupon_applied` tinyint(4) NOT NULL,
  `coupon_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_amount` double NOT NULL,
  `subscription_amount` double NOT NULL,
  `coupon_reason` text COLLATE utf8_unicode_ci NOT NULL,
  `is_cancelled` tinyint(4) NOT NULL,
  `cancel_reason` text COLLATE utf8_unicode_ci NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_ratings`
--

CREATE TABLE `user_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_tape_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_referrers`
--

CREATE TABLE `user_referrers` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `referral_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_referrals` int(11) NOT NULL DEFAULT '0',
  `total_referrals_earnings` double(8,2) NOT NULL DEFAULT '0.00',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_tracks`
--

CREATE TABLE `user_tracks` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` text COLLATE utf8_unicode_ci NOT NULL,
  `HTTP_USER_AGENT` text COLLATE utf8_unicode_ci NOT NULL,
  `REQUEST_TIME` text COLLATE utf8_unicode_ci NOT NULL,
  `REMOTE_ADDR` text COLLATE utf8_unicode_ci NOT NULL,
  `hostname` text COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double(10,8) NOT NULL,
  `longitude` double(10,8) NOT NULL,
  `origin` text COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `others` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_ads`
--

CREATE TABLE `video_ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `video_tape_id` int(11) NOT NULL,
  `types_of_ad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '1 - Pre Ad, 2 - Post Ad, 3 - In Between Ad',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_tapes`
--

CREATE TABLE `video_tapes` (
  `id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(11) NOT NULL,
  `unique_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `default_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age_limit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` time DEFAULT NULL,
  `video_publish_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '1 - publish now , 2 Publish later',
  `publish_time` datetime NOT NULL,
  `is_approved` int(11) NOT NULL COMMENT 'Admin Approve and UnApprove',
  `status` int(11) NOT NULL COMMENT 'User Approve and UnApprove',
  `youtube_video_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `youtube_channel_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_youtube_downloaded` tinyint(4) NOT NULL DEFAULT '0',
  `video_type` int(11) NOT NULL,
  `is_banner` int(11) NOT NULL DEFAULT '0',
  `banner_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `watch_count` int(11) NOT NULL,
  `is_pay_per_view` tinyint(4) NOT NULL,
  `redeem_count` int(11) NOT NULL DEFAULT '0',
  `reviews` text COLLATE utf8_unicode_ci,
  `video_path` text COLLATE utf8_unicode_ci,
  `video_resolutions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `compress_status` int(11) NOT NULL DEFAULT '0',
  `ad_status` int(11) NOT NULL DEFAULT '0',
  `ratings` int(11) NOT NULL DEFAULT '0',
  `user_ratings` int(11) NOT NULL,
  `type_of_user` int(11) NOT NULL DEFAULT '0',
  `type_of_subscription` int(11) NOT NULL DEFAULT '0',
  `ppv_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `admin_ppv_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `user_ppv_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `ppv_created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `uploaded_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_tape_images`
--

CREATE TABLE `video_tape_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `video_tape_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_tape_tags`
--

CREATE TABLE `video_tape_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `video_tape_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `viewers`
--

CREATE TABLE `viewers` (
  `id` int(10) UNSIGNED NOT NULL,
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_tape_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `ads_details`
--
ALTER TABLE `ads_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_video_ads`
--
ALTER TABLE `assign_video_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_ads`
--
ALTER TABLE `banner_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bell_notifications`
--
ALTER TABLE `bell_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bell_notification_templates`
--
ALTER TABLE `bell_notification_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel_subscriptions`
--
ALTER TABLE `channel_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_code_unique` (`coupon_code`);

--
-- Indexes for table `custom_live_videos`
--
ALTER TABLE `custom_live_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flags`
--
ALTER TABLE `flags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_reserved_at_index` (`queue`,`reserved`,`reserved_at`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_dislike_videos`
--
ALTER TABLE `like_dislike_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_videos`
--
ALTER TABLE `live_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_video_payments`
--
ALTER TABLE `live_video_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_registers`
--
ALTER TABLE `mobile_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_counters`
--
ALTER TABLE `page_counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pay_per_views`
--
ALTER TABLE `pay_per_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist_videos`
--
ALTER TABLE `playlist_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redeems`
--
ALTER TABLE `redeems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redeem_requests`
--
ALTER TABLE `redeem_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_key_index` (`key`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_coupons`
--
ALTER TABLE `user_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_histories`
--
ALTER TABLE `user_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_referrers`
--
ALTER TABLE `user_referrers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tracks`
--
ALTER TABLE `user_tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_ads`
--
ALTER TABLE `video_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_tapes`
--
ALTER TABLE `video_tapes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_tape_images`
--
ALTER TABLE `video_tape_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_tape_tags`
--
ALTER TABLE `video_tape_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewers`
--
ALTER TABLE `viewers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ads_details`
--
ALTER TABLE `ads_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assign_video_ads`
--
ALTER TABLE `assign_video_ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `banner_ads`
--
ALTER TABLE `banner_ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bell_notifications`
--
ALTER TABLE `bell_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bell_notification_templates`
--
ALTER TABLE `bell_notification_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `channel_subscriptions`
--
ALTER TABLE `channel_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `custom_live_videos`
--
ALTER TABLE `custom_live_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `flags`
--
ALTER TABLE `flags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key, It is an unique key';
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `like_dislike_videos`
--
ALTER TABLE `like_dislike_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `live_videos`
--
ALTER TABLE `live_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `live_video_payments`
--
ALTER TABLE `live_video_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mobile_registers`
--
ALTER TABLE `mobile_registers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page_counters`
--
ALTER TABLE `page_counters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pay_per_views`
--
ALTER TABLE `pay_per_views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key, It is an unique key';
--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `playlist_videos`
--
ALTER TABLE `playlist_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `redeems`
--
ALTER TABLE `redeems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `redeem_requests`
--
ALTER TABLE `redeem_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_histories`
--
ALTER TABLE `user_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_ratings`
--
ALTER TABLE `user_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_referrers`
--
ALTER TABLE `user_referrers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_tracks`
--
ALTER TABLE `user_tracks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video_ads`
--
ALTER TABLE `video_ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video_tapes`
--
ALTER TABLE `video_tapes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video_tape_images`
--
ALTER TABLE `video_tape_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video_tape_tags`
--
ALTER TABLE `video_tape_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `viewers`
--
ALTER TABLE `viewers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
