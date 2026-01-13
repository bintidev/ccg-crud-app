<?php
// controllers/AlumnoController.php
include_once 'config/Database.php';
include_once 'models/Ghoul.php';

class AlumnoController
{
    private $db;
    private $ghoul;                                // objeto alumno, para controlar intercambios bd-memoria ppal

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->ghoul = new Ghoul($this->db);
    }

    public function index()
    {
        $stmt = $this->ghoul->read();               // invoca la operación read del modelo (SELECT * de la tabla entera)
        $ghoul = $stmt->fetchAll(PDO::FETCH_ASSOC);// lo convierte todo al formato array asociativo (es un array de filas)
        include 'views/listar.php';                  // incluye aquí el código de listar (mostrar tabla por pantalla)
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->ghoul->name = $_POST['nombre'];
            $this->ghoul->rank = $_POST['rank'];
            $this->ghoul->kagune = $_POST['kagune'];
            $this->ghoul->district = $_POST['district'];
            $this->ghoul->organization_member = isset($_POST['organization_member']) ? 1 : 0;
            $this->ghoul->first_detected_activity = $_POST['first_detected_activity'];

            if ($this->ghoul->create()) {
                header("Location: index.php?action=index&message=created");
                exit();
            } else {
                $error = "Error al crear alumno.";
                include 'views/crear.php'; // Recargar vista con error
            }
        } else {
            include 'views/crear.php';
        }
    }

    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lógica de actualización (UPDATE)
            $this->ghoul->name = $_POST['nombre'];
            $this->ghoul->rank = $_POST['rank'];
            $this->ghoul->kagune = $_POST['kagune'];
            $this->ghoul->district = $_POST['district'];
            $this->ghoul->organization_member = isset($_POST['organization_member']) ? 1 : 0;
            $this->ghoul->first_detected_activity = $_POST['first_detected_activity'];


            if ($this->ghoul->update()) {
                header("Location: index.php?action=index&message=updated");
                exit();
            } else {
                $error = "Error al actualizar.";
            }
        }

        // Lógica para mostrar el formulario de edición (READ ONE)
        if (isset($_GET['id'])) {
            $this->ghoul->ghoulid = $_GET['ghoulid'];
            $this->ghoul->readOne();
            if ($this->ghoul->name) {
                $alumno_data = (object)['ghoulid' => $this->ghoul->ghoulid, 'name' => $this->ghoul->name, 'rank' => $this->ghoul->rank, 'kagune' => $this->ghoul->kagune, 'repite' => $this->ghoul->repite];
                include 'views/editar.php';
            } else {
                echo "ghoul no encontrado.";
            }
        }
    }

    public function delete()                                           // esta operación NO TIENE VISTA ASOCIADA, solo mensajes
    {                                                                  // de confirmación o error
        if (isset($_GET['id'])) {
            $this->ghoul->ghoulid = $_GET['id'];
            if ($this->ghoul->delete()) {
                header("Location: index.php?action=index&message=deleted");
                exit();
            } else {
                header("Location: index.php?action=index&message=error_delete");
                exit();
            }
        }
    }
}