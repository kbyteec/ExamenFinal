 <?php
require_once __DIR__ . '/../config/database.php';

class Nota {

    private $conn;
    private $table = "nota";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function crear($alumno_id, $nota) {

        $sql = "INSERT INTO {$this->table} (alumno_id, nota)
                VALUES (:alumno_id, :nota)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':alumno_id' => $alumno_id,
            ':nota' => $nota
        ]);
    }

    public function obtenerPorAlumno($alumno_id) {

        $sql = "SELECT * FROM {$this->table}
                WHERE alumno_id = :alumno_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':alumno_id' => $alumno_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminar($id) {

        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }

    public function calcularPromedio($alumno_id) {

        $sql = "SELECT AVG(nota) as promedio
                FROM {$this->table}
                WHERE alumno_id = :alumno_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':alumno_id' => $alumno_id]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['promedio'] 
        ? number_format($resultado['promedio'], 2, '.', '')
        : "0.00";

    }

    public function resultadoCualitativo($promedio) {

        if ($promedio < 5) {
            return "Suspenso";
        } elseif ($promedio < 7) {
            return "Bien";
        } elseif ($promedio < 9) {
            return "Notable";
        } else {
            return "Sobresaliente";
        }
    }
}
