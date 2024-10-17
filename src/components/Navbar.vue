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
    padding-left: 40px;
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

  a:hover {
    color: var(--cor-2);
    background: linear-gradient(to right, var(--cor-2), var(--cor-4), var(--cor-5));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
  }
</style>