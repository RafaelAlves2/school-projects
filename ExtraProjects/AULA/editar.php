<?php
    include_once 'includes/header.php';
    include_once 'includes/menu.php';
?>

<div class="row container">
    <div class="col s12">
        <h5 class="light">Edição de Registos</h5><hr>
    </div>
</div>

<?php
    include_once "basedados/bdados.php";
    $id=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['id']=$id;

    $querySelect=$conexao->query("SELECT * FROM clientes WHERE id='$id'");
    while($registos=$querySelect->fetch_assoc()){
        $nome=$registos['nome'];
        $email=$registos['email'];
        $telefone=$registos['telefone'];
        $nome_imagem=$registos['imagem'];
    }
?>

<div class="row container">
        <form action="basedados/atualizar.php" method="POST" class="col s12" enctype="multipart/form-data">
            <fieldset class="formulario">
                <legend><img src="imagens/avatar3.jpg" alt="[imagem]" width="100"> </legend>

                <h5 class="light center">Registo de Clientes</h5>

                <!-- Campo Nome -->
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" name="nome" id="nome" maxlength="40" value="<?php echo $nome; ?>" required autofocus>
                    <label for="nome">Nome do Cliente</label>
                </div>
                <!-- Campo Email -->
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input type="text" name="email" id="email" maxlength="50" value="<?php echo $email; ?>"  required>
                    <label for="email">Email do Cliente</label>
                </div>
                <!-- Campo Telefone -->
                <div class="input-field col s12">
                    <i class="material-icons prefix">phone</i>
                    <input type="text" name="telefone" id="telefone" maxlength="15" value="<?php echo $telefone; ?>" required>
                    <label for="telefone">Telefone do Cliente</label>
                </div>

                <!--Campo Imagem -->
                <div class="input-field col s12">
                    <i class="material-icons prefix">camera_alt</i>
                </div>
                <div class="input-field col s3">
                    <?php if (!empty($nome_imagem)) { ?>
                        <img src="imagens/<?php echo $nome_imagem; ?>" alt="Imagem antiga" style="max-width: 100px; max-height: 100px;">
                    <?php } else { ?>
                    <P>Nenhuma imagem antiga disponivel</P>
                    <?php } ?>
                </div>
                <div class="input-field col s12">
                    <input type="file" name="nova_imagem">
                </div>
                

                <!-- Botões -->
                <div class="input-field col s12">
                    <input type="submit" value="alterar" class="btn blue">
                    <a href="consultas.php" class="btn red">Cancelar</a>
                </div>
            </fieldset>
        </form>
    </div>

<?php
    include_once "includes/footer.php";
?>