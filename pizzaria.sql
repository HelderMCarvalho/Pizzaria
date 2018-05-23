-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 23-Maio-2018 às 12:02
-- Versão do servidor: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE IF NOT EXISTS `carrinho` (
  `ID` int(11) NOT NULL COMMENT 'ID do carrinho',
  `pessoaID` int(11) NOT NULL COMMENT 'ID da pessoa a quem pertence o carrinho',
  `total` float NOT NULL DEFAULT '0' COMMENT 'Total do carrinho (a pagar)'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Carrinho de compras';

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`ID`, `pessoaID`, `total`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `crostaPizza`
--

CREATE TABLE IF NOT EXISTS `crostaPizza` (
  `ID` int(11) NOT NULL COMMENT 'ID da crosta da pizza',
  `nome` varchar(50) NOT NULL COMMENT 'Nome da crosta da pizza',
  `preco` float NOT NULL COMMENT 'Preço da crosta da pizza'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Crostas da pizza';

--
-- Extraindo dados da tabela `crostaPizza`
--

INSERT INTO `crostaPizza` (`ID`, `nome`, `preco`) VALUES
(1, 'Tradicional', 1),
(2, 'Alta', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomenda`
--

CREATE TABLE IF NOT EXISTS `encomenda` (
  `ID` int(11) NOT NULL COMMENT 'ID da encomenda',
  `pessoaID` int(11) NOT NULL COMMENT 'ID da pessoa ao qual pertence a encomenda',
  `total` float NOT NULL COMMENT 'Total da encomenda (pago)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Representa uma encomenda (um carrinho que já foi pago)';

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingredientePizza`
--

CREATE TABLE IF NOT EXISTS `ingredientePizza` (
  `ID` int(11) NOT NULL COMMENT 'ID do ingrediente da pizza',
  `nome` varchar(50) NOT NULL COMMENT 'Nome do ingrediente da pizza',
  `imagem` varchar(535) NOT NULL COMMENT 'Caminho da imagem do ingrediente da pizza',
  `preco` float NOT NULL COMMENT 'Preço do ingrediente da pizza'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Ingredientes da pizza';

--
-- Extraindo dados da tabela `ingredientePizza`
--

INSERT INTO `ingredientePizza` (`ID`, `nome`, `imagem`, `preco`) VALUES
(1, 'Fiambre', '/img/fiambre.png', 0.1),
(2, 'Bacon', '/img/bacon.png', 0.15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingredientePizzaPorPizza`
--

CREATE TABLE IF NOT EXISTS `ingredientePizzaPorPizza` (
  `pizzaID` int(11) NOT NULL COMMENT 'ID da pizza ao qual pertence o ingrediente',
  `ingredientePizzaID` int(11) NOT NULL COMMENT 'ID do ingrediente em questão',
  `quantidade` int(11) NOT NULL COMMENT 'Quantidade do ingrediente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que guarda os ingredientes de cada pizza e a respetiva quantidade';

--
-- Extraindo dados da tabela `ingredientePizzaPorPizza`
--

INSERT INTO `ingredientePizzaPorPizza` (`pizzaID`, `ingredientePizzaID`, `quantidade`) VALUES
(1, 1, 5),
(1, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemCarrinho`
--

CREATE TABLE IF NOT EXISTS `itemCarrinho` (
  `ID` int(11) NOT NULL COMMENT 'ID',
  `pizzaID` int(11) NOT NULL COMMENT 'ID da pizza nesta linha do carrinho',
  `quantidade` int(11) NOT NULL COMMENT 'Quantidade da pizza desta linha do carrinho',
  `carrinhoID` int(11) NOT NULL COMMENT 'ID do carrinho ao qual esta linha do carrinho pertence'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Tabela que guarda as pizzas dos carrinhos';

--
-- Extraindo dados da tabela `itemCarrinho`
--

INSERT INTO `itemCarrinho` (`ID`, `pizzaID`, `quantidade`, `carrinhoID`) VALUES
(4, 1, 3, 1),
(5, 1, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemEncomenda`
--

CREATE TABLE IF NOT EXISTS `itemEncomenda` (
  `ID` int(11) NOT NULL COMMENT 'ID do item da encomenda',
  `pizzaID` int(11) NOT NULL COMMENT 'ID da pizza nesta linha da encomenda',
  `quantidade` int(11) NOT NULL COMMENT 'Quantidade da pizza desta linha da encomenda',
  `encomendaID` int(11) NOT NULL COMMENT 'ID da encomenda à qual esta linha pertence'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que guarda as pizzas das encomendas';

-- --------------------------------------------------------

--
-- Estrutura da tabela `molhoPizza`
--

CREATE TABLE IF NOT EXISTS `molhoPizza` (
  `ID` int(11) NOT NULL COMMENT 'ID do molho da pizza',
  `nome` varchar(50) NOT NULL COMMENT 'Nome do molho da pizza',
  `preco` float NOT NULL COMMENT 'Preço do molho da pizza'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Molhos da pizza';

--
-- Extraindo dados da tabela `molhoPizza`
--

INSERT INTO `molhoPizza` (`ID`, `nome`, `preco`) VALUES
(1, 'Tomate', 1),
(2, 'Barbecue', 2),
(3, 'Manteiga', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `ID` int(11) NOT NULL COMMENT 'ID da pessoa',
  `nome` varchar(25) NOT NULL COMMENT 'Primeiro nome da pessoa',
  `apelido` varchar(25) NOT NULL COMMENT 'Último nome da pessoa',
  `email` varchar(535) NOT NULL COMMENT 'Email da pessoa',
  `dataNascimento` date NOT NULL COMMENT 'Data de nascimento da pessoa',
  `morada` varchar(50) NOT NULL COMMENT 'Morada/Rua da pessoa',
  `codigoPostal` varchar(8) NOT NULL COMMENT 'Código postal da pessoa',
  `freguesia` varchar(20) NOT NULL COMMENT 'Freguesia da pessoa',
  `distrito` varchar(20) NOT NULL COMMENT 'Distrito da pessoa',
  `tipoPessoa` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Tipo de pessoa (0 - Cliente | 1 - Funcionário)',
  `funcaoFuncionario` varchar(20) DEFAULT NULL COMMENT 'Função de funcionário (caso esta pessoa seja)',
  `password` varchar(535) NOT NULL COMMENT 'Password da pessoa'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Pessoa (tem os atributos em comum de Cliente e Funcionário)';

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`ID`, `nome`, `apelido`, `email`, `dataNascimento`, `morada`, `codigoPostal`, `freguesia`, `distrito`, `tipoPessoa`, `funcaoFuncionario`, `password`) VALUES
(1, 'teste', 'um', 'teste@teste.pt', '2018-05-18', 'Rua da Lama, 151', '4755-437', 'Remelhe', 'Braga', 0, NULL, '$2y$10$lOxam2ySywIQAsIo.QO/X.IYLhpQDLjNDrkpUUP.5VPGhhm.wZou6');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pizza`
--

CREATE TABLE IF NOT EXISTS `pizza` (
  `ID` int(11) NOT NULL COMMENT 'ID da pizza',
  `nome` varchar(100) NOT NULL COMMENT 'Nome da pizza',
  `imagem` varchar(535) NOT NULL COMMENT 'Caminho da imagem da pizza',
  `tamanhoID` int(11) NOT NULL COMMENT 'ID do tamanho da pizza',
  `crostaID` int(11) NOT NULL COMMENT 'ID da crosta da pizza',
  `molhoID` int(11) NOT NULL COMMENT 'ID do molho da pizza',
  `extraQueijo` tinyint(1) NOT NULL COMMENT 'Significa se a pizza tem extra queijo (0 - Não | 1 - Sim)',
  `preco` float NOT NULL COMMENT 'Preço da pizza',
  `pizzaPredefinida` tinyint(1) NOT NULL COMMENT 'Significa se a pizza é predefinida (criada por funcionário) (0 - Não | 1 - Sim)',
  `pizzaPersonalizada` tinyint(1) NOT NULL COMMENT 'Significa se a pizza é personalizada (criada por um cliente) (0 - Não | 1 - Sim)',
  `pessoaID` int(11) DEFAULT NULL COMMENT 'ID da pessoa que criou a pizza personalizada (NULL se a pizza é predefinida criada por um funcionário)'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Pizzas do sistema';

--
-- Extraindo dados da tabela `pizza`
--

INSERT INTO `pizza` (`ID`, `nome`, `imagem`, `tamanhoID`, `crostaID`, `molhoID`, `extraQueijo`, `preco`, `pizzaPredefinida`, `pizzaPersonalizada`, `pessoaID`) VALUES
(1, 'Pizza Teste', '/img/pizza1.jpg', 1, 1, 1, 1, 10, 1, 0, NULL),
(2, 'Pizza Teste 2', '/img/pizza1.jpg', 2, 1, 1, 1, 20, 1, 0, NULL),
(3, 'Pizza Teste 3', '/img/pizza1.jpg', 1, 1, 1, 1, 30, 1, 0, NULL),
(4, 'Pizza Teste 4', '/img/pizza1.jpg', 1, 1, 1, 1, 40, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanhoPizza`
--

CREATE TABLE IF NOT EXISTS `tamanhoPizza` (
  `ID` int(11) NOT NULL COMMENT 'ID do tamanho da pizza',
  `nome` varchar(50) NOT NULL COMMENT 'Nome do tamanho da pizza',
  `preco` float NOT NULL COMMENT 'Preço do tamanho da pizza'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Tamanhos da pizza';

--
-- Extraindo dados da tabela `tamanhoPizza`
--

INSERT INTO `tamanhoPizza` (`ID`, `nome`, `preco`) VALUES
(1, 'Pequena', 1),
(2, 'Individual', 2),
(3, 'Média', 3),
(4, 'Familiar', 4),
(5, 'Extra familiar', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `pessoaID` (`pessoaID`);

--
-- Indexes for table `crostaPizza`
--
ALTER TABLE `crostaPizza`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `encomenda`
--
ALTER TABLE `encomenda`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_encomenda_pessoa` (`pessoaID`);

--
-- Indexes for table `ingredientePizza`
--
ALTER TABLE `ingredientePizza`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ingredientePizzaPorPizza`
--
ALTER TABLE `ingredientePizzaPorPizza`
  ADD PRIMARY KEY (`pizzaID`,`ingredientePizzaID`),
  ADD KEY `fk_ingredientePizza_ingredientePizzaPorPizza` (`ingredientePizzaID`);

--
-- Indexes for table `itemCarrinho`
--
ALTER TABLE `itemCarrinho`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_carrinho_itemCarrinho` (`carrinhoID`),
  ADD KEY `fk_pizza_itemCarrinho` (`pizzaID`);

--
-- Indexes for table `itemEncomenda`
--
ALTER TABLE `itemEncomenda`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_encomenda_itemEncomenda` (`encomendaID`),
  ADD KEY `fk_itemEncomenda_pizza` (`pizzaID`);

--
-- Indexes for table `molhoPizza`
--
ALTER TABLE `molhoPizza`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_pessoa_pizza` (`pessoaID`),
  ADD KEY `fk_pizza_tamanhoPizza` (`tamanhoID`),
  ADD KEY `fk_pizza_crostaPizza` (`crostaID`),
  ADD KEY `fk_pizza_molhoPizza` (`molhoID`);

--
-- Indexes for table `tamanhoPizza`
--
ALTER TABLE `tamanhoPizza`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID do carrinho',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `crostaPizza`
--
ALTER TABLE `crostaPizza`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID da crosta da pizza',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `encomenda`
--
ALTER TABLE `encomenda`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID da encomenda';
--
-- AUTO_INCREMENT for table `ingredientePizza`
--
ALTER TABLE `ingredientePizza`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID do ingrediente da pizza',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `itemCarrinho`
--
ALTER TABLE `itemCarrinho`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `itemEncomenda`
--
ALTER TABLE `itemEncomenda`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID do item da encomenda';
--
-- AUTO_INCREMENT for table `molhoPizza`
--
ALTER TABLE `molhoPizza`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID do molho da pizza',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID da pessoa',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID da pizza',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tamanhoPizza`
--
ALTER TABLE `tamanhoPizza`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID do tamanho da pizza',AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `fk_carrinho_pessoa` FOREIGN KEY (`pessoaID`) REFERENCES `pessoa` (`ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `encomenda`
--
ALTER TABLE `encomenda`
  ADD CONSTRAINT `fk_encomenda_pessoa` FOREIGN KEY (`pessoaID`) REFERENCES `pessoa` (`ID`);

--
-- Limitadores para a tabela `ingredientePizzaPorPizza`
--
ALTER TABLE `ingredientePizzaPorPizza`
  ADD CONSTRAINT `fk_ingredientePizza_ingredientePizzaPorPizza` FOREIGN KEY (`ingredientePizzaID`) REFERENCES `ingredientePizza` (`ID`),
  ADD CONSTRAINT `fk_pizza_ingredientePizzaPorPizza` FOREIGN KEY (`pizzaID`) REFERENCES `pizza` (`ID`);

--
-- Limitadores para a tabela `itemCarrinho`
--
ALTER TABLE `itemCarrinho`
  ADD CONSTRAINT `fk_carrinho_itemCarrinho` FOREIGN KEY (`carrinhoID`) REFERENCES `carrinho` (`ID`),
  ADD CONSTRAINT `fk_pizza_itemCarrinho` FOREIGN KEY (`pizzaID`) REFERENCES `pizza` (`ID`);

--
-- Limitadores para a tabela `itemEncomenda`
--
ALTER TABLE `itemEncomenda`
  ADD CONSTRAINT `fk_encomenda_itemEncomenda` FOREIGN KEY (`encomendaID`) REFERENCES `encomenda` (`ID`),
  ADD CONSTRAINT `fk_itemEncomenda_pizza` FOREIGN KEY (`pizzaID`) REFERENCES `pizza` (`ID`);

--
-- Limitadores para a tabela `pizza`
--
ALTER TABLE `pizza`
  ADD CONSTRAINT `fk_pessoa_pizza` FOREIGN KEY (`pessoaID`) REFERENCES `pessoa` (`ID`),
  ADD CONSTRAINT `fk_pizza_crostaPizza` FOREIGN KEY (`crostaID`) REFERENCES `crostaPizza` (`ID`),
  ADD CONSTRAINT `fk_pizza_molhoPizza` FOREIGN KEY (`molhoID`) REFERENCES `molhoPizza` (`ID`),
  ADD CONSTRAINT `fk_pizza_tamanhoPizza` FOREIGN KEY (`tamanhoID`) REFERENCES `tamanhoPizza` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
