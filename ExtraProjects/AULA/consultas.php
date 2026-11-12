<?php
    include_once 'includes/header.php';
    include_once 'includes/menu.php';
?>

<div class="row container">
    <div class="col s12">
        <h5 class="light">Consultas</h5><hr>

        <table class="striped">

            <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    session_unset();
                }
            ?>

            <thead>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Foto</th>
            </thead>
            <tbody>
                <?php
                    include_once 'basedados/listar.php';
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
    include_once 'includes/footer.php';
?>
