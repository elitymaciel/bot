-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 16/04/2023 às 11:18
-- Versão do servidor: 8.0.32
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `whatsapp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `api`
--

CREATE TABLE `api` (
  `id` int NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `session` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `api`
--

INSERT INTO `api` (`id`, `user_id`, `session`, `token`) VALUES
(8, 49, 'Oc7RaSR8zHe8', '$2b$10$GSqEy54B113iyHU_munev._YNxa9KutZIhvxNTusjtgDzl8mBXOqO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendimentos`
--

CREATE TABLE `atendimentos` (
  `id` int NOT NULL,
  `session` varchar(50) DEFAULT NULL,
  `cliente` varchar(50) DEFAULT NULL,
  `atendente` varchar(50) DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `bot`
--

CREATE TABLE `bot` (
  `id` int DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `mensagem` varchar(255) DEFAULT NULL,
  `resposta` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `chat`
--

CREATE TABLE `chat` (
  `id` int NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_number` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_number` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urlcode` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 
--
-- Estrutura para tabela `chats`
--

CREATE TABLE `chats` (
  `id` int NOT NULL,
  `conversa_id` int NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `atendente` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `instancia` varchar(250) DEFAULT NULL,
  `telefone` varchar(25) DEFAULT NULL,
  `nome_completo` varchar(250) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `cep` varchar(50) DEFAULT NULL,
  `endereco` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `id_user` int UNSIGNED DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='instancias pra as contas do whatsapp';

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `instancia`, `telefone`, `nome_completo`, `cpf`, `cep`, `endereco`, `cidade`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
(6, '94984110714', '94984110714', 'Maciel da Cruz Oliveira', '01788333209', '68552-660', 'Rua Comendador Silva Vasconcelos', 'Redenção', 19, 'WORKING', '2023-03-15 19:57:58', '2023-03-17 22:40:56');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` int UNSIGNED NOT NULL,
  `session` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nome` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `contatos`
--

INSERT INTO `contatos` (`id`, `session`, `nome`, `telefone`, `email`, `created_at`, `updated_at`) VALUES
(8, 'zJ0wKGcBybaS', 'Maciel', '559484110714', 'elitymaciel@hotmail.com', '2023-03-29 01:54:10', '2023-03-29 01:54:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `drawflow`
--

CREATE TABLE `drawflow` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `data` text,
  `class` varchar(255) DEFAULT NULL,
  `html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `typenode` varchar(20) DEFAULT 'false',
  `pos_x` int DEFAULT NULL,
  `pos_y` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `drawflow`
--

INSERT INTO `drawflow` (`id`, `name`, `data`, `class`, `html`, `typenode`, `pos_x`, `pos_y`) VALUES
(1, 'welcome', '', 'welcome', ' <div>     <div class=\\\"title-box\\\">👏 Welcome!!</div>      <div class=\\\"box\\\">        <p>Simple flow library <b>demo</b>       <a href=\\\"https://github.com/jerosoler/Drawflow\\\" target=\\\"_blank\\\">Drawflow</a> by <b>Jero Soler</b></p><br>             </p>        <br>       <p><b><u>Shortkeys:</u></b></p>        <p>🎹 <b>Delete</b> for remove selected<br>       💠 Mouse Left Click == Move<br>        ❌ Mouse Right == Delete Option<br>       🔍 Ctrl + Wheel == Zoom<br>        📱 Mobile support<br>       ...</p>     </div>    </div>  ', 'false', 26, 27),
(3, 'Email', '', 'email', '<div>\n            <div class=\"title-box\"><i class=\"fas fa-mouse\"></i> Db Click</div>\n              <div class=\"box dbclickbox\" ondblclick=\"teste(event)\">\n                Db Click here \n              </div>\n            </div>', 'false', 415, 35),
(5, 'maciel', NULL, 'facebook', '\n    <div>\n    <div class=\"title-box\"><i class=\"fab fa-facebook\"></i> asdfas</div>\n  </div>\n    ', '0', 418, 334),
(9, 'facebook', NULL, 'facebook', '\n     \n  <div>\n            <div class=\"title-box\"><i class=\"fas fa-comments\"></i> Mensagem</div>\n              <div class=\"box\"\">\n                Sua msg aquiMensagem \n              </div>\n            </div>\n    ', '0', 770, 266),
(11, 'facebook', NULL, 'facebook', '\n     \n  <div>\n            <div class=\"title-box\"><i class=\"fas fa-comments\"></i> Mensagem</div>\n              <div class=\"box\"\">\n                Sua msg aquiMensagem \n              </div>\n            </div>\n    ', '0', 423, 189),
(16, 'facebook', NULL, 'facebook', '\n     \n  <div>\n            <div class=\"title-box\"><i class=\"fas fa-comments\"></i> Mensagem</div>\n              <div class=\"box\"\">\n                Sua msg aquiMensagem \n              </div>\n            </div>\n    ', '0', 751, 26),
(17, 'facebook', NULL, 'facebook', '\n     \n  <div>\n            <div class=\"title-box\"><i class=\"fas fa-comments\"></i> Mensagem</div>\n              <div class=\"box\"\">\n                Sua msg aquiMensagem \n              </div>\n            </div>\n    ', '0', 1027, 94);

-- --------------------------------------------------------

--
-- Estrutura para tabela `drawflow_conexao`
--

CREATE TABLE `drawflow_conexao` (
  `id` int NOT NULL,
  `id_session` varchar(20) DEFAULT NULL,
  `input_class` varchar(10) DEFAULT NULL,
  `input_id` int DEFAULT NULL,
  `output_class` varchar(10) DEFAULT NULL,
  `output_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `drawflow_conexao`
--

INSERT INTO `drawflow_conexao` (`id`, `id_session`, `input_class`, `input_id`, `output_class`, `output_id`) VALUES
(41, 'zJ0wKGcBybaS', 'input_1', 5, 'output_1', 1),
(48, 'zJ0wKGcBybaS', 'input_1', 9, 'output_1', 5),
(50, 'zJ0wKGcBybaS', 'input_1', 11, 'output_1', 1),
(53, 'zJ0wKGcBybaS', 'input_1', 16, 'output_1', 3),
(54, 'zJ0wKGcBybaS', 'input_1', 17, 'output_1', 11),
(55, 'zJ0wKGcBybaS', 'input_1', 17, 'output_1', 16),
(56, 'zJ0wKGcBybaS', 'input_1', 3, 'output_1', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `emojis`
--

CREATE TABLE `emojis` (
  `id` int NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `codigo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `emojis`
--

INSERT INTO `emojis` (`id`, `nome`, `codigo`) VALUES
(65, 'sorriso com lágrimas de alegria', '🥲'),
(66, 'coração vermelho', '&#x2764'),
(67, 'rosto sorridente com corações', '&#x1F60D'),
(68, 'rosto chorando', '&#x1F62D;'),
(69, 'rosto sorridente com olhos sorridentes e bochechas rosadas', '&#x1F60A;'),
(70, 'rosto soprando um beijo', '&#x1F618;'),
(71, 'polegar para cima', '&#x1F44D;'),
(72, 'rosto sorridente com olhos corações', '&#x1F970;'),
(73, 'rosto sorridente com olhos sorridentes e corações', '&#x1F970;'),
(74, 'rosto com olhos sorridentes e lágrimas', '&#x1F605;'),
(75, 'rosto piscando com a língua de fora', '&#x1F61C;'),
(76, 'rosto sorridente com olhos sorridentes e corações', '&#x1F970;'),
(77, 'rosto sorridente com olhos sorridentes e corações', '&#x1F970;'),
(78, 'mãos em prece', '&#x1F64F;'),
(79, 'rosto com olhos sorridentes e língua de fora', '&#x1F61B;'),
(80, 'rosto sorridente com lágrimas de alegria', '&#x1F923;'),
(81, 'rosto apaixonado', '&#x1F60D');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int NOT NULL,
  `Categoria` varchar(255) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `Categoria`, `item`, `valor`) VALUES
(1, 'uniaselvi', 'endereço', 'Rua das Flores, 123'),
(2, 'uniaselvi', 'gendamento', 'Segunda a sexta, das 9h às 18h'),
(3, 'uniaselvi', 'atendimento', 'Presencial ou online'),
(4, 'Instituto pcep', 'Conceição do araguaia PA - cursos', 'Engenharia de Produção'),
(5, 'Instituto pcep', 'Conceição do araguaia PA - cursos', 'Administração'),
(6, 'Instituto pcep', 'Conceição do araguaia PA - promoção da semana', '50% de desconto em matrículas'),
(7, 'Instituto pcep', 'Conceição do araguaia PA - pedir certificado', 'https://www.pcep.com.br/certificado'),
(8, 'Instituto pcep', 'Conceição do araguaia PA - reservar vaga', 'https://www.pcep.com.br/reserva'),
(9, 'Instituto pcep', 'Conceição do araguaia PA - lista cursos', 'Valor: R$ 5000, Carga horária: 200 horas'),
(10, 'Instituto pcep', 'Couto magalhaes TO - cursos', 'Marketing'),
(11, 'Instituto pcep', 'Couto magalhaes TO - cursos', 'Publicidade'),
(12, 'Instituto pcep', 'Couto magalhaes TO - promoção da semana', '25% de desconto em matrículas'),
(13, 'Instituto pcep', 'Couto magalhaes TO - pedir certificado', 'https://www.pcep.com.br/certificado'),
(14, 'Instituto pcep', 'Couto magalhaes TO - reservar vaga', 'https://www.pcep.com.br/reserva'),
(15, 'Instituto pcep', 'Couto magalhaes TO - lista cursos', 'Valor: R$ 4500, Carga horária: 180 horas'),
(16, 'Instituto pcep', 'Guarai TO - cursos', 'Direito'),
(17, 'Instituto pcep', 'Guarai TO - cursos', 'Psicologia'),
(18, 'Instituto pcep', 'Guarai TO - promoção da semana', '20% de desconto em matrículas'),
(19, 'Instituto pcep', 'Guarai TO - pedir certificado', 'https://www.pcep.com.br/certificado'),
(20, 'Instituto pcep', 'Guarai TO - reservar vaga', 'https://www.pcep.com.br/reserva'),
(21, 'Instituto pcep', 'Guarai TO - lista cursos', 'Valor: R$ 5500, Carga horária: 220 horas'),
(22, 'financeiro', 'Segunda via', 'https://www.pcep.com.br/segunda-via'),
(23, 'financeiro', 'Parcelas', 'https://www.pcep.com.br/parcelas'),
(24, 'financeiro', 'Fala com financeiro', 'https://www.pcep.com.br/fale-conosco'),
(25, 'matricula premiada', 'indicação [ codigo ]', 'PCEP100');

-- --------------------------------------------------------

--
-- Estrutura para tabela `permisoes`
--

CREATE TABLE `permisoes` (
  `id` int UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `permisoes`
--

INSERT INTO `permisoes` (`id`, `nome`) VALUES
(1, 'Administrador'),
(2, 'cliente'),
(3, 'funcionario');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` int NOT NULL,
  `id_session` int DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `urlcode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(60) NOT NULL,
  `email` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `avatar` varchar(255) DEFAULT 'default.svg',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `permissao` int UNSIGNED DEFAULT NULL,
  `reset_password` tinyint UNSIGNED DEFAULT '0',
  `is_deleted` tinyint UNSIGNED DEFAULT '0',
  `is_locked` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `username`, `last_name`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `permissao`, `reset_password`, `is_deleted`, `is_locked`) VALUES
(18, 'admin', 'admin', 'admin@admin.com', '$2y$10$Sgdk7lyZCszff4i/C7CJnOajiVgXxVQPpAALBJbzR9qLArbLW0b8O', 'default.svg', '2023-03-15 03:25:58', '2023-04-03 16:45:25', 1, 0, 0, 0),
(49, 'Maciel ', 'Oliveira', 'elitymaciel@hotmail.com', '$2y$10$jzGZhwW40A8MzawfQyjhSeX/yR4Rfd098I5O6VfaOiERdzae2npha', 'default.svg', '2023-04-03 20:45:15', '2023-04-03 20:46:01', 2, 0, 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`user_id`);

--
-- Índices de tabela `atendimentos`
--
ALTER TABLE `atendimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `drawflow`
--
ALTER TABLE `drawflow`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `drawflow_conexao`
--
ALTER TABLE `drawflow_conexao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `emojis`
--
ALTER TABLE `emojis`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `permisoes`
--
ALTER TABLE `permisoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_session` (`id_session`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `grupo` (`permissao`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `api`
--
ALTER TABLE `api`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `atendimentos`
--
ALTER TABLE `atendimentos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de tabela `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `drawflow`
--
ALTER TABLE `drawflow`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `drawflow_conexao`
--
ALTER TABLE `drawflow_conexao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `emojis`
--
ALTER TABLE `emojis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `permisoes`
--
ALTER TABLE `permisoes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `api`
--
ALTER TABLE `api`
  ADD CONSTRAINT `api_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`id_session`) REFERENCES `api` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`permissao`) REFERENCES `permisoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;