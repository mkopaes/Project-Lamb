<script setup>
  import { ref, onMounted } from 'vue';
  
  defineOptions({
    name: 'PeopleView',
  })

  // ------- Data
  const attributes = ref([]);
  const people = ref([]);

  // ------- Methods
  onMounted(async () => {
    try {
      const response = await fetch('http://localhost:3000/attributes');
      if (!response.ok) {
        throw new Error('Erro ao buscar dados');
      }
      const data_attributes = await response.json();
      attributes.value = data_attributes;
    } catch (error) {
      console.error(error);
    }

    try {
      const response = await fetch('http://localhost:3000/people');
      if (!response.ok) {
        throw new Error('Erro ao buscar dados');
      }
      const data_people = await response.json();
      people.value = data_people;
    } catch (error) {
      console.error(error);
    }
  });
</script>

<template>
  <section class="content">
    <section class="title">
      <h1>Listagem de Pessoas</h1>
    </section>
    <table class="stackable-table">
      <thead>
        <tr>
          <th v-for="attribute in attributes" :key="attribute.id">{{ attribute.type }}</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>  
        <tr v-for="person in people" :key="person.id">
          <td data-label="Nome">{{ person.name }}</td>
          <td data-label="Nascimento">{{ person.birthDate }}</td>
          <td data-label="Sexo">{{ person.gender }}</td>
          <td data-label="Etnia">{{ person.ethnicity }}</td>
          <td data-label="Profissão">{{ person.profession }}</td>
          <td data-label="Ações">
            <div class="btn-container">
              <button><router-link :to="{ name: 'EditPerson', params: { id: person.id } }" >Edit</router-link></button>
              <button @click="deletePerson(person.id)">Deletar</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </section>
</template>

<style scoped>
  a{
    color: white;
    text-decoration: none;
  }
  .btn-container{
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  button{
    width: 100%;
    padding: 5px;
    background-color: var(--cor-black);
    border: 2px solid var(--cor-black);;
    border-radius: 5px;
    font-weight: bold;
    color: white;
  }

  button:hover{
    background-color: var(--cor-gray2);
    cursor: pointer;
  }

  @media screen and (max-width: 768px) {
    .stackable-table,
    .stackable-table thead,
    .stackable-table tbody,
    .stackable-table th,
    .stackable-table td,
    .stackable-table tr {
      display: block;
    }

    .stackable-table thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    .stackable-table tr {
      margin: 0;
      border: 1px solid #ddd;
      display: flex;
      flex-direction: column;
      padding: 15px;
    }

    /* Cada célula agora tem seu próprio label, que era o nome da coluna */
    .stackable-table td {
      display: flex;
      flex-direction: row;
      position: relative;
      padding-left: 40%;
      text-align: left;
      align-items: center;
    }

    /* Mostra o label correspondente à célula */
    .stackable-table td::before {
      content: attr(data-label);
      position: absolute;
      left: 10px;
      top: auto;
      padding-left: 10px;
      font-weight: bold;
      white-space: nowrap;
      text-align: left;
    }

    .btn-container{
      width: 100%;
      flex-direction: row;
    }

    button {
      width: 90%;
    }
  }
</style>