-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2010 at 03:26 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `supernatural`
--
CREATE DATABASE IF NOT EXISTS supernatural;
GRANT ALL PRIVILEGES ON supernatural.* to 'assist'@'localhost' identified by 'assist';
USE supernatural;
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `pic` varchar(50) NOT NULL default 'default.gif',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'taco', '9dc4319c27f6479adc842ebef4a324a40759b95c');

--
-- Table structure for table `sightings`
--

CREATE TABLE IF NOT EXISTS `sightings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL default 'John Doe',
  `date` date NOT NULL,
  `city` varchar(50) NOT NULL default 'Not Listed',
  `state` varchar(2) NOT NULL,
  `experience` blob NOT NULL,
  `creature_type` varchar(25) NOT NULL,
  `action` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
--
--

--
-- Table structure for table `sightings`
--

CREATE TABLE IF NOT EXISTS `creatureBio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `food` varchar(50) NOT NULL,
  `locale` varchar(50) NOT NULL default 'Everywhere',
  `weakness` blob NOT NULL,
  `powers` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


INSERT INTO `creatureBio` (`id`, `name`, `food`,`locale`, `weakness`, `powers`) VALUES
(1, 'Zombie', 'BRAINS', 'Everywhere', 'Headshots', 'Being the living dead?');
INSERT INTO `creatureBio` (`id`, `name`, `food`,`locale`, `weakness`, `powers`) VALUES
(2, 'Unicorn', 'Candy', 'Candy Mountain', 'Rainbows', 'Beauty');
INSERT INTO `creatureBio` (`id`, `name`, `food`,`locale`, `weakness`, `powers`) VALUES
(3, 'Leprechaun', 'Meat & Potatoes', 'Ireland', 'Beer', 'Being short');
INSERT INTO `creatureBio` (`id`, `name`, `food`,`locale`, `weakness`, `powers`) VALUES
(4, 'Panda', 'bamboo', 'China and Zoos', 'invincible', 'Being Cuddly');
INSERT INTO `creatureBio` (`id`, `name`, `food`,`locale`, `weakness`, `powers`) VALUES
(5, 'Demon', 'Innocent Souls', 'Hell', 'Greed', 'Temptation');
INSERT INTO `creatureBio` (`id`, `name`, `food`,`locale`, `weakness`, `powers`) VALUES
(6, 'Ghost', 'Air', 'Everywhere', 'idk', 'idk');
INSERT INTO `creatureBio` (`id`, `name`, `food`,`locale`, `weakness`, `powers`) VALUES
(7, 'Medusa', 'Humans', 'Deadly Lair', 'Decapitation', 'Turns things to stone');
INSERT INTO `creatureBio` (`id`, `name`, `food`,`locale`, `weakness`, `powers`) VALUES
(8, 'Vampire', 'blood', 'Translyvania', 'Garlic and Wooden Stakes', 'Being the undead');
INSERT INTO `creatureBio` (`id`, `name`, `food`,`locale`, `weakness`, `powers`) VALUES
(9, 'Troll', 'Human Limbs', 'In Dark Lonely Caves', 'Hunger', 'Being so ugly!');
INSERT INTO `creatureBio` (`id`, `name`, `food`,`locale`, `weakness`, `powers`) VALUES
(10, 'David Woodruff', 'nerdiness', 'Virginia', 'Pita Chips', 'He is useless.');
INSERT INTO `creatureBio` (`id`, `name`, `food`,`locale`, `weakness`, `powers`) VALUES
(11, 'Pikachu', 'lame', 'lame', 'lame', 'lame');

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL default 'John Doe',
  `description` blob NOT NULL,
  'rating' int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO 'equipment' ('id', 'name', 'description', 'action', 'rating') VALUES
(1, 'Duct Tape', 'Use it for anything and everything.  An essential tool for unexpected situations and annoying little siblings.', '5');

