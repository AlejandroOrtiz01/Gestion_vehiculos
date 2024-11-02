<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Sobre el Proyecto
Este proyecto es un sistema integral de gestión de vehículos desarrollado en PHP con Laravel, diseñado para registrar vehículos, asociar marcas y planificar sus mantenimientos de forma organizada. Utiliza la plantilla AdminLTH para una interfaz moderna, y se basa en una arquitectura MVC para mantener una separación clara entre el frontend y el backend, 
optimizando la experiencia de usuario y facilitando el mantenimiento y escalabilidad del sistema.

con mi base de datos esta el script en la carpeta database, alli se puede visualizar el script la cual es una base de datos relacional.


## Instalación

Para instalar y configurar el proyecto, sigue los siguientes pasos:

1. **Clona el repositorio:**
   ```bash
   git clone https://github.com/AlejandroOrtiz01/Gestion_vehiculos.git

2. **Navega al directorio del proyecto:**
   ```bash
   cd Gestion_vehiculos

3. **Instala las dependencias del proyecto:**
   ```bash
   composer install
   
4. **Copia el archivo de entorno de ejemplo y renómbralo:**
   ```bash
   cp .env.example .env

5. Configura tu archivo .env con las credenciales de tu base de datos y otras configuraciones necesarias.

6. **Genera la clave de la aplicación:**
   ```bash
   php artisan key:generate

7. **Ejecuta las migraciones y seeders para crear las tablas en la base de datos y sus registros:**
   ```bash
   php artisan migrate --seed

8. **Inicia el servidor:**
   ```bash
   php artisan serve

## Uso

Accede al proyecto en tu navegador en la siguiente dirección: http://127.0.0.1:8000 
Accede al proyecto con mi dominio  https://gestion-vehiculos.alejandroher.com/login
credecial para acceder:
login : admin@gmail.com
contraseña: password
