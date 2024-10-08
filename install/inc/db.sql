--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `self` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `biography` varchar(999) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `data` text,
  `api_id` int(15) DEFAULT NULL,
  `imdb_id` varchar(25) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `type` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `ads_code` text COLLATE utf8_bin,
  `ads_data` text COLLATE utf8_bin,
  `display_admin` int(11) DEFAULT NULL,
  `display_user` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `ads` (`id`, `name`, `type`, `ads_code`, `ads_data`, `display_admin`, `display_user`, `status`) VALUES
(1, '728 x 90', NULL, '', 'null', 0, 0, 2),
(2, '250 x 432', NULL, '', 'null', 0, 0, 2),
(3, '1000 x 60', NULL, '', 'null', 0, 0, 2),
(4, '300 x 250', NULL, '', 'null', 0, 0, 2),
(5, 'Pageskin', NULL, '', 'null', 0, 0, 2),
(6, 'Player Ads', 'image', '', '', 0, 0, 2),
(7, 'Bottom Fixed Ads', '', '', '', 0, 0, 2),
(8, 'In Feed Ads', '', '', '', 0, 0, 2);

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `self` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `color` varchar(25) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `footer` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`id`, `name`, `self`, `description`, `color`, `featured`, `footer`, `status`) VALUES
(1, 'Action', 'action', NULL, NULL, NULL, NULL, NULL),
(2, 'Adventure', 'adventure', NULL, NULL, NULL, NULL, NULL),
(3, 'Animation', 'animation', NULL, NULL, NULL, NULL, NULL),
(4, 'Comedy', 'comedy', NULL, NULL, NULL, NULL, NULL),
(5, 'Crime', 'crime', NULL, NULL, NULL, NULL, NULL),
(6, 'Documentary', 'documentary', NULL, NULL, NULL, NULL, NULL),
(7, 'Drama', 'drama', NULL, NULL, NULL, NULL, NULL),
(8, 'Family', 'family', NULL, NULL, NULL, NULL, NULL),
(9, 'Fantasy', 'fantasy', NULL, NULL, NULL, NULL, NULL),
(10, 'History', 'history', NULL, NULL, NULL, NULL, NULL),
(11, 'Horror', 'horror', NULL, NULL, NULL, NULL, NULL),
(12, 'Music', 'music', NULL, NULL, NULL, NULL, NULL),
(13, 'Mystery', 'mystery', NULL, NULL, NULL, NULL, NULL),
(14, 'Romance', 'romance', NULL, NULL, NULL, NULL, NULL),
(15, 'Science Fiction', 'science-fiction', NULL, NULL, NULL, NULL, NULL),
(16, 'Thriller', 'thriller', NULL, NULL, NULL, NULL, NULL),
(17, 'TV Movie', 'tv-movie', NULL, NULL, NULL, NULL, NULL),
(18, 'War', 'war', NULL, NULL, NULL, NULL, NULL),
(19, 'Western', 'western', NULL, NULL, NULL, NULL, NULL);

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `self` varchar(255) DEFAULT NULL,
  `description` varchar(999) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `embed` varchar(999) DEFAULT NULL,
  `data` text,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `self` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `color` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `privacy` int(11) DEFAULT NULL COMMENT 'herkese acik = 1,sadece ben 2',
  `featured` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `background` varchar(255) DEFAULT NULL,
  `featuredplaylist` int(8) DEFAULT NULL,
  `playlist` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `collections_post`
--

CREATE TABLE `collections_post` (
  `id` int(11) NOT NULL,
  `collection_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sortable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4,
  `spoiler` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `comments_reaction`
--

CREATE TABLE `comments_reaction` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction` varchar(11) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `language` varchar(2) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `countries` (`id`, `language`, `name`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua And Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AO', 'Angola'),
(9, 'AQ', 'Antarktika'),
(10, 'AR', 'Argentina'),
(11, 'AS', 'American Samoa'),
(12, 'AT', 'Austria'),
(13, 'AU', 'Australia'),
(14, 'AW', 'Aruba'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BA', 'Bosnia And Herzegovina'),
(17, 'BB', 'Barbados'),
(18, 'BD', 'Bangladesh'),
(19, 'BE', 'Belgium'),
(20, 'BF', 'Burkina Faso'),
(21, 'BG', 'Bulgaria'),
(22, 'BH', 'Bahrain'),
(23, 'BI', 'Burundi'),
(24, 'BJ', 'Benin'),
(25, 'BL', 'St Barts'),
(26, 'BM', 'Bermuda'),
(27, 'BN', 'Brunei'),
(28, 'BO', 'Bolivia'),
(29, 'BR', 'Brazil'),
(30, 'BS', 'Bahamas'),
(31, 'BT', 'Bhutan'),
(32, 'BV', 'Bouvet Island'),
(33, 'BW', 'Botswana'),
(34, 'BY', 'Belarus'),
(35, 'BZ', 'Belize'),
(36, 'CA', 'Canada'),
(37, 'CC', 'Cocos Island'),
(38, 'CD', 'Democratic Republic Of Congo'),
(39, 'CF', 'Central African Republic'),
(40, 'CG', 'Republic Of The Congo'),
(41, 'CH', 'Switzerland'),
(42, 'CI', 'Ivory Coast'),
(43, 'CK', 'Cook Islands'),
(44, 'CL', 'Chile'),
(45, 'CM', 'Cameroon'),
(46, 'CN', 'China'),
(47, 'CO', 'Colombia'),
(48, 'CR', 'Costa Rica'),
(49, 'CU', 'Cuba'),
(50, 'CV', 'Cape Verde'),
(51, 'CW', 'Curacao'),
(52, 'CY', 'Cyprus'),
(53, 'CZ', 'Czech Republic'),
(54, 'DE', 'Germany'),
(55, 'DJ', 'Djibouti'),
(56, 'DK', 'Denmark'),
(57, 'DM', 'Dominica'),
(58, 'DO', 'Dominican Republic'),
(59, 'DZ', 'Algeria'),
(60, 'EC', 'Ecuador'),
(61, 'EE', 'Estonia'),
(62, 'EG', 'Egypt'),
(63, 'EH', 'Sahrawi Arab Democratic Republic'),
(64, 'ER', 'Eritrea'),
(65, 'ES', 'Spain'),
(66, 'ET', 'Ethiopia'),
(67, 'FI', 'Finland'),
(68, 'FJ', 'Fiji'),
(69, 'FK', 'Falkland Islands'),
(70, 'FM', 'Micronesia'),
(71, 'FO', 'Faroe Islands'),
(72, 'FR', 'France'),
(73, 'GA', 'Gabon'),
(74, 'GB', 'United Kingdom'),
(75, 'GD', 'Grenada'),
(76, 'GE', 'Georgia'),
(77, 'GG', 'Guernsey'),
(78, 'GH', 'Ghana'),
(79, 'GI', 'Gibraltar'),
(80, 'GL', 'Greenland'),
(81, 'GM', 'Gambia'),
(82, 'GN', 'Guinea'),
(83, 'GQ', 'Equatorial Guinea'),
(84, 'GR', 'Greece'),
(85, 'GT', 'Guatemala'),
(86, 'GU', 'Guam'),
(87, 'GW', 'Guinea Bissau'),
(88, 'GY', 'Guyana'),
(89, 'HK', 'Hong Kong'),
(90, 'HN', 'Honduras'),
(91, 'HR', 'Croatia'),
(92, 'HT', 'Haiti'),
(93, 'HU', 'Hungary'),
(94, 'ID', 'Indonesia'),
(95, 'IE', 'Ireland'),
(96, 'IL', 'Israel'),
(97, 'IM', 'Isle Of Man'),
(98, 'IN', 'India'),
(99, 'IO', 'British Indian Ocean Territory'),
(100, 'IQ', 'Iraq'),
(101, 'IR', 'Iran'),
(102, 'IS', 'Iceland'),
(103, 'IT', 'Italy'),
(104, 'JE', 'Jersey'),
(105, 'JM', 'Jamaica'),
(106, 'JO', 'Jordan'),
(107, 'JP', 'Japan'),
(108, 'KE', 'Kenya'),
(109, 'KG', 'Kyrgyzstan'),
(110, 'KH', 'Cambodia'),
(111, 'KI', 'Kiribati'),
(112, 'KM', 'Comoros'),
(113, 'KN', 'Saint Kitts And Nevis'),
(114, 'KP', 'North Korea'),
(115, 'KR', 'South Korea'),
(116, 'KW', 'Kwait'),
(117, 'KY', 'Cayman Islands'),
(118, 'KZ', 'Kazakhstan'),
(119, 'LA', 'Laos'),
(120, 'LB', 'Lebanon'),
(121, 'LC', 'St Lucia'),
(122, 'LI', 'Liechtenstein'),
(123, 'LK', 'Sri Lanka'),
(124, 'LR', 'Liberia'),
(125, 'LS', 'Lesotho'),
(126, 'LT', 'Lithuania'),
(127, 'LU', 'Luxembourg'),
(128, 'LV', 'Latvia'),
(129, 'LY', 'Libya'),
(130, 'MA', 'Morocco'),
(131, 'MC', 'Monaco'),
(132, 'MD', 'Moldova'),
(133, 'ME', 'Montenegro'),
(134, 'MG', 'Madagascar'),
(135, 'MH', 'Marshall Island'),
(136, 'MK', 'Republic Of Macedonia'),
(137, 'ML', 'Mali'),
(138, 'MM', 'Myanmar'),
(139, 'MN', 'Mongolia'),
(140, 'MO', 'Macao'),
(141, 'MP', 'Northern Marianas Islands'),
(142, 'MQ', 'Martinique'),
(143, 'MR', 'Mauritania'),
(144, 'MS', 'Montserrat'),
(145, 'MT', 'Malta'),
(146, 'MU', 'Mauritius'),
(147, 'MV', 'Maldives'),
(148, 'MW', 'Malawi'),
(149, 'MX', 'Mexico'),
(150, 'MY', 'Malasya'),
(151, 'MZ', 'Mozambique'),
(152, 'NA', 'Namibia'),
(153, 'NC', 'New Caledonia'),
(154, 'NE', 'Niger'),
(155, 'NF', 'Norfolk Island'),
(156, 'NG', 'Nigeria'),
(157, 'NI', 'Nicaragua'),
(158, 'NL', 'Netherlands'),
(159, 'NO', 'Norway'),
(160, 'NP', 'Nepal'),
(161, 'NR', 'Nauru'),
(162, 'NU', 'Niue'),
(163, 'NZ', 'New Zealand'),
(164, 'OM', 'Oman'),
(165, 'PA', 'Panama'),
(166, 'PE', 'Peru'),
(167, 'PF', 'French Polynesia'),
(168, 'PG', 'Papua New Guinea'),
(169, 'PH', 'Philippines'),
(170, 'PK', 'Pakistan'),
(171, 'PL', 'Poland'),
(172, 'PN', 'Pitcairn Islands'),
(173, 'PR', 'Puerto Rico'),
(174, 'PS', 'Palestine'),
(175, 'PT', 'Portugal'),
(176, 'PW', 'Palau'),
(177, 'PY', 'Paraguay'),
(178, 'QA', 'Qatar'),
(179, 'RO', 'Romania'),
(180, 'RS', 'Serbia'),
(181, 'RU', 'Russia'),
(182, 'RW', 'Rwanda'),
(183, 'SA', 'Saudi Arabia'),
(184, 'SB', 'Solomon Islands'),
(185, 'SC', 'Seychelles'),
(186, 'SD', 'Sudan'),
(187, 'SE', 'Sweden'),
(188, 'SG', 'Singapore'),
(189, 'SI', 'Slovenia'),
(190, 'SK', 'Slovakia'),
(191, 'SL', 'Sierra Leone'),
(192, 'SM', 'San Marino'),
(193, 'SN', 'Senegal'),
(194, 'SO', 'Somalia'),
(195, 'SR', 'Suriname'),
(196, 'SS', 'South Sudan'),
(197, 'ST', 'Sao Tome And Prince'),
(198, 'SV', 'El Salvador'),
(199, 'SX', 'Sint Maarten'),
(200, 'SY', 'Syria'),
(201, 'SZ', 'Swaziland'),
(202, 'TC', 'Turks And Caicos'),
(203, 'TD', 'Chad'),
(204, 'TG', 'Togo'),
(205, 'TH', 'Thailand'),
(206, 'TJ', 'Tajikistan'),
(207, 'TK', 'Tokelau'),
(208, 'TL', 'East Timor'),
(209, 'TM', 'Turkmenistan'),
(210, 'TN', 'Tunisia'),
(211, 'TO', 'Tonga'),
(212, 'TR', 'Turkey'),
(213, 'TT', 'Trinidad And Tobago'),
(214, 'TV', 'Tuvalu'),
(215, 'TW', 'Taiwan'),
(216, 'TZ', 'Tanzania'),
(217, 'UA', 'Ukraine'),
(218, 'UG', 'Uganda'),
(219, 'UN', 'United Nations'),
(220, 'US', 'United States Of America'),
(221, 'UY', 'Uruguay'),
(222, 'UZ', 'Uzbekistn'),
(223, 'VA', 'Vatican City'),
(224, 'VC', 'St Vincent And The Grenadines'),
(225, 'VE', 'Venezuela'),
(226, 'VG', 'British Virgin Islands'),
(227, 'VI', 'Virgin Islands'),
(228, 'VN', 'Vietnam'),
(229, 'VU', 'Vanuatu'),
(230, 'WS', 'Samoa'),
(231, 'XK', 'Kosovo'),
(232, 'YE', 'Yemen'),
(233, 'ZA', 'South Africa'),
(234, 'ZM', 'Zambia'),
(235, 'ZW', 'Zimbabwe'),
(236, 'EN', 'England');

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `self` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `body` text COLLATE utf8_bin,
  `content_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_name` varchar(20) DEFAULT NULL,
  `language_code` varchar(20) DEFAULT NULL,
  `text_direction` varchar(20) DEFAULT NULL,
  `currency` varchar(25) DEFAULT NULL,
  `language_order` tinyint(5) DEFAULT NULL,
  `status` tinyint(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `short_name`, `language_code`, `text_direction`, `currency`, `language_order`, `status`) VALUES
(1, 'English', 'en', 'en-EN', 'ltr', 'USD', 0, 1);

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `module_file` varchar(255) DEFAULT NULL,
  `data` text,
  `page` varchar(25) DEFAULT NULL,
  `data_limit` int(4) DEFAULT NULL,
  `sortable` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `modules` VALUES 
(1,'Newest Movies','home.movies','{\"sorting\":\"id desc\",\"responsive\":\"horizontal\",\"mobile_slider\":\"1\"}','home',10,6,1),
(2,'Featured Actors','home.actors','{\"sorting\":\"id desc\",\"responsive\":\"horizontal\"}','home',6,13,1),
(3,'Newest Series','home.series','{\"sorting\":\"id desc\",\"responsive\":\"horizontal\",\"mobile_slider\":\"1\"}','home',10,10,1),
(4,'Featured Categories','home.categories','{\"sorting\":\"id desc\",\"responsive\":\"horizontal\"}','home',5,11,1),
(5,'Newest Episodes','home.episodes','{\"sorting\":\"id desc\",\"responsive\":\"horizontal\",\"listing\":\"v1\"}','home',16,12,1),
(6,'Featured Collections','home.collections','{\"sorting\":\"id desc\",\"responsive\":\"horizontal\"}','home',3,2,1),
(7,'Featured Playlists','home.playlists','{\"sorting\":\"id desc\"}','home',3,8,1),
(8,'Slider','home.slider','{\"sorting\":\"id desc\",\"responsive\":\"horizontal\"}','home',NULL,NULL,1),
(9,'Stories','home.trailer','null','home',NULL,1,1),
(10,'Popular This Week','home.weekly','{\"sorting\":\"create_year desc\",\"responsive\":\"vertical\"}','home',10,5,1),
(11,'Popular This Month','home.monthly','{\"sorting\":\"create_year desc\",\"responsive\":\"horizontal\"}','home',10,9,1),
(12,'Random','home.random','{\"sorting\":\"id desc\",\"responsive\":\"vertical\"}','home',1,7,1),
(13,'Newest Anime','home.anime','{\"sorting\":\"id desc\",\"responsive\":\"horizontal\"}','home',10,3,1),
(14,'Upcoming Episodes','home.upcoming','{\"sorting\":\"id desc\",\"responsive\":\"horizontal\"}','home',10,4,1);

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` text NOT NULL,
  `type` varchar(25) NOT NULL,
  `created` datetime NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `self` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `body` text COLLATE utf8_bin,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `imdb_actual` varchar(20) DEFAULT NULL,
  `anime` int(11) DEFAULT '2',
  `mpaa` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_sub` varchar(255) DEFAULT NULL,
  `self` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `description` text,
  `country` int(5) DEFAULT NULL,
  `imdb` varchar(5) DEFAULT NULL,
  `quality` varchar(10) DEFAULT NULL,
  `duration` varchar(25) DEFAULT NULL,
  `create_year` varchar(15) DEFAULT NULL,
  `end_year` varchar(15) DEFAULT NULL,
  `trailer` varchar(999) DEFAULT NULL,
  `data` text,
  `private` int(1) DEFAULT NULL,
  `featured` int(1) DEFAULT NULL,
  `slider` int(11) DEFAULT NULL,
  `hit` int(11) DEFAULT '0',
  `comment` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `imdb_id` varchar(30) DEFAULT NULL UNIQUE,
  `created` datetime DEFAULT NULL,
  `series_status` varchar(15) DEFAULT NULL,
  `politicy` int(1) DEFAULT NULL,
  `notification` text,
  `notification_color` varchar(255) NOT NULL,
  `hit_weekly` int(11) NOT NULL,
  `hit_monthly` int(11) NOT NULL,
  `movie_download` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `posts_actor`
--

CREATE TABLE `posts_actor` (
  `id` int(11) NOT NULL,
  `actor_id` int(11) DEFAULT NULL,
  `character_name` varchar(255) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `sortable` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `posts_category`
--

CREATE TABLE `posts_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `posts_episode`
--

CREATE TABLE `posts_episode` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `self` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(999) COLLATE utf8_bin DEFAULT NULL,
  `overview` varchar(999) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `season_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `slider` int(11) DEFAULT NULL,
  `hit` int(11) DEFAULT '0',
  `published` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `release_date` varchar(255) DEFAULT NULL,
  `download` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Table structure for table `posts_season`
--

CREATE TABLE `posts_season` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `sortable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Table structure for table `posts_video`
--

CREATE TABLE `posts_video` (
  `id` int(11) NOT NULL,
  `content_id` int(11) DEFAULT NULL,
  `episode_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `player` int(11) DEFAULT NULL,
  `embed` varchar(500) DEFAULT NULL,
  `sortable` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `reaction` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `report_id` int(11) DEFAULT NULL,
  `body` text COLLATE utf8_bin,
  `user` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `reply` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `data`) VALUES
(1, 'general', '{\"company\":\"Wovie Redux\",\"title\":\"Wovie Redux\",\"description\":\"Watch Movies and TV Series online without any pesky advertisements completely for free! With over 300 TV Shows and 5000 Movies there\'s something for everyone!\",\"language\":\"en\",\"dashboard_language\":\"en\",\"vasttag\":\"\",\"discussion\":\"1\",\"headcode\":\"\",\"footer_text\":\"\",\"logo\":\"logo.svg\",\"favicon\":\"favicon.svg\"}'),
(3, 'social', '{\"facebook\":\"\",\"twitter\":\"\",\"instagram\":\"\",\"youtube\":\"\",\"discord\":\"\",\"reddit\":\"\",\"tiktok\":\"\"}'),
(4, 'theme', '{\"general\":\"#ffff00\",\"button\":\"#ffff00\",\"dashboard\":\"#ffff00\"}'),
(5, 'seo', '{\"movies_title\":\"${title} Movie Recommendations\",\"movies_description\":\"${title} Watch movies in HD quality with language options with dubbing and subtitles.\",\"movies_category_title\":\"${title} Movie Recommendations\",\"movies_category_description\":\"Best ${title} Watch movies in HD quality with language options with dubbing and subtitles.\",\"movie_title\":\"${title} Movie free watch\",\"movie_description\":\"${title} watch your movie in HD quality fast and uninterrupted\",\"series_title\":\"${title} Serie Recommendations\",\"series_description\":\"${title} Watch series in HD quality with language options with dubbing and subtitles.\",\"series_category_title\":\"${title} Serie Recommendations\",\"series_category_description\":\"Best ${title} Watch series in HD quality with language options with dubbing and subtitles.\",\"serie_title\":\"${title} Season ${season}: Episode ${episode} HD watch\",\"serie_description\":\"${title} ${season}.Season ${episode}.Episode HD watch\",\"serie_profile_title\":\"${title} Serie free watch\",\"serie_profile_description\":\"${title} watch your serie in HD quality fast and uninterrupted\",\"category_title\":\"${title} Serie and Movie Recommendations\",\"category_description\":\"${title} Watch series and movies in HD quality with language options with dubbing and subtitles.\",\"actor_title\":\"${title} Watch the actor\'s movies and series\",\"actor_description\":\"${title} Watch the movies and TV series the actor has played in full HD\",\"discovery_title\":\"Dubbed and Subtitled Series & Movies Explore and Watch\",\"discovery_description\":\"Discover the best dubbing, subtitled TV series and movies with advanced filters and watch them in 1080p quality.\",\"channels_title\":\"Popular TV Channels Online watch\",\"channels_description\":\"Popular TV Channels Online watch streaming\",\"channel_title\":\"${title} TV Channel Online watch streaming\",\"channel_description\":\"${title} TV Channel Online watch streaming\",\"anime_title\":\"${title} Anime Recommendations\",\"anime_description\":\"${title} Watch anime in HD quality with language options with dubbing and subtitles.\",\"anime_category_title\":\"${title} Anime Recommendations\",\"anime_category_description\":\"Best ${title} Watch anime in HD quality with language options with dubbing and subtitles.\",\"anime_profile_title\":\"${title} Anime free watch\",\"anime_profile_description\":\"${title} watch your anime in HD quality fast and uninterrupted\"}'),
(6, 'api', '{\"tmdb_api\":\"\",\"tmdb_language\":\"en_us\",\"onesignal_id\":\"\",\"onesignal_key\":\"\",\"remotestream\":\"7fW20uHGsmJ7IMgVz1YldowxRZyOmqzI\"}'),
(7, 'block', '{\"movie\":\"1\",\"serie\":\"1\"}'),
(8, 'email', '{\"host\":\"\",\"username\":\"\",\"password\":\"\",\"port\":\"\",\"security\":\"\",\"sendemail\":\"\"}'),
(9, 'store', '{\"paypal_email\":\"\",\"currency\":\"USD\"}'),
(10, 'requests', '{\"requests_permission\":\"everyone\",\"requests_disabled\":\"Requests Disabled While We Catch Up\"}'),
(11, 'navigation', '{\"slidingmenu\":\"1\",\"menuicon\":\"1\",\"movie\":\"1\",\"serie\":\"1\",\"discovery\":\"1\",\"categories\":\"1\",\"collections\":\"1\",\"playlists\":\"1\",\"request\":\"1\",\"requests\":\"1\",\"store\":\"1\",\"discord\":\"1\",\"movies_feed\":\"1\",\"series_feed\":\"1\",\"episode_feed\":\"1\"}'),
(12, 'pwa', '{}');

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` INT AUTO_INCREMENT primary key NOT NULL,
  `product` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(2555) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `return_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embed` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tools` (`id`, `name`, `filename`, `favicon`, `status`) VALUES
(1, 'Themoviedb.com', 'tmdb', 'tmdb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `account_type` varchar(25) DEFAULT NULL,
  `username` varchar(65) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `data` text,
  `token` varchar(255) DEFAULT NULL,
  `banned` int(11) DEFAULT NULL,
  `chatboxban` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `chatboxbanreason` varchar(255) DEFAULT NULL,
  `date` DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `account_type`, `username`, `name`, `email`, `password`, `avatar`, `language`, `data`, `token`, `banned`, `chatboxban`, `created`, `chatboxbanreason`, `date`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.com', '938c8a307c7cd31299e70a0e4c1ad372', '', NULL, '{\"social\":{\"facebook\":\"\",\"twitter\":\"\",\"instagram\":\"\",\"youtube\":\"\"}}', 'd4c1a9117adbea3effb8e8553565dafa', 0, 0, '2021-01-09 18:02:08', NULL, '2021-01-09');

--
-- Table structure for table `videos_option`
--

CREATE TABLE `videos_option` (
  `id` int(11) NOT NULL,
  `type` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `self` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `videos_option` (`id`, `type`, `name`, `self`, `icon`) VALUES
(1, 'service', 'plyr.io MP4', NULL, NULL),
(2, 'language', 'English Subtitle', NULL, NULL),
(3, 'service', 'plyr.io HLS', NULL, NULL);

ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_collection` (`user_id`);

ALTER TABLE `collections_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collection_post` (`collection_id`);

ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`);

ALTER TABLE `comments_reaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reaction` (`comment_id`);

ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_follow` (`user_id`);

ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `posts_actor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_id` (`content_id`);

ALTER TABLE `posts_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_id` (`content_id`);

ALTER TABLE `posts_episode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_id` (`content_id`);

ALTER TABLE `posts_season`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_id` (`content_id`);

ALTER TABLE `posts_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_id` (`content_id`);

ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_reaction` (`user_id`);

ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `videos_option`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `channels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `collections_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `comments_reaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

ALTER TABLE `discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `posts_actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `posts_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `posts_episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `posts_season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `posts_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `reactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `videos_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `collections`
  ADD CONSTRAINT `user_collection` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `collections_post`
  ADD CONSTRAINT `collection_post` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `comments`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `comments_reaction`
  ADD CONSTRAINT `reaction` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `follows`
  ADD CONSTRAINT `user_follow` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `posts_actor`
  ADD CONSTRAINT `actor` FOREIGN KEY (`content_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `posts_category`
  ADD CONSTRAINT `category` FOREIGN KEY (`content_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `posts_episode`
  ADD CONSTRAINT `episode` FOREIGN KEY (`content_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `posts_season`
  ADD CONSTRAINT `season` FOREIGN KEY (`content_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `posts_video`
  ADD CONSTRAINT `video` FOREIGN KEY (`content_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `reactions`
  ADD CONSTRAINT `user_reaction` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;