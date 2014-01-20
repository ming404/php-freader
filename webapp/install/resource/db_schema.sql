-- phpMyAdmin SQL Dump
-- version 3.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2013 at 02:44 AM
-- Server version: 5.5.13
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpfreader`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE IF NOT EXISTS `channel` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `guid` varchar(64) NOT NULL,
  `feed_url` varchar(2083) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `link` varchar(256) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `language` varchar(5) DEFAULT NULL,
  `ttl` smallint(6) DEFAULT NULL,
  `image_title` varchar(256) DEFAULT NULL,
  `image_url` varchar(2083) DEFAULT NULL,
  `image_link` varchar(2083) DEFAULT NULL,
  `last_build_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guid` (`guid`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `channel` (`id`, `guid`, `feed_url`, `title`, `link`, `description`, `language`, `ttl`, `image_title`, `image_url`, `image_link`, `last_build_date`) VALUES
(1, 'feac1478b043e82ecf445c18092068da22789d834cc2234a7eb5f524d0c2cc1e', 'http://www.php-freader.org/feed', 'PHP Freader', '', 'Next generation feed reader that works', 'en-US', NULL, '', '', '', '2013-07-01 00:00:00');
--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `channel_id` bigint(20) NOT NULL,
  `guid` varchar(64) NOT NULL,
  `title` varchar(256) NOT NULL,
  `link` varchar(2083) DEFAULT NULL,
  `description` text,
  `pub_date` timestamp NULL DEFAULT NULL,
  `creator` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guid` (`guid`),
  FULLTEXT KEY `description` (`description`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(320) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `password` varchar(128) NOT NULL,
  `access_level` tinyint(4) NOT NULL,
  `preference` varchar(4000) NULL,
  `status` tinyint(4) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `first_name`, `last_name`, `password`, `access_level`, `preference`, `status`, `date_created`, `last_updated`) VALUES
(1, 'john.smith@php-freader.org', 'John', 'Smith', 'beab54bb994ab2e9fc10208492f865b1868a4b3228df4498b188cd827a9675f0', 1, '{"sort":"latest","mode":"unread","class":"special","id":"allitems"}', 1, now(), now());

-- --------------------------------------------------------

--
-- Table structure for table `user_channel_link`
--

CREATE TABLE IF NOT EXISTS `user_channel_link` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `channel_id` bigint(20) NOT NULL,
  `tag_id` bigint(20) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `user_channel_link` (`id`, `user_id`, `channel_id`, `tag_id`, `date_created`) VALUES
(1, 1, 1, NULL, now());

--
-- Table structure for table `user_item_link`
--

CREATE TABLE IF NOT EXISTS `user_item_link` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `read` datetime DEFAULT NULL,
  `star` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `type` varchar(50) NOT NULL,
    `user_id` int(11) DEFAULT NULL,
    `request_body` varchar(2000) DEFAULT NULL,
    `action` varchar(100) DEFAULT NULL,
    `user_agent` varchar(400) DEFAULT NULL,
    `remote_addr` varchar(50) DEFAULT NULL,
    `http_x_forwarded_for` int(150) DEFAULT NULL,
    `date_created` datetime NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table indexes
--

ALTER TABLE  `user_channel_link` ADD INDEX  `idx_user_channel` (  `user_id` ,  `channel_id` );
ALTER TABLE  `user_item_link` ADD INDEX  `idx_user_item` (  `user_id` ,  `item_id` );
ALTER TABLE  `item` ADD INDEX  `idx_guid` (  `guid` );
ALTER TABLE  `item` ADD FULLTEXT  `fidx_description` (`description`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
