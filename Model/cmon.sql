-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Maio-2015 às 23:53
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cmon`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `convite`
--

CREATE TABLE IF NOT EXISTS `convite` (
  `id` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `confirmacao` tinyint(1) NOT NULL,
  `idConvidado` bigint(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `convite`
--

INSERT INTO `convite` (`id`, `idEvento`, `confirmacao`, `idConvidado`) VALUES
(1, 1, 0, 000000000000001),
(2, 1, 0, 000000000000002),
(3, 1, 0, 000000000000003),
(4, 2, 0, 000000000000004),
(5, 2, 0, 000000000000005),
(6, 2, 0, 000000000000006),
(7, 2, 0, 000000000000007),
(8, 2, 0, 000000000000008),
(9, 2, 0, 000000000000009),
(10, 2, 0, 000000000000010),
(11, 2, 0, 000000000000011),
(12, 2, 0, 000000000000012),
(13, 2, 0, 000000000000013),
(14, 2, 0, 000000000000014),
(15, 3, 0, 000000000000015),
(16, 3, 0, 000000000000016),
(17, 3, 0, 000000000000017),
(18, 3, 0, 000000000000018),
(19, 3, 0, 000000000000019),
(20, 3, 0, 000000000000020),
(21, 3, 0, 000000000000021),
(22, 3, 0, 000000000000022),
(23, 3, 0, 000000000000023),
(24, 3, 0, 000000000000024),
(25, 3, 0, 000000000000025),
(26, 4, 1, 000000000000026),
(27, 4, 1, 000000000000027),
(28, 4, 1, 000000000000028),
(29, 4, 1, 000000000000029),
(30, 4, 1, 000000000000030),
(31, 4, 1, 000000000000031),
(32, 4, 0, 000000000000032),
(33, 4, 0, 000000000000033),
(34, 4, 0, 000000000000034),
(35, 5, 0, 000000000000035),
(36, 6, 0, 000000000000036),
(37, 6, 0, 000000000000037),
(38, 6, 0, 000000000000038),
(39, 6, 0, 000000000000039),
(40, 6, 0, 000000000000040),
(41, 6, 0, 000000000000041),
(42, 6, 0, 000000000000042),
(43, 6, 0, 000000000000043),
(44, 6, 0, 000000000000044),
(45, 6, 0, 000000000000045),
(46, 6, 1, 000000000000046),
(47, 6, 1, 000000000000047),
(48, 6, 0, 000000000000048),
(49, 6, 1, 000000000000049),
(50, 6, 0, 000000000000050),
(51, 6, 0, 000000000000051),
(52, 6, 0, 000000000000052),
(53, 6, 0, 000000000000053),
(54, 6, 0, 000000000000054),
(55, 7, 0, 000000000000055),
(56, 7, 0, 000000000000056),
(57, 7, 0, 000000000000057),
(58, 7, 0, 000000000000058),
(59, 8, 0, 000000000000059),
(60, 8, 0, 000000000000060),
(61, 8, 1, 000000000000061),
(62, 8, 1, 000000000000062),
(63, 8, 0, 000000000000063),
(64, 8, 1, 000000000000064),
(65, 8, 0, 000000000000065),
(66, 8, 1, 000000000000066),
(67, 8, 0, 000000000000067),
(68, 8, 1, 000000000000068),
(69, 8, 1, 000000000000069),
(70, 9, 1, 000000000000070),
(71, 9, 0, 000000000000071),
(72, 9, 0, 000000000000072),
(73, 9, 0, 000000000000073),
(74, 9, 0, 000000000000074),
(75, 9, 0, 000000000000075),
(76, 9, 0, 000000000000076),
(77, 9, 1, 000000000000077),
(78, 9, 1, 000000000000078),
(79, 9, 0, 000000000000079),
(80, 9, 1, 000000000000080),
(81, 9, 1, 000000000000081),
(82, 9, 0, 000000000000082),
(83, 9, 0, 000000000000083),
(84, 9, 0, 000000000000084),
(85, 10, 0, 000000000000085),
(86, 10, 0, 000000000000086),
(87, 10, 0, 000000000000087),
(88, 10, 0, 000000000000088),
(89, 10, 0, 000000000000089),
(90, 10, 0, 000000000000090),
(91, 10, 0, 000000000000091),
(92, 11, 0, 000000000000092);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `local` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `horaInicio` varchar(10) NOT NULL,
  `horaTermino` varchar(10) NOT NULL,
  `minimoParticipantes` int(11) NOT NULL,
  `autoCancelamento` tinyint(1) NOT NULL,
  `imagemURL` varchar(100) NOT NULL,
  `idCriador` bigint(15) NOT NULL,
  `observacoes` varchar(200) NOT NULL,
  `lembrete` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id`, `nome`, `local`, `data`, `horaInicio`, `horaTermino`, `minimoParticipantes`, `autoCancelamento`, `imagemURL`, `idCriador`, `observacoes`, `lembrete`) VALUES
(1, 'Partida de Buraco', 'Casa de Maria', '2015-05-12', '13:30', '18:30', 4, 1, 'http://thumb101.shutterstock.com/photos/display_pic_with_logo/490780/168545987.jpg', 000000000000085, 'Venham participar!', 1),
(2, 'Baba na Quadra', 'Quadra do Feira VI', '2015-06-12', '07:30', '09:30', 12, 1, 'http://pixabay.com/static/uploads/photo/2014/10/14/20/24/the-ball-488716__180.jpg', 000000000000086, 'Bora jogar uma partida de futebol!', 1),
(3, 'Volei das amigas', 'Quadra da UEFS', '2015-05-16', '18:00', '20:30', 12, 1, 'http://pixabay.com/static/uploads/photo/2014/11/07/00/00/volleyball-520093__180.jpg', 000000000000087, 'Partida para relembrar os tempos de colégio.', 1),
(4, 'Partida de Basquete', 'Quadra da UEFS', '2015-06-20', '19:00', '21:15', 10, 1, 'http://pixabay.com/static/uploads/photo/2013/07/12/14/07/basketball-147794__180.png', 000000000000088, 'Basquete da galera.', 1),
(5, 'Partida de Xadrez', 'Minha Casa', '2015-05-17', '13:00', '15:20', 2, 1, 'http://pixabay.com/static/uploads/photo/2013/07/12/12/03/chess-145184__180.png', 000000000000089, 'Aceita o convite aí!', 1),
(6, 'Campeonato de Futsal', 'Quadra da Praça', '2015-06-12', '08:30', '14:30', 20, 1, 'http://thumb101.shutterstock.com/photos/display_pic_with_logo/793645/119501233.jpg', 000000000000090, '4 Times (5 jogadores p/ time).', 1),
(7, 'Maratona de São Paulo', 'Avenida Paulista', '2015-07-12', '07:00', '09:00', 5, 1, 'http://thumb7.shutterstock.com/photos/display_pic_with_logo/559519/222149761.jpg', 000000000000091, 'Traga sua toalhinha e água para hidratar. Vamos fazer uma bela maratona!', 1),
(8, 'Futebol da 3ª idade', 'Quintal do Álvaro', '2015-05-16', '06:00', '07:30', 12, 1, 'http://pixabay.com/static/uploads/photo/2014/10/14/20/24/the-ball-488716__180.jpg', 000000000000092, 'Futebol com o pessoal das antigas.', 1),
(9, 'Competição de Natação', 'Complexo Aquático do SESC', '2015-06-05', '10:00', '11:30', 16, 1, 'http://thumb101.shutterstock.com/photos/display_pic_with_logo/78238/175095887.jpg', 000000000000069, 'Competição com 4 baterias. 8 homens e 8 mulheres.', 1),
(10, 'Paintball', 'COP Club Operações Paintball', '2015-05-23', '14:30', '16:30', 8, 1, 'http://thumb7.shutterstock.com/photos/display_pic_with_logo/390130/153656045.jpg', 000000000000083, 'Competição de Paintball, participe!', 1),
(11, 'Partida de Tênis', 'Tennis Club', '2015-06-09', '16:30', '18:30', 2, 1, 'http://thumb101.shutterstock.com/photos/display_pic_with_logo/434191/181769753.jpg', 000000000000085, 'Marquei a nossa partida! Vê se aparece.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `idUsuario` bigint(15) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `localizacao` varchar(50) NOT NULL,
  `fotoURL` varchar(200) NOT NULL,
  `idade` int(11) NOT NULL,
  `esporteFavorito` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `idUsuario`, `nome`, `localizacao`, `fotoURL`, `idade`, `esporteFavorito`) VALUES
(1, 000000000000085, 'Maria do Rosário', 'Rio de Janeiro', 'http://pixabay.com/static/uploads/photo/2015/03/04/19/42/woman-659352__180.jpg', 20, 'Tenis'),
(2, 000000000000086, 'João Batista', 'Feira de Santana', 'http://pixabay.com/static/uploads/photo/2015/03/26/13/40/man-692753__180.jpg', 25, 'Futebol'),
(3, 000000000000087, 'Ana Julia', 'Feira de Santana', 'http://pixabay.com/static/uploads/photo/2015/02/13/14/32/apples-635240__180.jpg', 19, 'Volei'),
(4, 000000000000088, 'Michael Jordan', 'Feira de Santana', 'http://pixabay.com/static/uploads/photo/2013/03/21/15/52/basketball-95607__180.jpg', 27, 'Basquete'),
(5, 000000000000089, 'José Marcos Silveira', 'Curitiba', 'http://pixabay.com/static/uploads/photo/2014/11/04/09/50/people-516370__180.jpg', 23, 'Futebol Americano'),
(6, 000000000000090, 'Francisco Buarque', 'Manaus', 'http://pixabay.com/static/uploads/photo/2014/11/21/12/13/man-540500__180.jpg', 29, 'Futsal'),
(7, 000000000000091, 'Vanderley Ferreira', 'São Paulo', 'http://pixabay.com/static/uploads/photo/2014/08/26/20/08/photographer-428388__180.jpg', 34, 'Atletismo'),
(8, 000000000000092, 'Álvaro Ribeiro', 'Florianópolis', 'http://pixabay.com/static/uploads/photo/2015/03/23/09/00/cowboy-685768__180.jpg', 67, 'Futebol'),
(9, 000000000000069, 'Mayara Silva', 'Maceió', 'http://pixabay.com/static/uploads/photo/2014/08/27/05/23/aircraft-428894__180.jpg', 26, 'Natação'),
(10, 000000000000083, 'Jean Oliveira', 'Feira de Santana', 'http://pixabay.com/static/uploads/photo/2015/02/06/23/31/man-626666__180.jpg', 28, 'Luta Livre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `convite`
--
ALTER TABLE `convite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `convite`
--
ALTER TABLE `convite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
