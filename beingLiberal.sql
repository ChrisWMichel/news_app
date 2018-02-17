-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2018 at 10:13 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `being_liberal`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisments`
--

CREATE TABLE `advertisments` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `admin_comment` text COLLATE utf8mb4_unicode_ci,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `inactive_date` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `admin_comment`, `image_url`, `title`, `author`, `site`, `description`, `url`, `active`, `inactive_date`, `created_at`, `updated_at`) VALUES
(35, 1, NULL, 'https://timedotcom.files.wordpress.com/2017/06/london-attack2.jpg?quality&#x3D;85', 'Man Who Attacked London Muslims Gets 43 Years in Prison', 'images/nopicture.gif', '@TIME', 'A man who drove into worshippers near a London mosque, killing one man and injuring a dozen others, has been sentenced', 'http://time.com/5130215/london-mosque-attack/', 1, '02-03-18 22:03:01', '2018-02-02 23:04:14', '2018-02-05 02:20:15'),
(38, 1, NULL, 'https://timedotcom.files.wordpress.com/2018/02/punxsutawney-phil.jpg?quality&#x3D;85', 'Groundhog Day Has Come Again and the Internet Has Feelings', 'images/nopicture.gif', '@TIME', 'Punxsutawney Phil predicted a long winter', 'http://time.com/5130610/groundhog-day-2018-memes/', 1, '02-03-18 21:34:12', '2018-02-02 23:33:16', '2018-02-04 03:58:51'),
(39, 1, 'Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.', 'https://timedotcom.files.wordpress.com/2018/02/las-vegas-shooter-ammo-seller-arrested.jpg?quality&#x3D;85', 'Man Who Sold Las Vegas Shooter Ammo Is Arrested', 'images/nopicture.gif', '@TIME', 'The man was arrested for manufacturing and selling armor-piercing bullets', 'http://time.com/5131965/douglas-haig-arrested/', 1, '02-03-18 21:33:35', '2018-02-03 21:48:36', '2018-02-04 03:58:52'),
(40, 1, 'Nulla quis lorem ut libero malesuada feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'https://media1.s-nbcnews.com/j/newscms/2018_05/2315721/180203-nunes-memo-907a-rs_5ee98d073967f5ec9e6605fb248a52db.nbcnews-fp-1024-512.jpg', 'Nunes memo fails to make legal case against the FBI', 'images/nopicture.gif', 'NBCNews', 'The House Intelligence Committee on Friday made public a Republican memo that questions the issuance of a FISA warrant for surveillance of former Trump campaign aide Carter Page.', 'https://www.nbcnews.com/politics/national-security/nunes-memo-fails-make-legal-case-against-fbi-n844381', 1, '02-04-18 20:19:38', '2018-02-03 21:49:44', '2018-02-05 02:20:12'),
(41, 1, 'Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla porttitor accumsan tincidunt.', 'https://media.npr.org/assets/img/2018/01/31/castle-bravo_wide-baa109d68d82e5cfdc59334e7bc7ec828abc9952.jpg?s=1400', 'Buried In Trump\'s Nuclear Report: A Russian Doomsday Weapon', 'images/nopicture.gif', 'NPR', 'The administration\'s Nuclear Posture Review mentions a massive, nuclear-armed torpedo capable of incinerating cities. But is it real?', 'https://www.npr.org/sections/parallels/2018/02/02/582087310/buried-in-trumps-nuclear-report-a-russian-doomsday-weapon', 0, '02-03-18 22:02:22', '2018-02-03 21:50:51', '2018-02-04 04:02:22'),
(42, 2, NULL, 'http://wwwcdn.skyandtelescope.com/wp-content/uploads/Totality-bow-wave-480px.jpg', 'Solar Eclipse Made Bow Waves in Earth&#039;s Atmosphere - Sky & Telescope', 'images/nopicture.gif', '@skyandtelescope', 'The Great American total solar eclipse is months behind us, but we&#039;re still learning how the Moon, Sun, and Earth interact.', 'http://www.skyandtelescope.com/astronomy-news/solar-eclipse-made-bow-waves-earths-atmosphere/', 1, '02-03-18 18:34:08', '2018-02-03 21:58:50', '2018-02-04 04:02:31'),
(43, 2, 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim.', 'https://i.kinja-img.com/gawker-media/image/upload/s--ghGFmvWj--/c_fill,fl_progressive,g_center,h_900,q_80,w_1600/cpj0xxeewptglxrki96l.jpg', 'SpaceX\'s Best Hope for Sending People to Mars Will Launch This Week', 'George Dvorsky', 'GIZMODO', 'At approximately 1:30 pm ET on Tuesday February 6th, SpaceX’s Falcon Heavy rocket is set to embark on its long-anticipated debut flight. Armed with 140,660 pounds of thrust, it will be the most powerful operational rocket in the world.', 'https://gizmodo.com/spacexs-best-hope-for-sending-people-to-mars-will-launc-1822638923', 1, '02-03-18 21:58:35', '2018-02-03 22:00:35', '2018-02-04 04:02:32'),
(44, 2, 'This year’s World Economic Forum provided yet another opportunity for those who believe in apocalyptic climate change to harangue us about the evils of greenhouse gases amid warnings the world will end in 2050 or 2100 or one of these days when it gets warm enough.', 'http://www.americanthinker.com/assets/images/at-logo.gif', 'Things Your Professor Didn’t Tell You About Climate Change', 'images/nopicture.gif', 'AmericanThinker', 'Davos 2018 is gone, but not forgotten.', 'http://www.americanthinker.com/articles/2018/02/things_your_professor_didnt_tell_you_about_climate_change.html', 1, '02-03-18 16:30:01', '2018-02-03 22:01:46', '2018-02-04 04:02:33'),
(45, 3, NULL, 'http://i2.cdn.turner.com/money/dam/assets/180202183722-wells-fargo-logo-540x304.jpg', 'Federal Reserve drops the hammer on Wells Fargo', 'Donna Borak, Danielle Wiener-Bronner and Jackie Wattles', '@CNNMoney', 'The Federal Reserve is punishing Wells Fargo.', 'http://money.cnn.com/2018/02/02/news/companies/wells-fargo-federal-reserve/index.html', 1, '02-03-18 21:30:48', '2018-02-03 23:31:35', '2018-02-04 04:02:39'),
(46, 3, NULL, 'https://s2.reutersmedia.net/resources/r/?m=02&d=20180202&t=2&i=1227675117&w=&fh=545px&fw=&ll=&pl=&sq=&r=LYNXMPEE110VB', 'Dow sees worst day in two years as bond yields jump', 'Reuters Editorial', '@Reuters', 'Worries about the impact of a tightening job market on the  prospects for inflation and a surge in bond yields sent investors fleeing equities on Friday, with the Dow Jones Industrials Average swooning almost 666 points, for its biggest daily percentage loss in 20 months.', 'https://www.reuters.com/article/us-usa-stocks/dow-sees-worst-day-in-two-years-as-bond-yields-jump-idUSKBN1FM1KC', 1, NULL, '2018-02-03 23:32:48', '2018-02-03 23:35:08'),
(48, 4, NULL, 'http://s.newsweek.com/sites/www.newsweek.com/files/styles/full/public/2018/02/03/image-476794132.jpg', 'The PetSmart employee was fired after a video went viral of the groomer abusing the dog', 'images/nopicture.gif', '@newsweek', '\"I was getting upset and I wanted to have proof, so I could take action and show somebody that this is happening.\" ', 'http://www.newsweek.com/petsmart-animal-abuse-texas-us-798959', 1, '02-03-18 21:30:17', '2018-02-03 23:41:30', '2018-02-04 04:02:43'),
(49, 4, NULL, 'https://media2.s-nbcnews.com/j/newscms/2018_05/2314796/180202-bitcoin-plunge-mn-1040_aeb571ecbb517b57309c504ee7bdf925.1024;576;7;70;5.jpg', 'Bitcoin loses more than half its value amid crypto crash', 'images/nopicture.gif', '@NBCNews', 'After stratospheric growth, Bitcoin crashed below $8,000 for the first time in months amid a continuing global crypto rout.', 'https://www.nbcnews.com/tech/internet/bitcoin-loses-more-half-its-value-amid-crypto-crash-n844056', 1, '02-04-18 20:19:55', '2018-02-03 23:41:53', '2018-02-13 02:00:53'),
(50, 4, NULL, 'https://www.gannett-cdn.com/-mm-/8d6f95cddeeb1bc10a0ece6acf5e34b4fc0c59ed/c=0-758-8192-5386&r=x803&c=1600x800/local/-/media/2018/01/31/USATODAY/USATODAY/636530103344971589-SRCC-iced-coffee-card.png', 'Starbucks launches co-branded Visa credit card', 'images/nopicture.gif', '@usatoday', 'A new credit card will let people earn Starbucks Rewards points, called Stars, and use them for food and drinks.', 'https://www.usatoday.com/story/money/food/2018/02/01/starbucks-launches-co-branded-visa-credit-card/1076849001/', 1, '02-03-18 21:34:06', '2018-02-03 23:42:20', '2018-02-04 04:02:45'),
(51, 4, 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim.', 'https://cnet3.cbsistatic.com/img/ZYcBXJ2YP96XeqGTSJZeHu9QMbY=/670x503/2018/02/01/27bfc7f2-f3d7-4054-84b6-02efd75af541/uber-tips-9833.jpg', 'Uber has a tip limit? That\'s news to drivers', 'images/nopicture.gif', '@CNET', 'If you want to leave a generous tip for your Uber driver, you may have to use cash because the ride-hailing app has a ceiling. Lyft has tipping limits, too.', 'https://www.cnet.com/news/uber-tip-limit-for-drivers-ride-hailing-lyft/', 1, '02-03-18 18:15:58', '2018-02-03 23:42:51', '2018-02-04 04:02:46'),
(52, 2, NULL, 'http://i2.cdn.turner.com/money/dam/assets/180212131058-iss-540x304.jpg', 'Trump administration wants to privatize Space Station missions', 'Jackie Wattles and Rachel Crane', 'CNNMoney', 'The Trump administration released its budget proposal Monday, and it recommends ending U.S. government funding of the International Space Station by 2025.', 'http://money.cnn.com/2018/02/12/technology/future/nasa-budget-commercial-space/index.html', 1, NULL, '2018-02-13 04:30:39', '2018-02-13 04:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `font` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `font`, `created_at`, `updated_at`) VALUES
(1, 'Top Stories', 'fa-eye', NULL, NULL),
(2, 'Science', 'fa-flask', NULL, NULL),
(3, 'History', 'fa-picture-o', NULL, '2018-02-10 05:13:22'),
(4, 'Fact Check', 'fa-frown-o', '2018-01-28 05:10:30', '2018-02-11 00:36:34'),
(5, 'Hollywood', 'fa-film', '2018-01-29 07:22:04', '2018-01-29 07:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_26_193731_create_sections_table', 2),
(4, '2018_01_26_193930_create_categories_table', 2),
(5, '2018_01_26_193956_create_articles_table', 2),
(6, '2018_01_26_194058_create_events_table', 2),
(7, '2018_01_26_194158_create_user_comments_table', 2),
(8, '2018_01_26_194246_create_advertisments_table', 2),
(9, '2018_01_26_202208_create_contacts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Articles', NULL, NULL),
(2, 'Fake News', NULL, NULL),
(6, 'Test 1', '2018-01-27 23:39:05', '2018-01-28 03:24:45'),
(7, 'Test 2', '2018-01-28 02:35:04', '2018-01-28 03:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_permission` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `email_token`, `is_permission`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Chris', 'Michel', 'chris@email.com', '$2y$10$nWnTrCR4t.Ai8NBltcYjo.Vj6UXwERAjsxb66FqN3OOb8m04IPsPG', NULL, 2, 'JqpsNAiP08Yx4iiW7bwX5KORSTaUcPjqfPdTvOkoMQac5uMdt8fDWwCtgY3m', '2018-01-24 00:10:37', '2018-01-25 04:28:32'),
(2, 'Andy', 'Anderson', 'andy@email.com', '$2y$10$HuUv8g4a24JQGomBWy/h5eNrxRXF4ZuNTFl3xZRNEpa3amySBrngC', NULL, 1, 'lCDbzXH8mhE8tHWTOCUgbLwk7TUmMTcyb5iLx2rPrre4dJhcuTTxfcr9XD3Z', '2018-01-24 03:56:11', '2018-01-24 03:56:11'),
(3, 'Bill', 'Blazer', 'bill@email.com', '$2y$10$u1pcO0cxie/f.Ml/GgbQoODowKUx50BbM4TXxzaxEVcI0hFr7pJRm', NULL, 1, 'qYUhzV7NeN8CENxMLUSgrVmRoGraWoF2gkFkSesVwN6VCymNg8yLP2amQ33u', '2018-01-25 19:56:29', '2018-01-25 20:37:11'),
(5, 'Dan', 'Dulce', 'dan@email.com', '$2y$10$/Wtmb129BOO31y5EWYA3fewwXOmpc4ltpqJqDpJoFM/nWElw862f2', NULL, 3, 'C82TqdAtpdtXporWq1uq3aeXhqyrpSlw9FWgULe4LpdQgRuzK6GhkiY7PHgH', '2018-02-15 05:06:57', '2018-02-15 05:19:18'),
(7, 'Edward', 'Ezzil', 'ezzil@email.com', '$2y$10$Fi6UPF8d2PMSsGyfS9I4n.TWYRsitLRT/ZpqykWahHiHdE5p6C0i6', NULL, 3, NULL, '2018-02-15 22:04:41', '2018-02-15 22:05:15'),
(8, 'Frank', 'Freemont', 'freemont@email.com', '$2y$10$gGWPGSu8YkHtqlWaySA6Xe1vGrlx2vI2NrnkaJz2xm7l/owYEdpCu', NULL, 3, NULL, '2018-02-15 22:09:21', '2018-02-15 22:13:49'),
(13, 'Greg', 'Gottie', 'gottie@email.com', '$2y$10$Dlojy4iPYVNdhDhEJxkmYecb/0JZV23UG.rtETKia1.mqNM5aWMzu', NULL, 3, NULL, '2018-02-15 23:07:49', '2018-02-15 23:08:51'),
(14, 'Henry', 'Hendrick', 'hendrick@email.com', '$2y$10$ihv4ulIgb99w6I540t3cjeMKPMAvSag381msbYbvTy9rFbg6DSwhm', NULL, 3, NULL, '2018-02-15 23:11:49', '2018-02-15 23:12:46'),
(15, 'Igore', 'Isible', 'christopherw.michel@gmail.com', '$2y$10$eXFLHIrJxFewLR9D41Tbx.ztCFZsIwa2i.FqBhgIPlkBAgpomUpsq', NULL, 3, 'TuVnCWLxahGRx4rRCKBAqrgQnvjTD31s7QPPHy3iDb2EwYXE6ltlTzG2PHif', '2018-02-15 23:58:52', '2018-02-15 23:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_comments`
--

CREATE TABLE `user_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisments`
--
ALTER TABLE `advertisments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_comments`
--
ALTER TABLE `user_comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisments`
--
ALTER TABLE `advertisments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_comments`
--
ALTER TABLE `user_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
