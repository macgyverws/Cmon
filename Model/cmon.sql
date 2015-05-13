-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Maio-2015 às 06:21
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
  `idevento` int(11) NOT NULL,
  `confirmacao` tinyint(1) NOT NULL,
  `emailconvidado` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `convite`
--

INSERT INTO `convite` (`id`, `idevento`, `confirmacao`, `emailconvidado`) VALUES
(0, 6, 0, 'fabiolima@ufrj.br'),
(1, 1, 0, 'andrezzamilheiro@gmail.com.br'),
(2, 1, 0, 'angelicasampaio47@yahoo.com.br'),
(3, 1, 0, 'andre.paje@bol.com.br'),
(4, 2, 0, 'betty_artes@hotmail.com'),
(5, 2, 0, 'claudio.patricio@yahoo.com.br'),
(6, 2, 0, 'carla@msplogistica.com'),
(7, 2, 0, 'cris_emery@hotmail.com'),
(8, 2, 0, 'corderosadresa@hotmail.com'),
(9, 2, 0, 'andreiarqv@gmail.com'),
(10, 2, 0, 'drajulydonto@terra.com.br'),
(11, 2, 0, 'ddaniellefernandes@hotmail.com'),
(12, 2, 0, 'dudapedroesara@bol.com.br'),
(13, 2, 0, 'eunicemrr@hotmail.com'),
(14, 2, 0, 'eli30rei@yahoo.com.br'),
(15, 3, 0, 'eliascarelles@uol.com.br'),
(16, 3, 0, 'feitosags@oi.com.br'),
(17, 3, 0, 'goia.10@hotmail.com'),
(18, 3, 0, 'geovanifitnes@yahoo.com.br'),
(19, 3, 0, 'irvisgreen@yahoo.com.br '),
(20, 3, 0, 'marcelojaruva@hotmail.com.br'),
(21, 3, 0, 'jaimeteo33@yahoo.com.br'),
(22, 3, 0, 'jorgebritto@ig.com.br'),
(23, 3, 0, 'jeannng@ig.com.br'),
(24, 3, 0, 'josenice_ribeirofrancisco@hotmail.com'),
(25, 3, 0, 'luceliferraz@ig.com.br'),
(26, 4, 1, 'luiz.conde@yahoo.com.br'),
(27, 4, 1, 'mrozildes@hotmail.com'),
(28, 4, 1, 'michellemarinho3@gmail.com'),
(29, 4, 1, 'marizolani@gmail.com'),
(30, 4, 1, 'magalyfao@yahoo.com.br'),
(31, 4, 1, 'marcia_cristina1971@bol.com.br'),
(32, 4, 0, 'nilzambenvindo@gmail.com'),
(33, 4, 0, 'nanaventura@bol.com.br'),
(34, 4, 0, 'ninaleonardo@bol.com.br'),
(35, 5, 0, 'maria@facebook.com'),
(36, 6, 0, 'tcscardoso@yahoo.com.br'),
(37, 6, 0, 'maria@facebook.com'),
(38, 6, 0, 'onac3@ig.com.br'),
(39, 6, 0, 'professora.santos@bol.com.br'),
(40, 6, 0, 'tcscardoso@yahoo.com.br'),
(41, 6, 0, 'tarccarneiro@yahoo.com.br'),
(42, 6, 0, 'vivizinha.vms@gmail.com'),
(43, 6, 0, 'willofe2000@yahoo.com.br'),
(44, 6, 0, 'wssabadin@hotmail.com'),
(45, 6, 0, 'silvatiagos@yahoo.com.br'),
(46, 6, 1, 'dupotiguara@bol.com.br'),
(47, 6, 1, 'jussaraapm@hotmail.com'),
(48, 6, 0, 'magtavares@clicK21.com.br'),
(49, 6, 1, 'augustomiler@hotmail.com.br'),
(50, 6, 0, 'nobretorres@yahoo.com.br'),
(51, 6, 0, 'talesita11@hotmail.com'),
(52, 6, 0, 'wlima@jbrj.gov.br'),
(53, 6, 0, 'willofe2000@yahoo.com.br'),
(55, 7, 0, 'rublucena@yahoo.com.br'),
(56, 7, 0, 'zille_br@terra.com.br'),
(57, 7, 0, 'marciahistoria2000@hotmail.com'),
(58, 7, 0, 'willofe2000@yahoo.com.br'),
(59, 8, 0, 'edilaramos@gmail.com'),
(60, 8, 0, 'monicanazareth@hotmail.com'),
(61, 8, 1, 'ocabeni@clicK21.com.br'),
(62, 8, 1, 'maria@facebook.com'),
(63, 8, 0, 'jean@facebook.com'),
(64, 8, 1, 'mayara@facebook.com'),
(65, 8, 0, 'vanderley@facebook.com'),
(66, 8, 1, 'fflucena@yahoo.com.br'),
(67, 8, 0, 'angelafagundes2009@gmail.com'),
(68, 8, 1, 'pbastoslite@yahoo.com.br'),
(69, 8, 1, 'geonsari@oi.com.br'),
(70, 9, 1, 'maria@facebook.com'),
(71, 9, 0, 'valescajacob@gmail.com'),
(72, 9, 0, 'angelafagundes2009@gmail.com'),
(73, 9, 0, 'jussaraapm@hotmail.com'),
(74, 9, 0, 'professora.santos@bol.com.br'),
(75, 9, 0, 'nanaventura@bol.com.br'),
(76, 9, 0, 'normanewwoman@hotmail.com'),
(77, 9, 1, 'jean@facebook.com'),
(78, 9, 1, 'alvaro@facebook.com'),
(79, 9, 0, 'vanderley@facebook.com'),
(80, 9, 1, 'chicobuarque@facebook.com'),
(81, 9, 1, 'josemarcos@facebook.com'),
(82, 9, 0, 'michael900@facebook.com'),
(83, 9, 0, 'onac3@ig.com.br'),
(84, 9, 0, 'joao@facebook.com'),
(85, 10, 0, 'mayara@facebook.com'),
(86, 10, 0, 'vanderley@facebook.com'),
(87, 10, 0, 'jean@facebook.com'),
(88, 10, 0, 'josemarcos@facebook.com'),
(89, 10, 0, 'michael900@facebook.com'),
(90, 10, 0, 'anajulia@facebook.com'),
(91, 10, 0, 'joao@facebook.com'),
(92, 11, 0, 'mayara@facebook.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `local` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `horainicio` varchar(10) NOT NULL,
  `horatermino` varchar(10) NOT NULL,
  `minimoparticipantes` int(11) NOT NULL,
  `autocancelamento` tinyint(1) NOT NULL,
  `urlimagem` varchar(100) NOT NULL,
  `idCriador` bigint(15) NOT NULL,
  `observacoes` varchar(200) NOT NULL,
  `lembrete` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id`, `nome`, `local`, `data`, `horainicio`, `horatermino`, `minimoparticipantes`, `autocancelamento`, `urlimagem`, `idCriador`, `observacoes`, `lembrete`) VALUES
(1, 'Partida de Buraco', 'Casa de Maria', '2015-05-12', '13:30', '18:30', 4, 1, 'http://thumb101.shutterstock.com/photos/display_pic_with_logo/490780/168545987.jpg', 100000000000001, 'Venham participar!', 1),
(2, 'Baba na Quadra', 'Quadra do Feira VI', '2015-06-12', '07:30', '09:30', 12, 1, 'http://pixabay.com/static/uploads/photo/2014/10/14/20/24/the-ball-488716__180.jpg', 100000000000002, 'Bora jogar uma partida de futebol!', 1),
(3, 'Volei das amigas', 'Quadra da UEFS', '2015-05-16', '18:00', '20:30', 12, 1, 'http://pixabay.com/static/uploads/photo/2014/11/07/00/00/volleyball-520093__180.jpg', 100000000000003, 'Partida para relembrar os tempos de colégio.', 1),
(4, 'Partida de Basquete', 'Quadra da UEFS', '2015-06-20', '19:00', '21:15', 10, 1, 'http://pixabay.com/static/uploads/photo/2013/07/12/14/07/basketball-147794__180.png', 100000000000004, 'Basquete da galera.', 1),
(5, 'Partida de Xadrez', 'Minha Casa', '2015-05-17', '13:00', '15:20', 2, 1, 'http://pixabay.com/static/uploads/photo/2013/07/12/12/03/chess-145184__180.png', 100000000000005, 'Aceita o convite aí!', 1),
(6, 'Campeonato de Futsal', 'Quadra da Praça', '2015-06-12', '08:30', '14:30', 20, 1, 'http://thumb101.shutterstock.com/photos/display_pic_with_logo/793645/119501233.jpg', 100000000000006, '4 Times (5 jogadores p/ time).', 1),
(7, 'Maratona de São Paulo', 'Avenida Paulista', '2015-07-12', '07:00', '09:00', 5, 1, 'http://thumb7.shutterstock.com/photos/display_pic_with_logo/559519/222149761.jpg', 100000000000007, 'Traga sua toalhinha e água para hidratar. Vamos fazer uma bela maratona!', 1),
(8, 'Futebol da 3ª idade', 'Quintal do Álvaro', '2015-05-16', '06:00', '07:30', 12, 1, 'http://pixabay.com/static/uploads/photo/2014/10/14/20/24/the-ball-488716__180.jpg', 100000000000008, 'Futebol com o pessoal das antigas.', 1),
(9, 'Competição de Natação', 'Complexo Aquático do SESC', '2015-06-05', '10:00', '11:30', 16, 1, 'http://thumb101.shutterstock.com/photos/display_pic_with_logo/78238/175095887.jpg', 100000000000009, 'Competição com 4 baterias. 8 homens e 8 mulheres.', 1),
(10, 'Paintball', 'COP Club Operações Paintball', '2015-05-23', '14:30', '16:30', 8, 1, 'http://thumb7.shutterstock.com/photos/display_pic_with_logo/390130/153656045.jpg', 100000000000010, 'Competição de Paintball, participe!', 1),
(11, 'Partida de Tênis', 'Tennis Club', '2015-06-09', '16:30', '18:30', 2, 1, 'http://thumb101.shutterstock.com/photos/display_pic_with_logo/434191/181769753.jpg', 100000000000001, 'Marquei a nossa partida! Vê se aparece.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `idUsuario` bigint(15) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `localizacao` varchar(50) NOT NULL,
  `urlfoto` varchar(200) NOT NULL,
  `idade` int(11) NOT NULL,
  `esportefavorito` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `idUsuario`, `nome`, `localizacao`, `urlfoto`, `idade`, `esportefavorito`) VALUES
(1, 1000000000000001, 'Maria do Rosário', 'Rio de Janeiro', 'http://pixabay.com/static/uploads/photo/2015/03/04/19/42/woman-659352__180.jpg', 20, 'Tenis'),
(2, 100000000000002, 'João Batista', 'Feira de Santana', 'http://pixabay.com/static/uploads/photo/2015/03/26/13/40/man-692753__180.jpg', 25, 'Futebol'),
(3, 100000000000003, 'Ana Julia', 'Feira de Santana', 'http://pixabay.com/static/uploads/photo/2015/02/13/14/32/apples-635240__180.jpg', 19, 'Volei'),
(4, 100000000000004, 'Michael Jordan', 'Feira de Santana', 'http://pixabay.com/static/uploads/photo/2013/03/21/15/52/basketball-95607__180.jpg', 27, 'Basquete'),
(5, 100000000000005, 'José Marcos Silveira', 'Curitiba', 'http://pixabay.com/static/uploads/photo/2014/11/04/09/50/people-516370__180.jpg', 23, 'Futebol Americano'),
(6, 100000000000006, 'Francisco Buarque', 'Manaus', 'http://pixabay.com/static/uploads/photo/2014/11/21/12/13/man-540500__180.jpg', 29, 'Futsal'),
(7, 100000000000007, 'Vanderley Ferreira', 'São Paulo', 'http://pixabay.com/static/uploads/photo/2014/08/26/20/08/photographer-428388__180.jpg', 34, 'Atletismo'),
(8, 100000000000008, 'Álvaro Ribeiro', 'Florianópolis', 'http://pixabay.com/static/uploads/photo/2015/03/23/09/00/cowboy-685768__180.jpg', 67, 'Futebol'),
(9, 100000000000009, 'Mayara Silva', 'Maceió', 'http://pixabay.com/static/uploads/photo/2014/08/27/05/23/aircraft-428894__180.jpg', 26, 'Natação'),
(10, 100000000000010, 'Jean Oliveira', 'Feira de Santana', 'http://pixabay.com/static/uploads/photo/2015/02/06/23/31/man-626666__180.jpg', 28, 'Luta Livre');

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
