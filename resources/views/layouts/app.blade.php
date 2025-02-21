<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Mi Aplicación Laravel</title>
</head>
<body>
    <div class="container">
        <!-- Aca se inyecta el contenido específico de cada vista -->
        @yield('content')
    </div>
</body>
</html>
