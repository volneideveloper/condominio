<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condo100</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --dark-bg: #1e293b;
            --dark-card: #2d3748;
            --primary-color: #22c55e; /* Verde vibrante */
            --primary-light: #4ade80;
            --text-color-light: #e2e8f0;
            --shadow-strong: rgba(0, 0, 0, 0.3);
            --shadow-light: rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-color-light);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-card {
            background-color: var(--dark-card);
            border-radius: 1.5rem;
            box-shadow: 0 16px 30px var(--shadow-strong);
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease;
        }
        .login-card:hover {
            transform: translateY(-5px);
        }

        .login-icon-container {
            margin-bottom: 2rem;
        }
        .login-icon {
            background: var(--primary-color);
            color: var(--dark-card);
            font-size: 2.5rem;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto;
            box-shadow: 0 8px 15px rgba(34, 197, 94, 0.3);
        }
        .login-title {
            font-weight: 700;
            color: var(--primary-light);
            margin-bottom: 2rem;
            font-size: 2rem;
            letter-spacing: -0.5px;
        }

        .input-group-modern {
            position: relative;
            margin-bottom: 1.5rem;
        }
        .input-group-modern .form-control {
            padding-left: 3rem;
            border-radius: 0.75rem;
            background-color: transparent;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--text-color-light);
            transition: all 0.3s ease;
        }
        .input-group-modern .form-control::placeholder {
            color: var(--text-color-muted);
            opacity: 0.7;
        }
        .input-group-modern .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(34, 197, 94, 0.25);
            border-color: var(--primary-color);
        }
        .input-group-modern .form-control + .bi {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            color: var(--text-color-muted);
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        .input-group-modern .form-control:focus + .bi {
            color: var(--primary-color);
        }
        .input-group-modern .form-control.is-invalid {
            border-color: #dc3545;
        }
        .input-group-modern .form-control.is-invalid + .bi {
            color: #dc3545;
        }

        .btn-login {
            background-color: var(--primary-color);
            color: var(--dark-card);
            border: none;
            padding: 0.75rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(34, 197, 94, 0.3);
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.4);
            background-color: var(--primary-light);
        }

        .invalid-feedback {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-icon-container">
            <div class="login-icon">
                <i class="bi bi-buildings-fill"></i>
            </div>
        </div>
        <h3 class="login-title">Condo100</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="input-group-modern">
                <label for="email" class="form-label visually-hidden">E-mail</label>
                <input id="email" type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required autofocus placeholder="E-mail">
                <i class="bi bi-envelope-fill"></i>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="input-group-modern">
                <label for="password" class="form-label visually-hidden">Senha</label>
                <input id="password" type="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       name="password" required placeholder="Senha">
                <i class="bi bi-key-fill"></i>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-login w-100">
                <i class="bi bi-box-arrow-in-right"></i> Entrar
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>