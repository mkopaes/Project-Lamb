<script setup>
  import { RouterLink, RouterView } from 'vue-router';
  import Banner from './components/Banner.vue'
  import Navbar from './components/Navbar.vue';
  import MyFooter from './components/MyFooter.vue';
  
  defineOptions({
    components:{
      Banner,
      Navbar,
      MyFooter
    }
  })
</script>

<template>
  <header>
    <Banner />
    <Navbar />
  </header>
  <main>
    <RouterView />
  </main>
  <MyFooter />
</template>
