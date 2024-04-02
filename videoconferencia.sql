-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS `videoconferencia_app`;

-- Seleção do banco de dados
USE `videoconferencia_app`;

-- Criação da tabela
CREATE TABLE IF NOT EXISTS `videoconferencias` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `solicitante` VARCHAR(255) NOT NULL,
    `data` DATE NOT NULL,
    `horario` TIME NOT NULL,
    `local` VARCHAR(255) NOT NULL,
    `observacoes` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
