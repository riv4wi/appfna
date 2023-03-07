# APPFNA
## Prueba técnica
Esta es una API para administrar artículos, fotos y comentarios de un Blog, o incluso pudiese ser una tienda online.

Este desarrollo implementa internacionalización (i18n). Soporte en Inglés y Español. El idioma a utilizar se configura en archivo de configuración (.env)

```sh
# To change the language, both variables must be activated.
# Supported languages English [en_US, en] and Spanish [es_AR, es]
LANGUAGE_I18N=es_AR
LANGUAGE_ISO6391=es
```

## Pasos para desplegar la aplicación localmente
Crear la base de datos. Usar el manejador de base de datos de su preferencia o simplemente usar la consola
 ```sh
mysql -uroot -p
```
Una vez dentro de la consola de mysql:
 ```sh
create database appfna;
```
Crear usuario y dar los permisos al usuario de mysql a la base de datos, en mi caso es 'riv4wi'
 ```sh
grant all privileges on appfna.*to'riv4wi'@'localhost';
flush privileges;
```
Una vez dentro del editor de código. Renombrar el archivo .env-example a .env, ya puse algunos datos de la conexión a la base de datos, pero puedes cambiarlo de acuerdo a tu conveniencia.

Ejecutar en la terminal:
 ```sh
composer install
```

No es necesario, pero sugiero ejecutar estos comandos en la terminal:
 ```sh
php artisan cache:clear;
php artisan route:clear;
php artisan config:clear;
```
Si todo va bien a este punto ejecutamos las migraciones y los seeders con este comando:
 ```sh
php artisan migrate:fresh --seed;
```

Luego ejecutamos:
 ```sh
php artisan passport:install
```

Abrir otra terminal y ejecutar:
 ```sh
php artisan serve
```

Luego importamos la colección de peticiones en Postman y empezamos a manipular la api en Postman

Tanto la colección de Postman como el link a la documentación pública de la api está en esta carpeta compartida:
[Google Drive](https://drive.google.com/drive/folders/1d_K6WGGqNMe0YwJ_q6ZdusLmXeBn2vUC?usp=sharing) (Carpeta pública del proyecto)
