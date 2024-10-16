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
    position: fixed;
    bottom: 0;
    width: 100%;
    padding: 8px;
    background-color: rgb(15, 15, 15);
    color: #777;
    font-size: 0.8em;
    text-align: center;
  }

  a{
    color: #3079e6;
    font-weight: bold;
    text-decoration: none;
  }

  a:hover {
  color: #2663be;
  }
</style>