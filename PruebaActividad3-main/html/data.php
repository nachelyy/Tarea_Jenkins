<?php
$servername = 'mariadb-1';
$username = 'root';
$password = '2190705';

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar conexión
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}

// Crear base de datos
$sql = "CREATE DATABASE nachely";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada correctamente";
} else {
    echo "Error al crear la base de datos: " . $conn->error;
}

// Seleccionar la base de datos
$conn->select_db('nachely');

// Crear tabla
$sql = "CREATE TABLE datos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    matricula INT(7) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla creada correctamente";
} else {
    echo "Error al crear la tabla: " . $conn->error;
}

// Insertar datos
$sql = "INSERT INTO datos (nombre, matricula) VALUES ('Nachely', 2190705)";

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar los datos: " . $conn->error;
}

// Mostrar datos
$sql = "SELECT * FROM datos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nombre: " . $row["nombre"] . " - Matricula: " . $row["matricula"] . "<br>";
    }
} else {
    echo "No se encontraron registros";
}

// Cerrar conexión
$conn->close();
?>
