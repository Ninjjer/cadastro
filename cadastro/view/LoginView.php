<!DOCTYPE html>
<html lang="pt-br">
    <link rel="stylesheet" href="">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

</head>
<body>
    <section id="sec-primeira">
        <section id="sec-form">
    <div id="div-diff">
            <h2>Login</h2>
            </div>
    <form action="login.php?acao=login" method="post" id="form-box">
        
        <label class="label-cl" for="email">Email</label>
        <input class="input-cl" type="text" name="email" id="email" required>
        <br><br>

        <label class="label-cl" for="senha">Senha</label>
        <input class="input-cl" type="password" name="senha" id="senha" required>
        <br><br>

        <input id="login-btn" type="submit" value="Fazer login">
        <div class="div-sep">
        <p><h2>Não possui cadastro?</h2></p>
        
        <ul> 
            <li ><a id="a-clique" href="../service/cadastro.php">Clique Aqui!</a></li>
        </ul>
        </div>
    </form>
    </section>
    </section>
</body>