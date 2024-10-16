<script setup>
  const fields = [
    'Nome', 
    'Data de Nasc', 
    'Sexo', 
    'Etnia', 
    'Profissão'
  ]
  
  defineOptions({
    name: 'MyTableHeader',
  })
</script>

<template>
  <thead>
    <tr>
      <th v-for="(item, index) in fields" :key="index">{{ item }}</th>
      <th>Ações</th>
    </tr>
  </thead>
</template>

<style scoped>
  table th {
    background-color: rgba(28, 42, 80, 0.801);
    color: white;
    padding: 15px 48px;
    text-align: left;
  }
</style>