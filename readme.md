SISTEMA DE ENCUESTAS BASICA, HECHO EN LARAVEL 5.2.
Instalación

Después de descargar el proyecto entramos a este.

$ cd nombreRepositorio
Ejecutamos el siguiente comando.

$ composer install
Modificamos el nombre del archivo .env.example. por .env y agregamos nuestras credenciales.

Generamos una key para nuestra app.

 $ php artisan key:generate
Ejecutamos las migraciones.

 $ php artisan migrate
Listo ya podemos ejecutar el proyecto.

$ php artisan serve