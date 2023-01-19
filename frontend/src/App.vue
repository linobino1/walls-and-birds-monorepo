<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
  </header>

  <RouterView />

  <footer>
    <RouterLink to="/imprint" class="no-link">legal notice</RouterLink>
  </footer>
</template>

<style>
#app {
  background-color: var(--color-theme);
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