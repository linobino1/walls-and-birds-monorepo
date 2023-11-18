-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: database-5003001079.webspace-host.com:3306
-- Generation Time: Jan 19, 2023 at 08:11 PM
-- Server version: 5.7.38-log
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB2613259`
--

-- --------------------------------------------------------

--
-- Table structure for table `live`
--

CREATE TABLE `live` (
  `day` date DEFAULT NULL,
  `city` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `location` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `eventname` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `link` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Dumping data for table `live`
--

INSERT INTO `live` (`day`, `city`, `location`, `eventname`, `link`) VALUES
('2016-01-08', 'Berlin', 'Mme. Claude', NULL, 'www.madameclaude.de'),
('2016-04-22', 'Berlin', 'Villa Neukölln', NULL, 'https://www.facebook.com/VillaNeukoelln?ref=ts&fref=ts'),
('2016-06-02', 'Berlin', 'Kantine Am Berghain', NULL, 'https://www.facebook.com/events/206125379771561/'),
('2016-06-10', 'Berlin', 'Schrippe Hawaii', NULL, 'https://www.facebook.com/schrippehawaii/'),
('2016-06-30', 'Berlin', 'Kronprinzenpalais Unter den Linden', 'Augustin Teboul Show', 'http://www.augustin-teboul.com/'),
('2016-08-06', 'Berlin', '://about blank', 'Down By The River Festival', 'https://www.facebook.com/events/817905201686973/'),
('2014-09-05', 'Erfurt', 'Franz Mehlhose', '', ''),
('2014-10-04', 'Berlin', 'An der Neuen Nationalgalerie', 'Beatbude Open-Air', 'www.beatbude.com'),
('2015-01-09', 'Berlin', 'Villa Neukoelln', '', 'www.villaneukoelln.de'),
('2015-01-10', 'Berlin', 'Villa Neukoelln', '', 'www.villaneukoelln.de'),
('2015-02-27', 'Berlin', 'Haus 1', '', 'www.beatbude.com'),
('2015-03-06', 'Berlin', 'Villa Neukölln', '', 'www.villaneukoelln.de'),
('2015-03-07', 'Berlin', 'Villa Neukölln', '', 'www.villaneukoelln.de'),
('2015-04-04', 'Berlin', 'Villa Neukölln', '', 'www.villaneukoelln.de'),
('2015-05-09', 'Berlin', 'Villa Neukölln', '', 'www.villaneukoelln.de'),
('2015-06-12', 'Karlsruhe', 'Fettschmelze', '', ''),
('2015-06-13', 'Esslingen a.N.', 'Villa Merkel', 'SNAG Festival', ''),
('2015-06-20', 'Berlin', 'Villa Neukölln', 'I Hear The Synth In East Berli', 'www.villaneukoelln.de'),
('2015-07-23', 'Berlin', 'Delphi Kino', 'Modenschau', ''),
('2015-07-25', 'Görlitz', 'Blockhaus Garten', 'Zukunftsvisionen', 'http://zuvi-festival.de'),
('2015-07-26', 'Görlitz', 'Hinterhof', 'Privat', ''),
('2015-07-31', 'Berlin', 'Villa Neukölln', '', 'www.villaneukoelln.de'),
('2015-08-08', 'Mecklenburg', 'Wilde Möhre Festival', '', 'http://wildemoehrefestival.de/'),
('2014-08-22', 'Berlin', 'Kuss Kuss', '', 'http://www.kusskussberlin.de'),
('2015-08-22', 'Berlin', 'Kuss Kuss', '', 'http://www.kusskussberlin.de'),
('2015-09-11', 'Berlin', 'Villa Neukölln', '', 'www.villaneukoelln.de'),
('2015-08-28', 'Bad K?hlungsborn', 'Campingpark Bad K?hlungsborn', '', 'http://www.topcamping.de'),
('2015-09-24', 'Berlin', 'Klunkerkranich', '', ''),
('2015-10-03', 'Berlin', 'Villa Neukölln', '', 'www.villaneukoelln.de'),
('2015-10-11', 'Berlin', 'ZKU', '', 'http://zku-berlin.org/'),
('2015-10-17', 'Berlin', 'Villa Neukölln', 'Simi Will 100 J?hriges Jubil?u', 'www.villaneukoelln.de'),
('2015-10-23', 'Berlin', 'So Wie So', '', 'http://sowieso-neukoelln.de'),
('2015-11-06', 'Berlin', 'Villa Neukölln', '', 'www.villaneukoelln.de'),
('2015-12-11', 'Berlin', 'Theaterhaus Mitte', 'Stundenhotel', 'http://www.theaterhaus.berlin/'),
('2015-12-12', 'Berlin', 'Ausland', '', 'ausland-berlin.de/'),
('2016-02-12', 'Berlin', 'Villa Neukölln', '', 'www.villaneukoelln.de'),
('2016-04-01', 'Berlin', 'Johnny Knueppel', '', ''),
('2016-03-10', 'Berlin', 'Mitteleuropa', '', ''),
('2015-12-20', 'Berlin', 'Johnny Knueppel', '', ''),
('2016-09-07', 'Görlitz', 'RABRYKA', '', 'http://www.rabryka.eu/justlab/index.php'),
('2016-09-08', 'Dresden', 'Hole Of Fame', '', 'https://www.facebook.com/events/178191565933279/'),
('2016-09-09', 'Leipzig', 'Noch Besser Leben', '', 'http://www.nochbesserleben.com'),
('2016-09-13', 'Giessen', 'Alte Kupferschmiede', '', 'https://altekupferschmiede.net'),
('2016-09-14', 'Luxembourg', 'De Gude Wellen', '', 'http://www.deguddewellen.lu'),
('2016-09-15', 'Karlsruhe', 'Die Kurbel', '', 'http://www.kurbel-karlsruhe.de'),
('2016-09-16', 'Stuttgart', 'Marmorsaal', 'Songs Of Marble Hall', 'https://www.facebook.com/events/543179765882206/'),
('2016-09-17', 'Stuttgart', 'Fluxus Bau', 'New Fall Festival Meets Fluxus', 'https://www.facebook.com/events/290191431354297/'),
('2016-09-23', 'Berlin', 'Villa Neukölln', '', 'https://www.facebook.com/VillaNeukoelln/?fref=ts'),
('2016-08-26', 'Schorndorf', 'Schloss', 'Secret Castle Concerts', 'http://www.artmeetsart.de/hello'),
('2016-10-15', 'Berlin', 'Kantine am Berghain', '', 'http://berghain.de/event/1754'),
('2016-11-05', 'Berlin', 'Neue Nachbarn', 'Opening Party', 'https://www.facebook.com/events/318355011871920/'),
('2016-11-25', 'Berlin', 'Villa Neukölln', '', 'https://www.facebook.com/events/1110899812341470/'),
('2016-12-17', 'Berlin', 'West Germany', '', 'http://www.westgermany.eu'),
('2016-12-02', 'Berlin', 'Villa Neukölln', '', 'https://www.facebook.com/events/1110899812341470/permalink/1112839985480786/'),
('2017-01-04', 'Berlin', 'BarTausend', '', 'www.tausendberlin.com/'),
('2017-01-26', 'Augsburg', 'City Club', 'Kuriosum', 'https://www.facebook.com/events/225515701207382/'),
('0000-00-00', '', '', '', ''),
('2017-02-16', 'Berlin', 'BarTausend', '', 'http://tausendberlin.com'),
('0000-00-00', '', '', '', ''),
('2017-03-18', 'Berlin', 'Villa Neukölln', '', 'https://www.facebook.com/VillaNeukoelln/?fref=ts'),
('2017-03-08', 'Berlin', 'Schokoladen', '', 'http://www.schokoladen-mitte.de'),
('0000-00-00', '', '', '', ''),
('2017-04-01', 'Berlin', 'Rita Records', '', 'https://www.facebook.com/ritarecords/'),
('0000-00-00', '', '', '', ''),
('0000-00-00', '', '', '', ''),
('0000-00-00', '', '', '', ''),
('2017-06-28', 'Berlin', 'Monarch', '', 'https://www.facebook.com/events/141748659719920/?acontext=%7B%22ref%22%3A%223%22%2C%22ref_newsfeed_story_type%22%3A%22regular%22%2C%22feed_story_type%22%3A%22361%22%2C%22action_history%22%3A%22null%22%7D'),
('2017-06-08', 'Berlin', 'Ballhaus', 'cancelled!', 'https://www.facebook.com/events/1363711847010863/?fref=ts'),
('0000-00-00', '', '', '', ''),
('2017-07-15', 'Uckermark', 'Libken', '', 'https://www.facebook.com/events/1952201995062638/?acontext=%7B%22ref%22%3A%223%22%2C%22ref_newsfeed_story_type%22%3A%22regular%22%2C%22action_history%22%3A%22null%22%7D'),
('0000-00-00', '', '', '', ''),
('2017-09-07', 'München', 'Milla', '', 'http://www.milla-club.de'),
('2017-09-10', 'Stuttgart', 'Contain&#39t', '', 'https://www.facebook.com/events/1976442355934307/'),
('2017-09-09', 'Basel', 'Silofest', '', 'http://www.erlenmatt-ost.ch/Erlenmatt-Ost/Erlenmatt-Ost/Silofest.html'),
('2017-09-06', 'Berlin', 'Schrippe Hawaii', '', 'https://www.facebook.com/events/550447321745682/?acontext=%7B%22source%22%3A5%2C%22page_id_source%22%3A445376045491088%2C%22action_history%22%3A[%7B%22surface%22%3A%22page%22%2C%22mechanism%22%3A%22main_list%22%2C%22extra_data%22%3A%22%7B%5C%22page_id%5C%22%3A445376045491088%2C%5C%22tour_id%5C%22%3Anull%7D%22%7D]%2C%22has_source%22%3Atrue%7D'),
('0000-00-00', '', '', '', ''),
('0000-00-00', '', '', '', ''),
('2017-09-08', 'Göppingen', 'Al Capone', '', 'https://www.google.de/url?sa=t&rct=j&q=&esrc=s&source=web&cd=2&ved=0ahUKEwjMie3KyI3WAhXCb1AKHcSmAScQFgguMAE&url=https%3A%2F%2Fwww.facebook.com%2Fkulturcafecapone%2F%3Frf%3D119121621477870&usg=AFQjCNGdhHGs6oTVK7nM8fAKpB22I-6RpA'),
('0000-00-00', '', '', '', ''),
('0000-00-00', '', '', '', ''),
('0000-00-00', '', '', '', ''),
('2017-09-16', 'Giessen', 'Fröhliche Gesellschaft', '', 'https://www.facebook.com/events/895429920611990/?ti=icl'),
('2017-09-14', 'Freiburg', 'Hilda 5', '', 'https://www.facebook.com/events/516964188655137/?acontext=%7B%22action_history%22%3A%22[%7B%5C%22surface%5C%22%3A%5C%22page%5C%22%2C%5C%22mechanism%5C%22%3A%5C%22page_upcoming_events_card%5C%22%2C%5C%22extra_data%5C%22%3A[]%7D]%22%2C%22has_source%22%3Atrue%7D'),
('0000-00-00', '', '', '', ''),
('2017-09-30', 'Berlin', 'Villa Neukölln', '', 'https://www.facebook.com/events/1939671852952023/?acontext=%7B%22action_history%22%3A%22[%7B%5C%22surface%5C%22%3A%5C%22page%5C%22%2C%5C%22mechanism%5C%22%3A%5C%22page_upcoming_events_card%5C%22%2C%5C%22extra_data%5C%22%3A[]%7D]%22%2C%22has_source%22%3Atrue%7D'),
('0000-00-00', '', '', '', ''),
('2017-11-25', 'Groningen(NL)', 'Vera', '', 'http://www.vera-groningen.nl'),
('0000-00-00', '', '', '', ''),
('2017-11-18', 'Augsburg', 'Café Viktor', '', 'https://www.facebook.com/events/1807377156227180/'),
('0000-00-00', '', '', '', ''),
('2017-12-01', 'Kopenhagen DK', 'Reffen209', '', 'https://www.facebook.com/events/1937009816553861/'),
('0000-00-00', '', '', '', ''),
('0000-00-00', '', '', '', ''),
('2017-09-22', 'Görlitz', 'RABRYKA', '', 'https://www.facebook.com/events/353992075050544/'),
('0000-00-00', '', '', '', ''),
('2017-12-15', 'Basel', 'Erster Stock', '', 'https://www.petzitickets.ch/event_description.php?event_id=39043'),
('2018-01-19', 'Berlin', 'Villa Neukölln', '', 'www.facebook.com/villaneukoelln'),
('2019-02-27', 'Berlin', 'SO36', 'Die Nerven(USA) support show', 'https://dqagency.app.love-your-artist.com/de/tickets/22476'),
('2019-02-19', 'Mainz', 'Schon Schön', 'Die Nerven(USA) support show', 'https://dqagency.app.love-your-artist.com/de/tickets/22444'),
('2019-02-17', 'Freiburg', 'Waldsee', 'Die Nerven(USA) support show', 'https://dqagency.app.love-your-artist.com/de/tickets/22355'),
('2019-02-20', 'Essen', 'Zeche Carl', 'Die Nerven(USA) support show', 'https://dqagency.app.love-your-artist.com/de/tickets/22462'),
('2019-02-21', 'Bielefeld', 'Forum', 'Die Nerven(USA) support show', 'https://dqagency.app.love-your-artist.com/de/tickets/22468'),
('2019-02-22', 'Kiel', 'Kieler Schaubude', 'Die Nerven(USA) support show', 'https://dqagency.app.love-your-artist.com/de/tickets/22436'),
('2019-02-28', 'Nürnberg', 'Z-Club', 'Die Nerven(USA) support show', 'https://dqagency.app.love-your-artist.com/de/tickets/22464'),
('2019-03-02', 'Passau', 'Zauberberg', 'Die Nerven(USA) support show', 'https://dqagency.app.love-your-artist.com/de/tickets/22435'),
('2019-03-03', 'Regensburg', 'Slow Club', 'Die Nerven(USA) support show', 'https://dqagency.app.love-your-artist.com/de/tickets/22766'),
('2019-02-18', 'Karlsruhe', 'KOHI', 'Die Nerven(USA) support show', 'http://www.kohi.de'),
('2019-03-04', 'München', 'Kammerspiele', 'Die Nerven(USA) support show', 'https://www.muenchner-kammerspiele.de'),
('0000-00-00', '', '', '', ''),
('2034-02-13', 'unknown', 'tba', '', 'https://en.wikipedia.org/wiki/Special:Random'),
('0000-00-00', '', '', '', ''),
('2018-07-01', 'Lärz', 'Fusion Festival', 'Karl Kutter', ''),
('2016-07-02', 'Lärz', 'Fusion Festival', 'Dubstation', ''),
('2017-12-20', 'Karlsruhe', 'HfG', 'Weihnachtsfeier', ''),
('2019-02-25', 'Berlin', 'Kantine Am Berghain', 'Die Nerven(USA) Support Show', 'http://berghain.de/events/'),
('2019-02-26', 'Berlin', 'Schrippe Hawaii', '', 'https://www.estrel.com/de/'),
('0000-00-00', '', '', '', ''),
('2019-09-22', 'Fey (FR)', 'Château Du Feÿ', 'Feÿ Arts Festival', 'https://fey-arts.com'),
('2019-11-08', 'Chemnitz', 'Nikola Tesla', '', ''),
('2019-11-10', 'Berlin', 'Villa Neukölln', '', ''),
('2022-07-17', 'Chemnitz', 'Alte Spinnerei', 'Cosmic Gathering', 'https://campcosmic.com'),
('0000-00-00', '', '', '', ''),
('0000-00-00', '', '', '', ''),
('2022-07-30', 'Görlitz', 'Kühlhaus', 'Skizzentage (Guitar Set)', 'https://kuehlhaus-goerlitz.de/');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
