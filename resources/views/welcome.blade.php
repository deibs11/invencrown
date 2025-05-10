{{-- filepath: c:\storage-invencrown\storage-sys\resources\views\welcome.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #333;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #555;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 1rem;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .btn-login {
            background-color: #007bff;
            color: #fff;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
        .btn-register {
            background-color: #28a745;
            color: #fff;
        }
        .btn-register:hover {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido a InvenCrown</h1>
        <p>Gestiona tu inventario de manera eficiente y sencilla.</p>
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-login">Ir al Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-login">Iniciar Sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-register">Registrarse</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</body>
</html>