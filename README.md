
# Orders

Muestra una lista de ordenes y calcula el coste total de todas las ordenes de forma asíncrona a través de un JOB 

## Como ejecutar el proyecto

### Especificaciones técnicas
* Laravel 8
* PHP 7.4

### Composer
```
composer install
```

### Configuración del env
Agregar en el .env para la configuración del queue
```
QUEUE_CONNECTION=database
```
### Ejecutamos migraciones y seed

```
php artisan migrate
php artisan db:seed
```
### NPM

```
npm run install
npm run build
```

## Proyecto

Una vez levantado el proyecto, se puede ejecutar el job:

```
#ejecutar worker en local
php artisan queue:work

php artisan command:totalCost
```

## Test

Ejecutar los test


```
php artisan test
```
