<script>
  export default{
    name: 'Navbar'
  }
</script>

<template>
  <div class="wrapper">
      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/people">Lista</RouterLink>
        <RouterLink to="/people/new">Cadastrar</RouterLink>
      </nav>
  </div>
</template>

<style scoped>
  nav {
    background-color: #0f0f0f; 
    padding: 12px;
    text-align: start;
  }

  nav > a {
    margin-right: 50px;
    font-size: 1.2em;
    font-weight: 500;
    text-decoration: none;
    color: white;
    transition: .4s;
  }

  nav > a:hover {
  color: #3079e6;
  }
</style>