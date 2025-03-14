<script setup>
import axios from 'axios'
import { ref } from 'vue'

const response = ref(null)
</script>

<template>
  <div class="d-flex flex-column justify-content-center align-items-center">
    <h2>Registre-se</h2>
    <form>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input
          type="email"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Senha</label>
        <input
          type="password"
          class="form-control"
          id="exampleInputPassword1"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"
          >Confirme a Senha</label
        >
        <input
          type="password"
          class="form-control"
          id="exampleInputPassword1"
        />
      </div>
      <div class="d-flex flex-column gap-2">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <router-link to="/login" class="btn btn-secondary">
          Já tenho uma conta
        </router-link>
      </div>
    </form>
  </div>
</template>
