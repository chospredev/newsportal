-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3305
-- Generation Time: Oct 02, 2019 at 11:32 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignmentnews`
--
CREATE DATABASE IF NOT EXISTS `assignmentnews` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `assignmentnews`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `articlecID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsmodule`
--

DROP TABLE IF EXISTS `newsmodule`;
CREATE TABLE IF NOT EXISTS `newsmodule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `headline` varchar(255) NOT NULL,
  `storyline` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `timestamp` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsmodule`
--

INSERT INTO `newsmodule` (`id`, `headline`, `storyline`, `username`, `timestamp`) VALUES
(3, 'Spotify now lets you share music directly to Snapchat', '<p>Spotify is adding the ability to share whatever it is you&rsquo;re listening to with a snap on Snapchat &mdash; long after other platforms like Instagram already got this same type of integration. So long as Snapchat is installed on the same device you&rsquo;re using Spotify on, you&rsquo;ll now see it appear in Spotify&rsquo;s share menu.</p>\r\n\r\n<p>When chosen, Snapchat will automatically create a snap that includes song info and album art for the currently playing track. This can then be sent to your individual Snapchat friends or to your story. You can share individual songs, albums, playlists, or podcasts.</p>\r\n\r\n<p>If you receive a Spotify share on Snapchat, you can just swipe up to start listening to whatever song was just sent your way. Direct sharing, which has become hugely popular on Instagram, was late in coming to Facebook Stories as well; the feature <a href=\"https://www.theverge.com/2019/8/30/20840970/spotify-music-share-facebook-stories\">launched just last month</a>. Snapchat sharing is rolling out &ldquo;soon&rdquo; for Spotify on Android and iPhone.</p>\r\n\r\n<p>Aside from clearly not being a top priority for Spotify, Snapchat will also soon face new competition beyond Instagram and WhatsApp. Facebook is working on <a href=\"https://www.theverge.com/2019/8/26/20833903/facebook-instagram-threads-messaging-app-close-friends-snapchat\">a new app called Threads</a> that&rsquo;s focused on sharing with close friends instead of a wider audience of online followers.</p>', 'Abdul-Kerim Spreco', '2019-09-09'),
(4, 'Uber will spend $200 million to expand its Uber Freight trucking venture', '<p>Uber will invest $200 million annually and hire thousands of employees to bolster its two-year-old long-haul trucking venture, Uber Freight, the company, announced today. The expanded business will be headquartered in a newly opened office in downtown Chicago where it will house 2,000 employees that Uber plans to hire over the next three years.</p>\r\n\r\n<p><a href=\"https://www.theverge.com/2017/5/18/15657798/uber-freight-truck-app-ios-android\">Launched in 2017</a>, Uber Freight connects truck drivers with shippers, much in the same way the company&rsquo;s ride-hailing app pairs drivers with those looking for a ride. It&rsquo;s part of Uber&rsquo;s &ldquo;other bets,&rdquo; which includes its food delivery service, Uber Eats, and its New Mobility ventures like its Jump-branded electric bikes and scooters.</p>\r\n\r\n<p>It&rsquo;s a huge vote of confidence in Uber&rsquo;s growing freight division, even as Uber&rsquo;s overall business continues to hemorrhage billions of dollars every quarter. In August, Uber reported a <a href=\"https://www.theverge.com/2019/8/8/20793793/uber-5-billion-quarter-loss-profit-lyft-traffic-2019\">record quarterly loss of $5.3 billion</a>, much of which is attributable to one-time expenses like stock-based compensation. Still, its revenue growth has slowed, and its path to profitability seems longer than ever.</p>\r\n\r\n<p>The trucking industry is not an obvious place for Uber to direct its resources. There has been <a href=\"https://www.ttnews.com/articles/data-shows-there-are-more-truckers-ever-experts-say-driver-shortage-still-issue\">a shortage of truck drivers</a> over the last few years, with experts noting that there are not enough truckers to keep up with demand. This has led to a softening of the market, with prices dropping overall.</p>\r\n\r\n<p><q>The trucking industry is not an obvious place for Uber to direct its resources</q></p>\r\n\r\n<p>But Uber&rsquo;s top executives say its Freight division shows promise. &ldquo;Uber Freight continued to see impressive growth and great progress in Q2 despite soft market conditions,&rdquo; Uber CEO Dara Khosrowshahi said in an August earnings call with investors. Still, the company did not break out revenue figures for its Freight business.</p>\r\n\r\n<p>Lior Ron, head of Uber Freight, said the soft market conditions were just a byproduct of the truck industry&rsquo;s &ldquo;cyclical&rdquo; nature. &ldquo;Every time the economy picks up, the freight industry gets many more assets,&rdquo; Ron said in an interview with <em>The Verge</em>. &ldquo;Truck orders are at a historical high.&rdquo;</p>\r\n\r\n<p>Uber is continuing to lure drivers to its platform through well-established techniques, like bonuses and perks. Last year, <a href=\"https://www.theverge.com/2018/3/21/17145732/uber-freight-plus-perks-rewards-card-trucking\">Uber Freight introduced a perks program</a> that offers truckers discounts on essential items like gas and new tires. The company won&rsquo;t say how much it&rsquo;s spending to subsidize its trucking business, but Ron insisted that Freight is the &ldquo;fastest growing business in Uber.&rdquo;</p>\r\n\r\n<p>&ldquo;We see acceleration in every region in the US.&rdquo; he added. &ldquo;Once you&rsquo;re serving them, the compounded revenue from the shippers is only going up and up and up as we&rsquo;re going deeper into the supply chain.&rdquo;</p>\r\n\r\n<p>Ron first joined Uber when <a href=\"https://www.theverge.com/2016/8/18/12533736/uber-otto-trucks-acquisition-anthony-levandoswski\">the ride-hailing company acquired Otto</a>, the self-driving trucking startup he co-founded with fellow ex-Google engineer Anthony Levandowski. Later, Google&rsquo;s self-driving spinoff <a href=\"https://www.theverge.com/2017/2/23/14719906/google-waymo-uber-self-driving-lawsuit-stolen-technology\">Waymo sued Uber</a>, claiming that Levandowski stole trade secrets as a way to entice a sale from the ride-hailing company. <a href=\"https://www.theverge.com/2018/2/9/16995254/waymo-uber-lawsuit-trial-settlement\">The suit was settled in 2018</a>, but Levandowski was <a href=\"https://www.theverge.com/2019/8/27/20835368/google-uber-engineer-trade-theft-secrets-anthony-levandowski-charged\">recently charged with theft by the Justice Department</a>. Ron, who was not named in either the lawsuit or the indictment against Levandowski, <a href=\"https://techcrunch.com/2018/08/07/otto-co-founder-lior-ron-is-back-at-uber/\">rejoined Uber</a> last year to head up the Freight division.</p>\r\n\r\n<p>Ron, who spoke with <em>The Verge </em>a week before Levandowski was arrested, called his involvement with notorious engineer &ldquo;an interesting experience&rdquo; that unfortunately went the direction that it did. &ldquo;Obviously there was a lot of misinformation and misunderstanding in that old story,&rdquo; he continued. &ldquo;In the end of the day, the reason that I was super psyched about joining Uber [was because] this is the best place in the universe to be in transportation marketplaces, which we always viewed as the end game in terms of the business model.&rdquo;</p>', 'Abdul-Kerim Spreco', '2019-09-09'),
(5, 'If you asked Equifax for $125, you need to update your request', '<p>If you requested money from Equifax for leaking your personal data, you&rsquo;ll need to provide more information by October 15th. The Equifax settlement administrator sent an email with details over the weekend. It asks consumers to confirm that they&rsquo;re actually signed up for credit monitoring, which is a prerequisite for requesting the money. If they can&rsquo;t do that, they can amend their claim to request free credit monitoring. Otherwise, the claim will be denied.</p>\r\n\r\n<p><a href=\"https://www.theverge.com/2019/7/22/20703497/equifax-ftc-fine-settlement-2017-data-breach-compensation-fund\">Equifax settled</a> with the Federal Trade Commission for up to $700 million in July, and it set aside $31 million for consumers who were affected by the breach. <a href=\"https://www.theverge.com/2019/7/25/8930233/equifax-data-breach-ftc-settlement-claim-sign-up-how-to\">Consumers could request</a> four years of monitoring or a $125 check. But because the total payout was fixed, <a href=\"https://www.theverge.com/2019/7/31/20748981/ftc-equifax-settlement-payout-125-dollars\">the FTC soon warned</a> that people would receive far less money. This weekend&rsquo;s email reiterates that fact, warning recipients that they might get &ldquo;a small percentage&rdquo; of that initial claim.</p>\r\n\r\n<p>If people <em>do </em>still want the money, they&rsquo;ll need to name the credit monitoring service that they were using when they requested a check. This can be done through the <a href=\"https://secure.equifaxbreachsettlement.com/en/amendclaim\">official settlement site</a> or via mail. The request is basically just asking people to offer more details about something they already claimed was true, but it will probably also effectively winnow down the large number of people who will receive payouts.</p>', 'Abdul-Kerim Spreco', '2019-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `usertype`) VALUES
(13, 'spreco', '23377390df57ef0aa31b9ee0e6fe8f4d', 'admin'),
(14, 'Elmir', 'c43c62f303c260f06fe81ffbfbc248be', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
