<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
  </header>

  <RouterView />

  <footer>
    <RouterLink to="/imprint" class="no-link">Imprint</RouterLink>
  </footer>
</template>

<style>
#app {
  background-color: dodgerblue;
  background-color: rgb(30, 144, 255);
  min-height: 100vh;
  width: 100%;
}
footer {
  text-align: right;
}
.no-link {
  text-decoration: none !important;
  color: inherit;
}
</style>