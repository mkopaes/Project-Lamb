<script setup>
  import { ref, onMounted } from 'vue';
  const people = ref([]);

  // Chamada da API quando o componente é montado
  onMounted(async () => {
    try {
      // const response = await fetch('https://sua-api.com/pessoas'); // Substitua pela URL da sua API
      const response = await fetch('http://localhost:3000/people'); // Substitua pela URL da sua API
      if (!response.ok) {
        throw new Error('Erro ao buscar dados');
      }
      const data = await response.json();
      people.value = data; // Salvando os dados no estado
    } catch (error) {
      console.error(error);
    }
  });

  const fields = [
    'Nome', 
    'Data de Nasc', 
    'Sexo', 
    'Etnia', 
    'Profissão'
  ]
  
  defineOptions({
    name: 'PeopleView',
  })
</script>

<template>
  <section class="content">
    <section class="title">
      <h1>Listagem de Pessoas</h1>
    </section>

    <table>
      <thead>
        <tr>
          <th v-for="(item, index) in fields" :key="index">{{ item }}</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>  
        <tr v-for="person in people" :key="person.id">
          <td>{{ person.name }}</td>
          <td>{{ person.birthDate }}</td>
          <td>{{ person.gender }}</td>
          <td>{{ person.ethnicity }}</td>
          <td>{{ person.profession }}</td>
          <td class="actions">
            <button class="table-btn">
              <router-link :to="{ name: 'EditPerson', params: { id: person.id } }">Editar</router-link>
            </button>
            <button @click="deletePerson(person.id)" class="table-btn">Deletar</button>
          </td>
        </tr>
      </tbody>
    </table>
  </section>
</template>

<style>
@import url('../assets/table.css');

@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}

.actions {
  margin: auto;
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  justify-items: center;
}

.table-btn{
  height: 40px;
  width: 80px;
  margin: 2px;
  background-color: var(--cor-black);
  border: none;
  border-radius: 5px;
  color: white;
}

a {
  text-decoration: none;
  color: white;
}

a:hover{
  color: white;
}

button:hover{
  background-color: var(--cor-gray2);
  cursor: pointer;
}

</style>