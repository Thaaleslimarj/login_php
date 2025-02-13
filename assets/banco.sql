CREATE TABLE usuarios (  
    id INT AUTO_INCREMENT PRIMARY KEY,  
    nome VARCHAR(100) NOT NULL,  
    email VARCHAR(100) NOT NULL UNIQUE,  
    senha VARCHAR(255) NOT NULL,  
    tipo ENUM('administrador', 'funcionario', 'outro') NOT NULL,  
    status ENUM('ativo', 'inativo') DEFAULT 'ativo'  
); 

CREATE TABLE tipos_funcionario (  
    id INT AUTO_INCREMENT PRIMARY KEY,  
    descricao VARCHAR(100) NOT NULL  
);  