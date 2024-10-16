<script setup>

</script>

<template>
  <article class="home">
    <h1 class="home">
      <span class="welcome">Boas Vindas</span> 
      <span class="empresa"><br>Sistema de Gerenciamento de Cadastros (SIGC)</span> 
    </h1>
    <p class="home">
      Este é um sistema simples para a realização de operações CRUD, utilizando o conceito de API RESTful. Meu nome é Murilo, sou um desenvolvedor em início de carreira, buscando constantemente adquirir novos conhecimentos e aprimorar minhas habilidades na área de programação. Este projeto foi desenvolvido como parte de um conjunto de testes, com foco na aplicação prática das seguintes tecnologias:
      <ul>
        <li><a href="https://developer.mozilla.org/pt-BR/docs/Web/JavaScript" target="_blank">JavaScript</a></li>
        <li><a href="https://vuejs.org/" target="_blank">VueJS</a></li>
        <li><a href="https://www.php.net/" target="_blank">PHP</a></li>
        <li><a href="https://splitphp.org" target="_blank">SplitPHP</a></li>
      </ul>
    </p>
  </article>
</template>

<style scoped>
  article{
    min-width: 400px;
    margin: auto;
    padding: 10px;
    text-align: center;
  }

  h1{
    font-size: 1em;
  }

  p {
    max-width: 800px;
    margin: auto;
    margin-top: 15px;
    line-height: 30px;
    color: #444;
    font-style: italic;
  }

  li {
    margin: 0px auto;
    font-size: 1.2em;
    line-height: 35px;
    text-decoration: underline;
    color: #181818;
    list-style: none;
  }

  img{
    width: 500px;
    margin: 60px 0;
    border-radius: 5px;
  }

  a{
    color: #161616;
  }

  .welcome{
    font-size: 6em;
    color: #3079e6;
  }

  .empresa{
    font-size: 3.2em;
    color: #444
  }
</style>
