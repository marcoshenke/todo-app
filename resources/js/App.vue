<template>
  <router-view v-slot="{ Component, route }">
    <div
      :key="route.name"
      class="d-flex flex-column vh-100 vw-100 bg-dark text-light p-2 justify-content-center align-items-center"
    >
      <Component :is="Component" />
    </div>
  </router-view>
</template>
