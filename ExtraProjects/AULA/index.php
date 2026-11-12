<?php
    include_once 'includes/header.php';
    include_once 'includes/menu.php';
?>

    <div class="row container">
        <form action="basedados/inserir.php" method="POST" class="col s12" enctype="multipart/form-data">
            <fieldset class="formulario">
                <legend><img src="imagens/avatar3.jpg" alt="[imagem]" width="100"> </legend>

                <h5 class="light center">Registo de Clientes</h5>

                <!-- Para mostrar as mensagens de "Registado com sucesso" ou Erro no registo-->
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];

                    session_unset();
                }
                ?>

                <!-- Campo Nome -->
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" name="nome" id="nome" maxlength="40" required autofocus>
                    <label for="nome">Nome do Cliente</label>
                </div>
                <!-- Campo Email -->
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input type="text" name="email" id="email" maxlength="50" required>
                    <label for="email">Email do Cliente</label>
                </div>
                <!-- Campo Telefone -->
                <div class="input-field col s12">
                    <i class="material-icons prefix">phone</i>
                    <input type="text" name="telefone" id="telefone" maxlength="15" required>
                    <label for="telefone">Telefone do Cliente</label>
                </div>

                <!--Campo Imagem -->
                <div class="input-field col s12">
                    <i class="material-icons prefix">camera_alt</i>
                    <input type="file" name="image">
                </div>

                <!-- Botões -->
                <div class="input-field col s12">
                    <input type="submit" value="registo" class="btn blue">
                    <input type="reset" value="limpar" class="btn red">
                </div>

            </fieldset>



        </form>
    </div>


<?php
    include_once 'includes/footer.php';
?>
