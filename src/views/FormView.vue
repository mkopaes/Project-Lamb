<script setup>
  import { ref, onMounted } from 'vue';
  import { reactive } from 'vue';

  defineOptions({
    name: 'FormView'
  })

  // ------- Data
  const data = ref([]);

  const person = reactive({
    name: '',
    birthDate: '',
    gender: '',
    ethnicity: '',
    profession: '',
  });  

  // const isEditing = ref(route.params.isEditing);
  const isEditing = true;
  const msg = null;

  // ------- Methods
  const createPerson = async () => {
    try {
      const response = await fetch('http://localhost:3000/people', {
        method: 'POST',
        headers:{
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(person),
      });

      if (!response.ok) {
        throw new Error('Erro ao enviar os dados');
      }

      const data = await response.json();
      console.log('Pessoa criada:', data);

      resetForm();
    } catch(error) {
      console.error('Erro ao enviar o formulário:', error);
    }
  };

  const readPerson = async () => {
    try {
      const response = await fetch(`http://localhost:3000/people/${personId.value}`);
    
      if (!response.ok) {
        throw new Error('Erro ao buscar os dados');
      }
    
      const data = await response.json();
      person.value = data;
      console.log('Pessoa editada:', data);

    } catch (error) {
      console.error('Erro ao buscar a pessoa:', error);
      person.value = null;
    }
  };
  
  const updatePerson = async () => {
    try {
      const personId = route.params.id;
    
      const response = await fetch(`http://localhost:3000/people/${personId.value}`, {
        method: 'PUT',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(person.value),
      });

      if(!response.ok){
        throw new Error('Erro ao atualizar a pessoa');
      }


    } catch(error) {
      console.error('Erro ao atualizar pessoa:', error);
    }
  }

  const resetForm = () => {
    person.name = '';
    person.birthDate = '';
    person.gender = '';
    person.ethnicity = '';
    person.profession = '';
  }

</script>

<template>
  <section class="content">

    <section class="title">
      <h1>{{ isEditing ? 'Editar Cadastro' : 'Ficha de Cadastro' }}</h1>
    </section>

    <form class="person-form"  @submit.prevent="createPerson">
      <div class="row">
        <div class="input-container">
          <label for="name">Nome </label>
          <input type="text" id="name" name="name" v-model="person.name" placeholder="Digite o seu nome" maxlength="100" required />
        </div>
      </div>

      <div class="row">
        <div class="input-container">
          <label for="birthDate">Data de Nascimento </label>
          <input type="date" id="birthDate" name="birthDate" v-model="person.birthDate" required />
        </div>

        <div class="input-container">
          <label for="gender">Sexo </label>
          <select id="gender" name="gender" v-model="person.gender" required>
            <option value="">Selecione</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
          </select>
        </div>
      </div>
      
      <div class="row">
        <div class="input-container">
          <label for="ethnicity">Etnia </label>
          <select id="ethnicity" name="ethnicity" v-model="person.ethnicity" required >
            <option value="">Selecione</option>
            <option value="Amarela">Amarela</option>
            <option value="Branca">Branca</option>
            <option value="Indigena">Indígena</option>
            <option value="Negra">Negra</option>
            <option value="Parda">Parda</option>
          </select>
        </div>
      
        <div class="input-container">
          <label for="profession">Profissão </label>
          <input type="text" id="profession" name="profession" v-model="person.profession" maxlength="60" placeholder="Área de atuação" required />
        </div>
      </div>

      <div class="row">
        <div class="input-container">
          <button type="submit" id="submit" name="submit">{{ isEditing ? 'Atualizar' : 'Cadastrar' }}</button>
        </div>
      </div>
    </form>
  </section>
</template>

<style scoped>
  .content{
    max-width: 700px;
  }

  .person-form {
    margin: 30px auto;
    padding-bottom: 25px;
  }

  .row{
    max-width: 600px;
    margin: auto;
    display: flex;
    flex-direction: row;
  }

  .input-container{
    flex: 1;
    display: flex;
    flex-direction: column;
    margin: 15px;
  }
  
  label{
    font-weight: bold;
    margin-bottom: 6px;
    color: #222;
    padding: 5px 0px;
    font-size: clamp(0.5em 2vw 1.2em);
    /* font-size: 1.2em; */
  }

  input, select {
    padding: 5px 10px;
    width: 100%;
  }

  button {
    width: 100%;
    margin: 10px 0px;
    padding: 10px;
    font-size: 1.2em;
    background-color: var(--cor-black);
    border-radius: 2px;
    border: 2px solid var(--cor-black);
    color: white;
  }

  button:hover {
    background-color: var(--cor-gray2);
    cursor: pointer;
  }

  @media (max-width: 800px){
    .content{
      width: calc(100vw - 100px);
    }
    .row{
      flex-direction: column;
      padding: 0px 30px;
    }
  }

</style>