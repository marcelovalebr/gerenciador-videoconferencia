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
    <title>Cadastrar Videoconferência</title>
</head>
<body>
    <header>
        <h1>Cadastrar Videoconferência</h1>
        <nav>
            <a href="index.php">Voltar</a>
        </nav>
    </header>

    <section class="form-container">
        <form action="processa_cadastro.php" method="post">
            <label for="vc">Videoconferência:</label>
            <input type="text" id="vc" name="vc" required>

            <label for="diex">DIEx:</label>
            <input type="text" id="diex" name="diex" required>

            <label for="solicitante">Solicitante:</label>
            <input type="text" id="solicitante" name="solicitante" required>

            <label for="data">Data:</label>
            <input type="date" id="data" name="data" required>

            <label for="local">Local:</label>
            <input type="text" id="local" name="local" required>

            <label for="horario">Horário:</label>
            <input type="time" id="horario" name="horario" required>

            <label for="horarioteste">Horário Teste:</label>
            <input type="time" id="horarioteste" name="horarioteste" required>

            <label for="link">Link:</label>
            <input type="text" id="link" name="link">

            <label for="informacoes">Informações adicionais:</label>
            <textarea id="informacoes" name="informacoes"></textarea>

            <input type="submit" value="Agendar">
        </form>
    </section>
</body>
</html>
