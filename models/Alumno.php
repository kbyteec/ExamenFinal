<?php
require_once __DIR__ . '/../config/database.php';

class Alumno {

    private $conn;
    private $table = "alumno";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function crear($nombre, $apellido, $correo) {

        $sql = "INSERT INTO {$this->table} (nombre, apellido, correo)
                VALUES (:nombre, :apellido, :correo)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':correo' => $correo
        ]);
    }

    public function obtenerTodos() {

        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {

        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre, $apellido, $correo) {

        $sql = "UPDATE {$this->table}
                SET nombre = :nombre,
                    apellido = :apellido,
                    correo = :correo
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':correo' => $correo
        ]);
    }

    public function eliminar($id) {

        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }
    
}