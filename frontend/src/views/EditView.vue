<script setup>
  import { ref, onMounted } from 'vue';
  import { useRouter, useRoute } from'vue-router';
  import { getPersonById, updatePerson} from '../services/apiService';

  defineOptions({
    name: 'EditView'
  })

  // ------- Data
  const router = useRouter();
  const route = useRoute();

  const person = ref({
    name: '',
    birth_date: '',
    gender: '',
    ethnicity: '',
    profession: '',
  });

  // ------- Methods
  const fetchPerson = async () => {
    try {
      const response = await getPersonById(route.params.id);
      person.value = response[0];
    } catch (error) {
      console.error('Erro ao buscar a pessoa:', error);
    }
  };

  const requetUpdatePerson = async () => {
    try {
      await updatePerson(route.params.id, person.value);
      router.push({ name: 'peopleView' });
    } catch (error) {
      console.error('Erro ao atualizar a pessoa:', error);
    }
  };

  onMounted(fetchPerson);
</script>

<template>
  <section class="content">
    <section class="title">
      <h1>Editar Cadastro</h1>
    </section>
    <form class="person-form"  @submit.prevent="requetUpdatePerson">
      <div class="row">
        <div class="input-container">
          <label for="name">Nome </label>
          <input v-model="person.name" type="text" id="name" name="name" placeholder="Digite o seu nome" maxlength="100" required />
        </div>
      </div>
      <div class="row">
        <div class="input-container">
          <label for="birth_date">Data de Nascimento </label>
          <input v-model="person.birth_date" type="date" id="birth_date" name="birth_date" required />
        </div>
        <div class="input-container">
          <label for="gender">Sexo </label>
          <select v-model="person.gender" id="gender" name="gender" required>
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
          <select v-model="person.ethnicity" id="ethnicity" name="ethnicity" required >
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
          <input v-model="person.profession" type="text" id="profession" name="profession" maxlength="60" placeholder="Área de atuação" required />
        </div>
      </div>
      <div class="row">
        <div class="input-container">
          <button type="submit" id="submit" name="submit">Atualizar</button>
        </div>
      </div>
    </form>
  </section>
</template>

<style scoped>
  .content{
    max-width: 700px;
  }

  .content .go-back{
    font-weight: bold;
    font-size: 0.9em;
    color: #777;
  }

  .person-form {
    margin: 30px auto;
    margin-bottom: 0px;
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