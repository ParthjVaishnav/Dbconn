<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
            animation: fadeIn 1s ease-in-out;
        }
        h2 {
            margin-bottom: 15px;
            color: #ff758c;
        }
        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: 0.3s;
        }
        input:focus {
            border-color: #ff758c;
            box-shadow: 0px 0px 5px rgba(255, 117, 140, 0.5);
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #ff758c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #ff5260;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        .link {
            margin-top: 15px;
            display: block;
            color: #ff758c;
            text-decoration: none;
        }
        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>

        <form action="adddata" method="post">

            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>


        <a href="{{ route('register') }}" class="link">Don't have an account? Register</a>
    </div>
</body>
</html>
