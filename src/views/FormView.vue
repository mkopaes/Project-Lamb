<script>
import apiService from '@/services/apiService';

export default {
  name: 'NewPerson',
  data() {
    return {
      person: {
        name: '',
        birthDate: '',
        gender: '',
        ethnicity: '',
        profession: '',
      },
      isEditing: false,
    };
  },
  mounted() {
    const personId = this.$route.params.id;
    if (personId) {
      this.isEditing = true;
      apiService.getPerson(personId)
        .then(response => {
          this.person = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  methods: {
    submitForm() {
      if (this.isEditing) {
        apiService.updatePerson(this.$route.params.id, this.person)
          .then(() => {
            this.$router.push('/');
          })
          .catch(error => {
            console.log(error);
          });
      } else {
        apiService.createPerson(this.person)
          .then(() => {
            this.$router.push('/');
          })
          .catch(error => {
            console.log(error);
          });
      }
    }
  }
};
</script>

<template>
  <div class="wrapper">
    <h1>{{ isEditing ? 'Editar Pessoa' : 'Cadastrar Pessoa' }}</h1>
    <form @submit.prevent="submitForm">
      <div>
        <label>Nome: </label>
        <input type="text" v-model="person.name" maxlength="100" placeholder="Seu nome completo" required />
      </div>
      <div>
        <label>Data de Nascimento: </label>
        <input type="date" v-model="person.birthDate" required />
      </div>
      <div>
        <label>Sexo: </label>
        <select v-model="person.gender"  required>
          <option value="M">Masculino</option>
          <option value="F">Feminino</option>
          <option value="O">Outro</option>
        </select>
      </div>
      <div>
        <label>Etnia: </label>
        <select v-model="person.ethnicity" required >
          <option value="Amarela">Amarela</option>
          <option value="Branca">Branca</option>
          <option value="Indígenas">Indígena</option>
          <option value="Negra">Negra</option>
          <option value="Parda">Parda</option>
        </select>
      </div>
      <div>
        <label>Profissão: </label>
        <input type="text" v-model="person.profession" maxlength="60" placeholder="Área de atuação" required />
      </div>
      <button type="submit">{{ isEditing ? 'Atualizar' : 'Cadastrar' }}</button>
    </form>
  </div>
</template>

<style>
  @import url(../assets/form.css);

  h1{
    padding: 10px;
    text-align: center;
    font-size: 4em;
  }

  form {
    max-width: 1000px;
    margin: 23px auto;
    margin-bottom: 50px;
  }
</style>