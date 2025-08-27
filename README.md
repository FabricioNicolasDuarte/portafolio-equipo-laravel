# **Portafolio de Equipo \- UTN Programación IV**

Este proyecto fue desarrollado para la materia **Programación IV** de la Tecnicatura Universitaria en Programación (UTN-FRRE). La aplicación web funciona como un portafolio dinámico para los alumnos de dicha materia, permitiendo a cada uno gestionar su propio perfil profesional.

## **🚀 Acerca del Proyecto**

La aplicación permite el registro de usuarios (alumnos) para que puedan crear y mantener un perfil personal con su información académica, una descripción sobre ellos y enlaces a sus redes profesionales como GitHub, LinkedIn y WhatsApp.

El sistema cuenta con un rol de **Administrador** (diseñado para el docente evaluador y un líder de equipo) que tiene permisos para visualizar y editar el perfil de cualquier usuario registrado.

## **✨ Características Principales**

* **Sistema de Autenticación:** Registro y Login de usuarios seguros con Laravel Breeze.  
* **Roles de Usuario:**  
  * **Alumno:** Puede visualizar todos los perfiles, pero solo editar el suyo.  
  * **Administrador:** Tiene control total para ver y editar el perfil de cualquier usuario.  
* **Gestión de Perfiles:** Cada usuario puede añadir y actualizar:  
  * Nombre y Apellido.  
  * Foto de perfil (avatar).  
  * Información académica (Carrera y Universidad).  
  * Una biografía en la sección "Acerca de mí".  
  * Enlaces directos a GitHub, LinkedIn y WhatsApp.  
* **Dashboard Interactivo:** Muestra una galería con las tarjetas de perfil de todos los alumnos.  
* **Diseño Personalizado:** Interfaz moderna con un video de fondo y un estilo *dark mode* semi-transparente.

## **🛠️ Tecnologías Utilizadas**

* **Framework Backend:** Laravel 12  
* **Base de Datos:** MySQL  
* **Framework Frontend:** Blade con Tailwind CSS  
* **Autenticación:** Laravel Breeze  
* **Servidor Local:** XAMPP

## **📖 Manual de Instalación y Uso**

Para ejecutar este proyecto en un entorno local, sigue estos pasos:

### **1\. Prerrequisitos**

Asegúrate de tener instalado lo siguiente:

* [XAMPP](https://www.apachefriends.org/es/index.html) (con Apache y MySQL)  
* [Composer](https://getcomposer.org/)  
* [Node.js & NPM](https://nodejs.org/es/)

### **2\. Instalación**

1. **Clonar el repositorio:**  
   git clone https://github.com/FabricioNicolasDuarte/portafolio-equipo-laravel.git

2. **Navegar a la carpeta del proyecto:**  
   cd portafolio-equipo-laravel

3. **Instalar dependencias de PHP:**  
   composer install

4. **Instalar dependencias de Node.js:**  
   npm install

5. **Crear el archivo de entorno:**  
   cp .env.example .env

6. **Configurar la base de datos:**  
   * Abrí el archivo .env.  
   * Creá una base de datos vacía en MySQL (ej: portafolio\_db).  
   * Modificá las siguientes líneas en el .env:  
     DB\_DATABASE=portafolio\_db  
     DB\_USERNAME=root  
     DB\_PASSWORD=

7. **Generar la clave de la aplicación:**  
   php artisan key:generate

8. **Ejecutar migraciones y seeders:** Este comando creará las tablas y los usuarios administradores por defecto.  
   php artisan migrate \--seed

9. **Crear el enlace simbólico para el almacenamiento:**  
   php artisan storage:link

### **3\. Ejecutar la Aplicación**

1. **Compilar los assets (CSS/JS):** (Dejar esta terminal abierta)  
   npm run dev

2. **Iniciar el servidor de Laravel:** (En una segunda terminal)  
   php artisan serve

¡Listo\! Ahora podés acceder a la aplicación en http://127.0.0.1:8000.

## **🔑 Credenciales de Administrador**

Los usuarios administradores se crean automáticamente con el seeder:

* **Usuario 1:**  
  * **Email:** docente@utn.com  
  * **Contraseña:** clave123 *(o la que hayas configurado en el seeder)*  
* **Usuario 2:**  
  * **Email:** fabricio.duarte@email.com  
  * **Contraseña:** clave123 *(o la que hayas configurado en el seeder)*

## **⚠️ Solución de Problemas Comunes**

### **Las imágenes o avatares no se ven**

* **Problema:** Después de instalar el proyecto, las fotos de perfil no se cargan.  
* **Causa:** El enlace simbólico entre la carpeta public y storage no se transfiere por Git.  
* **Solución:** Ejecutá el siguiente comando en la terminal de tu proyecto:  
  php artisan storage:link

## **👥 Integrantes del Equipo**

* **Duarte, Fabricio Nicolás** (Administrador)  
* **Arias, Fabio**  
* **Ascona, Enzo**  
* **Amarilla, Sebastián**  
* **Coronel, Marcelo**

*Proyecto realizado en Agosto de 2025\.*
