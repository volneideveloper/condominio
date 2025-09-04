<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condo100 - Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            background: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
        }
        .login-icon {
            background: #2e7d32;
            color: #fff;
            font-size: 2rem;
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 1rem auto;
            box-shadow: 0 4px 12px rgba(46,125,50,0.3);
        }
        .login-title {
            text-align: center;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #2e7d32;
        }
        .form-control {
            border-radius: 0.5rem;
        }
        .btn-login {
            border-radius: 0.5rem;
            background: #2e7d32;
            border: none;
        }
        .btn-login:hover {
            background: #1b5e20;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="login-icon">
        <i class="bi bi-buildings"></i>
    </div>
    <h3 class="login-title">Condo100</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" type="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input id="password" type="password" 
                   class="form-control @error('password') is-invalid @enderror" 
                   name="password" required>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success btn-login w-100">
            <i class="bi bi-box-arrow-in-right"></i> Entrar
        </button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
