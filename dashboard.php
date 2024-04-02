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

$sql = "SELECT * FROM videoconferencias";
$result = $conn->query($sql);
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
            padding: 1em 0;
            text-align: center;
            border-bottom: 5px solid #4b5320;
        }

        h1 {
            margin: 0;
            font-size: 2em;
            color: #fff;
        }

        nav {
            margin-top: 10px;
        }

        nav a {
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

        nav a:hover {
            background-color: #333;
            color: #fff;
        }

        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .videoconferencia {
            border: 2px solid #4b5320;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            width: calc(22% - 19px);
            margin-bottom: 20px;
            transition: box-shadow 0.3s;
            position: relative;
        }

        .videoconferencia:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .videoconferencia h3 {
            color: #4b5320;
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .videoconferencia p {
            margin: 0 0 10px;
            color: #666;
        }

        .videoconferencia .highlight {
            font-weight: bold;
            color: #4b5320;
        }

        .videoconferencia .link-container {
            margin-top: 10px;
        }

        .videoconferencia .link-container a {
            color: #4b5320;
            text-decoration: none;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            display: block;
        }

        .videoconferencia .link-container a:hover {
            color: #556b2f;
        }

        .no-meetings {
            width: 100%;
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 8px;
            margin-top: 20px;
            color: #666;
        }

        .edit-delete-buttons {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .edit-delete-buttons a {
            color: #fff;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 5px;
            background-color: #4b5320;
            transition: background-color 0.3s;
            margin-right: 5px;
        }

        .edit-delete-buttons a:hover {
            background-color: #556b2f;
        }
    </style>
    <title>Dashboard</title>
</head>
<body>
    <header>
        <h1>Videoconferências Agendadas</h1>
        <nav>
            <a href="index.php">Voltar</a>
        </nav>
    </header>

    <section class="dashboard-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='videoconferencia'>";
                echo "<div class='edit-delete-buttons'>";
                echo "<a href='editar.php?id=" . $row['id'] . "'>Editar</a>";
                echo "<a href='excluir.php?id=" . $row['id'] . "'>Excluir</a>";
                echo "</div>";
                echo "<h3>VC: " . $row['vc'] . "</h3>";
                echo "<p><span class='highlight'>DIEx:</span> " . $row['diex'] . "</p>";
                echo "<p><span class='highlight'>Solicitante:</span> " . $row['solicitante'] . "</p>";
                echo "<p><span class='highlight'>Data:</span> " . date('d/m/Y', strtotime($row['data'])) . "</p>";
                echo "<p><span class='highlight'>Horário:</span> " . $row['horario'] . "</p>";
                echo "<p><span class='highlight'>Horário Teste:</span> " . $row['horarioteste'] . "</p>";
                echo "<p><span class='highlight'>Local:</span> " . $row['local'] . "</p>";

                // Verifique se o campo Link não está vazio antes de exibir
                if (!empty($row['link'])) {
                    $link = $row['link'];
                    // Adiciona automaticamente "https://" se não estiver presente
                    if (!preg_match("~^(?:f|ht)tps?://~i", $link)) {
                        $link = "https://" . $link;
                    }
                    echo "<div class='link-container'>";
                    echo "<span class='highlight'>Link:</span><br><a href='{$link}' target='_blank'>{$link}</a>";
                    echo "</div>";
                }

                echo "<br><p><span class='highlight'>Informações adicionais:</span> " . $row['informacoes'] . "</p>";

                echo "</div>";
            }
        } else {
            echo "<div class='no-meetings'>Nenhuma videoconferência agendada.</div>";
        }
        ?>
    </section>

    <script>
        // Função para recarregar a página a cada 1 minuto
        setInterval(function(){
            location.reload();
        }, 60000); // 60000 milissegundos = 1 minuto
    </script>
</body>
</html>
