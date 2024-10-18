<script setup>
  import { ref, onMounted } from 'vue';
  import { useRouter } from 'vue-router';
  import  {getAttributes, getPeople, deletePerson } from '../services/apiService';
  
  defineOptions({
    name: 'PeopleView',
  })

  // ------- Data
  const router = useRouter();
  const attributes = ref([]);
  const people = ref([]);

  // ------- Methods
  onMounted(async () => {
    try {
      attributes.value = await getAttributes();
    } catch (error) {
      console.error('Erro ao carregar atributos:', error);
    }
    try {
      people.value = await getPeople();
    } catch (error) {
      console.error('Erro ao carregar pessoas:', error);
    }
  });

  const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'numeric', day: 'numeric' }
    return new Date(dateString).toLocaleDateString('pt-BR', options)
  }
 
  const editPerson = (id) => {
    router.push({
      name: 'EditPerson',
      params: { id },
      query: { isEditing: 'true' }
    })
  }

  const removePerson = async (id) => {
    try {
      await deletePerson(id);
      people.value = await getPeople();
    } catch (error) {
      console.error('Erro ao deletar pessoa:', error);
    }
  };
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
          <td data-label="Nascimento">{{ formatDate(person.birthDate) }}</td>
          <td data-label="Sexo">{{ person.gender }}</td>
          <td data-label="Etnia">{{ person.ethnicity }}</td>
          <td data-label="Profissão">{{ person.profession }}</td>
          <td data-label="Ações">
            <div class="btn-container">
              <button @click="editPerson(person.id)">Editar</button>
              <button @click="removePerson(person.id)">Deletar</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <router-link to="/people/new">
      <button class="new-register-btn">Adicionar novo cadastro</button>
    </router-link>
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

  .new-register-btn{
    padding: 15px;
    background-color: var(--cor-black);
    border-radius: 0 0 20px 20px;
    font-size: 1.2em;
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

    .stackable-table td {
      display: flex;
      flex-direction: row;
      position: relative;
      padding-left: 40%;
      text-align: left;
      align-items: center;
    }

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