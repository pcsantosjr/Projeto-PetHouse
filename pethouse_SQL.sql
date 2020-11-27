-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2020 às 22:11
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pethouse`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `cardNumber` int(11) NOT NULL,
  `dueDate` date NOT NULL,
  `cardName` varchar(100) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `valorCompra` decimal(10,2) NOT NULL,
  `idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `card`
--

INSERT INTO `card` (`id`, `idUser`, `cardNumber`, `dueDate`, `cardName`, `cvv`, `valorCompra`, `idProduto`) VALUES
(13, 7, 0, '0000-00-00', '', '', '0.00', 0),
(14, 7, 0, '0000-00-00', '', '', '0.00', 0),
(15, 7, 0, '0000-00-00', '', '', '0.00', 0),
(16, 7, 0, '0000-00-00', '', '', '0.00', 0),
(17, 7, 0, '0000-00-00', '', '', '0.00', 1),
(18, 7, 0, '0000-00-00', '', '', '0.00', 1),
(19, 7, 0, '0000-00-00', '', '', '65.00', 0),
(20, 7, 0, '0000-00-00', '', '', '65.00', 1),
(21, 7, 111111, '0000-00-00', 'Greg', '123', '65.00', 1),
(22, 7, 0, '0000-00-00', '', '', '65.00', 1),
(23, 7, 0, '0000-00-00', '', '', '65.00', 1),
(24, 7, 0, '0000-00-00', '', '', '18.00', 1),
(25, 7, 2147483647, '0000-00-00', 'teste', '111', '18.00', 1),
(26, 7, 0, '0000-00-00', '', '', '18.00', 1),
(27, 7, 0, '0000-00-00', '', '', '18.00', 1),
(28, 7, 0, '0000-00-00', '', '', '18.00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `typeOfProduct` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `price`, `typeOfProduct`, `image`) VALUES
(1, 'Brinquedo de corda', '50', '34.99', 2, 'brink_01.jpg'),
(2, 'Osso de borracha', '50', '18.99', 2, 'brink_02.jpg'),
(3, 'Bola de linha', '50', '28.99', 2, 'brink_03.jpg'),
(4, 'Polvo de borracha', '50', '23.99', 2, 'brink_04.jpg'),
(5, 'Galinha de borracha', '50', '33.99', 2, 'brink_05.jpg'),
(6, 'Bola de silicone', '50', '28.99', 2, 'brink_06.jpg'),
(7, 'Lenço/bandana de pescoço ajustável, estampa geométrico', '50', '17.99', 3, 'moda_01.jpg'),
(8, 'Coleira/bandana de pescoço ajustável', '50', '18.99', 3, 'moda_02.jpg'),
(9, 'Lenço de pescoço ajustável, estampa de doces', '50', '14.99', 3, 'moda_03.jpg'),
(10, 'Lenço de pescoço ajustável, xadrez', '50', '18.99', 3, 'moda_04.jpg'),
(11, 'Lenço/bandana de pescoço ajustável, amarelo', '50', '16.99', 3, 'moda_05.jpg'),
(12, 'Lenço/bandana de pescoço ajustável, xadrez', '50', '17.99', 3, 'moda_06.jpg'),
(13, 'Ração Pedigree Adultos, raças medias e grandes. 10Kg', '50', '143.99', 1, 'racao_01.jpg'),
(14, 'Ração Quatree Goumert, para cães adultos, raças médias', '50', '50.99', 1, 'racao_02.jpg'),
(15, 'Ração VittaMax para cães filhotes, raças médias e grandes', '50', '27.99', 1, 'racao_03.jpg'),
(16, 'Ração ND Prime para gatos adultos, 1,5 Kg', '50', '99.99', 1, 'racao_04.jpg'),
(17, 'Ração Premier para cães adultos, raças médias e grandes', '50', '29.99', 1, 'racao_05.jpg'),
(18, 'Ração Coby para cães, raças médias e grandes, 10Kg', '50', '57.99', 1, 'racao_06.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipodeproduto`
--

CREATE TABLE `tipodeproduto` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipodeproduto`
--

INSERT INTO `tipodeproduto` (`id`, `description`) VALUES
(1, 'Alimento'),
(2, 'Brinquedo'),
(3, 'Roupa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `cep` int(7) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(500) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `cpf`, `email`, `telephone`, `cep`, `endereco`, `numero`, `bairro`, `complemento`, `cidade`, `estado`, `created_at`) VALUES
(7, 'Thamires', '$2y$10$ubzIRUqWGzxkN', 'Thamires de Araújo', '000.000.000', 'thamires.arapereira25@gmail.com', '11984165787', 6365600, 'Rua Salopis', '1', 'Centro', 'Casa 2', 'Carapicuíba', 'SP', '2020-11-15 17:25:06'),
(8, 'Paulo', '$2y$10$QzEjm5z8LewMP', 'Paulo Cesar', '111.111.111', 'paulo@paulo.com', '1199999999', 6666000, 'Rua A', '1', 'Centro', 'Apto1', 'São Paulo', 'SP', '2020-11-21 16:44:06');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_TipoDeProduto` (`typeOfProduct`);

--
-- Índices para tabela `tipodeproduto`
--
ALTER TABLE `tipodeproduto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `tipodeproduto`
--
ALTER TABLE `tipodeproduto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
