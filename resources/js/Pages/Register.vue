<script>
import axios from 'axios'
axios.get('/sanctum/csrf-cookie').then((response) => {
  // Login...
})
export default {
  data() {
    return {
      name: '',
      email: '',
      password: ''
    }
  },
  methods: {
    registerUser() {
      axios.get('/sanctum/csrf-cookie').then(
        axios
          .post('/register', {
            name: this.name,
            email: this.email,
            password: this.password
          })
          .then((response) => {
            alert('Registration successful')

            localStorage.setItem('auth_token', response.data.token)

            this.$router.push('/task-board')
          })
          .catch((error) => {
            console.log(error)
            if (
              error.response &&
              error.response.data &&
              error.response.data.errors
            ) {
              const errors = error.response.data.errors
              alert(Object.values(errors).flat().join('\n'))
            } else {
              alert('An error occurred while registering')
            }
          })
      )
    }
  }
}
</script>

<template>
  <h1>TodolistApp - Resolva suas tarefas</h1>
  <div class="d-flex flex-column justify-content-center align-items-center">
    <h2>Registre-se</h2>
    <form @submit.prevent="registerUser">
      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" v-model="name" />
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" v-model="email" />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Senha</label>
        <input type="password" class="form-control" v-model="password" />
      </div>
      <div class="d-flex flex-column gap-2">
        <button type="submit" class="btn btn-primary mh-50">Cadastrar</button>
        <router-link to="/login" class="btn btn-secondary">
          Já tenho uma conta
        </router-link>
      </div>
    </form>
  </div>
</template>
