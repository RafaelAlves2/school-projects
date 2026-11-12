<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="pt pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
</head>
<body>
<nav class ="blue-gray">
    <div class="nav-wrapper">
        <div class="brand-logo light">Sistema de Registos</div>
        <ul class ="right">
            <li><a href=""><i class="material-icons left">account_circle</i> Registos</a></li>
            <li><a href="#"><i class="material-icons left">search</i> Consultas</a></li>
    </div>
</nav>

<div class="row container">
    <form action="basedados/inserir.php" method="post" class="col s12">
        <fieldset class="formulario">
            <legend><img src="imagens/avatar3.jpg" alt="[imagem]" width="100"></legend>
        
            <h5 class="light center">Registo de Clientes</h5>

            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];

                    session_unset();
                }
            ?>


            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="nome" id="nome" maxlength="40" required autofocus>
                <label for="nome">Nome Completo</label>
            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input type="email" name="email" id="email" maxlength="50" required>
                <label for="email">Email</label>
            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">phone</i>
                <input type="text" name="telefone" id="telefone" maxlength="15" required>
                <label for="telefone">Número de Telefone</label>
            </div>

            <div class="input-field col s12">
                <input type="submit" value="Registar" class="btn blue">
                <input type="reset" value="Limpar" class="btn red">
            </div>
        </fieldset>
    </form>
</div>



<script type="text/javascript" src="materialize/js/jquery-4.0.0.js"></script>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
    })


</body>
</html>