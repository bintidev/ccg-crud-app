<?php
// models/Alumno.php
//include 'config/secure-session.php';

class Ghoul
{  // atributos relativos a la conexión/correspondencia con la Base de Datos, visibilidad private
    private $conn;
    private $table_name = "ghouls";
    
   // las columnas de la tabla son atributos de visibilidad public
    public $ghoulid;
    public $name;
    public $rank;
    public $kagune;
    public $district;
    public $organization_member;
    public $first_detected_activity;

    public function __construct($db)          // establecer conexión
    {
        $this->conn = $db;
    }

    // Método para leer todos los alumnos. Devuelve la tabla entera
    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para crear un alumno
    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, rank=:rank, kagune=:kagune, district=:district, organization_member=:organization_member, first_detected_activity=:first_detected_activity";
        $stmt = $this->conn->prepare($query);

        // Limpiar y enlazar parámetros
        $this->name = $this->name;
        //$this->rank = $this->rank;
        // ... validaciones si fueran necesarias

        $stmt->bindParam(":name", $this->name);                            // en insertar no se pide la clave primaria
        $stmt->bindParam(":rank", $this->rank);                             // es autoincremental
        $stmt->bindParam(":kagune", $this->kagune);
        $stmt->bindParam(":district", $this->district, PDO::PARAM_INT);            // se convierte explicitamente en entero
        $stmt->bindParam(":organization_member", $this->organization_member, PDO::PARAM_BOOL);
        $stmt->bindParam(":first_detected_activity", $this->first_detected_activity);
																																						   // debería ser una casilla de verificación OJO     

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para leer un solo alumno (para editar)
    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE ghoulid = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->ghoulid);
        $stmt->execute();                      // después de un select siempre se obtiene una tabla, y hay que "cortar" filas
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // aquí se extrae una fila como si fuera un array asociativo
                                               // podía haber puesto, que fuera como un objeto FETCH_OBJ
                                            
        if ($row) {                            // ahora se procesa cada campo con las key del array asociativo
            $this->name = $row['name'];    // si se hubiera convertido en un objeto, trabajaría con $row -> name
            $this->rank = $row['rank'];
            $this->kagune = $row['kagune'];
            $this->district = $row['district'];
            $this->organization_member = $row['organization_member'];
            $this->first_detected_activity = $row['first_detected_activity'];
        }
    }

    // Método para actualizar un alumno
    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET name=:name, rank=:rank, kagune=:kagune, district=:district, organization_member=:organization_member, first_detected_activity=:first_detected_activity";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $this->name);                            // en insertar no se pide la clave primaria
        $stmt->bindParam(":rank", $this->rank);                      // es autoincremental
        $stmt->bindParam(":kagune", $this->kagune);
        $stmt->bindParam(":district", $this->district, PDO::PARAM_INT);            // se convierte explicitamente en entero
        $stmt->bindParam(":organization_member", $this->organization_member, PDO::PARAM_BOOL);
        $stmt->bindParam(":first_detected_activity", $this->first_detected_activity);          // la cadena obtenida en el formulario se convierte en int

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para eliminar un alumno
    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE ghoulid = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->ghoulid, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}