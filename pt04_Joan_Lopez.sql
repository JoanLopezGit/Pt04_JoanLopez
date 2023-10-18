-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2023 a las 16:14:40
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `article` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `article`) VALUES
(1, 'House Is Paralyzed, With No Speaker After McCarthy Ouster.After a historic vote to remove the speaker, lawmakers departed Washington on Tuesday night with the House of Representatives in chaos and no clear sense of who might lead it.'),
(2, 'Matt Gaetz, a Polarizing Figure in Congress, Is Polarizing at Home, Too. In an overwhelmingly Republican district, Mr. Gaetz is admired for shaking up the House, but he also has plenty of critics.'),
(3, 'Giuliani’s Drinking, Long a Fraught Subject, Has Trump Prosecutors’ Attention.The former mayor’s drinking has become an investigative subplot in Donald Trump’s federal case over 2020 election interference. But long before that, friends had grown deeply concerned.'),
(4, 'For 73 years Turkey has been a member of the Council of Europe, the organisation established in 1949, long before there was a European Union, to protect fundamental human rights on European soil in the wake of the second world war. Recent developments suggest it may not be a member for much longer.'),
(5, 'The horror of two world wars prompted France, West Germany and others to link arms and create what is today the European Union. Seventy years on, war has returned to the continent. Out of the rubble in Ukraine, something akin to the sentiment that moved the eu’s founding fathers is stirring again. The talk now is of admitting as many as nine new members, including Ukraine. Joining the world’s most successful club of peaceful, prosperous democracies would set that war-ravaged country—and fellow aspirant members in the Western Balkans, Georgia and Moldova—on a new and promising path.'),
(6, 'IRELAND IS SET to co-host the 2028 Uefa European Championships alongside the United Kingdom, with Uefa today confirming their bid to stage the tournament is unopposed. Turkey initially submitted a rival bid for the tournament but subsequently announced their intention to bid for the 2032 edition of the tournament, against Italy.It then emerged earlier this year that Turkey and Italy would submit a joint bid for the 2032 tournament rather than compete against one another, and today Uefa announced that Turkey’s bid for 2028 has been withdrawn as a result. '),
(7, 'STARDUST MANAGER EAMON Butterly has told an inquest into the fire that killed 48 people in 1981 that the policy of keeping exit doors in the nightclub locked on disco nights was “unsafe” and they should not have been locked.Mr Butterly said that “the consequences would be bad” if the doors were locked during an emergency, but he told the jury at the Dublin District Coroner’s Court that head doorman Tom Kennan and the staff “would be keeping an eye on the doors” and were able to open them at any stage. '),
(8, 'The Blown Call—by the Video Ref—That’s Driving Soccer Nuts.A wrongly disallowed Liverpool goal over the weekend showed just how chaotic the Premier League’s replay process remains—and prompted an English soccer meltdown along the way.'),
(9, 'Democrats Still Publicly Back Biden for 2024. Privately, Their Fears Are Growing.\r\nPolls show warning signs for the incumbent, but few Democrats see viable Plan B'),
(10, 'Gavin Newsom Appoints Laphonza Butler to Fill Dianne Feinstein’s Senate Seat Butler, previously a labor leader in California, is currently president of Emily’s List\r\n.'),
(11, 'Sánchez mantendrá “coordinación permanente” con Illa para las negociaciones con Junts y ERC RUMBO A LA INVESTIDURA\r\nEl líder del PSOE mantendrá un encuentro esta tarde con el dirigente socialista catalán al inicio de las conversaciones para la investidura\r\nEl presidente en funciones se reunirá con todos los grupos, salvo Vox, y designa una comisión que tomará el relevo de las conversaciones, a la que además de Bolaños, Montero y Cerdán se incorporan, entre otros, Óscar Puente'),
(12, 'Opposition to Ukraine Aid Becomes a Litmus Test for the Right\r\nThe drama that has played out among House Republicans highlights a sharp decline in the party’s willingness to back more aid to Kyiv.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
