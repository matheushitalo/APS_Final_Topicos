<!DOCTYPE html>
<html>
<head>
    <title>Painel</title>
</head>
<body>
    <h1>Bem-vindo, {{ session('usuario_nome') }}!</h1>

    <p>Você está logado com sucesso.</p>

    <a href="/logout">Sair</a>
</body>
</html>
