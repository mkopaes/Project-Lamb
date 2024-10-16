<script setup>
  import { RouterLink, RouterView } from 'vue-router';
  import Card from './components/Card.vue'
  import Navbar from './components/Navbar.vue';
  import MyFooter from './components/MyFooter.vue';
  
  defineOptions({
    components:{
      Card,
      Navbar,
      MyFooter
    }
  })
</script>

<template>
  <header>
    <Card />
    <Navbar />
  </header>
  <main>
    <RouterView />
  </main>
  <MyFooter />
</template>
