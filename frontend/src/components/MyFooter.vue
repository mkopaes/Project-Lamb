<script setup>
  defineOptions({
    name: 'MyFooter',
    github: 'https://www.github.com/mkopaes'
  })
</script>

<template>
  <footer>
      <em>Criado por <a href="https://www.github.com/mkopaes" target="_blank">Murilo Paes</a> em 2024</em>
  </footer>
</template>

<style scoped>
  footer{
    width: 100%;
    position: relative;
    left: 0;
    bottom: 0;
    padding: 8px;
    background-color: #0f0f0f;
    color: #777;
    font-size: 0.8em;
    text-align: center;
  }

  a{
    color: #BBB;
    font-weight: bold;
    text-decoration: none;
  }

  a:hover {
    color: var(--cor-link);
    background: linear-gradient(to right, var(--cor-2), var(--cor-4), var(--cor-5));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
  }
</style>