<script setup>
import axios from "axios";
import { ref } from "vue";

const response = ref(null);

const getValue = async () => {
    try {
        const res = await axios.get("/api/test-me");
        response.value = res; // Armazena a resposta completa
    } catch (error) {
        console.error("Erro ao chamar API:", error);
    }
};
</script>

<template>
    <div>
        <h2>HOME</h2>
        <router-link to="/test"> Take me to Test page </router-link>
        <button @click.prevent="getValue">Trigger Endpoint</button>
        <p v-if="response">{{ response.data }}</p>
    </div>
</template>
