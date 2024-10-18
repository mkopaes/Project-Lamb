<script setup>
  defineOptions({
    name: 'Navbar'
  })
</script>

<template>
  <div class="wrapper">
      <nav>
        <router-link :to="{ name: 'home' }">Home</router-link>
        <router-link :to="{ name: 'addPerson' }">Cadastrar</router-link>
        <router-link :to="{ name: 'peopleView'}">Lista</router-link>
      </nav>
  </div>
</template>

<style scoped>
  nav {
    padding: 12px;
    display: flex;
    align-items: center;
    text-align: start;
    justify-content: space-evenly;
    background-color: #0f0f0f; 
    gap: 50px;
  }

  .router-link-active {
    color: var(--cor-2);
  }

  nav > a {
    /* margin-right: 50px; */
    font-size: 1.2em;
    font-weight: 500;
    text-decoration: none;
    color: white;
    transition: .4s;
  }

  a:hover {
    background: linear-gradient(to right, var(--cor-2), var(--cor-4), var(--cor-5));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
  }
</style>