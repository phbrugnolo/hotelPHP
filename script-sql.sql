USE hotel;

-- Disable foreign key checks temporarily
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS reservas;
DROP TABLE IF EXISTS clientes;
DROP TABLE IF EXISTS quartos;
DROP TABLE IF EXISTS admins;

-- Re-enable foreign key checks
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE IF NOT EXISTS quartos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    imagem VARCHAR(255),
    UNIQUE KEY (tipo)  -- Create an index on the 'tipo' column
);

INSERT INTO quartos (tipo, descricao, preco, imagem) VALUES
('Quarto de Luxo', 'Um quarto que oferece um nível elevado de conforto e elegância.', 300.00, 'luxury-room.jpg'),
('Quarto Individual', 'Um quarto destinado a uma pessoa, geralmente com uma cama de solteiro.', 80.00, 'single-room.jpg'),
('Suíte', 'Um conjunto de cômodos que inclui um quarto e uma sala de estar separada.', 250.00, 'suite-room.jpg');

CREATE TABLE IF NOT EXISTS clientes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf CHAR(14) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO clientes (nome, cpf, telefone) VALUES
('João Silva', '123.456.789-09', '123456789'),
('Maria Oliveira', '361.089.200-50', '987654321'),
('Carlos Santos', '144.467.910-44', '1122334455');

CREATE TABLE IF NOT EXISTS admins(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_cpf CHAR(14) NOT NULL,
    tipo_quarto VARCHAR(50) NOT NULL,
    data_checkin DATE NOT NULL,
    data_checkout DATE NOT NULL,
    data_reserva TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cliente_cpf) REFERENCES clientes(cpf) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (tipo_quarto) REFERENCES quartos(tipo) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO reservas (cliente_cpf, tipo_quarto, data_checkin, data_checkout) VALUES
('123.456.789-09', 'Quarto de Luxo', '2024-07-01', '2024-07-05'),
('361.089.200-50', 'Quarto Individual', '2024-07-10', '2024-07-12'),
('144.467.910-44', 'Suíte', '2024-07-15', '2024-07-20');

SELECT * FROM admins;
SELECT * FROM quartos;
SELECT * FROM reservas;
SELECT * FROM clientes;
