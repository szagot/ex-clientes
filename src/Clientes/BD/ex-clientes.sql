-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.13-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.5104
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para ex-clientes
DROP DATABASE IF EXISTS `ex-clientes`;
CREATE DATABASE IF NOT EXISTS `ex-clientes` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `ex-clientes`;

-- Copiando estrutura para tabela ex-clientes.clientes
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uf` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hit` tinyint(1) NOT NULL DEFAULT '1',
  `pessoa` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rua` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
