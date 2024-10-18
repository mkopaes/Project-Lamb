<script setup>
  defineOptions({
    name: 'HomeView'
  })
</script>

<template>
  <section class="content">
    <section class="title">
      <h1>Boas-vindas</h1>
    </section>
    <section class="text">
      <p id="bio">Este é um sistema simples para a realização de operações CRUD, utilizando o conceito de API RESTful. Meu nome é Murilo, sou um desenvolvedor em início de carreira, buscando constantemente adquirir novos conhecimentos e aprimorar minhas habilidades na área de programação. Este projeto foi desenvolvido como parte de um conjunto de testes, com foco na aplicação prática das seguintes tecnologias:</p>
      <ul>
        <li><a href="https://developer.mozilla.org/pt-BR/docs/Web/JavaScript" target="_blank">JavaScript</a></li>
        <li><a href="https://vuejs.org/" target="_blank">VueJS</a></li>
        <li><a href="https://www.php.net/" target="_blank">PHP</a></li>
        <li><a href="https://splitphp.org" target="_blank">SplitPHP</a></li>
      </ul>
    </section>
  </section>
</template>

<style scoped>
  .text{
    min-width: 400px;
    max-width: 1000px;
    padding: 40px;
    
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: start;
  }

  p#bio {
    max-width: 1000px;
    line-height: 30px;
    font-size: 1.1em;
    text-align: left;
    color: var(--cor-black);
  }

  ul{
    height: 40px;
    width: 100%;
    margin: 30px auto 0px auto;
    display: flex;
    flex-direction: row;
    text-align: center;
    gap:20px;
  }

  li {
    width: 25%;
    list-style: none;
    font-size: 1.2em;
    font-weight: bold;
    line-height: 35px;
    background-color: var(--cor-black);
    border: 1px solid var(--cor-black);
    border-radius: 10px;
  }
  
  a{
    color: white;
    text-decoration: underline;
  }

  a:hover{
    background: linear-gradient(to right, var(--cor-2), var(--cor-4), var(--cor-5));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
  }

  @media (max-width: 800px){
    ul{
      flex-direction: column;
      height: auto;
    }
    li {
      width: 100%;
    }
  }
</style>
