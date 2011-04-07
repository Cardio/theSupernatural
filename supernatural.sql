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
  `firstname` varchar(50),
  `lastname` varchar(50),
  `bio` blob,
  `pic` blob,
  PRIMARY KEY (`id`),
  INDEX (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
--
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'taco', '9dc4319c27f6479adc842ebef4a324a40759b95c');
INSERT INTO `users` (`id`, `username`, `password`, `zipcode`, `firstname`, `lastname`, `bio`)VALUES
(2, 'AJ', '269b3eef1c991fb8b36ceb07ca9e659a779a7a2c', '22401', 'Amanda', 'Jenkins', 'My name is Amanda Jenkins. I sometimes go by AJ! I am very extroverted. I am a comp sci major at the University of Mary Washington. Also, I spend alot of my free time saving lives, because I am an EMT!!!');
--
-- creatureBio
--
CREATE TABLE IF NOT EXISTS `creatureBio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(12) NOT NULL,
  `food` varchar(50) NOT NULL,
  `locale` varchar(50) NOT NULL,
  `weakness` longtext NOT NULL,
  `powers` longtext NOT NULL,
  `pic` blob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
--
-- 
--
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`, `pic`) VALUES
(1, 'Zombie', 'Brains', 'Viral outbreak', 'Zombies true weakness is damage to the brain. You can take them with one blow to the head, or a single headshot!', 'Zombies don\'t really have any powers but they thrive in hurting anything but the brain doesn\'t seem to effect them.','http://localhost/theSupernatural/creaturePictures/zombie.jpg');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`, `pic`) VALUES
(2, 'Unicorn', 'Candy', 'Candy Mountain', 'Blennophobia which is the fear of SLIME!', 'Unicorns are abudant sources of cheerfulness, they are always smiling and being happy.','http://localhost/theSupernatural/creaturePictures/unicorn.jpg');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`, `pic`) VALUES
(3, 'Leprechaun', 'Meat and Potatoes', 'Ireland', 'Leprechauns are always wearing their beer goggles. Sit \'em at a bar, and they will soon be falling down. It also serves as a great distraction', 'Though alcohol may be weakness, it is also a strength. Leprechauns can consume large quantities of alcohol, after all they are Irish!','http://localhost/theSupernatural/creaturePictures/leprechaun.jpg');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`, `pic`) VALUES
(4, 'Panda', 'Bamboo', 'China', 'Pandas can eat and eat and eat, so their general weakness is gluttony.', 'Pandas are sooooooo cuddly and soft, this often serves as a weakness for predators.','http://localhost/theSupernatural/creaturePictures/panda.jpg');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`, `pic`) VALUES
(5, 'Demon', 'Innocent Souls', 'HELL', 'Cheer: Demons CANNOT stand cheerfullness; they immediately burst into flame when surrounded by happiness.', 'Demons are full of anger, and are relentless.','http://localhost/theSupernatural/creaturePictures/demon.jpg');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`, `pic`) VALUES
(6, 'Ghost', 'Not Applicable', 'Everywhere', 'Being Inmaterial', 'Ghosts good or bad are known for their relentless haunting.','http://localhost/theSupernatural/creaturePictures/ghost.jpg');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`, `pic`) VALUES
(7, 'Medusa', 'Human Souls', 'The Lair', 'The only way to defeat Medusa is to behead her.', 'One foul look into the eyes of Medusa turns you into stone. Do not be lured in by her beauty.','http://localhost/theSupernatural/creaturePictures/medusa.jpg');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`, `pic`) VALUES
(8, 'Vampire', 'Blood', 'Translyvania', 'Vampires have multiple weaknesses in the event that you get close enough to them. The cannot ingest garlic, and they cannot endure UV rays. Also a wooden stake to the heart immediately results in DEATH.', 'Vampires are fast and immortal, so killing them is difficult.','http://localhost/theSupernatural/creaturePictures/vampire.jpg');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`, `pic`) VALUES
(9, 'Troll', 'Limbs', 'In the Mountain', 'Not Applicable', 'Not Applicable','http://localhost/theSupernatural/creaturePictures/troll.jpg');
INSERT INTO `creatureBio` (`id`, `name`, `food`, `locale`, `weakness`, `powers`, `pic`) VALUES
(10, 'Pikachu', 'Poke-Food', 'PokeBall', 'Rock-type Attacks', 'Electric-type attacks','http://localhost/theSupernatural/creaturePictures/pikachu.jpg');

--
-- Table structure for table `sightings`
--

CREATE TABLE IF NOT EXISTS `sightings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL default 'John Doe',
  `date` date NOT NULL,
  `city` varchar(50) NOT NULL default 'Not Listed',
  `state` varchar(2) NOT NULL,
  `experience` longtext NOT NULL,
  `action` longtext NOT NULL,
  PRIMARY KEY (`id`),
  INDEX (`name`, `date`, `city`, `state`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
--
--
--
INSERT INTO `sightings` (`id`, `name`, `date`, `city`, `state`, `experience`, `action`) VALUES
(1, 'AJ', '2011-03-21', 'Fredericksburg', 'VA', 'It was scary, I thought I was going to be turned to stone.', 'I chopped off her head!');
INSERT INTO `sightings` (`id`, `name`, `date`, `city`, `state`, `experience`, `action`) VALUES
(2, 'AJ', '2011-03-20', 'El Paso', 'TX', 'I was walking over the bridge and my ankle was grabbed, and I fell...it was the scariest event of my life', 'I stomped with my other foot as hard as I could on the Trolls arm...it let go and I ran!');
INSERT INTO `sightings` (`id`, `name`, `date`, `city`, `state`, `experience`, `action`) VALUES
(3, 'AJ', '2011-03-11', 'Ocean City', 'MD', 'I was visiting my best friend. Her house was known to be haunted..but I didnt believe it..until I saw it. The ghost was of a young child dressed in victorian clothing.', 'The ghost was not hostile. It just sat at the little desk and brushed its hair. When it looked at me though..I shivered.');
INSERT INTO `sightings` (`id`, `name`, `date`, `city`, `state`, `experience`, `action`) VALUES
(4, 'AJ', '2011-03-20', 'Raleigh', 'NC', 'I was at the fair, and there was a stand that said \'Come in and see the REAL snakewoman, half human half snake!\' So I entered. She was beautiful, but scary, and I almost looked  in her eyes, but I saw the statues in the room.', 'I turned away and I ran!');
INSERT INTO `sightings` (`id`, `name`, `date`, `city`, `state`, `experience`, `action`) VALUES
(5, 'AJ', '2011-03-20', 'Key West', 'FL', 'I was at a bar, and when I went up to order a drink there was a small man dressed in green who lookedm e and the face and said \'What are you doin in my barrrr?\' I said I was just gettin a drink and told the bartender to make that two, and I gave one to the small man.', 'The Leprechaun was content upon recieveing my offer. And the Guiness was GOOD!!');

--
--
CREATE TABLE IF NOT EXISTS `creatureToSight` (
  `sightingId` int(11) NOT NULL, 
  `creatureId` int(2) NOT NULL,
  CONSTRAINT sightings_sightingId_fk
  FOREIGN KEY (sightingId)
  REFERENCES sightings (sightingId),
  CONSTRAINT creatureBio_creatureId_fk
  FOREIGN KEY (creatureId)
  REFERENCES creatureBio (creatureId)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
--
--
INSERT INTO `creatureToSight` (`sightingId`, `creatureId`) VALUES
(1,7);
INSERT INTO `creatureToSight` (`sightingId`, `creatureId`) VALUES
(2,9);
INSERT INTO `creatureToSight` (`sightingId`, `creatureId`) VALUES
(3,6);
INSERT INTO `creatureToSight` (`sightingId`, `creatureId`) VALUES
(4,7);
INSERT INTO `creatureToSight` (`sightingId`, `creatureId`) VALUES
(5,3);
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL default 'John Doe',
  `description` longtext NOT NULL,
  `rating` int(5) NOT NULL,
  `pic` blob,
  PRIMARY KEY (`id`),
  INDEX (`name`)
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
--
-- Dumping data for table `users`
--
-- Blog Stuff
--
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` blob NOT NULL,
  `author_id` int(11) NOT NULL default '0',
  `date_posted` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `posts` (`id`, `post`, `author_id`, `date_posted`) VALUES
(1,  'Feel free to comment on the site at as you find things that may need improving or ideas you may have in addition to what we already have! Thanks everyone!', 2, '2011-04-17'),
(2,  'I think leprechauns can be good. Cuz the Irish are known to be nice people...I\'m still looking for others input.', 2, '2011-04-17'),
(3,  'Thanks for your input by the way!', 2, '2011-04-18'),
(4,  'Why do you think leprechauns are all about Lucky Charms and gold at the end of the rainbow? Not everything is life is colorful and happy.', 1, '2008-04-18'),
(5,  'I think that Trolls are definately rising population wise. Where can we look into joining a decon team?', 1, '2011-04-18'),
(6,  'I\'m not sure..', 2, '2011-04-18');
CREATE TABLE IF NOT EXISTS `thread`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`title` varchar(255) NOT NULL default '',
`post` blob NOT NULL,
`author_id` int(11) NOT NULL default '0',
`date_posted` date NOT NULL default '0000-00-00',
PRIMARY KEY(`id`)
)ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `thread` (`id`,`title`, `post`, `author_id`, `date_posted`) VALUES
(1,  'Welcome', 'This is my first post on my new thread! ', 2, '2008-10-17'),
(2,  'Leprechauns', 'I can\'t believe I saw a real Leprechaun, what have others experienced? Are there such things as happy leprechauns?', 2, '2008-10-17'),
(3,  'The Dangers of El Paso','I was in El PAso picking up some salsa and every bridge I went over there were Trolls. Can we activate a decon team of some sort? ', 2, '2008-10-18');


CREATE TABLE IF NOT EXISTS `threadToPost`(
`threadId` int(11) NOT NULL, 
`postId` int(2) NOT NULL,
  CONSTRAINT thread_threadId_fk
  FOREIGN KEY (threadId)
  REFERENCES thread (threadId),
  CONSTRAINT posts_postId_fk
  FOREIGN KEY (postId)
  REFERENCES posts (postId)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `threadToPost` (`threadId`, `postId`) VALUES
(1,1);
INSERT INTO `threadToPost` (`threadId`, `postId`) VALUES
(2,2);
INSERT INTO `threadToPost` (`threadId`, `postId`) VALUES
(1,3);
INSERT INTO `threadToPost` (`threadId`, `postId`) VALUES
(2,4);
INSERT INTO `threadToPost` (`threadId`, `postId`) VALUES
(3,5);
INSERT INTO `threadToPost` (`threadId`, `postId`) VALUES
(3,6);