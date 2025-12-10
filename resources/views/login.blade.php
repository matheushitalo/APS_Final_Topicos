<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body style="font-family: Arial; padding: 20px;">

    <h2>Login</h2>

    @if(session('erro'))
        <p style="color: red">{{ session('erro') }}</p>
    @endif

    <form method="POST" action="/login">
        @csrf

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Entrar</button>
    </form>

    <br>
    <p>Ainda não tem conta?</p>
    <a href="/register" 
       style="display:inline-block; padding:8px 12px; background:#007bff; color:white; text-decoration:none; border-radius:4px;">
       Criar conta
    </a>

</body>
</html>
