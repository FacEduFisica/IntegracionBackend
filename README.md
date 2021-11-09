
<div align="center">
<img src="https://4.bp.blogspot.com/-mYqcTGN2WHI/WtvfU15uRzI/AAAAAAAAVEo/YIleYrMPD1wISugRHjB_KgQOGQ-_3ta-gCLcBGAs/s1600/politecnico-jaime-isaza-cadavid_4716001832.jpg" alt="Logo" width="80" height="80">
</div>

## Integración Poli Backend

### Construido con

* [mysql](https://www.mysql.com/)
* [laravel](https://laravel.com/)
* [passport](https://packagist.org/packages/laravel/passport)

## Instalación

* composer
    Este comando es para instalar las dependencias de composer
    ```sh
  composer install
    ```

* generate key    
    Este comando es para generar una llave unica en el backend
  ```sh
    php artisan key:generate
  ```

* migration
    Este comando es para realizar las migraciones a la base de datos
    ```sh
        php artisan make:migration
    ```

* passport
    Este comando es para inicializar autenticación con passport
    ```sh
        php artisan passport:install
    ```