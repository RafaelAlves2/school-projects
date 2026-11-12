<?php
include_once 'bdados.php';

$querySelect = $conexao->query("SELECT * FROM clientes");

while ($registos = $querySelect->fetch_assoc()) {
    $id=$registos['id'];
    $nome = $registos['nome'];
    $email = $registos['email'];
    $telefone = $registos['telefone'];

    $nome_imagem=$registos['imagem'];

    echo "<tr>";
    echo "<td>$nome</td><td>$email</td><td>$telefone</td>";

    echo "<td><img src='imagens/$nome_imagem' alt='$nome' style='max-width: 80px; max-height: 80px;'></td>";

    echo "<td><a href='editar.php?id=$id'><i class='material-icons'>edit</i></a></td>";
    echo "<td><a href='basedados/apagar.php?id=$id' onclick='return checkdelete()'><i class='material-icons'>delete</i></a></td>";
    echo "</tr>";
}
?>  

<script type="text/javascript">
    function checkdelete(){
        return confirm('Tem a certeza que pretende eliminar este registo?');
    }
</script>