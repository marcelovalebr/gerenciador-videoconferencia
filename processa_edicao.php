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
    <title>Editar Videoconferência</title>
</head>
<body>
    <header>
        <h1>Editar Videoconferência</h1>
        <nav>
            <a href="dashboard.php">Voltar</a>
        </nav>
    </header>

    <div class="message-container">
        <?php
        // Lógica para editar a videoconferência
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

        // Obter os dados do formulário de edição
        $videoconferencia_id = $_POST['videoconferencia_id'];
        $videoconferencia = $_POST['vc'];
        $diex = $_POST['diex'];
        $solicitante = $_POST['solicitante'];
        $data = $_POST['data'];
        $local = $_POST['local'];
        $horario = $_POST['horario'];
        $horarioteste = $_POST['horarioteste']; // Adicionando o campo horarioteste
        $link = $_POST['link'];
        $informacoes = $_POST['informacoes'];

        // Atualizar os dados no banco de dados usando declaração preparada
        $sql = "UPDATE videoconferencias SET
                vc = ?,
                diex = ?,
                solicitante = ?,
                data = ?,
                local = ?,
                horario = ?,
                horarioteste = ?,
                link = ?,
                informacoes = ?
                WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssi", $videoconferencia, $diex, $solicitante, $data, $local, $horario, $horarioteste, $link, $informacoes, $videoconferencia_id);

        if ($stmt->execute()) {
            echo "<p style='color: #4b5320; font-weight: bold;'>Edição realizada com sucesso!</p>";
        } else {
            echo "<p style='color: #800000; font-weight: bold;'>Erro ao editar videoconferência: " . $stmt->error . "</p>";
        }

        // Fechar a conexão
        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>
