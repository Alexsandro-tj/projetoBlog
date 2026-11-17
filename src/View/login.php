<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Login</title>
</head>

<body>
    

    <header class="w3-conatiner w3-center w3-light-grey">
        <h1>Formulário de Acesso</h1>
    </header>

    <form action="/verifyLogin" method="POST">
        <section class="w3-container w3-section">

            <label for="usr"><b>E-mail: </b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="email" name="email" required>
            
            <label><b>Senha</b></label>
            <input class="w3-input w3-border " type="password" name="pwd" id="inputPwd" required>
            <input class="w3-section w3-block w3-green" type="submit" value="Entrar">
            <input class="w3-check " type="checkbox" name="rm" id=""> Lembrar de mim.
        </section>
    </form>
    <footer class="w3-container w3-border-top w3-padding-16 w3-grey">
        <span class="w3-right w3-padding w3-hide-small">Esqueceu a <a href="#">senha?</a></span>
    </footer>
</body>

</html>