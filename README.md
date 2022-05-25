## Comenzando 🚀

### Pre-requisitos 📋

```
PHP 8.0
COMPOSER ^2.0
(Se recomienda instalar y utlizar valet)
```

### Instalación 🔧

_Ejecutar los siguientes comando para obtener el repositorio_

```
git clone https://github.com/ggajardo90/MyRest.git
```

_Hacer el composer install del proyecto, si no se crea el archivo .env ejecutar el comando #2_

```
composer install

#2
cp .env.example .env
```

_Verificar que la base de datos este creada y configurada en el archivo .env, si esta todo bien ejecutar_

```
php artisan migrate
```

_Ejecutar el siguiente comando para generar la APP KEY_

```
php artisan key:generate
```

## Correr el proyecto en tres terminal con los siguientes comando

```
# Terminal 1 (Solo si no se ha instalado valet)
php artisan php artisan serve -> servidor de la aplicacion
```
