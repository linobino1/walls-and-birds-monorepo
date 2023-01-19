<script setup lang="ts">
import { ref } from 'vue';
import NewsletterForm from '../components/NewsletterForm.vue';

const colors = [
  'darkgreen',
  'darkgrey',
  'yellow',
  'thistle',
];
const main = ref(null);
let i = 0;
window.setInterval(() => {
  if (main.value) {
    main.value.style.color = colors[i];
  }
  i++;
  i %= colors.length;
}, 6000);
</script>

<template>
  <main ref="main">

    <h1>Walls & Birds</h1>

    <iframe class="old" src="https://wallsandbirds.com" width="300px" height="400px" />

    <a href="https://wallsandbirds.bandcamp.com" target="_blank">releases</a>
    <a href="https://www.youtube.com/@wallsandbirds" target="_blank">music videos</a>
    <NewsletterForm />

    <h2>live</h2>
    <ul class="shows">
      <li>Jan 25th Berlin Hanseat</li>
      <li>Jun 25th Music in The Meadows</li>
      <li>...</li>
    </ul>
    
  </main>
</template>

<style scoped>
main {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  row-gap: 1rem;
  font-size: 2rem;
  padding-top: 16vh;
  transition: color 4s;
  /* background-image: url('/src/assets/img/blueridge.jpg');
  background-position: center;
  background-size: cover; */
}
main > *:hover {
  z-index: 1;
}
h1 {
  font-size: 4rem;
  font-family: 'Cooper', serif;
  color: #fff;
}
h2 {
  font-size: 2rem;
  font-weight: normal;
  text-decoration: underline;
  margin-top: 8rem;
}
a:visited,
a:hover,
a:active,
a {
  color: inherit;
  text-decoration: none;
  font-size: 2rem;
}
a:hover {
  text-decoration: underline;
}
ul.shows {
  display: flex;
  flex-direction: column;
  align-items: center;
  row-gap: .5rem;
  list-style: none;
  padding: 0;
  margin: 0;
}
.old {
  position: absolute;
  right: 10%;
  top: 70%;
  transform: rotate3d(1, 1, 1, -45deg);
}
</style>