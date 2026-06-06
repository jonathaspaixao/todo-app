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

    <?php
    $total = $conn->query("SELECT COUNT(*) as total FROM tarefas")->fetch_assoc()['total'];
    ?>
    <p><strong>Total de tarefas:</strong> <?= $total ?></p>

    <ul>
    <?php
    $sql = "SELECT * FROM tarefas ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {

            echo "<li>";

            if ($row['status'] == 1) {
                echo "<span style='text-decoration: line-through; color: gray;'>" . $row['nome'] . "</span>";
            } else {
                echo "<span>" . $row['nome'] . "</span>";
            }

            echo "<div>";

            if ($row['status'] == 0) {
                echo "<a href='update.php?id=".$row['id']."' style='color:green; margin-right:10px;'>Concluir</a>";
            }

            echo "<a href='delete.php?id=".$row['id']."'>Excluir</a>";

            echo "</div>";
            echo "</li>";
        }

    } else {
        echo "<p>Nenhuma tarefa cadastrada.</p>";
    }
    ?>
    </ul>

</div>

</body>
</html>