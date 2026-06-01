SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `salario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `funcionario` (`id`, `nome`, `cargo`, `salario`) VALUES
(2, 'Carlos Souza', 'Designer', 4200.00),
(3, 'Mariana Lima', 'Gerente', 7800.00);

ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

