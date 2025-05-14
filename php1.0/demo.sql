CREATE DATABASE IF NOT EXISTS fuegoancestral;
USE fuegoancestral;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(200) NOT NULL,
    nombre VARCHAR(200) NOT NULL,
    apellido VARCHAR(200) NOT NULL,
    telefono VARCHAR(200) NOT NULL,
    password VARCHAR(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(6,2) NOT NULL,
    imagen VARCHAR(255),
    categoria VARCHAR(50),
    stock INT DEFAULT 0
) ENGINE=InnoDB;


CREATE TABLE carrito (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_producto INT,
    cantidad INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_producto) REFERENCES productos(id)
) ENGINE=InnoDB;


CREATE TABLE ordenes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10,2),
    estado ENUM('pendiente', 'pagado', 'entregado') DEFAULT 'pendiente',
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
) ENGINE=InnoDB;


CREATE TABLE detalles_orden (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_orden INT,
    id_producto INT,
    cantidad INT,
    subtotal DECIMAL(10,2),
    FOREIGN KEY (id_orden) REFERENCES ordenes(id),
    FOREIGN KEY (id_producto) REFERENCES productos(id)
) ENGINE=InnoDB;

CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    fecha_reserva DATETIME,
    personas INT,
    comentarios TEXT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
) ENGINE=InnoDB;