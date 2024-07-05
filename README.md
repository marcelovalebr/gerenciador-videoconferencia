# Gerenciador de Videoconferências

Este projeto é um gerenciador de videoconferências desenvolvido em PHP, HTML e CSS. Ele permite o controle e agendamento de videoconferências, com funcionalidades para cadastro, visualização, edição e exclusão de videoconferências.

## Funcionalidades

- **Cadastrar Videoconferências:** Permite o cadastro de novas videoconferências.
- **Visualizar Videoconferências:** Permite a visualização das videoconferências cadastradas.
- **Editar Videoconferências:** Permite a edição das videoconferências cadastradas.
- **Excluir Videoconferências:** Permite a exclusão das videoconferências cadastradas.

## Tecnologias Utilizadas

- HTML
- CSS
- PHP
- MySQL

## Pré-requisitos

- Servidor web (como Apache ou Nginx)
- PHP 7.0 ou superior
- MySQL 5.7 ou superior

## Instalação

1. Clone o repositório:
    ```bash
    git clone https://github.com/seu-usuario/gerenciador-videoconferencias.git
    cd gerenciador-videoconferencias
    ```

2. Configure o banco de dados MySQL:

    - Crie um banco de dados chamado `videoconferencia_app`:
        ```sql
        CREATE DATABASE videoconferencia_app;
        ```

    - Importe a estrutura do banco de dados:
        ```sql
        USE videoconferencia_app;
        CREATE TABLE videoconferencias (
            id INT AUTO_INCREMENT PRIMARY KEY,
            vc VARCHAR(255) NOT NULL,
            diex VARCHAR(255) NOT NULL,
            solicitante VARCHAR(255) NOT NULL,
            data DATE NOT NULL,
            horario TIME NOT NULL,
            horarioteste TIME NOT NULL,
            local VARCHAR(255) NOT NULL,
            link VARCHAR(255),
            informacoes TEXT
        );
        ```

3. Configure a conexão com o banco de dados:

    - Abra o arquivo PHP que contém a conexão com o banco de dados (por exemplo, `dashboard.php`) e ajuste as seguintes linhas de acordo com suas credenciais de banco de dados:
    ```php
    $servername = "localhost";
    $username = "root";
    $password = "sua-senha";
    $dbname = "videoconferencia_app";
    ```

4. Coloque os arquivos em um servidor web.

## Uso

1. Acesse a página principal (`index.php`) para ver o painel de controle de videoconferências agendadas.
2. Utilize a navegação para cadastrar novas videoconferências (`cadastro.php`), visualizar videoconferências agendadas (`dashboard.php`), editar videoconferências existentes (`editar.php`) e excluir videoconferências (`excluir.php`).

## Estrutura do Código

### Arquivos Principais

- `index.php`: Página principal do sistema.
- `cadastro.php`: Página para cadastro de novas videoconferências.
- `dashboard.php`: Página para visualização das videoconferências agendadas.
- `editar.php`: Página para edição de videoconferências.
- `excluir.php`: Página para exclusão de videoconferências.
- `styles.css`: Arquivo de estilo CSS para a estilização das páginas.

### Exemplo de Código

#### `dashboard.php`

```php
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
        /* Seu código CSS aqui */
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

                if (!empty($row['link'])) {
                    $link = $row['link'];
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
        setInterval(function(){
            location.reload();
        }, 60000);
    </script>
</body>
</html>
