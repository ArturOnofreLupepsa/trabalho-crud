<?php

$host = 'localhost';
$dbname = 'empregados';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;port=3308;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Se veio um ID pela URL, executa o DELETE
if (isset($_GET['id'])) {
    $id   = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM funcionario WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: index.php");
    exit;
}

$consulta = $pdo->query("SELECT id, nome, cargo, salario FROM funcionario");
$funcionarios = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionários</title>
</head>
<body>

    <h1>Lista de Funcionários</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cargo</th>
                <th>Salário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funcionarios as $f): ?>
            <tr>
                <td><?= $f['id'] ?></td>
                <td><?= htmlspecialchars($f['nome']) ?></td>
                <td><?= htmlspecialchars($f['cargo']) ?></td>
                <td>R$ <?= number_format($f['salario'], 2, ',', '.') ?></td>
                <td>
                    <a href="index.php?id=<?= $f['id'] ?>"
                        onclick="return confirm('Excluir <?= htmlspecialchars($f['nome']) ?>?')">
                        Excluir
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>