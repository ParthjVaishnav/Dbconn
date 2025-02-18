<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #eef2f3, #d5dbe0);
            font-family: 'Poppins', sans-serif;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid #ced4da;
            color: #333;
            padding: 12px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
            outline: none;
        }
        .btn-custom {
            width: 100%;
            padding: 12px;
            background: #007bff;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background: #0056b3;
            transform: scale(1.03);
        }
        .link {
            display: block;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }
        .link:hover {
            text-decoration: underline;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Login</h2>
        <form action="adddata" method="post">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-custom">Login</button>
        </form>
        <a href="{{ route('register') }}" class="link">Don't have an account? Register</a>
    </div>
</body>
</html>
