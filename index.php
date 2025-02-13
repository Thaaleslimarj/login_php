<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<style>

body{
background-color:rgb(49, 0, 128);
}

.login{
    width: 300px;
    height: 200px;
    margin-left: 38%;
    margin-top: 5%;
}

input{
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    font-size: 20px;
    box-sizing: border-box;
}
h3{
margin-left: 35%;
color: white;
}

a{
font-size: 20px;
}

a:hover{
color: white;
}

.erro{
color: white;
width: 100%;
height: 30px;
background-color: red;
}

.botao:hover{
background-color: #DEB887;
cursor: pointer;
}

input:focus{
border:2px solid blue;
outline: none;
}


</style>
</head>
<body>
<?php 
session_start();
?>

<h3>LOGIN</h3>
<hr>

<?php 
if(isset($_SESSION['nao_autenticado'])):

?>
<div class="erro">
<h3>Erro: Senha Inválida.</h3>
</div>

<?php 
endif;
unset($_SESSION['nao_autenticado']);
?>
<form action="." method="POST">
<div class="login">
<form action="validarLogin.php" method="POST">
<input type="text" name="usuario" placeholder="Usuário:">
<input type="password" name="senha" placeholder="Senha:">
<input class="botao" type="submit" value="ENTRAR"><br><br>


<a href="senha_esquecida/trocar_senha.php">Esqueceu a senha</a><hr>



</form>
</div>
</body>
</html>