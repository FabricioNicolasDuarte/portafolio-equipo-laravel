Portafolio de Equipo - UTN Programación IV
Este es un proyecto desarrollado para la materia Programación IV de la Tecnicatura Universitaria en Programación de la UTN-FRRE. La aplicación web funciona como un portafolio dinámico para los integrantes del equipo, permitiendo a cada uno gestionar su propio perfil profesional.

🚀 Acerca del Proyecto
La aplicación permite el registro de usuarios (alumnos) para que puedan crear y mantener un perfil personal con su información académica, una descripción sobre ellos y enlaces a sus redes profesionales como GitHub, LinkedIn y WhatsApp.

El sistema cuenta con un rol de Administrador (diseñado para el docente evaluador y un líder de equipo) que tiene permisos para visualizar y editar el perfil de cualquier usuario registrado.

🛠️ Tecnologías Utilizadas
Framework Backend: Laravel 12

Base de Datos: MySQL

Framework Frontend: Blade con Tailwind CSS

Autenticación: Laravel Breeze

Servidor Local: XAMPP

✨ Características Principales
Sistema de Autenticación: Registro y Login de usuarios.

Roles de Usuario:

Alumno: Puede ver todos los perfiles, pero solo editar el suyo.

Administrador: Puede ver y editar el perfil de cualquier usuario.

Gestión de Perfiles: Cada usuario puede añadir y actualizar:

Nombre y Apellido.

Foto de perfil (avatar).

Información académica (Carrera y Universidad).

Una sección "Acerca de mí".

Enlaces directos a GitHub, LinkedIn y WhatsApp.

Dashboard Interactivo: Muestra una galería con los perfiles de todos los alumnos.

Diseño Personalizado: Interfaz con un video de fondo y un estilo "dark mode" semi-transparente.

📖 Manual de Instalación y Uso
Para ejecutar este proyecto en un entorno local, sigue estos pasos:

1. Prerrequisitos
Asegúrate de tener instalado lo siguiente:

XAMPP (con Apache y MySQL)

Composer

Node.js & NPM

2. Instalación
Clonar el repositorio:

git clone https://github.com/FabricioNicolasDuarte/portafolio-equipo-laravel.git

Navegar a la carpeta del proyecto:

cd portafolio-equipo-laravel

Instalar dependencias de PHP:

composer install

Instalar dependencias de Node.js:

npm install

Crear el archivo de entorno: Copia el archivo de ejemplo.

cp .env.example .env

Configurar la base de datos:

Abrí el archivo .env.

Creá una base de datos vacía en MySQL (ej: portafolio_db).

Modificá las siguientes líneas en el .env:

DB_DATABASE=portafolio_db
DB_USERNAME=root
DB_PASSWORD=

Generar la clave de la aplicación:

php artisan key:generate

Ejecutar las migraciones y los seeders: Este comando creará las tablas en la base de datos y los usuarios administradores por defecto.

php artisan migrate --seed

Crear el enlace simbólico para el almacenamiento: (¡Muy importante para que se vean las fotos!)

php artisan storage:link

3. Ejecutar la Aplicación
Compilar los assets (CSS/JS): (Dejar esta terminal abierta)

npm run dev

Iniciar el servidor de Laravel: (En una segunda terminal)

php artisan serve

¡Listo! Ahora podés acceder a la aplicación en tu navegador en la dirección http://127.0.0.1:8000.

🔑 Credenciales de Administrador
Los usuarios administradores se crean automáticamente con el seeder:

Usuario 1:

Email: docente@utn.com

Contraseña: clave123 (o la que hayas configurado en el seeder)

Usuario 2:

Email: fabricio.duarte@email.com

Contraseña: clave123 (o la que hayas configurado en el seeder)

⚠️ Nota Importante para Colaboradores: Si las imágenes no se ven
Problema: Después de clonar e instalar el proyecto, es posible que las fotos de perfil (avatares) no se muestren y aparezcan como imágenes rotas.

Causa: Por seguridad, Laravel guarda los archivos subidos en una carpeta privada. Para que sean visibles en la web, se necesita crear un "acceso directo" 
(enlace simbólico) en la carpeta pública. Este enlace no se transfiere a través de Git, por lo que cada colaborador debe crearlo en su propia máquina.

Solución: Para solucionar esto, simplemente ejecutá el siguiente comando en la terminal de tu proyecto:

cmd:

php artisan storage:link

Esto creará el enlace necesario y todas las imágenes comenzarán a funcionar correctamente.

👥 Integrantes del Equipo
Duarte, Fabricio Nicolás (Administrador)

Arias, Fabio

Ascona, Enzo

Amarilla, Sebastián

Coronel, Marcelo

Proyecto realizado en Agosto de 2025.