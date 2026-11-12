<?php
include_once "includes/header.php";
include_once "includes/menu.php";
?>

<div class="row container">
    <h5 class="light">Pesquisa</h5>
    <hr>
    <div class="col s8 right-align">
    </div>
    <form action="pesquisa.php" method="GET">
        <div class="col s4 right-align">
            <div class="input-field">
                <label for="search">Pesquise pelo nome de cliente</label>
                <input id="search" type="search" name="pesquisa" required onkeypress="pesquisar(event)">
                <i class="material-icons" style="cursor: pointer;" onclick="limparCampoPesquisa()">close</i>
            </div>
        </div>
    </form>

    <table class="striped">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Foto</th>
        </thead>
        <tbody>
            <?php
            include_once "basedados/bdados.php";
            if (isset($_GET['pesquisa'])) {
                $pesquisa = $_GET['pesquisa'];

                $querySelect = $conexao->query("SELECT * FROM clientes WHERE nome LIKE '%$pesquisa%'");

                if ($querySelect->num_rows > 0) {
                    while ($registos = $querySelect->fetch_assoc()) {
                        $id = $registos['id'];
                        $nome = $registos['nome'];
                        $email = $registos['email'];
                        $telefone = $registos['telefone'];

                        $nome_imagem = $registos['imagem'];

                        echo "<tr>";
                        echo "<td>$nome</td><td>$email</td><td>$telefone</td>";
                        echo "<td><img src='imagens/$nome_imagem' alt='$nome' style='max-width: 50px; max-height: 50px;'></td>";
                        echo "<tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum resultado encontrado!</td></tr>";
                }
            } else {
                $querySelect = $conexao->query("SELECT * FROM clientes");

                if ($querySelect->num_rows > 0) {
                    while ($registos = $querySelect->fetch_assoc()) {
                        $id = $registos['id'];
                        $nome = $registos['nome'];
                        $email = $registos['email'];
                        $telefone = $registos['telefone'];

                        $nome_imagem = $registos['imagem'];

                        echo "<tr>";
                        echo "<td>$nome</td><td>$email</td><td>$telefone</td>";
                        echo "<td><img src='imagens/$nome_imagem' alt='$nome' style='max-width: 50px; max-height: 50px;'></td>";
                        echo "<tr>";
                    }
                }
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    function pesquisar(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("search").closest("form").submit();
        }
    }

    function limparCampoPesquisa() {
        document.getElementById("search").value = "";
    }
</script>
<?php
include_once "includes/footer.php";
?>