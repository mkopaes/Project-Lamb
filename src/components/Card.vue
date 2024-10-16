<script setup>
  defineOptions({
    nome: 'Card'
  })
</script>

<template>
  <section class="img"></section>
  <img src="../../public/img/logo.png" alt="" class="logo">
  <div class="text-overlay">Sistema de Gerenciamento de Cadastros (SIGC)
  </div>
</template>

<style>
  section {
    width: 100%;
    height: 280px;
    background-color: #3D3D3D;
    background-image: url('../img/pattern.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed; 
  }

  .logo{
    position: absolute;
    top: 11.5%;
    left: 50%;
    font-size: 2.5em;
    transform: translate(-50%, -50%);
    color: white;
    background-color: white;
    padding: 10px;
    border-radius: 5px;
  }

  .text-overlay {
    position: absolute;
    top: 20%;
    left: 50%;
    font-size: 2.5em;
    transform: translate(-50%, -50%);
    color: white;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 10px; /* Espaçamento interno */
    border-radius: 5px; /* Arredonda os cantos */
}
</style>