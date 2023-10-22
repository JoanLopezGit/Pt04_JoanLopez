-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2023 a las 21:31:15
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pt04_joan_lopez`
--
DROP DATABASE IF EXISTS `pt04_joan_lopez`;
CREATE DATABASE `pt04_joan_lopez` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pt04_joan_lopez`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `article` text NOT NULL,
  `id_usuari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `article`, `id_usuari`) VALUES
(1, 'House Is Paralyzed, With No Speaker After McCarthy Ouster.After a historic vote to remove the speaker, lawmakers departed Washington on Tuesday night with the House of Representatives in chaos and no clear sense of who might lead it.', 1),
(2, 'Matt Gaetz, a Polarizing Figure in Congress, Is Polarizing at Home, Too. In an overwhelmingly Republican district, Mr. Gaetz is admired for shaking up the House, but he also has plenty of critics.', 1),
(3, 'Giuliani’s Drinking, Long a Fraught Subject, Has Trump Prosecutors’ Attention.The former mayor’s drinking has become an investigative subplot in Donald Trump’s federal case over 2020 election interference. But long before that, friends had grown deeply concerned.', 1),
(4, 'For 73 years Turkey has been a member of the Council of Europe, the organisation established in 1949, long before there was a European Union, to protect fundamental human rights on European soil in the wake of the second world war. Recent developments suggest it may not be a member for much longer.', 1),
(5, 'The horror of two world wars prompted France, West Germany and others to link arms and create what is today the European Union. Seventy years on, war has returned to the continent. Out of the rubble in Ukraine, something akin to the sentiment that moved the eu’s founding fathers is stirring again. The talk now is of admitting as many as nine new members, including Ukraine. Joining the world’s most successful club of peaceful, prosperous democracies would set that war-ravaged country—and fellow aspirant members in the Western Balkans, Georgia and Moldova—on a new and promising path.', 1),
(6, 'IRELAND IS SET to co-host the 2028 Uefa European Championships alongside the United Kingdom, with Uefa today confirming their bid to stage the tournament is unopposed. Turkey initially submitted a rival bid for the tournament but subsequently announced their intention to bid for the 2032 edition of the tournament, against Italy.It then emerged earlier this year that Turkey and Italy would submit a joint bid for the 2032 tournament rather than compete against one another, and today Uefa announced that Turkey’s bid for 2028 has been withdrawn as a result. ', 1),
(7, 'STARDUST MANAGER EAMON Butterly has told an inquest into the fire that killed 48 people in 1981 that the policy of keeping exit doors in the nightclub locked on disco nights was “unsafe” and they should not have been locked.Mr Butterly said that “the consequences would be bad” if the doors were locked during an emergency, but he told the jury at the Dublin District Coroner’s Court that head doorman Tom Kennan and the staff “would be keeping an eye on the doors” and were able to open them at any stage. ', 1),
(8, 'The Blown Call—by the Video Ref—That’s Driving Soccer Nuts.A wrongly disallowed Liverpool goal over the weekend showed just how chaotic the Premier League’s replay process remains—and prompted an English soccer meltdown along the way.', 1),
(9, 'Democrats Still Publicly Back Biden for 2024. Privately, Their Fears Are Growing.\r\nPolls show warning signs for the incumbent, but few Democrats see viable Plan B', 1),
(10, 'Gavin Newsom Appoints Laphonza Butler to Fill Dianne Feinstein’s Senate Seat Butler, previously a labor leader in California, is currently president of Emily’s List\r\n.', 1),
(11, 'Sánchez mantendrá “coordinación permanente” con Illa para las negociaciones con Junts y ERC RUMBO A LA INVESTIDURA\r\nEl líder del PSOE mantendrá un encuentro esta tarde con el dirigente socialista catalán al inicio de las conversaciones para la investidura\r\nEl presidente en funciones se reunirá con todos los grupos, salvo Vox, y designa una comisión que tomará el relevo de las conversaciones, a la que además de Bolaños, Montero y Cerdán se incorporan, entre otros, Óscar Puente', 1),
(12, 'Opposition to Ukraine Aid Becomes a Litmus Test for the Right\r\nThe drama that has played out among House Republicans highlights a sharp decline in the party’s willingness to back more aid to Kyiv.', 1),
(31, 'GSHAjhhgswgzahjjhgxhkjsws', 9),
(32, 'swwswswswswwsedertyjtre', 9),
(43, 'Elecciones en Argentina: la política tradicional se enfrenta a la extrema derecha Los argentinos votan este domingo para determinar si elegirán a Javier Milei, un economista libertario, quien ha sido llamado un ‘mini Trump’, como el nuevo líder de la nación.', 22),
(44, 'Javier Milei, un ‘mini Trump’, podría ser el próximo presidente de Argentina El candidato libertario comparte algunas sorprendentes similitudes con Donald Trump y su ascenso a la presidencia estadounidense en 2016.', 23),
(46, 'dqewrty', 26),
(47, 'dqewrty', 26),
(48, 'dqewrty', 26),
(50, 'Mauqi¡dhwbjdvbidbivhfdbihbcdhbcsdhbcdshbihbdcshujb', 8),
(57, 'ksbhjvgdhsc', 8),
(58, 'adsret', 8),
(61, 'dewrghderwgdfretgt', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE `usuaris` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `correu` varchar(30) NOT NULL,
  `contrasenya` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id`, `nom`, `correu`, `contrasenya`) VALUES
(1, 'Joan', 'QWEQWE@QWEQWE.COM', '$2y$10$TUu7fBSnNS3JvEciej9gjeNlGYo3LVUUpGBd8mUu1Zu42CiwG0T/G'),
(8, 'Mauqi', 'joanlopeztorrento@gmail.com', '$2y$10$E3ev9KZzYsODcoiVbvkwU.VI8hzbOwwo7tpLF4AhiugmHkHBWheGq'),
(9, 'Ricard', 'wddwwsdw@edde.dde', '$2y$10$qlebIZ/R0dVZo.dccTdgduRZyrS08l5fmDFxIY/zhFcnuylI4jWIa'),
(11, 'Patata', 'folletortuga@gmail.com', '$2y$10$OYy1KawSr8RBrhmi5wVp5.OXE1NN1XwJg9sz.gRum/ktAZs4.XhIG'),
(15, 'Xavi', 'x.martin@sapa.sapa', '$2y$10$dx9N/DcEXrw.1jf7gkIKVedw3.bxA/OHxhsUjXDUfKPfbLd3MTJn2'),
(20, 'Jaon', 'seba@senba.eba', '$2y$10$gWeg50FyXi5y2GzB27D98uxD/FvFLj7UTG5vfzADoCd3IBv35sml2'),
(22, 'SarahConnor', 'sarahconnor@gmail.com', '$2y$10$6we3hr.KrP5Mb56/oCM1HuoOlS7UViYrOnqjxtmTtKAWxlP98GrNy'),
(23, 'John McClane', 'johnmcclane@gmail.com', '$2y$10$uyrFaL9NS6UrBFhwxYmLvOnWpZZYklgX.e2h0ncKNgP3hvzrNpMLC'),
(24, 'Joan Rambo', 'joanrambo@hgf.eww', '$2y$10$yBPmbvxjY6xCxY4YKyKoK.ZtTmB0wAlVvQuVVdSbED2xXyTXiaaTK'),
(25, 'TonyStark', 'tstark@jhedg.cd', '$2y$10$GKDGWOGLKRRqlEnvwJp8ru6a05okTIS6MGRFnSmFvem695krgHlS.'),
(26, 'Jwick', 'jwick@gmail.com', '$2y$10$xUU1L4WBHDgDZ5Kkcs6Lu.UuXdUsGUrbPb9d7FE1kURjGEiUSs.KC'),
(27, 'JulioMaldonado', 'jmaldonado@gmail.com', '$2y$10$d2lbV65nEcwALmBwIoV1ceNUJQh2mgx2TRCyG8jpNHMh4I8WszzQO'),
(28, 'OihanSancet', 'osancet@gmail.com', '$2y$10$KNO3mUmJkTFuEgsi4JQWy.E38hUoHHO4SVC.TEGxwFuy..oPG3wdm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuari_id` (`id_usuari`);

--
-- Indices de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`nom`),
  ADD UNIQUE KEY `EMAIL_UNIQUE` (`correu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_usuari`) REFERENCES `usuaris` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
