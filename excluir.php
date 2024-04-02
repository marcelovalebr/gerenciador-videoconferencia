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
            border-bottom: 5px solid #4b5320; /* Verde Oliva */
        }

        h1 {
            margin: 0;
            font-size: 2em;
            color: #fff;
        }

        .message-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            margin: 0 0 10px;
            color: #333;
        }

        a {
            text-decoration: none;
            color: #4b5320;
            font-weight: bold;
            font-size: 1.2em;
            padding: 10px;
            border-radius: 5px;
            background-color: #fff; /* Verde Oliva */
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #556b2f; /* Verde Oliva mais escuro */
        }
    </style>
    <title>Excluir Videoconferência</title>
</head>
<body>
<header>
        <h1>Excluir Videoconferência</h1>
        <nav>
            <a href="index.php">Voltar</a>
        </nav>
    </header>

    <div class="message-container">
        <?php
        // Lógica para excluir a videoconferência
        if (isset($_GET['id'])) {
            $videoconferencia_id = $_GET['id'];

            // Conectar ao banco de dados (substitua as informações conforme necessário)
            $servername = "localhost";
            $username = "root";
            $password = "sua-senha";
            $dbname = "videoconferencia_app";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar a conexão
            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            // Excluir a videoconferência
            $sql = "DELETE FROM videoconferencias WHERE id = $videoconferencia_id";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Videoconferência excluída com sucesso!</p>";
                
            } else {
                echo "<p>Erro ao excluir videoconferência: " . $conn->error . "</p>";
            }

            // Fechar a conexão
            $conn->close();
        } else {
            echo "<p>ID da videoconferência não fornecido.</p>";
        }
        ?>
    </div>
</body>
</html>
