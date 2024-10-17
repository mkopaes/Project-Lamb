<script>
import apiService from '@/services/apiService';

export default {
  name: 'FormPerson',
  data() {
    return {
      person: {
        name: '',
        birthDate: '',
        gender: '',
        ethnicity: '',
        profession: '',
      },
      people:{
        names: '',
        birthDates: '',
        genders: '',
        ethnicitys: '',
        professions: '',
      },
      isEditing: false,
      msg: null
    };
  },
  methods: {
    
    // async getPeople() {
    //   const req = await fetch('http://localhost:3000/people');
    //   const data = await req.json();

    //   this.person
    //   console.log(data);
    // },
    // async getIngredientes() {
    //   const req = await fetch('http://localhost:3000/ingredientes');
    //   const data = await req.json();

    //   console.log(data);
    // },
    // submitForm() {
    //   if (this.isEditing) {
    //     apiService.updatePerson(this.$route.params.id, this.person)
    //       .then(() => {
    //         this.$router.push('/');
    //       })
    //       .catch(error => {
    //         console.log(error);
    //       });
    //   } else {
    //     apiService.createPerson(this.person)
    //       .then(() => {
    //         this.$router.push('/');
    //       })
    //       .catch(error => {
    //         console.log(error);
    //       });
    //   }
    // }
  },
  mounted() {
    this.getPeople();
    this.getIngredientes();
    // const personId = this.$route.params.id;
    // if (personId) {
    //   this.isEditing = true;
    //   apiService.getPerson(personId)
    //     .then(response => {
    //       this.person = response.data;
    //     })
    //     .catch(error => {
    //       console.log(error);
    //     });
    // }
  },
};
</script>

<template>
  <section class="content">
    <section class="title">
      <h1>{{ isEditing ? 'Editar Pessoa' : 'Cadastrar Pessoa' }}</h1>
    </section>
    <form class="person-form"  @submit.prevent="submitForm">
      <div class="input-area">

        <div class="input-container">
          <label for="name">Nome </label>
          <input type="text" id="name" name="name" v-model="person.name" placeholder="Digite o seu nome" maxlength="100" required />
        </div>

        <div class="input-container">
          <label for="birthDate">Data de Nascimento </label>
          <input type="date" id="birthDate" name="birthDate" v-model="person.birthDate" required />
        </div>

        <div class="input-container">
          <label for="gender">Sexo </label>
          <select id="gender" name="gender" v-model="person.gender" required>
            <option value="">Selecione</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <option value="O">Outro</option>
          </select>
        </div>

        <div class="input-container">
          <label for="ethnicity">Etnia </label>
          <select id="ethnicity" name="ethnicity" v-model="person.ethnicity" required >
            <option value="">Selecione</option>
            <option value="Amarela">Amarela</option>
            <option value="Branca">Branca</option>
            <option value="Indígenas">Indígena</option>
            <option value="Negra">Negra</option>
            <option value="Parda">Parda</option>
          </select>
        </div>

        <div class="input-container">
          <label for="profession">Profissão </label>
          <input type="text" id="profession" name="profession" v-model="person.profession" maxlength="60" placeholder="Área de atuação" required />
        </div>
        <div class="input-container"></div>
      </div>
      <button type="submit" id="submit" name="submit">{{ isEditing ? 'Atualizar' : 'Cadastrar' }}</button>
    </form>
  </section>
</template>

<style scoped>
  .person-form{
    min-width: 400px;
    max-width: 1000px;
    width: 100%;
    margin: 0 auto;
    padding: 30px;
    
    display: flex;
    flex-direction: column;
  }

  .input-area{
    width: 100%;
    margin-bottom: 30px;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
  }

  .input-container{
    width: 45%;
    margin: auto;
    display: flex;
    flex-direction: column;
  }

  label {
    display: block;
    margin: 10px 0px;
    padding-left: px;
    text-align: start;
    font-weight: bold;
    color: #444;
  }

  .input-container > input, select {
    width: 100%;
    height: 40px;
    padding: 10px;
    margin-bottom: 10px;
    background-color: white;
    border-radius: 10px;
    border: 1px solid rgba(0, 0, 0, 0.263);
  }

  button#submit {
    width: 95%;
    height: 50px;
    margin: auto;
    background-color: var(--cor-black);
    border-radius: 10px;
    font-size: 1em;
    color: white;
    border: none;
  }

  button#submit:hover  {
    background-color: var(--cor-gray2);
    cursor: pointer;
  }
</style>