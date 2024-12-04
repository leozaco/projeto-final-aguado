<?php
    session_start();

    // Configuração do banco de dados
    $servername = "127.0.0.1";
    $username = "eu";
    $password = "ifsp";
    $dbname = "arrebenta";

    // Conexão com o banco
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificação da conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="script.js" defer></script>
    <title>Smart Musician</title>
</head>
<body>
    <div>
        <nav>
            <ul>
                <li><a href="cifrainiciante.php" target="central">Cifras para iniciantes</a></li>
                <li><a href="cifrageral.php" target="central">Cifras Gerais</a></li>
                <button id="loginBtn">Login</button>
                <div id="loginPopup" class="popup">
                    <div class="popup-content">
                        <span id="closePopup" class="close">&times;</span>
                        <h2>Login</h2>
                        <form>
                            <input type="text" id="username" name="username" placeholder="Usuário" required><br><br>
                            <input type="password" id="password" name="password" placeholder="Senha" required><br><br>
                            <button type="submit" class="submit">Entrar</button>
                        </form>
                    </div>
                </div>
            </ul>
        </nav>
    </div>
    <center>
        <h1>Smart Musician</h1>
        <h2>Descomplicando a música. Toque com inteligência, aprenda com facilidade.</h2>
        <br>
        <h4>Nosso objetivo é que você:</h4>
    <ul>
        <li>1. Encontre a Cifra Perfeita: Explore nossa vasta biblioteca de cifras para uma ampla gama de músicas. Se você está procurando a cifra para aquele clássico dos anos 80, o hit atual ou uma canção internacional, temos a cifra que você precisa para começar a tocar imediatamente.</li>

        <li>2. Aprenda com Videoaulas: Cada cifra vem acompanhada de videoaulas detalhadas, guiadas por músicos experientes. Nossas videoaulas são projetadas para mostrar não apenas como tocar cada acorde, mas também para ensinar técnicas e dicas que ajudarão a aprimorar sua habilidade e estilo.</li>

        <li>3. Pratique e Progrida: Siga o passo a passo das videoaulas, pratique com a cifra na tela e observe seu progresso à medida que você se torna mais confiante e competente. Nossos recursos interativos facilitam a prática e a compreensão, tornando o aprendizado musical uma jornada divertida e gratificante.</li>
    </ul>
        <br><br>
        <h2>Músicas Disponíveis
        <a href="create.php" class="btn btn-primary float-end">Adicionar músicas</a>
        </h2>
    <table class="table table-bordered table-striped">
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome da Música</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT id, nome FROM musicas";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    while ($musicas = mysqli_fetch_assoc($query_run)) {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($musicas['id']); ?></td>
                            <td><?= htmlspecialchars($musicas['nome']); ?></td>
                            <td>
                                <a href="update.php?id=<?= htmlspecialchars($musicas['id']); ?>" class="btn btn-success btn-sm">Editar</a>
                                <a href="delete.php?id=<?= htmlspecialchars($musicas['id']); ?>" class="btn btn-danger btn-sm">Deletar</a>  
                            </td>
                        </tr>
                        
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='2' class='text-center'>Nenhuma música cadastrada</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
