<template>
  <h2>Olá "nome do usuário logado aqui"</h2>

  <div>tasks</div>
</template>
<script>
function logoutUser() {
  axios
    .post(
      '/logout',
      {},
      {
        headers: {
          Authorization: `Bearer ${localStorage.getItem('auth_token')}`
        }
      }
    )
    .then(() => {
      localStorage.removeItem('auth_token')
      alert('Logout realizado com sucesso!')
      this.$router.push('/login')
    })
    .catch((error) => {
      alert('Erro ao fazer logout.')
    })
}
</script>
