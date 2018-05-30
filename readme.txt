***** LINUX *****
Se necesita php7.1, mysql5.7 o superior

El users-client en /var/www/html/ apache2

para ir: http://localhost/users-client/login.php

Para api(comandos dentro de la carpeta api):

  composer update

  composer dump-autoload

  crear una base de datos en sql(solo crearla, que no tenga tablas)

  en el .env configurar con la base de datos, el nombre de la base vacia

  php artisan migrate -> creara la tabla usuarios

  php artisan db:seed -> creara el primer usuario con credenciales -> user:admin, pass:admin


  Corriendo el servidor
  php -S localhost:8000 -t public
