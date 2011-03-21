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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'taco', '9dc4319c27f6479adc842ebef4a324a40759b95c');

--
-- creatureBio
--

CREATE TABLE IF NOT EXISTS `creatureBio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(12) NOT NULL,
  `food` varchar(50) NOT NULL,
  `locale` varchar(50) NOT NULL,
  `weakness` blob NOT NULL,
  `powers` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`) VALUES
(1, 'Zombie', 'Brains', 'Viral outbreak', 'Damage to the brain.', 'Hurting anything but the brain doesn\'t seem to effect them.');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`) VALUES
(2, 'Unicorn', '', '', '', '');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`) VALUES
(3, 'Leprechaun', '', '', '', '');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`) VALUES
(4, 'Panda', '', '', '', '');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`) VALUES
(5, 'Demon', '', '', '', '');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`) VALUES
(6, 'Ghost', '', '', '', '');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`) VALUES
(7, 'Medusa', '', '', '', '');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`) VALUES
(8, 'Vampire', '', '', '', '');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`) VALUES
(9, 'Troll', '', '', '', '');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`) VALUES
(10, 'Pikachu', 'Poke-Food', 'PokeBall', 'Rock-type Attacks', 'Electric-type attacks');

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
CREATE TABLE IF NOT EXISTS `creatureToSight` (
  `sightingId` int(11) NOT NULL PRIMARY KEY, 
  `creatureId` int(2) NOT NULL,
  CONSTRAINT sightings_sightingId_fk
  FOREIGN KEY (sightingId)
  REFERENCES sightings (sightingId),
  CONSTRAINT creatureBio_creatureId_fk
  FOREIGN KEY (creatureId)
  REFERENCES creatureBio (creatureId)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL default 'John Doe',
  `description` blob NOT NULL,
  `rating` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `equipment` (`id`, `name`, `description`, `rating`) VALUES
(1, 'Duct Tape', 'Use it for anything and everything.  An essential tool for unexpected situations and annoying little siblings.', 5);

--
-- Table structure for junction table between `equipment` and `creaturBio`
--
CREATE TABLE IF NOT EXISTS `equipToCreature` (
  `equipId` int(11) NOT NULL, 
  `creatureId` int(2) NOT NULL,
  CONSTRAINT equipment_equipId_fk
  FOREIGN KEY (equipId)
  REFERENCES equipment (id),
  CONSTRAINT creatureBio_creatureId_fk
  FOREIGN KEY (creatureId)
  REFERENCES creatureBio (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `equipToCreature` (`equipId`, `creatureId`) VALUES
(1,1);
INSERT INTO `equipToCreature` (`equipId`, `creatureId`) VALUES
(1,2);
INSERT INTO `equipToCreature` (`equipId`, `creatureId`) VALUES
(1,3);
INSERT INTO `equipToCreature` (`equipId`, `creatureId`) VALUES
(1,4);
INSERT INTO `equipToCreature` (`equipId`, `creatureId`) VALUES
(1,5);
INSERT INTO `equipToCreature` (`equipId`, `creatureId`) VALUES
(1,6);
INSERT INTO `equipToCreature` (`equipId`, `creatureId`) VALUES
(1,7);
INSERT INTO `equipToCreature` (`equipId`, `creatureId`) VALUES
(1,8);
INSERT INTO `equipToCreature` (`equipId`, `creatureId`) VALUES
(1,9);
INSERT INTO `equipToCreature` (`equipId`, `creatureId`) VALUES
(1,10);

-- Dumping data for table `users`
--
