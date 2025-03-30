
## 1️⃣ Instalación y Configuración Inicial

✅ Configuración de base de datos en .ENV

```dotenv
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=mi_base_laravel 
DB_USERNAME=root  
DB_PASSWORD= 
```

✅ Ejecutamos migraciones para la creación de tablas:
```bash
php artisan migrate
```

## 2️⃣ Implementación de autenticación (Login y Registro)

✅ Instalamos Breeze para manejar autenticación:
```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
```

✅ Ejecutamos migraciones para incluir la tabla users:
```bash
php artisan migrate
```
✅ Con Breeze creamos rutas de autenticación automaticamente:
- **/login → Para iniciar sesión**
- **/register → Para registrarse**
- **/logout → Para cerrar sesión**

## 3️⃣ Creación del CRUD de Cursos

✅ Creamos el modelo y migración de Course:
```bash
php artisan make:model Course -m
```
✅ Editamos la migración database/migrations/YYYY_MM_DD_create_courses_table.php para definir la tabla:
```php
public function up()
{
    Schema::create('courses', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->timestamps();
    });
}
```
✅ Ejecutamos la migración:
```bash
php artisan migrate
```
✅ Creamos un controlador para manejar las acciones CRUD:
```bash
php artisan make:controller CourseController --resource
```
✅ Definimos las rutas en routes/web.php:
```php
use App\Http\Controllers\CourseController;

Route::resource('courses', CourseController::class)->middleware('auth');

```
## 4️⃣ Otras Configuraciones 
✅ Protegimos rutas con autenticación usando auth en routes/web.php.

✅ Creamos el sistema de paginación en la vista de cursos usando:
```php
{{ $courses->links() }}
```
✅ Añadimos mensajes de validación en formularios.




