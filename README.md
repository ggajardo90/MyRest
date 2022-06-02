## Comenzando 🚀

### Pre-requisitos 📋

```
PHP 8.0
COMPOSER 2.0
```

### Instalación 🔧

Ejecutar los siguientes comando para obtener el repositorio.

1.- git clone https://github.com/ggajardo90/MyRest.git

2.- Ejecturar desde la terminal los siguientes comandos
_(instalación de composer y el archivo .env para la base de datos.)_

```
composer install

cp .env.example .env
```
3.- Verificar si esta creada la base de datos con el nombre que aparece en el archivo .env.

4.- Ejecutar el siguiente comando para migrar la base de datos
```
1# php artisan migrate  
2# php artisan db:seed
3# php artisan key:generate
```
5.- Correr el proyecto desde la terminal _(ctrl + ñ en vscode)_ dentro del directorio
```
1# php artisan serve
```
6.- Crear un usuario para poder ingresar a las funciones del CRUD.

