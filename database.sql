-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 13 jan. 2020 à 14:52
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `fleetmanager`
--

-- --------------------------------------------------------

--
-- Structure de la table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `api_settings`
--

CREATE TABLE `api_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `api_settings`
--

INSERT INTO `api_settings` (`id`, `key_name`, `key_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'api', '1', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(2, 'anyone_register', '0', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(3, 'region_availability', 'region one, region two, region three', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(4, 'driver_review', '0', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(5, 'booking', '3', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(6, 'cancel', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(7, 'max_trip', '1', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(8, 'api_key', '', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(9, 'db_url', '', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(10, 'db_secret', '', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(11, 'server_key', '', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(12, 'google_api', '1', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `pickup` timestamp NULL DEFAULT NULL,
  `dropoff` timestamp NULL DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `pickup_addr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dest_addr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `travellers` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  `payment` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `bookings`
--

INSERT INTO `bookings` (`id`, `customer_id`, `user_id`, `vehicle_id`, `driver_id`, `pickup`, `dropoff`, `duration`, `pickup_addr`, `dest_addr`, `note`, `travellers`, `status`, `payment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 1, 1, 6, '2020-01-01 11:09:15', '2020-01-02 08:21:14', 2880, '28320 Murray Ports Suite 097\nSouth Reagan, OK 33426-2890', '794 Brenda Loaf Apt. 153\nSwaniawskifurt, MD 49090', 'sample note', 4, 1, 1, '2020-01-08 10:45:30', '2020-01-08 10:45:34', NULL),
(2, 5, 1, 1, 6, '2019-12-29 22:54:43', '2019-12-30 12:01:28', 2880, '2667 Simeon Pike\nSamantamouth, GA 14573-6251', '123 Stracke Extensions Apt. 295\nSouth Norwoodview, DE 90871-1523', 'sample note', 1, 0, 0, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bookings_meta`
--

CREATE TABLE `bookings_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'null',
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `bookings_meta`
--

INSERT INTO `bookings_meta` (`id`, `booking_id`, `type`, `key`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'string', 'ride_status', 'Completed', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(2, 1, 'string', 'journey_date', '01-01-2020', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(3, 1, 'string', 'journey_time', '12:09:15', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(4, 1, 'integer', 'customerid', '4', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(5, 1, 'integer', 'vehicleid', '1', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(6, 1, 'integer', 'day', '1', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(7, 1, 'integer', 'mileage', '10', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(8, 1, 'integer', 'waiting_time', '0', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(9, 1, 'string', 'date', '2020-01-08', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(10, 1, 'integer', 'total', '500', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(11, 1, 'integer', 'receipt', '1', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(12, 2, 'string', 'ride_status', 'Upcoming', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(13, 2, 'string', 'journey_date', '29-12-2019', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(14, 2, 'string', 'journey_time', '23:54:43', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34');

-- --------------------------------------------------------

--
-- Structure de la table `booking_income`
--

CREATE TABLE `booking_income` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `income_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `booking_income`
--

INSERT INTO `booking_income` (`id`, `booking_id`, `income_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `booking_quotation`
--

CREATE TABLE `booking_quotation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `pickup` timestamp NULL DEFAULT NULL,
  `dropoff` timestamp NULL DEFAULT NULL,
  `pickup_addr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dest_addr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `travellers` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  `payment` int(11) NOT NULL DEFAULT '0',
  `day` int(11) DEFAULT NULL,
  `mileage` double DEFAULT NULL,
  `waiting_time` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `company_services`
--

CREATE TABLE `company_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `company_services`
--

INSERT INTO `company_services` (`id`, `title`, `image`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Best price guranteed', 'fleet-bestprice.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Neque at, nobis repudiandae dolores.', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30'),
(2, '24/7 Customer care', 'fleet-care.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Neque at, nobis repudiandae dolores.', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30'),
(3, 'Home pickups', 'fleet-homepickup.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Neque at, nobis repudiandae dolores.', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30'),
(4, 'Easy Bookings', 'fleet-easybooking.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Neque at, nobis repudiandae dolores.', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30');

-- --------------------------------------------------------

--
-- Structure de la table `driver_logs`
--

CREATE TABLE `driver_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `driver_logs`
--

INSERT INTO `driver_logs` (`id`, `vehicle_id`, `driver_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2020-01-08 10:45:34', '2020-01-08 10:45:34', '2020-01-08 10:45:34');

-- --------------------------------------------------------

--
-- Structure de la table `driver_vehicle`
--

CREATE TABLE `driver_vehicle` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `driver_vehicle`
--

INSERT INTO `driver_vehicle` (`id`, `vehicle_id`, `driver_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2020-01-08 10:45:34', '2020-01-08 10:45:34');

-- --------------------------------------------------------

--
-- Structure de la table `email_content`
--

CREATE TABLE `email_content` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `email_content`
--

INSERT INTO `email_content` (`id`, `key`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'insurance', 'vehicle insurance email content', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(2, 'vehicle_licence', 'vehicle licence email content', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(3, 'driving_licence', 'driving licence email content', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(4, 'registration', 'vehicle registration email content', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(5, 'service_reminder', 'service reminder email content', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(6, 'users', '', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(7, 'options', '', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(8, 'email', '0', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `exp_id` int(11) DEFAULT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'e',
  `amount` double(10,2) NOT NULL DEFAULT '0.00',
  `user_id` int(11) DEFAULT NULL,
  `expense_type` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `expense`
--

INSERT INTO `expense` (`id`, `vehicle_id`, `exp_id`, `type`, `amount`, `user_id`, `expense_type`, `comment`, `date`, `created_at`, `updated_at`, `deleted_at`, `vendor_id`) VALUES
(1, 1, NULL, 'e', 4014.00, 2, 1, 'Sample Comment', '2020-01-07', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL, NULL),
(2, 2, NULL, 'e', 2143.00, 3, 4, 'Sample Comment', '2020-01-03', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL, NULL),
(3, 1, 1, 'e', 500.00, 2, 8, 'Sample Comment', '2020-01-06', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL, NULL),
(4, 1, 2, 'e', 500.00, 2, 8, 'Sample Comment', '2020-01-18', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `expense_cat`
--

CREATE TABLE `expense_cat` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `expense_cat`
--

INSERT INTO `expense_cat` (`id`, `name`, `user_id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Insurance', 1, 'd', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL),
(2, 'Patente', 1, 'd', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL),
(3, 'Mechanics', 1, 'd', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL),
(4, 'Car wash', 1, 'd', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL),
(5, 'Vignette', 1, 'd', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL),
(6, 'Maintenance', 14, 'd', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL),
(7, 'Parking', 14, 'd', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL),
(8, 'Fuel', 15, 'd', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL),
(9, 'Car Services', 1, 'd', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fare_settings`
--

CREATE TABLE `fare_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fare_settings`
--

INSERT INTO `fare_settings` (`id`, `key_name`, `key_value`, `created_at`, `updated_at`, `deleted_at`, `type_id`) VALUES
(1, 'hatchback_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 1),
(2, 'hatchback_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 1),
(3, 'hatchback_base_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 1),
(4, 'hatchback_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 1),
(5, 'hatchback_weekend_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 1),
(6, 'hatchback_weekend_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 1),
(7, 'hatchback_weekend_wait_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 1),
(8, 'hatchback_weekend_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 1),
(9, 'hatchback_night_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 1),
(10, 'hatchback_night_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 1),
(11, 'hatchback_night_wait_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 1),
(12, 'hatchback_night_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 1),
(13, 'sedan_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 2),
(14, 'sedan_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 2),
(15, 'sedan_base_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 2),
(16, 'sedan_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 2),
(17, 'sedan_weekend_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 2),
(18, 'sedan_weekend_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 2),
(19, 'sedan_weekend_wait_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 2),
(20, 'sedan_weekend_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 2),
(21, 'sedan_night_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 2),
(22, 'sedan_night_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 2),
(23, 'sedan_night_wait_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 2),
(24, 'sedan_night_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 2),
(25, 'minivan_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 3),
(26, 'minivan_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 3),
(27, 'minivan_base_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 3),
(28, 'minivan_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 3),
(29, 'minivan_weekend_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 3),
(30, 'minivan_weekend_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 3),
(31, 'minivan_weekend_wait_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 3),
(32, 'minivan_weekend_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 3),
(33, 'minivan_night_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 3),
(34, 'minivan_night_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 3),
(35, 'minivan_night_wait_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 3),
(36, 'minivan_night_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 3),
(37, 'saloon_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 4),
(38, 'saloon_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 4),
(39, 'saloon_base_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 4),
(40, 'saloon_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 4),
(41, 'saloon_weekend_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 4),
(42, 'saloon_weekend_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 4),
(43, 'saloon_weekend_wait_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 4),
(44, 'saloon_weekend_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 4),
(45, 'saloon_night_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 4),
(46, 'saloon_night_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 4),
(47, 'saloon_night_wait_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 4),
(48, 'saloon_night_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 4),
(49, 'suv_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 5),
(50, 'suv_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 5),
(51, 'suv_base_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 5),
(52, 'suv_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 5),
(53, 'suv_weekend_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 5),
(54, 'suv_weekend_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 5),
(55, 'suv_weekend_wait_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 5),
(56, 'suv_weekend_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 5),
(57, 'suv_night_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 5),
(58, 'suv_night_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 5),
(59, 'suv_night_wait_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 5),
(60, 'suv_night_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 5),
(61, 'bus_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 6),
(62, 'bus_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 6),
(63, 'bus_base_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 6),
(64, 'bus_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 6),
(65, 'bus_weekend_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 6),
(66, 'bus_weekend_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 6),
(67, 'bus_weekend_wait_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 6),
(68, 'bus_weekend_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 6),
(69, 'bus_night_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 6),
(70, 'bus_night_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 6),
(71, 'bus_night_wait_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 6),
(72, 'bus_night_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 6),
(73, 'truck_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 7),
(74, 'truck_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 7),
(75, 'truck_base_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 7),
(76, 'truck_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 7),
(77, 'truck_weekend_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 7),
(78, 'truck_weekend_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 7),
(79, 'truck_weekend_wait_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 7),
(80, 'truck_weekend_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 7),
(81, 'truck_night_base_fare', '500', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 7),
(82, 'truck_night_base_km', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 7),
(83, 'truck_night_wait_time', '2', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 7),
(84, 'truck_night_std_fare', '20', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, 7);

-- --------------------------------------------------------

--
-- Structure de la table `frontend`
--

CREATE TABLE `frontend` (
  `id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `frontend`
--

INSERT INTO `frontend` (`id`, `key_name`, `key_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'about_us', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(2, 'contact_email', 'master@admin.com', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(3, 'contact_phone', '0123456789', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(4, 'customer_support', '0999988888', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(5, 'about_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(6, 'about_title', 'Proudly serving you', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(7, 'facebook', NULL, '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(8, 'twitter', NULL, '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(9, 'instagram', NULL, '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(10, 'linkedin', NULL, '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(11, 'faq_link', NULL, '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(12, 'cities', '5', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(13, 'vehicles', '10', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(14, 'cancellation', NULL, '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(15, 'terms', NULL, '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(16, 'privacy_policy', NULL, '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(17, 'enable', '0', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fuel`
--

CREATE TABLE `fuel` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_meter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_meter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `vendor_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `fuel_from` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cost_per_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `consumption` int(11) DEFAULT NULL,
  `complete` int(11) DEFAULT '0',
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fuel`
--

INSERT INTO `fuel` (`id`, `vehicle_id`, `user_id`, `start_meter`, `end_meter`, `reference`, `province`, `note`, `vendor_name`, `qty`, `fuel_from`, `cost_per_unit`, `consumption`, `complete`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '1000', '2000', NULL, 'Gujarat', 'sample note', NULL, 10, 'Fuel Tank', '50', 100, 0, '2020-01-06', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL),
(2, 1, 2, '2000', '0', NULL, 'Gujarat', 'sample note', NULL, 10, 'Fuel Tank', '50', 0, 0, '2020-01-18', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `income`
--

CREATE TABLE `income` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `income_id` int(11) DEFAULT NULL,
  `amount` double(10,2) NOT NULL DEFAULT '0.00',
  `user_id` int(11) DEFAULT NULL,
  `income_cat` int(11) DEFAULT NULL,
  `mileage` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `income`
--

INSERT INTO `income` (`id`, `vehicle_id`, `income_id`, `amount`, `user_id`, `income_cat`, `mileage`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 1772.00, 2, 1, NULL, '2020-01-03', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL),
(2, 2, NULL, 2083.00, 3, 1, NULL, '2020-01-07', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL),
(3, 1, 1, 500.00, 1, 1, 10, '2020-01-08', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `income_cat`
--

CREATE TABLE `income_cat` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `income_cat`
--

INSERT INTO `income_cat` (`id`, `name`, `user_id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Booking', 1, 'd', '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `fcm_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_06_03_134331_create_expense_table', 1),
(2, '2017_06_03_134332_create_expense_cat_table', 1),
(3, '2017_06_03_134332_create_income_table', 1),
(4, '2017_06_03_134333_create_income_cat_table', 1),
(5, '2017_06_03_134336_create_password_resets_table', 1),
(6, '2017_06_03_134337_create_users_table', 1),
(7, '2017_06_03_134338_create_vehicles_table', 1),
(8, '2017_07_24_080537_create_booking_table', 1),
(9, '2017_07_24_080643_create_settings_table', 1),
(10, '2017_08_01_073926_create_booking_income_table', 1),
(11, '2017_10_30_064357_create_notifications_table', 1),
(12, '2017_10_30_094858_create_fuel_table', 1),
(13, '2017_11_09_105729_create_vendors_table', 1),
(14, '2017_11_10_062609_create_work_orders_table', 1),
(15, '2017_11_10_095438_create_notes_table', 1),
(16, '2017_11_22_093559_create_vehicle_group_table', 1),
(17, '2017_12_28_091600_create_service_items_table', 1),
(18, '2017_12_28_122952_create_service_reminder_table', 1),
(19, '2017_12_28_174333_create_api_settings_table', 1),
(20, '2018_01_08_062105_create_driver_vehicle_table', 1),
(21, '2018_01_10_130517_users_meta', 1),
(22, '2018_01_13_050018_bookings_meta', 1),
(23, '2018_01_16_095657_fare_settings', 1),
(24, '2018_01_25_050939_create_vehicles_meta_table', 1),
(25, '2018_02_06_052302_create_message_table', 1),
(26, '2018_02_06_125252_create_reviews_table', 1),
(27, '2018_03_13_124424_create_addresses_table', 1),
(28, '2018_03_28_085735_create_reasons_table', 1),
(29, '2018_04_28_073004_create_email_content_table', 1),
(30, '2018_08_14_061757_create_vehicle_review_table', 1),
(31, '2019_01_18_063916_add_vendor_id_to_expense', 1),
(32, '2019_01_19_080738_add_udf_to_vendors', 1),
(33, '2019_01_19_103826_create_parts_table', 1),
(34, '2019_01_19_110823_create_vehicle_types_table', 1),
(35, '2019_01_22_101948_create_driver_logs_table', 1),
(36, '2019_01_23_113852_add_type_id_to_vehicles_table', 1),
(37, '2019_01_24_095115_add_type_id_to_fare_settings_table', 1),
(38, '2019_04_12_092111_create_parts_category_table', 1),
(39, '2019_04_19_053314_create_work_order_logs_table', 1),
(40, '2019_05_13_062039_create_push_notification_table', 1),
(41, '2019_07_18_110031_add_column_to_vendors', 1),
(42, '2019_07_31_082514_create_testimonials_table', 1),
(43, '2019_07_31_102801_create_frontend_table', 1),
(44, '2019_08_01_045837_add_columns_to_message_table', 1),
(45, '2019_08_19_101509_create_booking_quotation_table', 1),
(46, '2019_08_22_052138_create_parts_used_table', 1),
(47, '2019_08_22_113138_add_parts_price_to_work_order_logs_table', 1),
(48, '2019_08_29_104613_create_company_services_table', 1),
(49, '2019_09_16_085700_create_teams_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `submitted_on` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parts`
--

CREATE TABLE `parts` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_cost` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `manufacturer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `stock` int(11) DEFAULT NULL,
  `udf` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parts_category`
--

CREATE TABLE `parts_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `parts_category`
--

INSERT INTO `parts_category` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Engine Parts', '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL),
(2, 'Electricals', '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `parts_used`
--

CREATE TABLE `parts_used` (
  `id` int(10) UNSIGNED NOT NULL,
  `part_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `push_notification`
--

CREATE TABLE `push_notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authtoken` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contentencoding` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endpoint` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publickey` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reasons`
--

CREATE TABLE `reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `reasons`
--

INSERT INTO `reasons` (`id`, `reason`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'No fuel', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30'),
(2, 'Tire punctured', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30');

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `ratings` double(8,2) DEFAULT NULL,
  `review_text` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `service_items`
--

CREATE TABLE `service_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `time_interval` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'off',
  `overdue_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `overdue_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meter_interval` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'off',
  `overdue_meter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'off',
  `duesoon_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duesoon_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_meter` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'off',
  `duesoon_meter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `service_items`
--

INSERT INTO `service_items` (`id`, `description`, `time_interval`, `overdue_time`, `overdue_unit`, `meter_interval`, `overdue_meter`, `show_time`, `duesoon_time`, `duesoon_unit`, `show_meter`, `duesoon_meter`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Change oil', 'on', '60', 'day(s)', 'off', NULL, 'on', '2', 'day(s)', 'off', NULL, NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34');

-- --------------------------------------------------------

--
-- Structure de la table `service_reminder`
--

CREATE TABLE `service_reminder` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `last_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_meter` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `label`, `name`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Website Name', 'app_name', 'JOBS CONSEIL', '2020-01-08 10:45:35', '2020-01-08 10:51:09', NULL),
(2, 'Business Address 1', 'badd1', 'Montagne-Sainte', '2020-01-08 10:45:35', '2020-01-08 10:51:09', NULL),
(3, 'Business Address 2', 'badd2', 'Company Address 2', '2020-01-08 10:45:35', '2020-01-08 10:51:09', NULL),
(4, 'Email Address', 'email', 'support@jobs-conseil.com', '2020-01-08 10:45:35', '2020-01-08 10:51:09', NULL),
(5, 'City', 'city', 'Libreville', '2020-01-08 10:45:35', '2020-01-08 10:51:09', NULL),
(6, 'State', 'state', 'Estuaire', '2020-01-08 10:45:35', '2020-01-08 10:51:09', NULL),
(7, 'Country', 'country', 'Gabon', '2020-01-08 10:45:35', '2020-01-08 10:51:09', NULL),
(8, 'Distence Format', 'dis_format', 'km', '2020-01-08 10:45:35', '2020-01-08 10:51:09', NULL),
(9, 'Language', 'language', 'French-fr', '2020-01-08 10:45:35', '2020-01-08 10:51:09', NULL),
(10, 'Currency', 'currency', 'FCFA', '2020-01-08 10:45:35', '2020-01-08 10:51:09', NULL),
(11, 'Tax No', 'tax_no', 'ABCD8735XXX', '2020-01-08 10:45:35', '2020-01-08 10:51:09', NULL),
(12, 'Invoice Text', 'invoice_text', 'Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.', '2020-01-08 10:45:35', '2020-01-08 10:51:09', NULL),
(13, 'Small Logo', 'icon_img', 'logo-40.png', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(14, 'Main Logo', 'logo_img', 'logo.png', '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL),
(15, 'Time Interval', 'time_interval', '30', '2020-01-08 10:45:35', '2020-01-08 10:51:09', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE `team` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8_unicode_ci,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id`, `name`, `details`, `designation`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Laurie Toy Sr.', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus neque est nemo et ipsum fugiat, ab facere adipisci. Aliquam quibusdam molestias quisquam distinctio? Culpa, voluptatem voluptates exercitationem sequi velit quaerat.', 'Owner', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL),
(2, 'Dr. Pattie Wolf', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus neque est nemo et ipsum fugiat, ab facere adipisci. Aliquam quibusdam molestias quisquam distinctio? Culpa, voluptatem voluptates exercitationem sequi velit quaerat.', 'Owner', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL),
(3, 'Brooklyn Flatley', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus neque est nemo et ipsum fugiat, ab facere adipisci. Aliquam quibusdam molestias quisquam distinctio? Culpa, voluptatem voluptates exercitationem sequi velit quaerat.', 'Owner', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL),
(4, 'Hank Farrell DVM', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus neque est nemo et ipsum fugiat, ab facere adipisci. Aliquam quibusdam molestias quisquam distinctio? Culpa, voluptatem voluptates exercitationem sequi velit quaerat.', 'Owner', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL),
(5, 'Leann White', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus neque est nemo et ipsum fugiat, ab facere adipisci. Aliquam quibusdam molestias quisquam distinctio? Culpa, voluptatem voluptates exercitationem sequi velit quaerat.', 'Owner', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `details`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Prof. Kellen Kris DVM', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi doloribus, repudiandae iusto magnam soluta voluptates, expedita aspernatur consectetur! Ex fugit ducimus itaque, quibusdam nemo in animi quae libero repellendus!', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL),
(2, 'Marcos Hegmann', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi doloribus, repudiandae iusto magnam soluta voluptates, expedita aspernatur consectetur! Ex fugit ducimus itaque, quibusdam nemo in animi quae libero repellendus!', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL),
(3, 'Miss Camylle Bauch', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi doloribus, repudiandae iusto magnam soluta voluptates, expedita aspernatur consectetur! Ex fugit ducimus itaque, quibusdam nemo in animi quae libero repellendus!', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL),
(4, 'Tony Littel', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi doloribus, repudiandae iusto magnam soluta voluptates, expedita aspernatur consectetur! Ex fugit ducimus itaque, quibusdam nemo in animi quae libero repellendus!', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL),
(5, 'Llewellyn Blick DDS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi doloribus, repudiandae iusto magnam soluta voluptates, expedita aspernatur consectetur! Ex fugit ducimus itaque, quibusdam nemo in animi quae libero repellendus!', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `group_id`, `api_token`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'JOBS CONSEIL', 'support@jobs-conseil.com', '$2y$10$yukPXbdcaceYbgciVLFcauw2Kl/bcYBnp1Z1wZHhY.SKzBa4tHZb.', 'S', NULL, 'TofKg7YZWQ72As3FK4hJlg4DuFpfWXlfhY2DVecwtRTuysc8ia2mGPtlHZDQ', NULL, '2020-01-08 10:45:31', '2020-01-08 10:53:04', NULL),
(2, 'User One', 'user1@admin.com', '$2y$10$1875NYqA6FdRL.Gg/2dRz.LTmoSxbUPt0dQKU/BB4dVliWBrsKSb2', 'O', 1, 'zjS9pQaEt4VVwYxz30r00Lw17Kv1j8LdxYCeXGDcaxzpzWiO1tIcvo2OOiuF', NULL, '2020-01-08 10:45:32', '2020-01-08 10:45:32', NULL),
(3, 'User Two', 'user2@admin.com', '$2y$10$dsxsUaVkfRKKvgNVDCCUPONnPKepbnuqEDONtJCtU.DpTLnzViqoO', 'O', 1, 'BeSUdsgsaDviwnBg0tnNHBXbXHdZOLSAmhKNFt8fLrFLBoU11el91DE5939h', NULL, '2020-01-08 10:45:33', '2020-01-08 10:45:33', NULL),
(4, 'Customer One', 'customer1@gmail.com', '$2y$10$RE2ht1ujOjYYRWKje1F..u8/miTfP2h1FUb2aDP8TIrpg2AINh6v6', 'C', NULL, '4gCrTzIZtT83yNFONriyoQyNqgC4aQ8l01LPugU2GKn4gMkR7Ip9cF0ret7Q', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL),
(5, 'Customer Two', 'customer2@gmail.com', '$2y$10$0Weh6ysMNx/oACEOHu.T4ew0EjGZwZgJKQhg/lnhC0gtVBLFZwpbC', 'C', NULL, 'Frd5w89uniSSDzSItdueRA5fapvVNWlLqmPHKq32MM8GBiEVFbkNgwZfmls7', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL),
(6, 'Sienna Ondricka', 'carson48@example.org', '$2y$10$nF6YKgSDZH4oLyU1HArCEO4mQUgB2EQAtuvicFKL3AGoFbZsjqLXy', 'D', NULL, 'srM8aAtg3uEdS1OUEg5Mvj1gXyprmxrEE7RMyMzJy3EqOleN0ekrdXxPm3lf', 'Ikz5Qgaa2F', '2020-01-08 10:45:36', '2020-01-08 10:45:36', NULL),
(7, 'Petra Crooks', 'yquitzon@example.com', '$2y$10$nF6YKgSDZH4oLyU1HArCEO4mQUgB2EQAtuvicFKL3AGoFbZsjqLXy', 'D', NULL, 'RWiLrPmJSG6aokLsRg7doiVe1g0rW2TaHbHdVfILFYUw07hCtl5K82IldaPe', 'Eyj7RbLqlL', '2020-01-08 10:45:36', '2020-01-08 10:45:36', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users_meta`
--

CREATE TABLE `users_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'null',
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users_meta`
--

INSERT INTO `users_meta` (`id`, `user_id`, `type`, `key`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'string', 'profile_image', 'no-user.jpg', NULL, '2020-01-08 10:45:31', '2020-01-08 10:45:31'),
(2, 1, 'string', 'module', 'a:15:{i:0;i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:12;i:12;i:13;i:13;i:14;i:14;i:15;}', NULL, '2020-01-08 10:45:31', '2020-01-08 10:45:31'),
(3, 2, 'string', 'module', 'a:15:{i:0;i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:12;i:12;i:13;i:13;i:14;i:14;i:15;}', NULL, '2020-01-08 10:45:32', '2020-01-08 10:45:32'),
(4, 3, 'string', 'module', 'a:15:{i:0;i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:12;i:12;i:13;i:13;i:14;i:14;i:15;}', NULL, '2020-01-08 10:45:33', '2020-01-08 10:45:33'),
(5, 4, 'string', 'first_name', 'Customer', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(6, 4, 'string', 'last_name', 'One', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(7, 4, 'string', 'address', '728 Evalyn Knolls Apt. 119 Lake Jaydenville, MD 74979-3406', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(8, 4, 'string', 'mobno', '8639379915669', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(9, 4, 'integer', 'gender', '0', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(10, 5, 'string', 'first_name', 'Customer', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(11, 5, 'string', 'last_name', 'Two', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(12, 5, 'string', 'address', '91158 Luigi Cliffs Lake Darby, MA 39627-1727', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(13, 5, 'string', 'mobno', '9773607007903', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(14, 5, 'integer', 'gender', '1', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(15, 6, 'string', 'first_name', 'Sienna', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(16, 6, 'string', 'last_name', 'Ondricka', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(17, 6, 'string', 'address', '865 Lucy Spurs Apt. 818\nEast Krystelshire, GA 86417', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(18, 6, 'string', 'phone', '07026476275213', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(19, 6, 'string', 'issue_date', '2020-01-08', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(20, 6, 'string', 'exp_date', '2020-03-08', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(21, 6, 'string', 'start_date', '2020-01-08', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(22, 6, 'string', 'end_date', '2020-02-08', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(23, 6, 'integer', 'license_number', '715874', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(24, 6, 'integer', 'contract_number', '5295', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(25, 6, 'integer', 'emp_id', '2', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(26, 7, 'string', 'first_name', 'Petra', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(27, 7, 'string', 'last_name', 'Crooks', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(28, 7, 'string', 'address', '652 Breana Hill\nAlbertmouth, MD 47149-4620', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(29, 7, 'string', 'phone', '05122078142731', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(30, 7, 'string', 'issue_date', '2020-01-08', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(31, 7, 'string', 'exp_date', '2020-03-08', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(32, 7, 'string', 'start_date', '2020-01-08', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(33, 7, 'string', 'end_date', '2020-02-08', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(34, 7, 'integer', 'license_number', '346735', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(35, 7, 'integer', 'contract_number', '5731', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(36, 7, 'integer', 'emp_id', '9', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(37, 6, 'integer', 'vehicle_id', '1', NULL, '2020-01-08 10:45:36', '2020-01-08 10:45:36'),
(38, 1, 'string', 'language', 'French-fr', NULL, '2020-01-08 10:51:09', '2020-01-08 10:51:09');

-- --------------------------------------------------------

--
-- Structure de la table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `make` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `lic_exp_date` date DEFAULT NULL,
  `reg_exp_date` date DEFAULT NULL,
  `vehicle_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `engine_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horse_power` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `license_plate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mileage` int(11) DEFAULT NULL,
  `in_service` tinyint(4) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `int_mileage` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `vehicles`
--

INSERT INTO `vehicles` (`id`, `make`, `model`, `type`, `year`, `group_id`, `lic_exp_date`, `reg_exp_date`, `vehicle_image`, `engine_type`, `horse_power`, `color`, `vin`, `license_plate`, `mileage`, `in_service`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `int_mileage`, `type_id`) VALUES
(1, 'Honda', 'Jazz', NULL, '2015', 1, '2020-09-14', '2020-06-06', 'car1.jpeg', 'Petrol', '190', 'red', '2342342', '9191bh', 45464, 1, 1, '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL, 50, 3),
(2, 'Tata', 'NANO', NULL, '2012', 1, '2021-01-07', '2020-04-07', 'car2.jpeg', 'Petrol', '150', 'white', '124578', '1245ab', 45464, 1, 1, '2020-01-08 10:45:34', '2020-01-08 10:45:34', NULL, 40, 3);

-- --------------------------------------------------------

--
-- Structure de la table `vehicles_meta`
--

CREATE TABLE `vehicles_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'null',
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `vehicles_meta`
--

INSERT INTO `vehicles_meta` (`id`, `vehicle_id`, `type`, `key`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'integer', 'driver_id', '6', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(2, 1, 'double', 'average', '35.45', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(3, 1, 'string', 'ins_number', '70651', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(4, 1, 'string', 'ins_exp_date', '2020-07-16', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(5, 2, 'double', 'average', '42.5', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(6, 2, 'string', 'ins_number', '36945', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34'),
(7, 2, 'string', 'ins_exp_date', '2020-07-16', NULL, '2020-01-08 10:45:34', '2020-01-08 10:45:34');

-- --------------------------------------------------------

--
-- Structure de la table `vehicle_group`
--

CREATE TABLE `vehicle_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `note` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `vehicle_group`
--

INSERT INTO `vehicle_group` (`id`, `name`, `description`, `note`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Default', 'Default vehicle group', 'Default vehicle group', NULL, '2020-01-08 10:45:30', '2020-01-08 10:45:30');

-- --------------------------------------------------------

--
-- Structure de la table `vehicle_review`
--

CREATE TABLE `vehicle_review` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reg_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kms_outgoing` int(11) DEFAULT NULL,
  `kms_incoming` int(11) DEFAULT NULL,
  `fuel_level_out` int(11) DEFAULT NULL,
  `fuel_level_in` int(11) DEFAULT NULL,
  `datetime_outgoing` datetime DEFAULT NULL,
  `datetime_incoming` datetime DEFAULT NULL,
  `petrol_card` text COLLATE utf8_unicode_ci,
  `lights` text COLLATE utf8_unicode_ci,
  `invertor` text COLLATE utf8_unicode_ci,
  `car_mats` text COLLATE utf8_unicode_ci,
  `int_damage` text COLLATE utf8_unicode_ci,
  `int_lights` text COLLATE utf8_unicode_ci,
  `ext_car` text COLLATE utf8_unicode_ci,
  `tyre` text COLLATE utf8_unicode_ci,
  `ladder` text COLLATE utf8_unicode_ci,
  `leed` text COLLATE utf8_unicode_ci,
  `power_tool` text COLLATE utf8_unicode_ci,
  `ac` text COLLATE utf8_unicode_ci,
  `head_light` text COLLATE utf8_unicode_ci,
  `lock` text COLLATE utf8_unicode_ci,
  `windows` text COLLATE utf8_unicode_ci,
  `condition` text COLLATE utf8_unicode_ci,
  `oil_chk` text COLLATE utf8_unicode_ci,
  `suspension` text COLLATE utf8_unicode_ci,
  `tool_box` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicletype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isenable` int(11) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `vehicletype`, `displayname`, `icon`, `isenable`, `seats`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hatchback', 'Hatchback', NULL, 1, 4, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL),
(2, 'Sedan', 'Sedan', NULL, 1, 4, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL),
(3, 'Mini van', 'Mini van', NULL, 1, 7, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL),
(4, 'Saloon', 'Saloon', NULL, 1, 4, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL),
(5, 'SUV', 'SUV', NULL, 1, 4, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL),
(6, 'Bus', 'Bus', NULL, 1, 40, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL),
(7, 'Truck', 'Truck', NULL, 1, 3, '2020-01-08 10:45:30', '2020-01-08 10:45:30', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `udf` text COLLATE utf8_unicode_ci,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `photo`, `type`, `website`, `custom_type`, `note`, `phone`, `address1`, `address2`, `city`, `province`, `email`, `deleted_at`, `created_at`, `updated_at`, `udf`, `country`, `postal_code`) VALUES
(1, 'Tamara Beier IV', NULL, 'Machinaries', 'http://www.prosacco.com/voluptas-quia-sint-omnis-reiciendis-consectetur-voluptatem.html', NULL, 'default vendor', '05966968585622', '21034 Damien Station\nGeoffreyshire, ND 12280', NULL, 'Binstown', NULL, 'iupton@example.com', NULL, '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, NULL, NULL),
(2, 'Zula Goodwin', NULL, 'Machinaries', 'http://www.terry.biz/consequuntur-ad-eaque-ut-ut-voluptatem-iure-est-officia.html', NULL, 'default vendor', '06507421063213', '50879 Goyette Circles Suite 634\nLake Luechester, ID 84787-3598', NULL, 'Jadeshire', NULL, 'kassulke.bertha@example.net', NULL, '2020-01-08 10:45:35', '2020-01-08 10:45:35', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `work_orders`
--

CREATE TABLE `work_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_on` date DEFAULT NULL,
  `required_by` date DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `meter` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `work_orders`
--

INSERT INTO `work_orders` (`id`, `created_on`, `required_by`, `vehicle_id`, `vendor_id`, `price`, `status`, `description`, `meter`, `note`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2020-01-08', '2020-01-13', 1, 1, 1000.00, 'Pending', 'Sample work order', 1047, 'sample work order', NULL, '2020-01-08 10:45:35', '2020-01-08 10:45:35'),
(2, '2020-01-08', '2020-01-13', 1, 2, 1000.00, 'Pending', 'Sample work order', 1790, 'sample work order', NULL, '2020-01-08 10:45:35', '2020-01-08 10:45:35');

-- --------------------------------------------------------

--
-- Structure de la table `work_order_logs`
--

CREATE TABLE `work_order_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_on` date DEFAULT NULL,
  `required_by` date DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `meter` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parts_price` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `work_order_logs`
--

INSERT INTO `work_order_logs` (`id`, `created_on`, `required_by`, `vehicle_id`, `vendor_id`, `price`, `status`, `type`, `description`, `meter`, `note`, `created_at`, `updated_at`, `parts_price`) VALUES
(1, '2020-01-08', '2020-01-13', 1, 1, 1000.00, 'Pending', 'Created', 'Sample work order', 1047, 'sample work order', '2020-01-08 10:45:35', '2020-01-08 10:45:35', 0),
(2, '2020-01-08', '2020-01-13', 1, 2, 1000.00, 'Pending', 'Created', 'Sample work order', 1790, 'sample work order', '2020-01-08 10:45:35', '2020-01-08 10:45:35', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `api_settings`
--
ALTER TABLE `api_settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bookings_meta`
--
ALTER TABLE `bookings_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_meta_booking_id_index` (`booking_id`),
  ADD KEY `bookings_meta_key_index` (`key`);

--
-- Index pour la table `booking_income`
--
ALTER TABLE `booking_income`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `booking_quotation`
--
ALTER TABLE `booking_quotation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `company_services`
--
ALTER TABLE `company_services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `driver_logs`
--
ALTER TABLE `driver_logs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `driver_vehicle`
--
ALTER TABLE `driver_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `email_content`
--
ALTER TABLE `email_content`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `expense_cat`
--
ALTER TABLE `expense_cat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fare_settings`
--
ALTER TABLE `fare_settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `frontend`
--
ALTER TABLE `frontend`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `income_cat`
--
ALTER TABLE `income_cat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Index pour la table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parts_category`
--
ALTER TABLE `parts_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parts_used`
--
ALTER TABLE `parts_used`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `push_notification`
--
ALTER TABLE `push_notification`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service_reminder`
--
ALTER TABLE `service_reminder`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_unique` (`name`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `users_meta`
--
ALTER TABLE `users_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_meta_user_id_index` (`user_id`),
  ADD KEY `users_meta_key_index` (`key`);

--
-- Index pour la table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicles_meta`
--
ALTER TABLE `vehicles_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_meta_vehicle_id_index` (`vehicle_id`),
  ADD KEY `vehicles_meta_key_index` (`key`);

--
-- Index pour la table `vehicle_group`
--
ALTER TABLE `vehicle_group`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicle_review`
--
ALTER TABLE `vehicle_review`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `work_orders`
--
ALTER TABLE `work_orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `work_order_logs`
--
ALTER TABLE `work_order_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `api_settings`
--
ALTER TABLE `api_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `bookings_meta`
--
ALTER TABLE `bookings_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `booking_income`
--
ALTER TABLE `booking_income`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `booking_quotation`
--
ALTER TABLE `booking_quotation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `company_services`
--
ALTER TABLE `company_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `driver_logs`
--
ALTER TABLE `driver_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `driver_vehicle`
--
ALTER TABLE `driver_vehicle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `email_content`
--
ALTER TABLE `email_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `expense_cat`
--
ALTER TABLE `expense_cat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `fare_settings`
--
ALTER TABLE `fare_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `frontend`
--
ALTER TABLE `frontend`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `income_cat`
--
ALTER TABLE `income_cat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `parts_category`
--
ALTER TABLE `parts_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `parts_used`
--
ALTER TABLE `parts_used`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `push_notification`
--
ALTER TABLE `push_notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reasons`
--
ALTER TABLE `reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `service_reminder`
--
ALTER TABLE `service_reminder`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users_meta`
--
ALTER TABLE `users_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vehicles_meta`
--
ALTER TABLE `vehicles_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `vehicle_group`
--
ALTER TABLE `vehicle_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `vehicle_review`
--
ALTER TABLE `vehicle_review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `work_orders`
--
ALTER TABLE `work_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `work_order_logs`
--
ALTER TABLE `work_order_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
