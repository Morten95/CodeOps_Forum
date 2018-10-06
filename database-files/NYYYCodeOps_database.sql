-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2018 at 01:44 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CodeOps_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`id`, `name`) VALUES
(1, 'Technology'),
(2, 'Occupation & Education'),
(3, 'Sports'),
(4, 'Games'),
(5, 'Science'),
(6, 'Culture'),
(7, 'Society'),
(8, 'Cars & traffic'),
(9, 'Off topic');

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `id` int(12) NOT NULL,
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `body` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` (`id`, `postID`, `userID`, `body`) VALUES
(1, 71, 57, 'If a man dwells on the past, then he robs the present. But if a man ignores the past, he may rob the future.'),
(2, 146, 24, 'I seek not to know the answers, but to understand the questions.'),
(3, 109, 69, 'Repent! The end is coming, $9.95 at Amazon.'),
(4, 64, 24, 'Its  kind of fun to do the impossible.'),
(5, 133, 5, 'What you try to do is to be brilliant more often than you are an idiot.'),
(6, 1, 15, 'I have long felt that the way to keep children out of trouble is to keep them interested in things.'),
(7, 127, 33, 'O! Youth! What a pain in the backside.'),
(8, 57, 70, 'We keep moving forward, opening up new doors and doing new things because were curious. And curiosity keeps leading us down new paths.'),
(9, 108, 25, 'Falling down is a part of life but getting back up is living.'),
(10, 42, 8, 'Invention is the mother of too many useless toys.'),
(11, 105, 18, 'There are two possible outcomes: If the result confirms the hypothesis, then youve made a discovery. If the result is contrary to the hypothesis, then youve made a discovery.'),
(12, 150, 43, 'If we knew what it was we were doing, it would not be called research, would it?'),
(13, 86, 73, 'The most exciting phrase to hear in science, the one that heralds new discoveries, is not Eureka!, but Thats funny ... '),
(14, 116, 96, 'Not only is the Universe stranger than we think, it is stranger than we CAN think.'),
(15, 123, 34, 'Nothing happens until something moves.'),
(16, 17, 2, 'In the beginning there was nothing, which exploded.'),
(17, 147, 65, 'If you want to succeed in the world, you dont have to be much cleverer than other people. You just have to be one day earlier.'),
(18, 88, 90, 'In physics, you dont have to go around making trouble for yourself - Nature does it for you.'),
(19, 4, 38, 'Measure what can be measured, and make measurable what cannot be measured.'),
(20, 111, 70, 'Science is built up of facts, as a house is built of stones, but an accumulation of facts is no more science than a heap of stones a house.'),
(21, 146, 13, 'If you thought that science was certain - well, that is just an error on your part.'),
(22, 109, 5, 'In theory, there is no difference between theory and practice. But, in practice, there is.'),
(23, 24, 5, 'In order to make an apple pie from scratch, you must first create the universe.'),
(24, 142, 83, 'Lectures which really teach will never be popular; lectures which are popular will never really teach.'),
(25, 13, 64, 'Learn to pay attention, and there is nothing you cannot understand.'),
(26, 21, 15, 'I used to think it was awful that life was so unfair. '),
(27, 19, 35, 'Then I thought, Wouldnt it be much worse if life were fair, and all the terrible things that happen to us come because we actually deserve them? So now I take great comfort in the general hostility and unfairness of the universe.'),
(28, 15, 32, 'The illiterate of the 21st century will not be those who cannot read and write. The illiterate will be those who cannot learn, unlearn, and relearn.'),
(29, 59, 86, 'Progress is made by trial and failure; the failures are generally a hundred times more numerous than the successes'),
(30, 28, 95, 'Yet they are usually left unchronicled.'),
(31, 24, 14, 'The greater danger for most of us lies not in setting our aim too high and falling short'),
(32, 27, 28, 'But in setting our aim too low, and achieving our mark.'),
(33, 73, 7, 'The important thing is to not stop questioning. Curiosity has its own reason for existence.'),
(34, 139, 66, 'A society grows great when old men plant trees whose shade they know they shall never sit in.'),
(35, 128, 37, 'Some people have trouble holding their tongue, because they want you to know where they stand on it.'),
(36, 13, 31, 'A man who views the world the same at fifty as he did at twenty has wasted thirty years of his life. '),
(37, 88, 10, 'Human beings, who are almost unique in their ability to learn from the experiences of others, are also remarkable for their apparent disinclination to do so.'),
(38, 27, 100, 'You will never have a greater or lesser dominion than that over yourselfâ€¦'),
(39, 34, 4, 'Simplicity is the ultimate sophistication.'),
(40, 13, 69, 'Experience does not err. Only your judgments err by expecting from her what is not in her power.'),
(41, 149, 4, 'Physics is really nothing more than a search for ultimate simplicity, but so far all we have is a kind of elegant messiness.'),
(42, 92, 48, 'When I became a man I put away childish things, including the fear of childishness and the desire to be very grown up.'),
(43, 9, 28, 'Frankly, my dear, I dont give a damn. ...'),
(44, 48, 12, 'Im going to make him an offer he cant refuse. ...'),
(45, 147, 78, 'You dont understand! ...'),
(46, 133, 16, 'Toto, Ive got a feeling were not in Kansas anymore. ...'),
(47, 44, 91, 'Heres looking at you, kid. ...'),
(48, 115, 90, 'Go ahead, make my day. ...'),
(49, 87, 100, 'All right, Mr. ...'),
(50, 32, 73, 'May the Force be with you.'),
(51, 4, 3, 'When youre right, no one remembers. When youre wrong, no one forgets.'),
(52, 123, 80, 'Cheer up, the worst is yet to come.'),
(53, 19, 65, 'If you cant see the bright side of life, polish the dull side.'),
(54, 124, 86, 'Everybody wants to go to heaven, but nobody wants to die.'),
(55, 144, 69, 'I stopped fighting my inner demons, were on the same side now.'),
(56, 85, 51, 'Well-behaved women rarely make history.'),
(57, 135, 23, 'I would never die for my beliefs because I might be wrong.'),
(58, 20, 6, 'He who laughs last, didnt get it.'),
(59, 29, 39, 'We live in an age where pizza gets to your home before the police.'),
(60, 101, 77, 'Im an excellent housekeeper. Every time I get a divorce, I keep the house.'),
(61, 32, 56, 'Cheese . . . milks leap toward immortality.'),
(62, 46, 77, 'You have a cough? Go home tonight, eat a whole box of Ex-Lax. Tomorrow youll be afraid to cough.'),
(63, 12, 99, 'Hes so optimistic hed buy a burial suit with two pairs of pants.'),
(64, 8, 100, 'Half of the people in the world are below average.'),
(65, 60, 70, 'I could tell that my parents hated me. My bath toys were a toaster and a radio.'),
(66, 90, 76, 'A clear conscience is usually the sign of a bad memory.'),
(67, 133, 53, 'It is not my fault that I never learned to accept responsibility!'),
(68, 116, 40, 'Before marriage, a man yearns for the woman he loves. After marriage, the Y becomes silent.'),
(69, 117, 84, 'Advice is what we ask for when we already know the answer but wish we didnt.'),
(70, 68, 71, 'USA Today has come out with a new survey: Apparently three out of four people make up 75 percent of the population.'),
(71, 103, 9, 'Constipated people dont give a crap.'),
(72, 14, 29, 'Why does a slight tax increase cost you $200 and a substantial tax cut save you 30 cents?'),
(73, 86, 23, 'My wife made me join a bridge club. I jump off next Tuesday.'),
(74, 135, 88, 'Once you can accept the universe as matter expanding into nothing that is something, wearing stripes with plaid comes easy.'),
(75, 136, 95, 'A word to the wise aint necessary, it is the stupid ones who need all the advice.'),
(76, 113, 35, 'Chuck Norris frequently donates blood to the Red Cross. Just never his own.'),
(77, 78, 58, 'Middle age is when your age starts to show around your middle.'),
(78, 101, 33, 'Ham and eggsâ€”a days work for a chicken; a lifetime commitment for a pig.'),
(79, 90, 90, 'I am so clever that sometimes I dont understand a single word of what I am saying.'),
(80, 4, 11, 'When it comes to thought, some people stop at nothing.'),
(81, 144, 44, 'You have the right to remain silent. Anything you say will be misquoted, then used against you.'),
(82, 137, 2, 'If you cant live without me, why arent you dead yet?'),
(83, 114, 6, 'Id like to help you out. Which way did you come in?'),
(84, 10, 37, 'If you cant beat them, arrange to have them beaten.'),
(85, 66, 2, 'You couldnt get a clue during the clue-mating season in a field full of horny clues if you smeared your body with clue musk and did the clue mating dance.'),
(86, 126, 81, 'It is a damned poor mind indeed that cant think of at least two ways of spelling any word.'),
(87, 4, 59, 'In three words I can sum up everything Ive learned about life: It goes on.'),
(88, 149, 33, 'Human beings are the only creatures that allow their children to come back home.'),
(89, 20, 59, 'Horse sense is a good judgment which keeps horses from betting on people.'),
(90, 51, 83, 'I dont deserve this award, but I have arthritis and I dont deserve that either.'),
(91, 82, 25, 'Age is a question of mind over matter. If you dont mind, age dont matter.'),
(92, 123, 79, 'Happiness is having a large, loving, caring, close-knit family in another city.'),
(93, 22, 34, 'Dont tell me the sky is the limit when there are footprints on the moon.'),
(94, 137, 55, 'The sex was so good that even the neighbors had a cigarette.'),
(95, 41, 74, 'Why do psychics have to ask you for your name?'),
(96, 103, 49, 'I dont suffer from insanity, I enjoy every minute of it.'),
(97, 32, 26, 'I get enough exercise pushing my luck.'),
(98, 150, 64, 'Sometimes I wake up grumpy; other times I let her sleep.'),
(99, 134, 49, 'I want to die in my sleep like my grandfather . . . not screaming and yelling like the passengers in his car.'),
(100, 20, 33, 'We are Microsoft. Resistance is futile. You will be assimilated.'),
(101, 10, 20, 'The more people I meet, the more I like my dog.'),
(102, 95, 7, 'Youre just jealous because the voices only talk to me.'),
(103, 90, 94, 'I got a gun for my wifeâ€”best trade Ive ever made.'),
(104, 51, 53, 'Beauty is in the eye of the beer holder.'),
(105, 35, 38, 'To all you virgins, thanks for nothing.'),
(106, 126, 95, 'Beauty is a light switch away . . .'),
(107, 135, 74, 'The evening news is where they start by saying â€œgood evening,â€ and proceed by telling you why its not.'),
(108, 18, 16, 'There are three kinds of people in this world: those who can count and those who cant.'),
(109, 109, 31, 'When life hands you lemons, make lemonade, find the person that life handed vodka to, and have a party.'),
(110, 38, 54, 'if Barbie is so popular then why do we buy her friends and boyfriends?'),
(111, 130, 26, 'God created the world, everything else is made in China.'),
(112, 7, 76, 'Before you criticize someone, walk a mile in their shoes. That way, youll be a mile from them, and youll have their shoes.'),
(113, 133, 77, 'Why do they sterilize the needles for lethal injections?'),
(114, 137, 8, 'Practice doesnt make perfect. Perfect practice makes perfect.'),
(115, 82, 26, 'Those who throw dirt only lose ground.'),
(116, 68, 81, 'You never truly understand something unless you can explain it to your grandmother.'),
(117, 146, 68, 'Error. No keyboard. Press F1 to continue.'),
(118, 112, 67, 'Experience is what you get when you didnt get what you wanted.'),
(119, 59, 41, 'Birthdays are good for you. Statistics show that people who have the most live the longest.'),
(120, 76, 2, 'hey occifer i swear to drunk im not as god as you think i am.'),
(121, 123, 92, 'This sentence is a lie.'),
(122, 27, 50, 'Men are like parking stalls. All the good ones are taken and the rest are handicapped!'),
(123, 23, 78, 'Change is good, but dollars are better.'),
(124, 114, 58, 'How is it that â€œfat chanceâ€ and â€œslim chanceâ€ mean the same thing?'),
(125, 56, 63, '1492: Native Americans discover Columbus lost at sea.'),
(126, 81, 58, 'Laugh and the world laughs with you. Cry and the world laughs harder.'),
(127, 145, 12, 'Everyone hates me because Im paranoid.'),
(128, 26, 24, 'Solution to two of the worlds problem: feed the homeless to the hungry.'),
(129, 105, 16, 'You laugh because Im different, I laugh because I just farted!'),
(130, 83, 100, 'Whoever said nothing is impossible never tried slamming a revolving door!'),
(131, 88, 37, 'Silence is golden, but duck tape is silver.'),
(132, 130, 75, 'When life gives you melons . . . you might be dyslexic.'),
(133, 28, 49, 'Theres no I in team, but there is in win.'),
(134, 79, 60, 'Those who criticize our generation seem to forget who raised it!'),
(135, 106, 98, 'Man who goes to bed with an itchy butt . . . wakes up with a stinky finger!'),
(136, 149, 4, 'Children in the back seat cause accidents, accidents in the back seat cause children!'),
(137, 37, 26, 'The only good thing about going bra-less at my age is that it pulls the wrinkles right out of my face.'),
(138, 12, 29, 'How do you know when you are too drunk to drive? When you swerve to miss a tree . . . and then realize it was your air-freshener.'),
(139, 109, 64, 'Its true that we dont know what weve got until we lose it, but its also true that we dont know what weve been missing until it arrives.'),
(140, 56, 24, 'The only way to keep your health is to eat what you dont want, drink what you dont like, and do what youd rather not. â€”Mark Twain'),
(141, 48, 71, 'The average woman would rather have beauty than brains, because the average man can see better than he can think.'),
(142, 144, 15, 'One of the great things about books is sometimes there are some fantastic pictures. â€”George W. Bush'),
(143, 18, 47, 'Always remember: youre unique, just like everyone else.'),
(144, 54, 8, 'The road to success is always under construction.'),
(145, 115, 86, 'Where there is a will, there are 500 relatives.'),
(146, 99, 70, 'Wear short sleeves. Support your right to bare arms!'),
(147, 91, 75, 'When everythings coming your way, youre in the wrong lane.'),
(148, 93, 59, 'Join The Army. Visit exotic places, meet strange people, then kill them.'),
(149, 147, 69, 'I poured spot remover on my dog. Now hes gone.'),
(150, 108, 89, 'Death is hereditary.'),
(400, 2, 3, 'Young Sexy mothafucka'),
(401, 151, 1, 'Dark chocolate. Young sexy mothafucka'),
(402, 151, 1, 'Testing comment'),
(403, 151, 1, 'Testing comment'),
(404, 33, 117, 'dd'),
(405, 33, 117, 'dd'),
(406, 33, 117, 'dd'),
(407, 33, 117, 'dd'),
(408, 33, 117, 'dd'),
(409, 33, 117, 'asdasd'),
(410, 33, 117, 'dasd'),
(411, 33, 117, 'asdsad'),
(412, 33, 117, 'ddd'),
(413, 33, 117, 'ddd'),
(414, 33, 117, 'Testing Aiaia'),
(415, 33, 117, 'Testing reset'),
(416, 4, 117, 'ddd'),
(421, 33, 117, 'Why wont you add'),
(422, 33, 117, 'New test'),
(429, 33, 117, '34567890'),
(430, 33, 117, 'HalloZohaib'),
(434, 33, 117, '23546743'),
(435, 151, 117, 'ftitte'),
(436, 151, 117, 'AZohaib'),
(437, 151, 117, 'sd'),
(438, 151, 117, 'asdasdasd'),
(439, 152, 117, 'zohaib'),
(440, 153, 117, 'Abcdefghijkl\r\nPÃ… dd'),
(441, 152, 117, 'kdshcjsdhcas'),
(442, 157, 117, 'ittadi'),
(443, 157, 117, 'ZOhaib test'),
(444, 153, 117, 'asdasdasd'),
(445, 152, 117, 'asdasdasd'),
(446, 151, 119, 'hdhd'),
(447, 152, 119, 'ss'),
(448, 151, 119, 'dd'),
(449, 155, 119, 'Dette var uetisk'),
(450, 158, 119, 'ddd');

-- --------------------------------------------------------

--
-- Table structure for table `Post`
--

CREATE TABLE `Post` (
  `id` int(11) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `userId` int(11) NOT NULL,
  `topicId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Post`
--

INSERT INTO `Post` (`id`, `body`, `userId`, `topicId`) VALUES
(1, 'If a man dwells on the past, then he robs the present. But if a man ignores the past, he may rob the future.', 57, 13),
(2, 'I seek not to know the answers, but to understand the questions.', 24, 23),
(3, 'Repent! The end is coming, $9.95 at Amazon.', 69, 6),
(4, 'Its  kind of fun to do the impossible.', 24, 19),
(5, 'What you try to do is to be brilliant more often than you are an idiot.', 5, 9),
(6, 'I have long felt that the way to keep children out of trouble is to keep them interested in things.', 15, 8),
(7, 'O! Youth! What a pain in the backside.', 33, 3),
(8, 'We keep moving forward, opening up new doors and doing new things because were curious. And curiosity keeps leading us down new paths.', 70, 5),
(9, 'Falling down is a part of life but getting back up is living.', 25, 15),
(10, 'Invention is the mother of too many useless toys.', 8, 17),
(11, 'There are two possible outcomes: If the result confirms the hypothesis, then youve made a discovery. If the result is contrary to the hypothesis, then youve made a discovery.', 18, 9),
(12, 'If we knew what it was we were doing, it would not be called research, would it?', 43, 24),
(13, 'The most exciting phrase to hear in science, the one that heralds new discoveries, is not Eureka!, but Thats funny ... ', 73, 21),
(14, 'Not only is the Universe stranger than we think, it is stranger than we CAN think.', 96, 18),
(15, 'Nothing happens until something moves.', 34, 28),
(16, 'In the beginning there was nothing, which exploded.', 2, 28),
(17, 'If you want to succeed in the world, you dont have to be much cleverer than other people. You just have to be one day earlier.', 65, 26),
(18, 'In physics, you dont have to go around making trouble for yourself - Nature does it for you.', 90, 6),
(19, 'Measure what can be measured, and make measurable what cannot be measured.', 38, 1),
(20, 'Science is built up of facts, as a house is built of stones, but an accumulation of facts is no more science than a heap of stones a house.', 70, 16),
(21, 'If you thought that science was certain - well, that is just an error on your part.', 13, 15),
(22, 'In theory, there is no difference between theory and practice. But, in practice, there is.', 5, 26),
(23, 'In order to make an apple pie from scratch, you must first create the universe.', 5, 2),
(24, 'Lectures which really teach will never be popular; lectures which are popular will never really teach.', 83, 11),
(25, 'Learn to pay attention, and there is nothing you cannot understand.', 64, 1),
(26, 'I used to think it was awful that life was so unfair. ', 15, 24),
(27, 'Then I thought, Wouldnt it be much worse if life were fair, and all the terrible things that happen to us come because we actually deserve them? So now I take great comfort in the general hostility and unfairness of the universe.', 35, 18),
(28, 'The illiterate of the 21st century will not be those who cannot read and write. The illiterate will be those who cannot learn, unlearn, and relearn.', 32, 22),
(29, 'Progress is made by trial and failure; the failures are generally a hundred times more numerous than the successes', 86, 13),
(30, 'Yet they are usually left unchronicled.', 95, 1),
(31, 'The greater danger for most of us lies not in setting our aim too high and falling short', 14, 24),
(32, 'But in setting our aim too low, and achieving our mark.', 28, 10),
(33, 'The important thing is to not stop questioning. Curiosity has its own reason for existence.', 7, 4),
(34, 'A society grows great when old men plant trees whose shade they know they shall never sit in.', 66, 23),
(35, 'Some people have trouble holding their tongue, because they want you to know where they stand on it.', 37, 11),
(36, 'A man who views the world the same at fifty as he did at twenty has wasted thirty years of his life. ', 31, 3),
(37, 'Human beings, who are almost unique in their ability to learn from the experiences of others, are also remarkable for their apparent disinclination to do so.', 10, 13),
(38, 'You will never have a greater or lesser dominion than that over yourselfâ€¦', 100, 23),
(39, 'Simplicity is the ultimate sophistication.', 4, 9),
(40, 'Experience does not err. Only your judgments err by expecting from her what is not in her power.', 69, 5),
(41, 'Physics is really nothing more than a search for ultimate simplicity, but so far all we have is a kind of elegant messiness.', 4, 13),
(42, 'When I became a man I put away childish things, including the fear of childishness and the desire to be very grown up.', 48, 25),
(43, 'Frankly, my dear, I dont give a damn. ...', 28, 4),
(44, 'Im going to make him an offer he cant refuse. ...', 12, 29),
(45, 'You dont understand! ...', 78, 3),
(46, 'Toto, Ive got a feeling were not in Kansas anymore. ...', 16, 11),
(47, 'Heres looking at you, kid. ...', 91, 12),
(48, 'Go ahead, make my day. ...', 90, 7),
(49, 'All right, Mr. ...', 100, 7),
(50, 'May the Force be with you.', 73, 28),
(51, 'When youre right, no one remembers. When youre wrong, no one forgets.', 3, 24),
(52, 'Cheer up, the worst is yet to come.', 80, 26),
(53, 'If you cant see the bright side of life, polish the dull side.', 65, 27),
(54, 'Everybody wants to go to heaven, but nobody wants to die.', 86, 30),
(55, 'I stopped fighting my inner demons, were on the same side now.', 69, 4),
(56, 'Well-behaved women rarely make history.', 51, 8),
(57, 'I would never die for my beliefs because I might be wrong.', 23, 9),
(58, 'He who laughs last, didnt get it.', 6, 26),
(59, 'We live in an age where pizza gets to your home before the police.', 39, 26),
(60, 'Im an excellent housekeeper. Every time I get a divorce, I keep the house.', 77, 23),
(61, 'Cheese . . . milks leap toward immortality.', 56, 16),
(62, 'You have a cough? Go home tonight, eat a whole box of Ex-Lax. Tomorrow youll be afraid to cough.', 77, 17),
(63, 'Hes so optimistic hed buy a burial suit with two pairs of pants.', 99, 30),
(64, 'Half of the people in the world are below average.', 100, 3),
(65, 'I could tell that my parents hated me. My bath toys were a toaster and a radio.', 70, 12),
(66, 'A clear conscience is usually the sign of a bad memory.', 76, 27),
(67, 'It is not my fault that I never learned to accept responsibility!', 53, 17),
(68, 'Before marriage, a man yearns for the woman he loves. After marriage, the Y becomes silent.', 40, 27),
(69, 'Advice is what we ask for when we already know the answer but wish we didnt.', 84, 22),
(70, 'USA Today has come out with a new survey: Apparently three out of four people make up 75 percent of the population.', 71, 4),
(71, 'Constipated people dont give a crap.', 9, 24),
(72, 'Why does a slight tax increase cost you $200 and a substantial tax cut save you 30 cents?', 29, 1),
(73, 'My wife made me join a bridge club. I jump off next Tuesday.', 23, 6),
(74, 'Once you can accept the universe as matter expanding into nothing that is something, wearing stripes with plaid comes easy.', 88, 30),
(75, 'A word to the wise aint necessary, it is the stupid ones who need all the advice.', 95, 30),
(76, 'Chuck Norris frequently donates blood to the Red Cross. Just never his own.', 35, 19),
(77, 'Middle age is when your age starts to show around your middle.', 58, 6),
(78, 'Ham and eggsâ€”a days work for a chicken; a lifetime commitment for a pig.', 33, 7),
(79, 'I am so clever that sometimes I dont understand a single word of what I am saying.', 90, 28),
(80, 'When it comes to thought, some people stop at nothing.', 11, 4),
(81, 'You have the right to remain silent. Anything you say will be misquoted, then used against you.', 44, 11),
(82, 'If you cant live without me, why arent you dead yet?', 2, 17),
(83, 'Id like to help you out. Which way did you come in?', 6, 9),
(84, 'If you cant beat them, arrange to have them beaten.', 37, 17),
(85, 'You couldnt get a clue during the clue-mating season in a field full of horny clues if you smeared your body with clue musk and did the clue mating dance.', 2, 12),
(86, 'It is a damned poor mind indeed that cant think of at least two ways of spelling any word.', 81, 4),
(87, 'In three words I can sum up everything Ive learned about life: It goes on.', 59, 18),
(88, 'Human beings are the only creatures that allow their children to come back home.', 33, 22),
(89, 'Horse sense is a good judgment which keeps horses from betting on people.', 59, 18),
(90, 'I dont deserve this award, but I have arthritis and I dont deserve that either.', 83, 10),
(91, 'Age is a question of mind over matter. If you dont mind, age dont matter.', 25, 27),
(92, 'Happiness is having a large, loving, caring, close-knit family in another city.', 79, 28),
(93, 'Dont tell me the sky is the limit when there are footprints on the moon.', 34, 21),
(94, 'The sex was so good that even the neighbors had a cigarette.', 55, 30),
(95, 'Why do psychics have to ask you for your name?', 74, 4),
(96, 'I dont suffer from insanity, I enjoy every minute of it.', 49, 15),
(97, 'I get enough exercise pushing my luck.', 26, 24),
(98, 'Sometimes I wake up grumpy; other times I let her sleep.', 64, 18),
(99, 'I want to die in my sleep like my grandfather . . . not screaming and yelling like the passengers in his car.', 49, 10),
(100, 'We are Microsoft. Resistance is futile. You will be assimilated.', 33, 24),
(101, 'The more people I meet, the more I like my dog.', 20, 3),
(102, 'Youre just jealous because the voices only talk to me.', 7, 10),
(103, 'I got a gun for my wifeâ€”best trade Ive ever made.', 94, 26),
(104, 'Beauty is in the eye of the beer holder.', 53, 29),
(105, 'To all you virgins, thanks for nothing.', 38, 13),
(106, 'Beauty is a light switch away . . .', 95, 17),
(107, 'The evening news is where they start by saying â€œgood evening,â€ and proceed by telling you why its not.', 74, 8),
(108, 'There are three kinds of people in this world: those who can count and those who cant.', 16, 14),
(109, 'When life hands you lemons, make lemonade, find the person that life handed vodka to, and have a party.', 31, 22),
(110, 'if Barbie is so popular then why do we buy her friends and boyfriends?', 54, 15),
(111, 'God created the world, everything else is made in China.', 26, 30),
(112, 'Before you criticize someone, walk a mile in their shoes. That way, youll be a mile from them, and youll have their shoes.', 76, 23),
(113, 'Why do they sterilize the needles for lethal injections?', 77, 27),
(114, 'Practice doesnt make perfect. Perfect practice makes perfect.', 8, 25),
(115, 'Those who throw dirt only lose ground.', 26, 11),
(116, 'You never truly understand something unless you can explain it to your grandmother.', 81, 8),
(117, 'Error. No keyboard. Press F1 to continue.', 68, 22),
(118, 'Experience is what you get when you didnt get what you wanted.', 67, 19),
(119, 'Birthdays are good for you. Statistics show that people who have the most live the longest.', 41, 16),
(120, 'hey occifer i swear to drunk im not as god as you think i am.', 2, 24),
(121, 'This sentence is a lie.', 92, 20),
(122, 'Men are like parking stalls. All the good ones are taken and the rest are handicapped!', 50, 13),
(123, 'Change is good, but dollars are better.', 78, 20),
(124, 'How is it that â€œfat chanceâ€ and â€œslim chanceâ€ mean the same thing?', 58, 5),
(125, '1492: Native Americans discover Columbus lost at sea.', 63, 2),
(126, 'Laugh and the world laughs with you. Cry and the world laughs harder.', 58, 9),
(127, 'Everyone hates me because Im paranoid.', 12, 14),
(128, 'Solution to two of the worlds problem: feed the homeless to the hungry.', 24, 22),
(129, 'You laugh because Im different, I laugh because I just farted!', 16, 14),
(130, 'Whoever said nothing is impossible never tried slamming a revolving door!', 100, 17),
(131, 'Silence is golden, but duck tape is silver.', 37, 5),
(132, 'When life gives you melons . . . you might be dyslexic.', 75, 8),
(133, 'Theres no I in team, but there is in win.', 49, 18),
(134, 'Those who criticize our generation seem to forget who raised it!', 60, 11),
(135, 'Man who goes to bed with an itchy butt . . . wakes up with a stinky finger!', 98, 26),
(136, 'Children in the back seat cause accidents, accidents in the back seat cause children!', 4, 4),
(137, 'The only good thing about going bra-less at my age is that it pulls the wrinkles right out of my face.', 26, 12),
(138, 'How do you know when you are too drunk to drive? When you swerve to miss a tree . . . and then realize it was your air-freshener.', 29, 13),
(139, 'Its true that we dont know what weve got until we lose it, but its also true that we dont know what weve been missing until it arrives.', 64, 7),
(140, 'The only way to keep your health is to eat what you dont want, drink what you dont like, and do what youd rather not. â€”Mark Twain', 24, 26),
(141, 'The average woman would rather have beauty than brains, because the average man can see better than he can think.', 71, 5),
(142, 'One of the great things about books is sometimes there are some fantastic pictures. â€”George W. Bush', 15, 27),
(143, 'Always remember: youre unique, just like everyone else.', 47, 25),
(144, 'The road to success is always under construction.', 8, 12),
(145, 'Where there is a will, there are 500 relatives.', 86, 6),
(146, 'Wear short sleeves. Support your right to bare arms!', 70, 23),
(147, 'When everythings coming your way, youre in the wrong lane.', 75, 4),
(148, 'Join The Army. Visit exotic places, meet strange people, then kill them.', 59, 7),
(149, 'I poured spot remover on my dog. Now hes gone.', 69, 28),
(150, 'Death is hereditary.', 89, 19),
(151, 'Test', 117, 33),
(152, 'dd', 117, 33),
(153, 'dddd', 117, 33),
(154, 'ddd', 117, 33),
(155, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 117, 33),
(156, 'ddd', 117, 33),
(157, 'Zohaibtest', 117, 33),
(158, '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 119, 33),
(185, '\r\n\r\n', 119, 33),
(186, '\r\n\r\n', 119, 33),
(187, 'dd\r\n\r\nd', 119, 33),
(188, '\r\n\r\n', 119, 33),
(189, 'dddd\r\n\r\nd\r\nd\r\nd\r\nd\r\n\r\ndd', 119, 33);

-- --------------------------------------------------------

--
-- Table structure for table `Topic`
--

CREATE TABLE `Topic` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` varchar(500) NOT NULL,
  `userID` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Topic`
--

INSERT INTO `Topic` (`id`, `title`, `body`, `userID`, `categoryId`) VALUES
(1, 'When you were younger, what did you want to be whe', 'If a man dwells on the past, then he robs the present. But if a man ignores the past, he may rob the future.', 91, 7),
(2, 'What are one of your pet peeves?', 'I seek not to know the answers, but to understand the questions.', 67, 1),
(3, 'Do you have a favorite animal, if so what is it?', 'Repent! The end is coming, $9.95 at Amazon.', 75, 7),
(4, 'If you could live anywhere in the world, where wou', 'Its  kind of fun to do the impossible.', 14, 5),
(5, 'What is your favorite hairstyle on a man?', 'What you try to do is to be brilliant more often than you are an idiot.', 51, 7),
(6, 'Who is the hottest celebrity?', 'I have long felt that the way to keep children out of trouble is to keep them interested in things.', 96, 4),
(7, 'What do you think about romance?', 'O! Youth! What a pain in the backside.', 41, 7),
(8, 'What is your favorite designer brand?', 'We keep moving forward, opening up new doors and doing new things because were curious. And curiosity keeps leading us down new paths.', 79, 2),
(9, 'What kind of workout routine do you enjoy?', 'Falling down is a part of life but getting back up is living.', 95, 5),
(10, 'Do you have a favorite song, if so what is it?', 'Invention is the mother of too many useless toys.', 22, 5),
(11, 'How would you spend one million dollars?', 'There are two possible outcomes: If the result confirms the hypothesis, then youâ€™ve made a discovery. If the result is contrary to the hypothesis, then youâ€™ve made a discovery.', 77, 3),
(12, 'Which would you choose: money, or love?', 'If we knew what it was we were doing, it would not be called research, would it?', 60, 4),
(13, 'How do you want people to remember you now and whe', 'The most exciting phrase to hear in science, the one that heralds new discoveries, is not Eureka!, but Thats funny ... ', 54, 5),
(14, 'Have you done anything overly extreme this year?', 'Not only is the Universe stranger than we think, it is stranger than we CAN think.', 36, 2),
(15, 'What is your favorite day and why?', 'In the beginning there was nothing, which exploded.', 43, 3),
(16, 'If you could be anyone for a day (dead or alive) w', 'If you want to succeed in the world, you dont have to be much cleverer than other people. You just have to be one day earlier.', 74, 3),
(17, 'What is your biggest wish for this year?', 'In physics, you dont have to go around making trouble for yourself - Nature does it for you.', 40, 2),
(18, 'What is your favorite novel?', 'Measure what can be measured, and make measurable what cannot be measured.', 10, 3),
(19, 'Do you have any regrets about the past?', 'Science is built up of facts, as a house is built of stones, but an accumulation of facts is no more science than a heap of stones a house.', 43, 8),
(20, 'Do you believe in evolution or religion?', 'If you thought that science was certain - well, that is just an error on your part.', 71, 1),
(21, 'What is your favorite ice cream flavor?', 'In theory, there is no difference between theory and practice. But, in practice, there is.', 28, 8),
(22, 'If you could change one facial feature, what would', 'In order to make an apple pie from scratch, you must first create the universe.', 94, 4),
(23, 'What would you do in a world war situation?', 'Lectures which really teach will never be popular; lectures which are popular will never really teach.', 37, 6),
(24, 'If you could walk chose an actor to play you as a ', 'Learn to pay attention, and there is nothing you cannot understand.', 65, 2),
(25, 'Have you ever tried dating online?', 'I used to think it was awful that life was so unfair. ', 99, 7),
(26, 'What is your favorite childhood memory?', 'The illiterate of the 21st century will not be those who cannot read and write. The illiterate will be those who cannot learn, unlearn, and relearn.', 47, 1),
(27, 'Who are 3 of your biggest inspirations?', 'The greater danger for most of us lies not in setting our aim too high and falling short', 83, 8),
(28, 'What is the worst thing that could happen to you o', 'But in setting our aim too low, and achieving our mark.', 10, 1),
(29, 'If there is hair in your food in a restaurant, wha', 'The important thing is to not stop questioning. Curiosity has its own reason for existence.', 18, 1),
(30, 'If you were a flower, what type would you be?', 'A society grows great when old men plant trees whose shade they know they shall never sit in.', 4, 5),
(32, 'Yo', 'Yoyoy', 117, 1),
(33, 'Yo', 'Yoyoy', 117, 1);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `username`, `password`, `email`, `name`, `surname`, `active`, `admin`) VALUES
(1, 'iluvmen', '_y1oCCNPhI', 'Yoram75@gmail.com', 'Yoram', 'Sarahbel', 0, 0),
(2, 'Inmate', '1McpPrUc22', 'Kershaw68@online.com', 'Kershaw', 'Ikwuegbe', 0, 0),
(3, 'idontknow', 'tCfdirXAmu', 'Tajsha87@hotmail.com', 'Tajsha', 'Marshanna', 0, 0),
(4, 'lostmypassword', 'TMApWeos8v', 'Sedoc76@gmail.com', 'Sedoc', 'Templeton', 0, 0),
(5, 'kizzmybutt', '_CKjeD1HOE', 'Annale76@online.com', 'Annale', 'Berna', 0, 0),
(6, 'hairygrape', 'GIjkbqGxaK', 'Conesford79@hotmail.com', 'Conesford', 'Rumsa', 0, 0),
(7, 'Poker_Star', 'V1-7vOnSI_', 'Rozelyn75@gmail.com', 'Rozelyn', 'Kamenko', 0, 0),
(8, 'hatedhail', 'yt6goR90Z2', 'Cokle69@online.com', 'Cokle', 'Couple', 0, 0),
(9, 'manukawebsite', 'rC2D0uME2R', 'Comico95@hotmail.com', 'Comico', 'Abenet', 0, 0),
(10, 'moldyyearling', 'LJsgRjeNPS', 'Gajdek88@gmail.com', 'Gajdek', 'Mierzejewski', 0, 0),
(11, 'lecturecastar', 'J5VppS4znX', 'ÃÃ±igo86@online.com', 'ÃÃ±igo', 'Renessta', 0, 0),
(12, 'cangerlambda', 'HbduJwsaVP', 'Kereta78@hotmail.com', 'Kereta', 'Dabija', 0, 0),
(13, 'diamondxyloid', 'i2-oJ18bOa', 'Shamil97@gmail.com', 'Shamil', 'GentarÃ´', 0, 0),
(14, 'passivekalman', 'Mziiz49P_Z', 'Brakefield78@online.com', 'Brakefield', 'Pini', 0, 0),
(15, 'bapesbikini', 'NW_SLKQFSt', 'Calhecia75@hotmail.com', 'Calhecia', 'January', 0, 0),
(16, 'prusikcanoe', 'iOigk1pJVW', 'Parastui98@gmail.com', 'Parastui', 'Tostivint', 0, 0),
(17, 'Playboyize', 'bXmM0rzk5o', 'Jocelan98@gmail.com', 'Jocelan', 'Monaj', 0, 0),
(18, 'Gigastrength', '-rIA37mSu5', 'Lahooti97@online.com', 'Lahooti', 'Castelino', 0, 0),
(19, 'Deadlyinx', 'WO_LN4M-EL', 'Soheil88@hotmail.com', 'Soheil', 'Takahashi', 0, 0),
(20, 'Techpill', 'X_ZBOWDgmh', 'Beinert56@gmail.com', 'Beinert', 'Cailloux', 0, 0),
(21, 'Methshot', 'PWNk9dg5vh', 'Lil65@online.com', 'Lil', 'Maurine', 0, 0),
(22, 'Methnerd', '-_rfGmTu9N', 'Rusthy65@hotmail.com', 'Rusthy', 'Crisosto', 0, 0),
(23, 'TreeEater', 'gdR9q2gLYu', 'Faaiz97@gmail.com', 'Faaiz', 'Bienvenido', 0, 0),
(24, 'PackManBrainlure', 'pTiUSVub7b', 'Penas59@online.com', 'Penas', 'Dunniway', 0, 0),
(25, 'Carnalpleasure', 'QTbwdQEq6M', 'Debla78@hotmail.com', 'Debla', 'Hiram', 0, 0),
(26, 'Sharpcharm', 'nR2h-pQKOW', 'Feichtmeier97@gmail.com', 'Feichtmeier', 'Kloester', 0, 0),
(27, 'Snarelure', 't6yN7A99I0', 'Tavares66@online.com', 'Tavares', 'Malgorzata', 0, 0),
(28, 'Skullbone', 'ynrDll29Df', 'Ahmanson87@hotmail.com', 'Ahmanson', 'Russikoff', 0, 0),
(29, 'Burnblaze', 'iFn37DMOv5', 'Kalona86@gmail.com', 'Kalona', 'Yordanka', 0, 0),
(30, 'Emberburn', 'HzopdgRg2w', 'Herkt98@online.com', 'Herkt', 'Pieres', 0, 0),
(31, 'Emberfire', 'ORne5hCc7a', 'Crystiane95@hotmail.com', 'Crystiane', 'Ratomir', 0, 0),
(32, 'Evilember', 'Z3DbJtxp0m', 'Digital89@gmail.com', 'Digital', 'Hugoson', 0, 0),
(33, 'Firespawn', 'j91A6pgx5X', 'Ausseer67@online.com', 'Ausseer', 'Noritake', 0, 0),
(34, 'Flameblow', 'zQrmrKUS-x', 'Tica95@hotmail.com', 'Tica', 'FiÃºza', 0, 0),
(35, 'SniperGod', 'Th-eouvfhN', 'Alini66@gmail.com', 'Alini', 'Dostlar', 0, 0),
(36, 'TalkBomber', 'yzi3pnlt6D', 'Senno78@online.com', 'Senno', 'Whittenburg', 0, 0),
(37, 'SniperWish', 'yOFkphL0KH', 'Aaran59@hotmail.com', 'Aaran', 'Taniel', 0, 0),
(38, 'RavySnake', 'TGEbOUBF6U', 'Calaway95@gmail.com', 'Calaway', 'Olybiou', 0, 0),
(39, 'WebTool', '8Cl2aI_uFh', 'Dionisis59@online.com', 'Dionisis', 'Yule', 0, 0),
(40, 'TurtleCat', 'CAV_qtT2cd', 'Lastowka59@hotmail.com', 'Lastowka', 'Aaglan', 0, 0),
(41, 'BlogWobbles', 'Cou4s_F0qj', 'Isinsu79@gmail.com', 'Isinsu', 'EncarnaciÃ³n', 0, 0),
(42, 'LuckyDusty', '85XmKJ04FD', 'Garayalde76@online.com', 'Garayalde', 'Rumeli', 0, 0),
(43, 'RumChicken', '6hL0uM67Lu', 'Jaden85@hotmail.com', 'Jaden', 'Bim', 0, 0),
(44, 'StonedTime', '4pa24WmpLo', 'Lakewood79@gmail.com', 'Lakewood', 'Azagury', 0, 0),
(45, 'CouchChiller', 'tmpmu83cYb', 'Anneline96@online.com', 'Anneline', 'Daksha', 0, 0),
(46, 'VisualMaster', 'zQ8RxPJJcF', 'Mikalson88@hotmail.com', 'Mikalson', 'Ferdman', 0, 0),
(47, 'DeathDog', 'tB-B94CeWX', 'Keti67@gmail.com', 'Keti', 'Kenya', 0, 0),
(48, 'ZeroReborn', 'BX6-hrYK7a', 'Sugimoto65@online.com', 'Sugimoto', 'Gadhia', 0, 0),
(49, 'TechHater', '6-PJlFOBnF', 'Magomed78@hotmail.com', 'Magomed', 'Gerleen', 0, 0),
(50, 'eGremlin', '-eD8CBUXok', 'Bloxson55@gmail.com', 'Bloxson', 'Amberger', 0, 0),
(51, 'BinaryMan', 'KZ3kRWYX4D', 'Evita65@online.com', 'Evita', 'Bob', 0, 0),
(52, 'AwesomeTucker', 't0tMAmw82n', 'Chorot77@hotmail.com', 'Chorot', 'Shearmur', 0, 0),
(53, 'FastChef', 'E2D4TXnMjK', 'Elham87@gmail.com', 'Elham', 'Jakey', 0, 0),
(54, 'JunkTop', 'I29hcPsJyI', 'Salomaa56@online.com', 'Salomaa', 'Canayes', 0, 0),
(55, 'PurpleCharger', 'n9-P_N0EXY', 'Yuefang66@hotmail.com', 'Yuefang', 'Akanae', 0, 0),
(56, 'CodeBuns', 'xrRQHJaDCh', 'Siepert78@gmail.com', 'Siepert', 'Swoboda', 0, 0),
(57, 'BunnyJinx', 'ndVctLm2NN', 'Hasnul88@online.com', 'Hasnul', 'Yoshiichi', 0, 0),
(58, 'GoogleCat', 'Dc7WEVkt8I', 'Frisius67@hotmail.com', 'Frisius', 'Grouws', 0, 0),
(59, 'StrangeWizard', 'Bvm_0zdCzy', 'Tribhuvan66@gmail.com', 'Tribhuvan', 'Fanie', 0, 0),
(60, 'Fuzzy_Logic', 'XjRr0Aht4y', 'Himot76@online.com', 'Himot', 'Sunaitis', 0, 0),
(61, 'New_Cliche', 'K-or-1vCFh', 'Senko88@hotmail.com', 'Senko', 'Silken', 0, 0),
(62, 'Ignoramus', '2FAcRQoJzV', 'Hellard97@gmail.com', 'Hellard', 'Berruccini', 0, 0),
(63, 'Stupidasole', 'W_TonYP9l5', 'Foto68@online.com', 'Foto', 'Phile', 0, 0),
(64, 'whereismyname', 'Fe-J9JvQWJ', 'Zhiganova89@hotmail.com', 'Zhiganova', 'Boother', 0, 0),
(65, 'Nojokur', 'fvQiTYAGRr', 'Jezset86@gmail.com', 'Jezset', 'Faruk', 0, 0),
(66, 'Illusionz', 'IyfzAyZyrG', 'Labritain69@online.com', 'Labritain', 'Frege', 0, 0),
(67, 'Spazyfool', 'uhUox_OT4-', 'Jubal88@hotmail.com', 'Jubal', 'Durbin', 0, 0),
(68, 'Supergrass', 'uhFyIm6Uea', 'Mceveety86@gmail.com', 'Mceveety', 'Lemkin', 0, 0),
(69, 'Dreamworx', 'qJypU5_yD1', 'Googy87@online.com', 'Googy', 'Tities', 0, 0),
(70, 'Fried_Sushi', 'SBL0SbwNFy', 'Anneta59@hotmail.com', 'Anneta', 'Kishioka', 0, 0),
(71, 'Stark_Naked', 'xgunB__IVr', 'Sharellis97@gmail.com', 'Sharellis', 'Vivlei', 0, 0),
(72, 'Need_TLC', 'lMfhyVIHiE', 'Bhone96@online.com', 'Bhone', 'Esquide', 0, 0),
(73, 'Raving_Cute', 'eUxD5mX50d', 'Ambar97@hotmail.com', 'Ambar', 'Maryssa', 0, 0),
(74, 'Nude_Bikergirl', 'FY4ano_WMK', 'Numazawa57@gmail.com', 'Numazawa', 'Geraki', 0, 0),
(75, 'Lunatick', 'gUfeL7qOKy', 'Iassen76@online.com', 'Iassen', 'Hoyland', 0, 0),
(76, 'Garbage', 'Cichocki	Gebele59@ho', 'Gebele', 'Can', 'Lid', 0, 0),
(77, 'Crazy_Nice', 'ii8QZDeEUb', 'Edrelita76@gmail.com', 'Edrelita', 'Malthe', 0, 0),
(78, 'Booteefool', 'hqGQQMmdzH', 'Adamescu75@online.com', 'Adamescu', 'Matalone', 0, 0),
(79, 'Harmless_Venom', 'iY8-ZZP-x2', 'Sungchol75@hotmail.com', 'Sungchol', 'Aariana', 0, 0),
(80, 'Lord_Tryzalot', 'HYi26Rxrj2', 'Decilian67@gmail.com', 'Decilian', 'Beecroft', 0, 0),
(81, 'Sir_Gallonhead', '6ksP5fNdLR', 'Schoeman79@online.com', 'Schoeman', 'Ipek', 0, 0),
(82, 'Boy_vs_Girl', 'ZDJ-AFBzXQ', 'Sardelli66@hotmail.com', 'Sardelli', 'Rukov', 0, 0),
(83, 'MPmaster', '5QsxhAYlu4', 'Sparky66@gmail.com', 'Sparky', 'Akimasa', 0, 0),
(84, 'King_Martha', 'dBeCLyUeKV', 'Fenlason66@online.com', 'Fenlason', 'Sarrau', 0, 0),
(85, 'Spamalot', 'mTQsLSY99f', 'Naima98@hotmail.com', 'Naima', 'Breathe', 0, 0),
(86, 'Soft_member', 'RfWo3vV85R', 'Cekic67@gmail.com', 'Cekic', 'Arters', 0, 0),
(87, 'girlDog', 'TojNuKK-F6', 'Paddi58@online.com', 'Paddi', 'Shalamar', 0, 0),
(88, 'Evil_kitten', 'jjBCneLnx_', 'Mezzena95@hotmail.com', 'Mezzena', 'Pappe', 0, 0),
(89, 'farquit', 'mkC784iDmi', 'Baishuang96@gmail.com', 'Baishuang', 'Vimala', 0, 0),
(90, 'viagrandad', '_5v75CaCmM', 'Rembado89@online.com', 'Rembado', 'Houben', 0, 0),
(91, 'happy_sad', 'QDOXEKhUrd', 'Alwalda95@hotmail.com', 'Alwalda', 'Immad', 0, 0),
(92, 'haveahappyday', '9kaqnI5tgI', 'Sezen97@gmail.com', 'Sezen', 'Degrees', 0, 0),
(93, 'SomethingNew', '2Ym8x7fjch', 'Rochy66@online.com', 'Rochy', 'AÃ¯na', 0, 0),
(94, '5mileys', 'm8dW2aCp9p', 'Mpanza59@hotmail.com', 'Mpanza', 'Paider', 0, 0),
(95, 'cum2soon', 'Ti14z3nlQ-', 'Ilusion77@gmail.com', 'Ilusion', 'Jaren', 0, 0),
(96, 'takes2long', 'CF3L5Zexlr', 'Shema95@online.com', 'Shema', 'Calfee', 0, 0),
(97, 'w8t4u', 'a-dfz4Tjwh', 'Pattarasaya75@hotmail.com', 'Pattarasaya', 'Kalervo', 0, 0),
(98, 'askme', '895zplwF4G', 'Eppright96@gmail.com', 'Eppright', 'Klidaras', 0, 0),
(99, 'Bidwell', 'joPWM_cNnV', 'Kiptyn68@online.com', 'Kiptyn', 'Horia', 0, 0),
(100, 'massdebater', '2stBYx9Bj5', 'Cadillo59@hotmail.com', 'Cadillo', 'Tassin', 0, 0),
(117, 'a', 'abcdefg', 'a', 'a', 'a@hotmail.com', 0, 0),
(119, 'jozzi97', '$2y$10$IZ2HyCZitLzEhSAzvz5vR.y.JlaQFPBmw8pYKqf6Zq25OeRUNPP.m', 'jozzi@gmail.com', 'jozzi', 'jozzikakoli', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postID` (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `topicId` (`topicId`);

--
-- Indexes for table `Topic`
--
ALTER TABLE `Topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- AUTO_INCREMENT for table `Post`
--
ALTER TABLE `Post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `Topic`
--
ALTER TABLE `Topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `Post` (`id`),
  ADD CONSTRAINT `Comment_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `User` (`id`);

--
-- Constraints for table `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `Post_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `Post_ibfk_2` FOREIGN KEY (`topicId`) REFERENCES `Topic` (`id`);

--
-- Constraints for table `Topic`
--
ALTER TABLE `Topic`
  ADD CONSTRAINT `Topic_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `Topic_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `Category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
