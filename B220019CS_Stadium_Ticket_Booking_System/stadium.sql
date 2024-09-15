

--
-- Database: `stadium`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--
CREATE DATABASE IF NOT EXISTS ticket_stadium;
use ticket_stadium;
CREATE TABLE IF NOT EXISTS `book` (
  `bookid` int(3) NOT NULL AUTO_INCREMENT,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `booking_for` date NOT NULL,
  `game_id` int(3) NOT NULL,
  `seat_id` int(1) NOT NULL,
  `userid` int(3) NOT NULL,
  `seats` int(3) NOT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` ( `booking_date`, `booking_for`, `game_id`, `seat_id`, `userid`, `seats`) VALUES
( '2018-11-25 06:38:36', '2018-11-25', 5, 0, 3, 4),
( '2018-11-25 06:45:40', '2018-11-26', 5, 6, 3, 2),
( '2018-11-25 06:46:05', '2018-11-26', 5, 4, 3, 1),
( '2018-11-25 12:39:43', '2018-11-25', 4, 0, 3, 3),
( '2018-11-25 12:40:02', '2018-11-25', 4, 6, 3, 3),
('2018-11-25 13:02:50', '2018-11-25', 5, 4, 3, 3),
( '2019-03-25 13:45:13', '2019-03-25', 4, 4, 4, 5),
( '2019-03-25 13:46:17', '2019-03-25', 8, 5, 4, 4),
('2019-03-25 13:46:50', '2019-03-25', 8, 4, 4, 100),
( '2019-04-15 15:03:19', '2019-04-15', 9, 4, 5, 2),
( '2019-04-26 10:17:38', '2019-04-26', 9, 4, 5, 1),
( '2019-04-26 10:37:41', '2019-04-26', 9, 4, 5, 3);


-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `bookingid` int(3) NOT NULL AUTO_INCREMENT,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `booking_for` date NOT NULL,
  `game_id` int(3) NOT NULL,
  `seat_id` int(1) NOT NULL,
  `userid` int(3) NOT NULL,
  PRIMARY KEY (`bookingid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` ( `booking_date`, `booking_for`, `game_id`, `seat_id`, `userid`) VALUES
( '2019-04-26 10:17:38', '2019-04-26', 9, 4, 5),
( '2019-04-26 10:37:41', '2019-04-26', 9, 4, 5),
( '2019-04-26 10:37:41', '2019-04-26', 9, 4, 5),
('2019-04-26 10:37:41', '2019-04-26', 9, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `gamess`
--

CREATE TABLE IF NOT EXISTS `gamess` (
  `gamesid` int(3) NOT NULL AUTO_INCREMENT,
  `games_name` varchar(50) NOT NULL,
  `games_rating` varchar(5) NOT NULL,
  `games_image` varchar(50) NOT NULL,
  PRIMARY KEY (`gamesid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `gamess`
--

INSERT INTO `gamess` ( `games_name`, `games_rating`, `games_image`) VALUES
( 'cricket', '5', '1555339685.jpg'),
('Hockey', '4', '1555339730.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE IF NOT EXISTS `seats` (
  `seats_id` int(1) NOT NULL AUTO_INCREMENT,
  `seats_name` varchar(100) NOT NULL,
  `seats_limit` int(3) NOT NULL,
  `seats_rate` decimal NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`seats_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seats_name`, `seats_limit`, `seats_rate`, `status`) VALUES
( 'Platinum', 30, 500, 0),
('golden', 30, 300, 0),
( 'silver', 30, 150, 0),
( 'local', 600, 100, 1),
( 'vip', 100, 900, 1),
( 'medium', 300, 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `sliderid` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `path` varchar(38) NOT NULL,
  PRIMARY KEY (`sliderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` ( `title`, `path`) VALUES
('slider1', '1556261481.jpg'),
( 'slider2', '1556261535.jpg'),
( 'slider3', '1556261556.jpg');


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `password` varchar(34) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `image` varchar(200) DEFAULT 'users.png',
  `city` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `resetcode` varchar(34) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` ( `name`, `password`, `email`, `contact`, `image`, `city`, `address`, `status`, `resetcode`) VALUES
( '', '0bad310aa8c9cea83b4a681986a5e568', 'john@gmail.com', '', '1a1c9438caa2f95797301b7a1d05dc00.jpg', '', '', 1, ''),
( 'asdfsadf', '0bad310aa8c9cea83b4a681986a5e568', 'admin@gmail.com', '9074704644', 'users.png', '', '', 1, '601ab755a13bb439a65f4b686581f253'),
( '', '96e79218965eb72c92a549dd5a330112', 'vesu@gmail.com', '', 'users.png', '', '', 1, ''),
( '', '21232f297a57a5a743894a0e4a801fc3', 'admin123@gmail.com', '', 'users.png', '', '', 1, ''),
( '', 'bb2d1a99fc70551dab323d042deb6843', 'ashok@gmail.com', '', 'users.png', '', '', 1, ''),
( '', '4f9fecabbd77fba02d2497f880f44e6f', 'vijay123@gmail.com', '', 'users.png', '', '', 1, ''),
( '', 'vijay', 'vijay111@gmail.com', '', 'users.png', '', '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `password` varchar(34) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `image` varchar(200) DEFAULT 'users.png',
  `city` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `resetcode` varchar(34) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` ( `name`, `password`, `email`, `contact`, `image`, `city`, `address`, `status`, `resetcode`) VALUES
( 'harish', 'harish', 'harish@gmail.com', '', 'users.png', '', '', 1, '');


