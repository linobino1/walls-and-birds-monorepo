<script setup lang="ts">
import { watch } from 'vue';
import { RouterLink, RouterView, useRoute } from 'vue-router'

const route = useRoute();

function setTheme() {
  console.log(route.meta);
  const theme = {
    'color-bg': '#000',
    'color-fg': '#fff',
    'color-font-light': '#bbb',
  };
  if (route.meta.theme === 'bright') {
    theme['color-bg'] = '#fff';
    theme['color-fg'] = '#000';
    theme['color-font-light'] = '#888';
  }
  Object.keys(theme).forEach((key) => {
    document.documentElement.style.setProperty(`--${key}`, theme[key]);
  })
}

watch(() => route.name, () => setTheme());

</script>

<template>
  <header>
  </header>

  <RouterView />

  <footer v-if="!$route.meta.hideFooter">
    <RouterLink to="/imprint" class="no-link">legal notice</RouterLink>
  </footer>
</template>

<style>
#app {
  background-color: var(--color-bg);
  color: var(--color-fg);
  min-height: 100vh;
  width: 100%;
}
footer {
  position: relative;
  text-align: left;
  z-index: 1;
  padding: 0.5rem;
  padding-top: 4rem;
  color: var(--color-font-light);
}
footer > * {
  background: var(--color-bg);
}
.no-link {
  text-decoration: none !important;
  color: inherit;
}
</style>