-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2015 at 02:23 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `exercice`
--

CREATE TABLE IF NOT EXISTS `exercice` (
  `serial` int(11) NOT NULL,
  `id_query` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  PRIMARY KEY (`serial`,`id_query`),
  KEY `id_query` (`id_query`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `num_level` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`num_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`num_level`, `name`) VALUES
(1, 'Niveau 1');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE IF NOT EXISTS `queries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_query` int(11) NOT NULL,
  `num_level` int(11) NOT NULL,
  `theme` varchar(15) DEFAULT NULL,
  `question` varchar(255) NOT NULL,
  `query` varchar(255) NOT NULL,
  `line_count` int(11) NOT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `num_level` (`num_level`),
  KEY `last_modified_by` (`last_modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `num_query`, `num_level`, `theme`, `question`, `query`, `line_count`, `last_modified_by`, `last_modified_at`) VALUES
(1, 1, 1, '', 'Ecrivez une requête SQL qui permette d''afficher tout le contenu de votre table. ', 'SELECT * FROM bd1.albums', 44, NULL, NULL),
(2, 2, 1, '', 'Donnez, pour chaque album, son isbn, son titre, son scénariste, son dessinateur ainsi que son année d''édition.', 'SELECT isbn, titre, scenariste, dessinateur, annee_edition FROM bd1.albums', 44, NULL, NULL),
(3, 3, 1, '', 'Quelles sont les albums édités par "Dupuis" ?', 'SELECT * FROM bd1.albums WHERE editeur = ''Dupuis''', 9, NULL, NULL),
(4, 4, 1, '', 'Quels sont les titres des albums dont le scénariste est "Goscinny"?', 'SELECT DISTINCT titre FROM bd1.albums WHERE scenariste = ‘Goscinny’', 10, NULL, NULL),
(5, 5, 1, '', 'Quels sont les titres et les éditeurs des albums dont un des auteurs (scénariste, dessinateur ou coloriste) s''appelle "Uderzo"?', 'SELECT DISTINCT titre, editeur FROM bd1.albums WHERE scenariste = ''Uderzo'' OR dessinateur = ''Uderzo'' OR coloriste = ''Uderzo'' ', 8, NULL, NULL),
(6, 6, 1, '', 'Quelles sont les albums pour lesquels le coloriste n''a pas été spécifié?', 'SELECT * FROM bd1.albums  WHERE coloriste IS NULL ', 31, NULL, NULL),
(7, 7, 1, '', 'Quels sont les éditeurs qui ont édité des albums en 1978 ?', 'SELECT DISTINCT editeur FROM bd1.albums WHERE annee_edition = 1978', 1, NULL, NULL),
(8, 8, 1, '', 'Quels sont les couples scénaristes-dessinateurs ayant travaillé ensemble pour l''éditeur "Dargaud"? (Attention: si le nom du dessinateur est le même que celui du scénariste, c''est que la même personne a effectué les deux tâches, et on ne parlera donc pas ', 'SELECT DISTINCT scenariste, dessinateur FROM bd1.albums  WHERE scenariste != dessinateur  AND editeur = ''Dargaud''', 3, NULL, NULL),
(9, 9, 1, '', 'Quels sont les albums dont le scénariste et le dessinateur sont la même personne, mais qui ont été mis en couleur par quelqu''un d''autre?', 'SELECT * FROM bd1.albums WHERE scenariste = dessinateur AND coloriste != dessinateur', 1, NULL, NULL),
(10, 10, 1, '', 'Quels sont les albums dont le scénariste, le dessinateur et le coloriste sont la même personne?', 'SELECT * FROM bd1.albums WHERE scenariste = dessinateur AND coloriste = dessinateur ', 9, NULL, NULL),
(11, 11, 1, '', 'Quels sont les albums qui n''ont qu''un seul auteur? (Cela recouvre les cas de l''exercice précédent, mais il ne faut pas oublier les tuples pour lesquels un ou deux des trois attributs concernés ont la valeur NULL)', 'SELECT * FROM bd1.albums WHERE (scenariste = dessinateur AND (coloriste = dessinateur OR coloriste IS NULL)) OR (coloriste = dessinateur AND scenariste IS NULL) OR (coloriste = scenariste AND dessinateur IS NULL) OR (dessinateur IS NOT NULL AND scenariste', 26, NULL, NULL),
(12, 12, 1, '', 'Quels sont les scénaristes dont on a édité, après 1990, des œuvres qui coûtent moins de 8€?', 'SELECT DISTINCT scenariste FROM bd1.albums WHERE prix < 8 AND annee_edition > 1990', 2, NULL, NULL),
(13, 13, 1, '', 'Quels sont les titres édités en dehors de la décennie 1990-1999, par un éditeur autre que "Casterman", et dont le coloriste est ou bien non spécifié ou bien le même que le dessinateur?', 'SELECT DISTINCT titre FROM bd1.albums  WHERE (annee_edition < 1990 OR annee_edition > 1999) AND editeur != ''Casterman''  AND (coloriste IS NULL OR coloriste = dessinateur)', 29, NULL, NULL),
(14, 14, 1, '', 'Quels sont les titres qui n''ont été édités ni par "Casterman", ni par "Dupuis", et qui ont, comme scénariste, dessinateur et coloriste, trois auteurs distincts?', 'SELECT DISTINCT titre FROM bd1.albums  WHERE (editeur != ''Casterman'' AND editeur != ''Dupuis'')  AND scenariste != dessinateur AND dessinateur != coloriste  AND coloriste != scenariste', 1, NULL, NULL),
(15, 15, 1, '', 'Quels sont tous les albums qui rentrent dans une des catégories suivantes au moins : albums de la série "Astérix" édités chez "Dargaud",   albums de la série "Tintin" édités chez "Casterman" ou au "Le Lombard" et   albums sans aucun auteur spécifié.', 'SELECT * FROM bd1.albums  WHERE (editeur = ''Dargaud'' AND serie = ''Astérix'') OR((editeur = ''Casterman'' OR editeur = ''Le Lombard'') AND serie = ''Tintin'') OR (scenariste IS NULL AND coloriste IS NULL AND dessinateur IS NULL)', 13, NULL, NULL),
(16, 16, 1, '', 'Lister les titres des albums qui contiennent le mot "César".', 'SELECT DISTINCT titre FROM bd1.albums  WHERE titre LIKE ''%César%''', 1, NULL, NULL),
(17, 17, 1, '', 'Lister les auteurs dont le nom commence par le mot "de" (peu importe la casse).', 'SELECT DISTINCT dessinateur, scenariste, coloriste FROM bd1.albums  WHERE lower(dessinateur) LIKE ''de%'' OR lower(scenariste) LIKE ''de%'' OR lower(coloriste) LIKE ''de%''', 2, NULL, NULL),
(18, 18, 1, 'order by', 'Donnez tous les titres des albums de la série "Astérix" et leur année d’édition, en ordre chronologique.', 'SELECT DISTINCT titre, annee_edition FROM bd1.albums  WHERE serie = ''Astérix''  ORDER BY annee_edition', 8, NULL, NULL),
(19, 19, 1, 'order by', 'Donnez tous les titres des albums de la série "Astérix", en ordre alphabétique des titres.', 'SELECT DISTINCT titre FROM bd1.albums WHERE serie = ''Astérix'' ORDER BY titre', 8, NULL, NULL),
(20, 20, 1, 'order by', 'Donnez les albums (isbn, titre, nom d’éditeur et année d''édition) en classant ces données par éditeur, et pour chaque éditeur, par année d''édition.', 'SELECT isbn, titre, editeur, annee_edition FROM bd1.albums  ORDER BY editeur, annee_edition', 44, NULL, NULL),
(21, 21, 1, 'order by', 'Donnez les titres et les prix des albums édités par "Dupuis", par ordre décroissant de prix."', 'SELECT DISTINCT titre, prix FROM bd1.albums  WHERE editeur = ''Dupuis''  ORDER BY prix DESC', 9, NULL, NULL),
(22, 22, 1, 'fonctions agrég', 'Quelle est la plus ancienne année d''édition de la table bd1.albums?', 'SELECT MIN(annee_edition) FROM bd1.albums', 1947, NULL, NULL),
(23, 23, 1, 'fonctions agrég', 'Quel est le prix de l’album le plus cher parmi ceux qui ont été dessinés par un autre dessinateur qu''"Uderzo"?', 'SELECT MAX(prix) FROM bd1.albums  WHERE dessinateur != ''Uderzo''', 14, NULL, NULL),
(24, 24, 1, 'fonctions agrég', 'Combien y a-t-il d’albums édités chez "Casterman" ?', 'SELECT COUNT(*) FROM bd1.albums  WHERE editeur = ''Casterman''', 7, NULL, NULL),
(25, 25, 1, 'fonctions agrég', 'Combien d’années séparent l’album le plus ancien de l’album le plus récent ?', 'SELECT MAX(annee_edition) - MIN(annee_edition) FROM bd1.albums', 59, NULL, NULL),
(26, 26, 1, 'fonctions agrég', 'Combien devrai-je payer si j’achète 3 exemplaires de chacun des albums édités par "Blake et Mortimer" et si le libraire m’accorde une réduction de 25% ?', 'SELECT 3*0.75*SUM(prix) FROM bd1.albums  WHERE editeur = ''Blake et Mortimer''', 216, NULL, NULL),
(27, 27, 1, 'fonctions agrég', 'Les albums de la série "Tintin" ont-ils tous le même prix ? (le query pourrait par exemple renvoyer la valeur 1 si la réponse est oui)', 'SELECT COUNT(distinct prix) FROM bd1.albums  WHERE serie = ''Tintin''', 1, NULL, NULL),
(28, 28, 1, 'fonctions agrég', 'Combien y a-t-il de séries différentes dans la table bd1.albums?', 'SELECT COUNT(distinct serie) FROM bd1.albums ', 10, NULL, NULL),
(29, 29, 1, 'fonctions agrég', 'Combien y a-t-il d’albums pour lesquels la série est spécifiée ? Peut-on répondre à cette question par un query sans clause WHERE ? ', 'SELECT COUNT(serie) FROM bd1.albums', 41, NULL, NULL),
(30, 30, 1, 'fonctions agrég', 'Combien y a-t-il d’albums pour lesquels la série n’est pas spécifiée ? Peut-on répondre à cette question par un query sans clause WHERE?', 'SELECT COUNT(*) - COUNT(serie) FROM bd1.albums', 3, NULL, NULL),
(31, 31, 1, 'fonctions agrég', 'Combien y a-t-il d''albums dont un des auteurs au moins s''appelle "Uderzo", et quelles sont les dates d''édition du plus ancien et du plus récent d''entre eux?', 'SELECT COUNT(*), MIN(annee_edition), MAX(annee_edition)  FROM bd1.albums  WHERE (scenariste = ''Uderzo'' OR dessinateur = ''Uderzo'' OR coloriste = ''Uderzo'')', 8, NULL, NULL),
(32, 32, 1, 'fonctions agrég', 'Quels est le prix moyen des albums édités par "Dupuis" entre 1990 et 1999 (y compris ces deux années extrêmes) ?', 'SELECT AVG(prix) FROM bd1.albums  WHERE editeur = ''Dupuis'' AND (annee_edition >= 1990 AND annee_edition <= 1999)  ', 9, NULL, NULL),
(33, 33, 1, 'fonctions agrég', 'Quel est le prix moyen des albums édités par "Dupuis" à l’exception des albums édités entre 1990 et 1999.', 'SELECT AVG(prix) FROM bd1.albums  WHERE editeur = ''Dupuis'' AND (annee_edition < 1990 OR annee_edition > 1999)', 7, NULL, NULL),
(34, 34, 1, 'fonctions agrég', 'Si je veux acheter un exemplaire de tous les albums dont le scénariste est "goscinny" et/ou le dessinateur "uderzo", combien devrai-je débourser?', 'SELECT SUM(prix) FROM bd1.albums  WHERE scenariste = ''Goscinny'' OR dessinateur = ''Uderzo''', 75, NULL, NULL),
(35, 35, 1, 'fonctions agrég', 'Si je veux acheter un exemplaire de tous les albums dont le scénariste n’est ni "goscinny" ni "uderzo", combien devrai-je débourser?', 'SELECT SUM(prix) FROM bd1.albums  WHERE scenariste != ''Goscinny'' AND scenariste != ''Uderzo''', 209, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `serial` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`serial`, `name`, `surname`, `password`, `last_login`) VALUES
(8781, 'DABROWSKI', 'Virginia', NULL, NULL),
(8798, 'MOURADE', 'Ibrahim', NULL, NULL),
(9439, 'RACHDI', 'Noureddine', NULL, NULL),
(9465, 'TAVERNIER', 'Cedric', NULL, NULL),
(9747, 'AZABAR', 'Zakariya', NULL, NULL),
(10084, 'DEWIGNE', 'Florent', NULL, NULL),
(10193, 'DOUGHERTY', 'Joseph', NULL, NULL),
(10612, 'HOLLANDERS', 'Robin', NULL, NULL),
(10682, 'TONNEAU', 'Thomas', NULL, NULL),
(11628, 'DALMAU FORCANO', 'Marc', NULL, NULL),
(11762, 'TECHY', 'Martin', NULL, NULL),
(12241, 'EL YAKOUBI', 'Iâtimadtimad', NULL, NULL),
(12306, 'BOCK', 'Benoîtt', NULL, NULL),
(12330, 'DRIESSEN', 'Christophe', NULL, NULL),
(12341, 'GÉRARD', 'Nicolas-Andrea', NULL, NULL),
(12370, 'ANNICCHIARICO', 'Vincenzo', NULL, NULL),
(12396, 'TRUONG', 'Vinh Kien', NULL, NULL),
(12493, 'SINON', 'Clément', NULL, NULL),
(12494, 'GONEN', 'Gültekinltekin', NULL, NULL),
(12533, 'ERMGODTS', 'Christopher', NULL, NULL),
(12554, 'KARABAG', 'Umid', NULL, NULL),
(12604, 'MAHI', 'Samia', NULL, NULL),
(12730, 'GÉRARD', 'Florian', NULL, NULL),
(12732, 'SOUSA DOS SANTOS', 'Alexandre', NULL, NULL),
(12849, 'ISHIMWE', 'Remy', NULL, NULL),
(12935, 'DÉSÉNEPART', 'Valentin', NULL, NULL),
(13179, 'GOBEAUX', 'Thomas', NULL, NULL),
(13528, 'HANSON', 'Pierre-Yves', NULL, NULL),
(13644, 'VERLANT', 'Antoine', NULL, NULL),
(13650, 'OLDENHOVE de GUERTECHIN', 'Simon', NULL, NULL),
(13857, 'DENIS', 'Quentin', NULL, NULL),
(13889, 'ARSZAGI VEL HARSZAGI', 'Kamil', NULL, NULL),
(13919, 'CRUZ LLUMIQUINGA', 'Jefferson', NULL, NULL),
(13949, 'VAN LITHAUT', 'Romain', NULL, NULL),
(13986, 'RENSON', 'Gilles', NULL, NULL),
(14051, 'DJEDIDI', 'Hichem', NULL, NULL),
(14053, 'BUDAK', 'Stéphane', NULL, NULL),
(14129, 'de VILLENFAGNE de VOGELSA', 'Gaspard', NULL, NULL),
(14192, 'NYEEM', 'Mohammad', NULL, NULL),
(14243, 'BOGDANOVIC', 'Stefan', NULL, NULL),
(14337, 'BELKADI', 'Nizar', NULL, NULL),
(14407, 'VAN LOO', 'Nelson', NULL, NULL),
(14558, 'ROCHEZ', 'Arnaud', NULL, NULL),
(14973, 'IRANDOUST', 'Marzieh', NULL, NULL),
(15172, 'OSTE', 'Nicolas', NULL, NULL),
(15319, 'GRIMMONPRÉ', 'Romain', NULL, NULL),
(15324, 'MAES', 'Timothy', NULL, NULL),
(15774, 'ASLI', 'Rachid', NULL, NULL),
(15779, 'BELHARCH', 'Hicham', NULL, NULL),
(15781, 'd''OULTREMONT', 'Matthieu', NULL, NULL),
(15782, 'PIERRE', 'Anthony', NULL, NULL),
(15783, 'BAKKALI KARFA', 'Nadir', NULL, NULL),
(15793, 'TASYÜREK', 'Emre', NULL, NULL),
(15794, 'RAMOS NEVES', 'Jonathan', NULL, NULL),
(15795, 'LE CLERCQ', 'Mike', NULL, NULL),
(15806, 'SAMELSON', 'Jonathan', NULL, NULL),
(15810, 'DUVILLIER', 'Romain', NULL, NULL),
(15821, 'YE', 'Sheng Hao', NULL, NULL),
(15822, 'BOUVIN', 'Timothéee', NULL, NULL),
(15824, 'TRéMOUROUX', 'Antoine', NULL, NULL),
(15825, 'BOUGAOU', 'Noé', NULL, NULL),
(15834, 'LEROY', 'Gaëll', NULL, NULL),
(15835, 'MOLINGHEN', 'Yannick', NULL, NULL),
(15892, 'CATHERINE', 'Thomas', NULL, NULL),
(15893, 'DE LA CRUZ MALLADA', 'Jimmy', NULL, NULL),
(15902, 'BOTTEMANNE', 'Fany', NULL, NULL),
(15905, 'GOLMAR LUQUE', 'Diego', NULL, NULL),
(15907, 'CHARLIER', 'Anthony', NULL, NULL),
(15918, 'ERKUL', 'Michaëll', NULL, NULL),
(15921, 'ERYÖRÜK', 'Muharrem', NULL, NULL),
(15997, 'T''KINDT', 'Saifeddine', NULL, NULL),
(16000, 'COOLS', 'Alexandre', NULL, NULL),
(16096, 'FILLEUR', 'Thibault', NULL, NULL),
(16101, 'PATINELLA', 'Nicolas', NULL, NULL),
(16105, 'PESSERS', 'Ivan', NULL, NULL),
(16186, 'KECH', 'Damien', NULL, NULL),
(16200, 'LESPINOIS', 'Nicolas', NULL, NULL),
(16206, 'YALIM', 'Sevag', NULL, NULL),
(16241, 'DELHAYE', 'Gabriel', NULL, NULL),
(16258, 'FRÉMONTMONT', 'Jonathan', NULL, NULL),
(16268, 'DELWART', 'Valentin', NULL, NULL),
(16273, 'STRAUVEN', 'Mélissa', NULL, NULL),
(16320, 'DOS SANTOS', 'Bastien', NULL, NULL),
(16363, 'NGUYEN', 'Dat Toan', NULL, NULL),
(16372, 'LONCIN', 'Sébastien', NULL, NULL),
(16397, 'MANIET', 'Alexandre', NULL, NULL),
(16399, 'MANIET', 'Antoine', NULL, NULL),
(16406, 'MZOUGHI', 'Meriam', NULL, NULL),
(16414, 'DE CONINCK-GOSSEAU', 'Maxim', NULL, NULL),
(16415, 'BEVERNAGE', 'Rudy', NULL, NULL),
(16419, 'ANTHOONS', 'Nicolas', NULL, NULL),
(16421, 'WAGEMANS', 'Jeremy', NULL, NULL),
(16429, 'MAYNÉ', 'Lonny', NULL, NULL),
(16432, 'DURIEU', 'Emilien', NULL, NULL),
(16440, 'de BURLET', 'Marc', NULL, NULL),
(16441, 'YAKOUB', 'Jacques', NULL, NULL),
(16442, 'CUPI', 'Dylan', NULL, NULL),
(16443, 'SNOECK', 'Tanguy', NULL, NULL),
(16445, 'BLANCKAERT', 'Claire', NULL, NULL),
(16448, 'TIRCHER', 'Kyrill', NULL, NULL),
(16451, 'GARCIA AUGUSTO', 'Marcos', NULL, NULL),
(16456, 'RIGA', 'Sébastien', NULL, NULL),
(16461, 'GÜNDES', 'Vartan', NULL, NULL),
(16462, 'DENUIT', 'Maxime', NULL, NULL),
(16464, 'JANSSENS', 'Thibaut', NULL, NULL),
(16466, 'GAILLET', 'Mike', NULL, NULL),
(16569, 'DECLERCQ', 'Benjamin', NULL, NULL),
(16656, 'PLACE', 'Sébastien', NULL, NULL),
(16824, 'LEBON', 'Sébastien', NULL, NULL),
(16842, 'DE SPIEGELAERE', 'Louis', NULL, NULL),
(17000, 'BLONDEAU', 'Brendan', NULL, NULL),
(17026, 'CHRISTODOULOU de GRAILLET', 'Nicolas', NULL, NULL),
(17118, 'RONSMANS', 'Thomas', NULL, NULL),
(17121, 'MACASPAC', 'Marc-Kevin', NULL, NULL),
(17188, 'NGUYEN', 'Thiên Toàn', NULL, NULL),
(17215, 'DEPRAETE', 'Adeline', NULL, NULL),
(17218, 'ANNIA', 'Imad', NULL, NULL),
(17221, 'LAMBRICHT', 'Antoine', NULL, NULL),
(17291, 'YAHIAOUI', 'Diaa', NULL, NULL),
(17293, 'MURAT', 'Endri', NULL, NULL),
(17297, 'BUYENS', 'Nathan', NULL, NULL),
(17368, 'COSTE-GANDREY', 'Alexandre', NULL, NULL),
(17400, 'MENDES ROSA', 'Christian', NULL, NULL),
(17435, 'JACOB', 'Loury', NULL, NULL),
(17451, 'MASSART', 'Woody', NULL, NULL),
(17457, 'ALP', 'Mustafa', NULL, NULL),
(17480, 'PIERRE', 'Benjamin', NULL, NULL),
(17500, 'TOUMI', 'Yèssine', NULL, NULL),
(17523, 'AMETI', 'Rufat', NULL, NULL),
(17528, 'OVAERT', 'Lionel', NULL, NULL),
(17543, 'ABAJTOUR', 'Ilyas', NULL, NULL),
(17574, 'CHEVALIER', 'Romain', NULL, NULL),
(17575, 'SHEVTCHENKO', 'Philipp', NULL, NULL),
(17581, 'PINTUS', 'Pierre-Nicolas', NULL, NULL),
(17582, 'RODRIGUEZ VAZQUEZ', 'Francisco', NULL, NULL),
(17613, 'BORDIGATO', 'Patrick Junior', NULL, NULL),
(17625, 'GRUMIRO', 'Fabio', NULL, NULL),
(17626, 'DIMOV', 'Theodor', NULL, NULL),
(17640, 'BLJAKAJ', 'Dukagjin', NULL, NULL),
(17655, 'BOUCHER', 'Nicolas', NULL, NULL),
(17662, 'GAILLET', 'Pierre-Paul', NULL, NULL),
(17664, 'MOUNIR', 'Hamza', NULL, NULL),
(17713, 'NGUYEN', 'Phu Cuong', NULL, NULL),
(17736, 'NSENDA THAMBWE', 'Hervé-Claude', NULL, NULL),
(17738, 'VANCAMPENHAULT', 'Anthony', NULL, NULL),
(17765, 'AERTS', 'Mathieu', NULL, NULL),
(17766, 'BAKALEM', 'Abdelhak', NULL, NULL),
(17790, 'PIROZZI', 'Francesco', NULL, NULL),
(17793, 'SENHAJI', 'Taoufiq', NULL, NULL),
(17854, 'LASKOWSKI', 'Maciej', NULL, NULL),
(17871, 'DELLOT', 'Jonathan', NULL, NULL),
(17879, 'GOSSELIN', 'Louis', NULL, NULL),
(17900, 'EZAABOUJI', 'Zineb', NULL, NULL),
(17924, 'YALÇINÖZ', 'Serhat', NULL, NULL),
(17931, 'ZOAO', 'Kevin', NULL, NULL),
(17972, 'VELARDE VELARDE', 'Bryan', NULL, NULL),
(17977, 'SCHWEISTHAL', 'Jean-François', NULL, NULL),
(17996, 'DEGRÈVE', 'Olivier', NULL, NULL),
(17998, 'BERTOLINI', 'Nicolas', NULL, NULL),
(18073, 'CANOOT', 'Olivier', NULL, NULL),
(18074, 'BASHIR', 'Ahmad', NULL, NULL),
(18080, 'LAPORTE', 'Robin', NULL, NULL),
(18085, 'MATON', 'Anthony', NULL, NULL),
(18098, 'HOSSEINI', 'Seyyed', NULL, NULL),
(18109, 'FANNA', 'Maxime', NULL, NULL),
(18134, 'BOONEN', 'Bastien', NULL, NULL),
(18145, 'STEVENS', 'Loïc', NULL, NULL),
(18160, 'COTTON', 'Pierric', NULL, NULL),
(18164, 'DE SUTTER', 'Willi', NULL, NULL),
(18174, 'VAN GREVENSTEIN', 'Fredrik', NULL, NULL),
(18185, 'FASSIAUX', 'Thomas', NULL, NULL),
(18191, 'IMPERIAL', 'Erik', NULL, NULL),
(18197, 'VERWILGHEN', 'Maxime', NULL, NULL),
(18206, 'DRAGOMIR', 'Philippe', NULL, NULL),
(18212, 'ELHASSANI', 'Elias', NULL, NULL),
(18284, 'DOCQUIER', 'Arnaud', NULL, NULL),
(18320, 'VERTONGHEN', 'Renaud', NULL, NULL),
(18367, 'EVRARD', 'Amaury', NULL, NULL),
(18405, 'DESMET', 'Jérémy', NULL, NULL),
(18407, 'SAIFI', 'Ayoub', NULL, NULL),
(18450, 'CIKU', 'Alan', NULL, NULL),
(18551, 'LARBI', 'Youssef', NULL, NULL),
(18574, 'MAFIKIRI KAKULE', 'Hubert', NULL, NULL),
(18643, 'FAIN', 'Damien', NULL, NULL),
(18693, 'ARESTIGUE BARREDA', 'Ronald', NULL, NULL),
(18722, 'WEILHAMMER', 'Sebastian', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `login` varchar(5) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`login`, `name`, `surname`, `password`) VALUES
('chooc', 'Choquet', 'Olivier', NULL),
('colje', 'Collinet', 'Jean-Luc', NULL),
('lecem', 'Leconte', 'Emmeline', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exercice`
--
ALTER TABLE `exercice`
  ADD CONSTRAINT `exercice_ibfk_2` FOREIGN KEY (`id_query`) REFERENCES `queries` (`id`),
  ADD CONSTRAINT `exercice_ibfk_1` FOREIGN KEY (`serial`) REFERENCES `students` (`serial`);

--
-- Constraints for table `queries`
--
ALTER TABLE `queries`
  ADD CONSTRAINT `queries_ibfk_2` FOREIGN KEY (`last_modified_by`) REFERENCES `teachers` (`login`),
  ADD CONSTRAINT `queries_ibfk_1` FOREIGN KEY (`num_level`) REFERENCES `levels` (`num_level`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
