-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/11/2025 às 18:45
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja_jogos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `jogos`
--

INSERT INTO `jogos` (`id`, `titulo`, `descricao`, `preco`, `imagem`) VALUES
(1, 'Elden Ring', 'Elden Ring é um jogo eletrônico de RPG de ação em terceira pessoa, desenvolvido pela FromSoftware e publicado pela Bandai Namco Entertainment. ', 249.90, 'eldenring.png'),
(2, 'GTA V', 'Grand Theft Auto V é um jogo eletrônico de ação e aventura desenvolvido pela Rockstar North e publicado pela Rockstar Games.', 119.90, 'gtav.png'),
(3, 'The Witcher 3 Wild Hunt', 'The Witcher 3: Wild Hunt é um jogo eletrônico de RPG de ação em mundo aberto desenvolvido pela CD Projekt RED e lançado no dia 19 de maio de 2015 para as plataformas Microsoft Windows, PlayStation 4, Xbox One e em outubro de 2019 para o Nintendo Switch, sendo o terceiro título da série de jogos The Witcher.', 130.00, 'witcher3.png'),
(4, 'Terraria ', 'Terraria é um jogo de RPG de ação e aventura independente produzido pela desenvolvedora de jogos Re-Logic. Possui como características a exploração, artesanato, construção de estruturas e combate a monstros perigosos em um mundo 2D gerado de forma procedural.', 32.00, 'terraria.png\r\n'),
(5, 'Assassin\'s Creed Mirage ', 'Assassin\'s Creed Mirage é um jogo de ação e aventura desenvolvido pela Ubisoft Bordeaux e publicado pela Ubisoft. É a décima terceira parcela principal da série Assassin\'s Creed e a sucessora de Assassin\'s Creed Valhalla de 2020.', 299.00, 'acmirage.png'),
(6, 'Hogwarts Legacy ', 'Hogwarts Legacy é um jogo eletrônico de RPG de ação desenvolvido pela Avalanche Software e publicado pela Warner Bros. Interactive Entertainment sob o selo Portkey Games. O jogo é ambientado no final do século XIX do universo de Harry Potter, um século antes dos eventos narrados nos livros de J.K. Rowling.', 124.00, 'hogwartslegacy.png\r\n'),
(7, 'Deep Rock Galactic ', 'Deep Rock Galactic é um videogame cooperativo de tiro em primeira pessoa desenvolvido pelo estúdio dinamarquês Ghost Ship Games e publicado pela Coffee Stain Publishing. Deep Rock Galactic foi lançado em 13 de maio de 2020 para Windows e Xbox One após passar dois anos em acesso antecipado.', 50.00, 'deeprockgalactic.png'),
(8, 'Resident Evil 4 Remake', 'Resident Evil 4, conhecido no Japão como Biohazard 4, é um jogo eletrônico de survival horror e tiro em terceira pessoa desenvolvido e publicado pela Capcom, lançado originalmente para o GameCube em 2005. É o sexto jogo principal da franquia Resident Evil. A história segue o agente especial Leon S', 84.00, 're4remake.png'),
(9, 'Cyberpunk 2077', 'Cyberpunk 2077 é um jogo eletrônico de RPG de ação desenvolvido pela CD Projekt Red e publicado pela CD Projekt. A história do jogo é ambientada em Night City, um mundo aberto situado no universo fictício de Cyberpunk.', 179.00, 'cyberpunk2077.png'),
(10, 'God Of War Ragnarok ', 'God of War Ragnarök é um jogo eletrônico de ação-aventura desenvolvido pela Santa Monica Studio e publicado pela Sony Interactive Entertainment. Foi lançado em 9 de novembro de 2022 para PlayStation 4 e PlayStation 5. Uma versão foi lançado para o Windows em 19 de setembro de 2024.', 200.00, 'gowragnarok.png'),
(11, 'Spider Man 2', 'Spider-Man 2 é um jogo eletrônico de ação-aventura desenvolvido pela Insomniac Games e publicado pela Sony Interactive Entertainment para o PlayStation 5. É baseado nos personagens, mitologia e adaptações em outras mídias dos personagens de histórias em quadrinhos Miles Morales e Homem-Aranha da Marvel Comics.', 270.00, 'spiderman2.png'),
(12, 'Fifa 2025', 'O EA SPORTS FC™ 25 oferece mais maneiras de ganhar pelo clube. Jogue com suas amizades nos seus modos favoritos com o novo Rush 5x5 e leve seu clube à vitoria.', 190.00, 'fifa2025.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mensagem` text NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
