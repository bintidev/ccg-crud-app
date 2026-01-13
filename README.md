# CCG Login System - PHP MVC

Una aplicación de autenticación robusta desarrollada bajo el patrón de diseño MVC (Modelo-Vista-Controlador). Este sistema está diseñado para gestionar el acceso de agentes de forma segura, implementando capas de validación tanto en el cliente como en el servidor.

## 🚀 Características Principales

+ Arquitectura MVC: Separación clara de responsabilidades para un código escalable y mantenible.
+ Enrutamiento Centralizado: Gestión de peticiones a través de un Front
+ Controller (index.php).
+ Seguridad Avanzada:
    - **Protección CSRF**: Generación y validación de tokens para prevenir ataques de falsificación de peticiones.

    - **Sesiones Seguras**: Configuración de cookies HttpOnly, SameSite=Strict y regeneración periódica de ID de sesión.

    - **Control de Fuerza Bruta**: Limitación de intentos de inicio de sesión (máximo 5 intentos).

    - **Sanitización**: Uso de htmlspecialchars y sentencias preparadas (PDO) para evitar inyecciones SQL y XSS.

+ Validación Dual: Validación en tiempo real mediante JavaScript en el cliente y validación lógica en el servidor.

## 📁 Estructura del Proyecto
```

LOGIN_MVC2/
├── config/                 # Configuración de BD y seguridad de sesión
│   ├── Database.php
│   └── secure-session.php
├── controllers/            # Lógica de control de flujo
│   └── AuthController.php
├── models/                 # Lógica de datos y acceso a BD
│   └── User.php
├── public/                 # Recursos estáticos (CSS, JS, Imágenes)
│   ├── css/
│   ├── img/
│   └── js/
│       └── validation.js
├── views/                  # Plantillas de interfaz de usuario
│   ├── dashboard.php
│   └── login.php
└── index.php               # Front Controller (Punto de entrada)
```

## 🛠️ Instalación y Configuración

Requisitos previos:

+ Servidor Web (Apache/Nginx).
+ PHP 7.4 o superior.
+ MySQL / MariaDB.

**Base de Datos:** No es necesario crear las tablas manualmente. Se facilita un script SQL junto con los archivos del proyecto que crea automáticamente la base de datos login_php, la tabla de usuarios y el usuario de conexión con los permisos necesarios.

**Importación:** Ejecuta el script facilitado en tu gestor de bases de datos (phpMyAdmin o similar).

**Conexión:** Las credenciales de acceso ya están preconfiguradas en config/Database.php para coincidir con el usuario creado por el script.

**Despliegue:** Copia la carpeta del proyecto en el directorio raíz de tu servidor (ej. htdocs o var/www/html).

**Ajustes de Conexión:** Edita el archivo config/Database.php con tus credenciales locales:

```php
    private $host = 'localhost';
    private $db_name = 'login_php';
    private $username = 'tu_usuario';
    private $password = 'tu_contraseña';
```

## 🔐 Detalles de Seguridad Implementados

### Gestión de Sesiones (secure-session.php)

El sistema no solo inicia la sesión, sino que la protege mediante:

+ Regeneración de ID: Se cambia el ID de sesión cada 20 minutos para evitar el secuestro de sesión (Session Hijacking).

+ Expiración Automática: Las sesiones se destruyen tras 2 horas de inactividad.

+ Seguridad de Cookies: Restringidas a la ruta raíz y protegidas contra acceso por scripts de terceros.

### Flujo de Autenticación

    El usuario envía sus credenciales.

    JS Validation: Comprueba que el ID de agente tenga el formato AA000 y la contraseña cumpla los requisitos de complejidad.

    Controller: Verifica el Token CSRF y el número de intentos.

    Model: Realiza una consulta preparada a la base de datos para validar la identidad.