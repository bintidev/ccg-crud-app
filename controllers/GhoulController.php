<?php
// controllers/AlumnoController.php
include_once 'config/Database.php';
include_once 'models/Ghoul.php';

class GhoulController
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
        $_SESSION['ghoul'] = $stmt->fetchAll(PDO::FETCH_ASSOC);// lo convierte todo al formato array asociativo (es un array de filas)
        include 'views/dashboard.php';                  // incluye aquí el código de listar (mostrar tabla por pantalla)
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->ghoul->name = $_POST['name'];
            $this->ghoul->rank = $_POST['rank'];
            $this->ghoul->kagune = $_POST['kagune'];
            $this->ghoul->district = $_POST['district'];
            $this->ghoul->organization_member = isset($_POST['organization_member']) ? 1 : 0;
            $this->ghoul->first_detected_activity = $_POST['first_detected_activity'];

            if ($this->ghoul->create()) {
                header("Location: index.php?action=dashboard&message=created");
                exit();
            } else {
                $_SESSION['error'] = "Error al crear alumno.";
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
            $this->ghoul->name = $_POST['name'];
            $this->ghoul->rank = $_POST['rank'];
            $this->ghoul->kagune = $_POST['kagune'];
            $this->ghoul->district = $_POST['district'];
            $this->ghoul->organization_member = isset($_POST['organization_member']) ? 1 : 0;
            $this->ghoul->first_detected_activity = $_POST['first_detected_activity'];


            if ($this->ghoul->update()) {
                header("Location: index.php?action=dashboard&message=updated");
                exit();
            } else {
                $_SESSION['error'] = "Error al actualizar.";
            }
        }

        // Lógica para mostrar el formulario de edición (READ ONE)
        if (isset($_GET['id'])) {
            $this->ghoul->ghoulid = $_GET['id'];
            $this->ghoul->readOne();
            if ($this->ghoul->name) {
                $_SESSION['ghoul_data'] = (object)['ghoulid' => $this->ghoul->ghoulid, 'name' => $this->ghoul->name, 'rank' => $this->ghoul->rank,
                'kagune' => $this->ghoul->kagune, 'organization_member' => $this->ghoul->organization_member, 'first_detected_activity' => $this->ghoul->first_detected_activity];
                include 'views/editar.php';
            } else {
                $_SESSION['error'] = "Ghoul no encontrado.";
            }
        }
    }

    public function delete()                                           // esta operación NO TIENE VISTA ASOCIADA, solo mensajes
    {                                                                  // de confirmación o error
        if (isset($_GET['id'])) {
            $this->ghoul->ghoulid = $_GET['id'];
            if ($this->ghoul->delete()) {
                header("Location: index.php?action=dashboard&message=deleted");
                exit();
            } else {
                header("Location: index.php?action=dashboard&message=error_delete");
                exit();
            }
        }
    }
}