<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
</head>
<body style="font-family: Arial; padding: 20px;">

    <h2>Cadastrar Usuário</h2>

    @if(session('erro'))
        <p style="color: red">{{ session('erro') }}</p>
    @endif

    <form method="POST" action="/register">
        @csrf

        <label>Nome:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <br>
    <a href="/login">Voltar para login</a>

</body>
</html>
