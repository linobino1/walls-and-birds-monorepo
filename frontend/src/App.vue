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
  background-color: #000;
  color: #fff;
  min-height: 100vh;
  width: 100%;
}
footer {
  position: relative;
  text-align: right;
  z-index: 1;
}
footer > * {
  background: #000;
}
.no-link {
  text-decoration: none !important;
  color: inherit;
}
</style>