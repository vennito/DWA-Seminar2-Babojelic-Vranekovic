-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2014 at 09:16 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seminar2`
--

-- --------------------------------------------------------

--
-- Table structure for table `dojmovnik`
--

CREATE TABLE IF NOT EXISTS `dojmovnik` (
  `idDojam` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(40) NOT NULL,
  `prezime` varchar(40) NOT NULL,
  `email` varchar(150) NOT NULL,
  `poruka` text NOT NULL,
  PRIMARY KEY (`idDojam`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dojmovnik`
--

INSERT INTO `dojmovnik` (`idDojam`, `ime`, `prezime`, `email`, `poruka`) VALUES
(1, 'mihael', 'babojelić', 'babs@babs.babs', '0'),
(2, 'mihael', 'babojelić', 'babs@babs.babs', '0'),
(3, 'ANDRIJANA', 'barić', 'mickey@kiwi.com', '0'),
(4, 'ANTONIJA', 'Antić', 'vvranekovic@gmail.com', '0'),
(5, 'Barbara', 'begonja', 'no-replay@localhost.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `filmovi`
--

CREATE TABLE IF NOT EXISTS `filmovi` (
  `idFilm` int(11) NOT NULL AUTO_INCREMENT,
  `imeFilma` varchar(200) NOT NULL,
  `trajanje` int(11) NOT NULL,
  `zanr` varchar(50) NOT NULL,
  `redatelj` varchar(50) NOT NULL,
  `opis` text NOT NULL,
  `kratak_opis` varchar(200) NOT NULL,
  `uloge` text NOT NULL,
  `godina` year(4) NOT NULL,
  `datumPrikaza` date NOT NULL,
  `prikaza` int(11) NOT NULL,
  `sati` time NOT NULL,
  `dvorana` int(11) NOT NULL,
  `m_slika` text NOT NULL,
  `slika` varchar(200) NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idFilm`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `filmovi`
--

INSERT INTO `filmovi` (`idFilm`, `imeFilma`, `trajanje`, `zanr`, `redatelj`, `opis`, `kratak_opis`, `uloge`, `godina`, `datumPrikaza`, `prikaza`, `sati`, `dvorana`, `m_slika`, `slika`, `visible`) VALUES
(1, 'NA RUBU BUDUĆNOSTI', 114, 'znanstvena fanatstika, akcija', 'Doug Liman', 'Impresivna znanstveno-fantastična blockbuster akcija s Tomom Cruiseom u glavnoj ulozi! \r\nU svijetu budućnosti Tom Cruise je poručnik Wiliam Cage \r\nkoji se bori u ratu protiv izvanzemaljaca. Odjednom, on se \r\nnađe zarobljen u vremenu, u posljednjem danu bitke na koji i \r\numire. Prolazeći svaki puta nanovo zadnji dan svog života, Cage \r\nnakon nekog vremena postaje sve vještiji i sve spremniji dočekati \r\nsmrt… \r\nFilm Na rubu budućnosti snimljen je prema hvaljenom romanu \r\njapanskog pisca Hiroshija Sakurazake „Sve što moraš učiniti je \r\nubiti”.', 'Impresivna znanstveno-fantastična blockbuster akcija s Tomom Cruiseom u glavnoj ulozi!', 'Tom Cruise, Emily Blunt, Bill Paxton', 2014, '2014-06-06', 20, '19:00:00', 1, 'images/filmovi/na_rubu_buducnosti_mala.jpg', 'images/filmovi/na_rubu_buducnosti.jpg', 0),
(2, 'X-MEN: DANI BUDUĆE PROŠLOSTI', 130, 'znanstvena-fantastika', 'Bryan Singer', 'Novi napeti nastavak mega uspješne franšize! \r\nX-Men i Wolverine morat će se vratiti u prošlost i uložiti \r\nnevjerojatan napor kako bi promijenili povijest i spriječili \r\ndogađaje koji bi mogli dovesti do potpunog nestanka mutanata, \r\nali i ljudske vrste.', 'Novi napeti nastavak mega uspješne franšize! ', 'Michael Fassbender, Hugh Jackman, Jennifer Lawrence', 2014, '2014-06-03', 20, '22:00:00', 1, 'images/filmovi/xmen_mala.jpg', 'images/filmovi/xmen.jpg', 1),
(3, 'GODZILLA', 123, 'znanstvena fantastika, akcijska avantura', 'Gareth Edwards', 'Godzilla je impresivan znanstveno-fantastični spektakl u kojem je divovsko radioaktivno biće otporno na sva oružja ljudske vrste. \r\nZastrašujuća i nemilosrdna Godzilla natjerat će stanovnike Zemlje da se udruže, no to možda neće biti dovoljno da je pobjede…', 'Godzilla je impresivan znanstveno-fantastični spektakl!', 'Bryan Cranston, Elisabeth Olsen, Juliette Binoche, Aaron Taylor-Johnson', 2014, '2014-06-07', 20, '19:00:00', 1, 'images/filmovi/godzilla2014_mala.jpg', 'images/filmovi/godzilla2014.jpg', 1),
(4, 'SUSJEDI IZ PAKLA', 97, 'komedija', 'Nicholas Stoller', 'Mlada obitelj s veseljem dočekuje nove susjede. Oni su simpatični, \r\nmladi i… članovi studentskog bratstva koje organizira najbolje \r\ntulume u gradu! \r\nDok im se život okreće poput vrtuljka, zbunjeni roditelji i njihova \r\nmala beba pokušavaju se prilagoditi novonastaloj situaciji, ali i \r\nzaustaviti „vesele” susjede prije nego što demoliraju cijelu ulicu i \r\notjeraju ih što dalje od kuće i društva iz pakla.', 'Mlada obitelj s veseljem dočekuje nove susjede.', 'Zac Efron, Rose Byrne, Seth Rogen', 2014, '2014-06-07', 20, '20:00:00', 2, 'images/filmovi/neighbors_mala.jpg', 'images/filmovi/neighbors.jpg', 1),
(5, 'OSVETA NA VISOKIM PETAMA', 109, 'romantična komedija', 'Nick Cassavetes', 'Ovogodišnja MUST kinodestinacija ženskog izlaska! \r\nModno osvješten i stylish film o ženama i ženskim (ne)prijateljstvima s kraljicom komedije Cameron Diaz u glavnoj ulozi. \r\nFilm za muškarce koji žele saznati kako funkcionira ženski mozak. \r\nU Osveti na visokim petama Cameron Diaz, nakon što otkrije da je njezin dečko oženjen, započinje neobično prijateljstvo s – njegovom suprugom. Zajedno, one su odlučne da mu se osvete, no za to će im trebati pomoć – njegove ljubavnice.', 'Ovogodišnja MUST kinodestinacija ženskog izlaska! ', 'Cameron Diaz, Leslie Mann, Don Johnson, Nikolaj Coster-Waldau', 2014, '2014-06-07', 15, '22:00:00', 1, 'images/filmovi/osveta_na_visokim_petama_mala.jpg', 'images/filmovi/osveta_na_visokim_petama.jpg', 1),
(6, 'UZVIŠENOST', 116, 'znanstvena fanatstika, akcija', 'Wally Pfister', 'Dvojica vodećih informatičara rade na svom tehnološkom čudu, dok se radikalna anti-tehnologijska organizacija bori protiv kreiranja svijeta u kojemu računala mogu nadmašiti mogućnosti ljudskog mozga.', 'Dvojica vodećih informatičara rade na svom tehnološkom čudu', 'Johnny Depp, Rebecca Hall, Morgan Freeman', 2014, '2014-06-07', 20, '23:00:00', 2, 'images/filmovi/uzvisenost_mala.jpg', 'images/filmovi/uzvisenost.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rezervacije`
--

CREATE TABLE IF NOT EXISTS `rezervacije` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idkorisnika` text NOT NULL,
  `idfilma` int(10) unsigned NOT NULL,
  `imefilma` varchar(200) NOT NULL,
  `stolica` int(10) unsigned NOT NULL,
  `datum` date NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `rezervacije`
--

INSERT INTO `rezervacije` (`id`, `idkorisnika`, `idfilma`, `imefilma`, `stolica`, `datum`, `log_time`) VALUES
(41, 'admin', 3, 'GODZILLA', 2, '2014-06-14', '2014-06-13 15:46:17'),
(42, 'admin', 3, 'GODZILLA', 3, '2014-06-14', '2014-06-13 15:46:17'),
(51, 'pero', 5, 'OSVETA NA VISOKIM PETAMA', 70, '2014-06-14', '2014-06-13 15:52:44'),
(52, 'pero', 5, 'OSVETA NA VISOKIM PETAMA', 73, '2014-06-14', '2014-06-13 15:52:44'),
(53, 'pero', 5, 'OSVETA NA VISOKIM PETAMA', 76, '2014-06-14', '2014-06-13 15:52:44'),
(56, 'admin', 6, 'UZVIŠENOST', 24, '2014-06-14', '2014-06-13 15:54:45'),
(57, 'admin', 6, 'UZVIŠENOST', 45, '2014-06-14', '2014-06-13 15:54:45'),
(58, 'admin', 6, 'UZVIŠENOST', 49, '2014-06-14', '2014-06-13 15:54:45'),
(59, 'admin', 6, 'UZVIŠENOST', 66, '2014-06-14', '2014-06-13 15:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `ulaznice`
--

CREATE TABLE IF NOT EXISTS `ulaznice` (
  `idRezervacija` int(11) NOT NULL AUTO_INCREMENT,
  `idKorisnik` int(11) NOT NULL,
  `idFilm` int(11) NOT NULL,
  `datumPrikaza` date NOT NULL,
  `vrijemePrikaza` time NOT NULL,
  `dvorana` int(11) NOT NULL,
  `tipUlaznice` varchar(40) NOT NULL DEFAULT 'Rezervacija',
  `datum` date NOT NULL,
  `stolice` text NOT NULL,
  PRIMARY KEY (`idRezervacija`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(240) NOT NULL,
  `email` varchar(240) NOT NULL,
  `password` char(32) CHARACTER SET utf8 NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`) VALUES
(1, 'admin', 'test@testt.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(2, 'korisnik', 'korisnik@com.com', '716b64c0f6bad9ac405aab3f00958dd1', 0),
(3, 'pero', 'pero@pero.hr', '9c5001923b6a1e94b4121de992f47c6f', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
