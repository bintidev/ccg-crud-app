# CCG CRUD App - PHP MVC
![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
![CSS](https://img.shields.io/badge/css-%23663399.svg?style=for-the-badge&logo=css&logoColor=white)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)

**Tecnologías:** PHP 7.4+, MySQL 5.7+, Bootstrap 5, JavaScript, HTML5, CSS3, Apache.

Aplicación web para gestionar datos usando arquitectura MVC (separación entre lógica, datos e interfaz). Incluye autenticación de usuarios, protecciones contra ataques comunes (inyección SQL, XSS, CSRF) y validación de datos en el navegador y servidor.

## ✅ Requisitos Previos

- **PHP 7.4 o superior** (recomendado 8.0+)
- **MySQL 5.7 o superior** (o MariaDB 10.2+) con motor InnoDB
- **Apache 2.4+** como servidor web
- **XAMPP/LAMP/LEMP:** Stack integrado (Apache + MySQL + PHP)
- **phpMyAdmin 5.x+** para gestionar la base de datos
- **Navegador moderno** con soporte para JavaScript (Chrome, Firefox, Safari, Edge)

## 🚀 Funcionalidades

+ **Arquitectura MVC:** Separación clara entre Modelo (datos), Vista (interfaz) y Controlador (lógica). Facilita mantenimiento y pruebas.
+ **Sistema de Autenticación:** Login seguro con gestión de sesiones (cookies con protecciones especiales), control de acceso y logout seguro.
+ **CRUD Completo:** Crear, leer, actualizar y eliminar registros de Ghouls con validación de datos.
+ **Protecciones de Seguridad:**
  - **CSRF:** Tokens únicos por formulario para prevenir solicitudes no autorizadas
  - **Sesiones Seguras:** Regeneración de ID de sesión después del login, expiración por inactividad, cookies protegidas (HttpOnly, SameSite)
  - **Limite de Intentos:** Límite de intentos fallidos de login con bloqueo temporal
  - **Inyección SQL:** Consultas parametrizadas (prepared statements) que evitan que datos maliciosos ejecuten código SQL
  - **XSS:** Escape de caracteres especiales en HTML para prevenir scripts maliciosos
+ **Validación en Dos Niveles:**
  - **Cliente:** Validación en el navegador (mejora experiencia del usuario)
  - **Servidor:** Validación estricta como protección principal (lo que realmente cuenta)"

## 📁 Estructura del Proyecto

```
ccg-crud-app/
├── config/                 # Configuración de BD y seguridad de sesión
│   ├── Database.php
│   └── secure-session.php
│
├── controllers/            # Lógica de control de flujo
│   ├── AuthController.php
│   └── GhoulController.php
│
├── models/                 # Lógica de datos y acceso a BD
│   ├── User.php
│   └── Ghoul.php
│
├── public/                 # Recursos estáticos (CSS, JS, Imágenes)
│   ├── css/
│   │   ├── crear-style.css
│   │   ├── dashboard-style.css
│   │   ├── editar-style.css
│   │   ├── forms-style.css
│   │   └── header-style.css
│   ├── img/
│   └── js/
│       ├── ghoul-validation.js
│       └── login-validation.js
│
├── templates/              # Componentes reutilizables
│   └── header.php
│
├── views/                  # Plantillas de interfaz de usuario
│   ├── login.php
│   ├── dashboard.php
│   ├── create.php
│   └── edit.php
│
├── pictures/               # Imágenes y capturas de pantalla
│
├── index.php               # Front Controller (Punto de entrada)
├── data.sql                # Script SQL para crear BD y datos
├── AdminUsers.txt          # Usuarios administradores
└── README.md               # Este archivo
```

## ℹ️ Función de cada componente

| Archivo | Función |
|---------|---------|
| `config/Database.php` | Conexión a la base de datos con configuración de seguridad |
| `config/secure-session.php` | Configura cookies seguras de sesión (HttpOnly, SameSite, regeneración) |
| `controllers/AuthController.php` | Maneja login, logout y validación de credenciales |
| `controllers/GhoulController.php` | Gestiona operaciones CRUD de Ghouls |
| `models/User.php` | Acceso a tabla de usuarios con consultas preparadas |
| `models/Ghoul.php` | Acceso a tabla de Ghouls con consultas preparadas |
| `public/css/` | Estilos CSS (login, dashboard, formularios, etc.) |
| `public/js/` | Validaciones JavaScript en cliente (login, Ghouls) |
| `public/img/` | Imágenes y recursos gráficos |
| `templates/header.php` | Barra de navegación reutilizable |
| `views/login.php` | Formulario de login con token CSRF |
| `views/dashboard.php` | Panel principal con tabla de Ghouls |
| `views/create.php` | Formulario para crear nuevos Ghouls |
| `views/edit.php` | Formulario para editar Ghouls existentes |
| `index.php` | Punto de entrada (Front Controller) que procesa solicitudes |
| `data.sql` | Script SQL para crear base de datos y tablas

## 🛠️ Instalación y Uso con XAMPP

1. Copia la carpeta del proyecto dentro de `htdocs` de XAMPP (ej. `C:/xampp/htdocs/ccg-crud-app` o `/opt/lampp/htdocs/ccg-crud-app`).
2. Inicia Apache y MySQL desde el panel de control de XAMPP.
3. Abre `phpMyAdmin` en `http://localhost/phpmyadmin` e importa el script SQL incluido (`data.sql`) para crear la base de datos y las tablas de usuarios y Ghouls.
4. Ajusta `config/Database.php` con las credenciales correctas si no coinciden con las del script.
5. Accede a la app en `http://localhost/ccg-crud-app/` o `http://localhost/ccg-crud-app/index.php?action=login`.

> Consejo: Si usas entornos Linux, asegúrate de que Apache puede leer los archivos (permisos) y que el puerto 80/443 no está en uso por otro proceso. Los usuarios administradores están listados en `AdminUsers.txt`.

## 🔐 Seguridad

### Front-end (Navegador)

- **Validación en Cliente:** Formularios con validación HTML5 (required, type, pattern). Mejora la experiencia del usuario antes de enviar al servidor.
- **Escape de Contenido:** Los caracteres especiales (`<`, `>`, `&`) se convierten a formato HTML seguro para evitar que código malicioso se ejecute.
- **Content Security Policy:** Headers de seguridad que controlan qué scripts y recursos pueden ejecutarse.

### Back-end (Servidor)

- **Consultas Preparadas (Prepared Statements):** Las consultas SQL se construyen de forma segura con placeholders (`?`) en lugar de concatenar directamente datos del usuario. Evita inyección SQL.
- **Sesiones Seguras:** 
  - Cookie HttpOnly: El JavaScript no puede acceder a la cookie de sesión
  - SameSite: Impide que otros sitios web usen tu sesión
  - Regeneración de ID: Después del login, se crea un nuevo ID de sesión único
  - Expiración: La sesión se cierra automáticamente tras inactividad
- **Tokens CSRF:** Cada formulario tiene un token único. El servidor verifica que coincida antes de procesar cambios de datos.
- **Límite de Intentos:** Se limitan los intentos de login fallidos. Después de X intentos, se bloquea temporalmente.
- **Validación Estricta:** El servidor valida y sanitiza todos los datos antes de guardar en la base de datos.

**Nota importante:** Las contraseñas actualmente se almacenan sin hash. Se recomienda usar bcrypt o Argon2 para mayor seguridad."

## 📸 Capturas de Pantalla

![Login](/pictures/login.png "Pantalla de Login")
*Pantalla de acceso — los usuarios se identifican con su nombre de usuario y contraseña.*

![Dashboard](/pictures/dashboard.png "Dashboard")
*Dashboard con tabla de gestión — vista principal con opciones de edición y eliminación..*

![Crear Ghoul](/pictures/create.png "Formulario de Creación")
*Formulario para crear nuevos registros de Ghouls con validación en cliente.*

![Editar Ghoul](/pictures/edit.png "Formulario de Edición")
*Formulario para actualizar registros existentes de Ghouls con datos precargados.*

> Todas las imágenes están disponibles en la carpeta `pictures/`

## 📋 Flujo de Trabajo

### Autenticación (Login)
1. Usuario abre la página de login
2. Introduce usuario y contraseña
3. El servidor valida las credenciales contra la base de datos
4. Si es correcto: se crea una sesión segura, se regenera el ID de sesión, y redirige al panel
5. Si es incorrecto: muestra error y registra el intento fallido

### Operaciones CRUD
1. **Crear:** Accede al formulario de creación, completa datos, envía → se inserta en BD
2. **Leer:** El panel principal muestra todos los Ghouls en una tabla
3. **Actualizar:** Selecciona un registro, edita datos, guarda → se actualiza en BD
4. **Eliminar:** Confirma eliminación → se borra de BD

> NOTA: para las acciones editar y crear, se puede asignar un valor `NULL` a los campos **rank** y **ward**. Para rank, solo tienes que dejar el campo vacío, y a ward tienes que asignarle el valor 0

## 🗄️ Estructura de Base de Datos

### Tabla `users` (Almacena usuarios)
```sql
- user: Número único identificador
- agentid: Nombre de usuario (único)
- password: Contraseña
- last_name: Apellido
- name: Nombre
```

### Tabla `ghouls` (Almacena Ghouls)
```sql
- id: Número único identificador
- ghoulid: Código de identificación
- name: Nombre del Ghoul
- rank: Clasificación de peligro
- kagune: Órgano depredador (Ukaku, Rokaku, Koukaku, Bikaku, Rinkaku)
- ward: Ubicación geográfica
- contained: Estado (retenido, no retenido)
- first_detected_activity: Primer ataque registrado
```

## 🧭 Uso básico

1. Importa la BD con phpMyAdmin usando el archivo `data.sql`.
2. Asegúrate de que `config/Database.php` tiene tus credenciales correctas.
3. Inicia sesión usando las credenciales registradas en la base de datos.
4. En el dashboard, puedes:
   - Ver todos los Ghouls registrados en una tabla.
   - Crear nuevos registros mediante el botón "Crear".
   - Editar registros existentes con el botón de edición.
   - Eliminar registros con el botón de eliminación.
5. Cierra sesión seguramente con el botón de logout.