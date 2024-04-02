<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "sua-senha";
$dbname = "videoconferencia_app";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recuperar o ID da videoconferência da URL
$id = $_GET['id'];

// Obter informações da videoconferência com base no ID
$sql = "SELECT * FROM videoconferencias WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    // Se não encontrar a videoconferência, redirecione para o dashboard ou faça algo apropriado
    header("Location: dashboard.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        nav {
            margin-top: 10px;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        form {
            display: grid;
            grid-gap: 15px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4b5320;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #556b2f;
        }

        a {
            text-decoration: none;
            color: #4b5320;
            font-weight: bold;
            font-size: 1.2em;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-right: 10px;
            background-color: #fff;
        }

        a:hover {
            background-color: #333;
            color: #fff;
        }
    </style>
    <title>Editar Videoconferência</title>
</head>
<body>
    <header>
        <h1>Editar Videoconferência</h1>
        <nav>
            <a href="dashboard.php">Voltar</a>
        </nav>
    </header>

    <section class="form-container">
        <?php
        // Conectar ao banco de dados (substitua as informações conforme necessário)
        $servername = "localhost";
        $username = "root";
        $password = "sua-senha";
        $dbname = "videoconferencia_app";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Obter o ID da videoconferência da URL
        $videoconferencia_id = $_GET['id'];

        // Consulta SQL para obter os dados da videoconferência
        $sql = "SELECT * FROM videoconferencias WHERE id = $videoconferencia_id";
        $result = $conn->query($sql);

        // Verificar se a consulta retornou resultados
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        ?>
        <form action="processa_edicao.php" method="post">
            <input type="hidden" name="videoconferencia_id" value="<?php echo $videoconferencia_id; ?>">

            <label for="vc">Videoconferência:</label>
            <input type="text" id="vc" name="vc" value="<?php echo $row['vc']; ?>" required>

            <label for="diex">DIEx:</label>
            <input type="text" id="diex" name="diex" value="<?php echo $row['diex']; ?>" required>

            <label for="solicitante">Solicitante:</label>
            <input type="text" id="solicitante" name="solicitante" value="<?php echo $row['solicitante']; ?>" required>

            <label for="data">Data:</label>
            <input type="date" id="data" name="data" value="<?php echo $row['data']; ?>" required>

            <label for="local">Local:</label>
            <input type="text" id="local" name="local" value="<?php echo $row['local']; ?>" required>

            <label for="horario">Horário:</label>
            <input type="time" id="horario" name="horario" value="<?php echo $row['horario']; ?>" required>

            <label for="horarioteste">Horário Teste:</label>
            <input type="time" id="horarioteste" name="horarioteste" value="<?php echo $row['horarioteste']; ?>">

            <label for="link">Link:</label>
            <input type="text" id="link" name="link" value="<?php echo $row['link']; ?>">

            <label for="informacoes">Informações adicionais:</label>
            <textarea id="informacoes" name="informacoes"><?php echo $row['informacoes']; ?></textarea>

            <input type="submit" value="Salvar Edição">
        </form>
        <?php
        } else {
            echo "<p>Videoconferência não encontrada.</p>";
        }

        // Fechar a conexão
        $conn->close();
        ?>
    </section>
</body>
</html>
