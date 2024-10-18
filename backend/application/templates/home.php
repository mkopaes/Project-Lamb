<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/resources/css/style.css">
    <link rel="stylesheet" href="/resources/css/banner.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
        }
        
        .content {
            margin: 60px auto;
        }

        .text{
            padding: 30px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        ul {
            margin-left: 20px;
        }

        .bar{
            height: 47px;
            background-color: var(--cor-black);
        }
    </style>
</head>
<body>
    <section id="banner">
        <img src="/resources/img/logo.png" alt="logo">
        <h1>API LAMB</h1>
        
    </section>
    <div class="bar"></div>
    <main>
        <section class="content">
            <section class="title">
                <h1><?= $title ?></h1>
            </section>
            <section class="text">
                <p><?= $description ?></p>
                <h2>Endpoints disponíveis</h2>
                <ul>
                    <li><strong>GET api/people</strong> - Retorna todas as pessoas cadastradas</li>
                    <li><strong>GET api/people/id</strong> - Retorna o cadastro da pessoa especificada por id</li>
                    <li><strong>POST api/people</strong> - Adiciona uma nova pessoa</li>
                    <li><strong>PUT api/people/id</strong> - Atualiza o cadastro da pessoa especificada por id</li>
                    <li><strong>DELETE api/people/id</strong> - Remove o cadastro da pessoa especificada por id</li>
                </ul>
            </section>
        </section>
    </main>
    <footer>
      <em>Criado por <a href="https://www.github.com/mkopaes" target="_blank">Murilo Paes</a> em 2024</em>
  </footer>
</body>
</html>