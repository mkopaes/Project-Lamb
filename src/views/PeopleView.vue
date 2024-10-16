<script setup>
  import MyTableHeader from '@/components/MyTableHeader.vue';
</script>

<template>
  <div class="wrapper">
    <h1>Listagem de Pessoas</h1>
    <table>
      <MyTableHeader />
      <tbody>
        <!-- <tr v-for="person in people" :key="person.id">
          <td>{{ person.name }}</td>
          <td>{{ person.birthDate }}</td>
          <td>{{ person.gender }}</td>
          <td>{{ person.ethnicity }}</td>
          <td>{{ person.profession }}</td>
          <td>
            <router-link :to="{ name: 'EditPerson', params: { id: person.id } }">Editar</router-link>
            <button @click="deletePerson(person.id)">Deletar</button>
          </td>
        </tr> -->
      </tbody>
    </table>
  </div>
</template>

<style scoped>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}

h1{
  margin-bottom: 20px;
  padding: 10px;
  text-align: center;
  font-size: 4em;
}

table {
  min-width: 400px;
  max-width: 1200px;
  border-spacing: 0px;
  border: 0.5px solid rgba(28, 42, 80, 0.247);
  margin: 10px auto;
}

table td {
  padding: 5px;
}

table tr {
  background-color: rgba(55, 41, 145, 0.05);
}

table tr:nth-child(odd) {
  background-color: rgba(55, 41, 145, 0.3);
}
</style>