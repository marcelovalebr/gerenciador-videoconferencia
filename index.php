<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            <img src="videoconferencia.png" alt="Descrição da imagem">
            margin: 0;
            padding: 0;
            background-color: #4b5320; /* Verde Oliva */
            color: #fff;
        }

        header {
            background-color: #333;
            padding: 1em 0;
            text-align: center;
            border-bottom: 5px solid #4b5320; /* Verde Oliva */
        }

        h1 {
            margin: 0;
            font-size: 2em; /* Aumentei o tamanho da fonte do título */
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #4b5320; /* Verde Oliva */
            border-bottom: 5px solid #333;
        }

        nav li {
            display: inline;
            margin-right: 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 1.2em; /* Aumentei o tamanho da fonte dos links */
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #333;
        }

        footer {
            position: fixed;
            bottom: 0;
            right: 0;
            padding: 10px;
            background-color: #333;
            color: #fff;
            font-size: 0.8em;
        }
    </style>
    <title>Agendamento de Videoconferência</title>
</head>
<body>
    <header>
        <h1>Controle e Agendamento de Videoconferências</h1>
    </header>

    <nav>
        <ul>
            <li><a href="cadastro.php">Cadastrar</a></li>
            <li><a href="dashboard.php">Visualizar Videoconferências</a></li>
        </ul>
    </nav>

    <footer>
        Desenvolvido pela Seção de Informática da 14ª Brigada de Infantaria Motorizada
    </footer>
</body>
</html>
