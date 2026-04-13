<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2>Lista de Tarefas</h2>

    <form action="add.php" method="POST">
        <input type="text" name="nome" placeholder="Digite uma tarefa" required>
        <button type="submit">Adicionar</button>
    </form>

    <ul>
    <?php
    $sql = "SELECT * FROM tarefas";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        echo "<li>
                <span>" . $row['nome'] . "</span>
                <a href='delete.php?id=".$row['id']."'>Excluir</a>
              </li>";
    }
    ?>
    </ul>

</div>

</body>
</html>