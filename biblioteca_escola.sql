-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Nov-2018 às 19:13
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca_escola`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_livro`
--

CREATE TABLE `categoria_livro` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `criado` datetime NOT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categoria_livro`
--

INSERT INTO `categoria_livro` (`id`, `nome`, `criado`, `modificado`) VALUES
(1, 'Politica ', '2018-10-11 21:38:25', '2018-10-12 12:05:50'),
(2, 'EducaÃ§Ã£o ', '2018-10-11 21:43:05', '2018-10-12 12:16:25'),
(8, 'Outras', '2018-10-12 12:28:31', NULL),
(9, 'AÃ§Ã£o', '2018-10-12 12:47:55', NULL),
(24, 'Biografias', '2018-10-12 12:54:56', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `criado` datetime NOT NULL,
  `modificado` datetime DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `nome`, `autor`, `categoria`, `criado`, `modificado`, `quantidade`, `descricao`) VALUES
(2, 'O vendedor de sonhos', 'Augusto Cury', 'outros', '2018-09-26 06:04:07', '2018-11-09 17:37:07', 14, 'DescriÃ§Ã£o do Livro'),
(7, 'O vendedor de sonhos 2', 'Augusto Cury', 'outros', '2018-09-26 23:35:09', '2018-11-02 15:07:34', 10, 'DescriÃ§Ã£o do Livro'),
(10, 'Os Ãšltimos Soldados da Guerra Fria', 'Fernando Morais', 'AÃ§Ã£o', '2018-09-29 10:16:59', '2018-11-08 19:13:22', 55, 'No inÃ­cio da dÃ©cada de 1990, Cuba criou a Rede Vespa, um grupo de doze homens e duas mulheres, que se infiltrou nos Estados Unidos com objetivo de espionar alguns dos 47 grupos anticastristas sediados na FlÃ³rida. O motivo dessa operaÃ§Ã£o era colher informaÃ§Ãµes para que pudessem evitar ataques terroristas ao territÃ³rio cubano.'),
(12, 'A Ãšltima SuperstiÃ§Ã£o - Uma RefutaÃ§Ã£o do NeoateÃ­smo', 'Edward Feser', 'AÃ§Ã£o', '2018-09-29 11:09:50', '2018-11-09 17:37:02', 11, 'â€œIncursÃ£o criteriosa e teologicamente sofisticada Ã s fileiras do neoateÃ­smo, a obra de Feser Ã© uma polÃªmica vigorosa e culta contra a Ãºltima safra de ateus de provÃ­ncia â€“ Richard Dawkins, Daniel Dennett e companhia limitada â€“ que, nos Ãºltimos anos, ofereceu ao pÃºblico entretenimento demais e esclarecimento de menos. Ã‰ uma objeÃ§Ã£o sÃ©ria, desenvolvida com ardor, Ã  tentativa mais '),
(13, 'O Primo BasÃ­lio ', 'EÃ§a de QueirÃ³s', 'Literatura', '2018-09-29 15:04:26', '2018-11-09 17:36:59', 100, 'Primeiro grande Ãªxito literÃ¡rio de EÃ§a de QueirÃ³s, este romance Ã© marcado por uma anÃ¡lise minuciosa da sociedade de seu tempo. O autor usou da ironia, da linguagem coloquial e direta e, principalmente, do olhar atento sobre o cotidiano para revelar a intimidade da vida burguesa. LuÃ­sa Ã© casada com Jorge e leva uma vidinha tÃ£o segura quanto entediada. O sonho, o romantismo e o desejo sÃ£o despertados pela chegada do primo BasÃ­lio a Lisboa. Ao optar pelo adultÃ©rio como tema central, a intenÃ§Ã£o do autor era provocar a discussÃ£o. EÃ§a Ã© o grande mestre do romance portuguÃªs moderno '),
(16, '1964 - O ELO PERDIDO', 'Mauro Abranches Kraenski e Vladimir PetrilÃ¡k', 'Outras', '2018-10-11 21:23:55', '2018-11-08 19:13:12', 11, 'Este livro pÃµe em nova perspectiva as conturbadas dÃ©cadas de 50 e 60 no Brasil pelo prisma dos documentos oficiais dos serviÃ§os secretos do bloco soviÃ©tico, que atuaram no paÃ­s de forma intensa e muitas vezes insuspeita.<br><br>\r\n\r\nSÃ£o relatÃ³rios de agentes secretos, planos de operaÃ§Ãµes, recibos de pagamento em dinheiro de colaboradores brasileiros e outras informaÃ§Ãµes sobre a presenÃ§a ilegal dos paÃ­ses comunistas no Brasil, que nÃ£o sÃ³ surpreendem como denunciam atividades atentatÃ³rias Ã  seguranÃ§a nacional.<br><br>\r\n\r\nA ousadia dessa infiltraÃ§Ã£o foi tamanha que dela foram alvos os gabinetes presidenciais dos trÃªs Ãºltimos governos antes do notÃ³rio 31 de marÃ§o de 1964.'),
(18, 'O PODER DO HÃBITO', 'CHARLES DUHIGG', 'Profissional', '2018-10-12 13:19:36', '2018-11-09 17:37:01', 2, 'Durante os Ãºltimos dois anos, uma jovem transformou quase todos os aspectos de sua vida. Parou de fumar, correu uma maratona e foi promovida. Em um laboratÃ³rio, neurologistas descobriram que os padrÃµes dentro do cÃ©rebro dela mudaram de maneira fundamental. PublicitÃ¡rios da Procter & Gamble observaram vÃ­deos de pessoas fazendo a cama. Tentavam desesperadamente descobrir como vender um novo produto chamado Febreze, que estava prestes a se tornar um dos maiores fracassos na histÃ³ria da empresa. De repente, um deles detecta um padrÃ£o quase imperceptÃ­vel - e, com uma sutil mudanÃ§a na campanha publicitÃ¡ria, Febreze comeÃ§a a vender um bilhÃ£o de dÃ³lares por anos. Um diretor executivo pouco conhecido assume uma das maiores empresas norte-americanas. Seu primeiro passo Ã© atacar um Ãºnico padrÃ£o entre os funcionÃ¡rios - a maneira como lidam com a seguranÃ§a no ambiente de trabalho -, e logo a empresa comeÃ§a a ter o melhor desempenho no Ã­ndice Dow Jones. O que todas essas pessoas tem em comum? Conseguiram ter sucesso focando em padrÃµes que moldam cada aspecto de nossas vidas. Tiveram Ãªxito transformando hÃ¡bitos. Com perspicÃ¡cia e habilidade, Charles Duhigg apresenta um novo entendimento da natureza humana e seu potencial para a transformaÃ§Ã£o.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resevados`
--

CREATE TABLE `resevados` (
  `id` int(11) NOT NULL,
  `nome_livro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `matricula` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nome_usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `criado` datetime NOT NULL,
  `email_usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_livro` int(11) NOT NULL,
  `quant_livros` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nivel_acesso_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `matricula` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `email` varchar(220) NOT NULL,
  `entrada` datetime NOT NULL,
  `status` varchar(2) NOT NULL,
  `numero` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `nivel_acesso_id`, `created`, `modified`, `matricula`, `color`, `email`, `entrada`, `status`, `numero`) VALUES
(15, 'Administrador', '123', 1, '2018-06-09 11:02:31', '2018-11-06 18:25:54', '123456', 'default', 'administrador@biblioteca.com', '2018-11-10 14:53:29', '0', '18'),
(16, 'Aluno da PlÃ¡cido', '123', 0, '2018-06-09 11:03:24', '2018-11-02 15:55:56', '654321', 'default', 'aluno@biblioteca.com', '2018-11-08 19:17:17', '0', '02'),
(17, 'Isaque Veras', '123', 1, '2018-10-16 16:43:52', '2018-11-05 23:55:44', '2979992', 'default', 'isaqueveras@biblioteca.com', '2018-11-10 15:12:10', '1', '18'),
(18, 'JosÃ© Bonifacio', '00', 0, '2018-10-16 16:46:24', '2018-11-05 22:18:50', '00', 'default', 'isaque@sysveras.tech', '2018-11-05 22:20:42', '0', '01'),
(19, 'Ismael', '1010', 0, '2018-11-05 22:29:57', NULL, '1010', 'default', 'ismael@veras.com', '2018-11-08 19:32:41', '0', '19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria_livro`
--
ALTER TABLE `categoria_livro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resevados`
--
ALTER TABLE `resevados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria_livro`
--
ALTER TABLE `categoria_livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `resevados`
--
ALTER TABLE `resevados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
