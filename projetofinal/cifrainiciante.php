<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Musician</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="script.js" defer></script>
    
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="index.php" target="central">Início</a></li>
                <li><a href="cifrageral.php" target="central">Cifras Gerais</a></li>
            </ul>
        </nav>
        <section class="total detalhes">
            <p>Cifras para iniciante</p>
            <p>Comece aprendendo pelo fácil!</p>
        </section>

        <article class="total detalhe">
            <!-- Títulos das músicas -->
            <div class="titulo-cifra" onclick="toggleContent('cifra1', 'video1')">Breaking the Law</div>
            <div class="cifra" id="cifra1">
                <pre>
                    Riff principal
                    e|--------------------------------|
                    B|--------------------------------|
                    G|--------------------------------|
                    D|-2-2-----2-2-4---2-2-----2-2-5--|
                    A|-2-2-----2-2-4---2-2-----2-2-5--|
                    E|-0-0-0-0-------0-0-0-0-0--------|

                </pre>
            </div>

            <div class="titulo-cifra" onclick="toggleContent('cifra2', 'video2')">Iron Man</div>
            <div class="cifra" id="cifra2">
                <pre>
                    Riff principal
                    E|---------------------------------------------------|
                    B|---------------------------------------------------|
                    G|---------------------------------------------------|
                    D|------------5p4-5p4-5p4----------------------------|
                    A|---5-5-7-7--------------5-5-7-7--------------------|
                    E|-7-------------------------------------------------|
                    
                </pre>
            </div>

            <div class="titulo-cifra" onclick="toggleContent('cifra3', 'video3')">Enter Sandman</div>
            <div class="cifra" id="cifra3">
                <pre>
                    Parte 1 De 5 da intro
                    E|----------------------------------------------------|
                    B|----------------------------------------------------|
                    G|-------0--------------0-----------------------------|
                    D|-----2--------2-----2-------2-----------------------|
                    A|----------1-0-----------1-0-------------------------|
                    E|-0---------------0----------------------------------|
                </pre>
            </div>
        </article>

        <footer class="total detalhes">
            &copy; meu site
        </footer>
    </div>
</body>
</html>
