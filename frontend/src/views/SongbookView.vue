<script setup>
import { RouterLink } from 'vue-router';
import { useQuery } from '@vue/apollo-composable';
import gql from 'graphql-tag';
import { computed } from 'vue';

const { result } = useQuery(
  gql`
    query songbook {
      Songs(where: { by: { equals: "Walls & Birds" }}) {
        docs {
          title
          by
          content
        }
      }
    }
  `,
);
const songs = computed(() => result?.value?.Songs?.docs)
</script>

<template>
  <main ref="main">
    <h1>
      <div>the</div>
      <div>Walls & Birds</div>
      <div>songbook</div>
    </h1>

    <ul v-if="songs" class="songs">
      <RouterLink
        v-for="song in songs"
        :key="song.title"
        :to="{ name: 'song', params: { song: song.title }}"
      >
        <li class="clickable">
          {{ song.title }}
        </li>
      </RouterLink>
    </ul>
    <div v-else>songs could not be loaded</div>
    
  </main>
</template>

<style scoped>
main > * {
  z-index: 1;
  background-color: #000;
}
main {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  row-gap: 1rem;
  font-size: 2rem;
  transition: color 4s;
  font-size: 2rem;
  padding-top: 4rem;
  text-align: center;
}
h1 {
  font-size: 6rem;
  font-family: 'Cooper', serif;
  color: #fff;
}
h2 {
  font-size: inherit;
  font-weight: normal;
  text-decoration: underline;
  margin: 0;
  margin-bottom: .5em;
}
main > hr {
  width: 0;
  border: 0;
  margin: 2rem 0;
}
a:visited,
a:hover,
a:active,
a {
  color: inherit;
  text-decoration: none;
}
a:hover {
  text-decoration: underline;
}
.releases {
  display: flex;
  flex-direction: row;
  column-gap: .5rem;
  align-items: center;
}
ul {
  display: flex;
  flex-direction: column;
  align-items: center;
  row-gap: .5rem;
  list-style: none;
  padding: 0;
  margin: 0;
  z-index: 1;
}
.clickable:hover {
  text-decoration: underline;
  cursor: pointer;
}
iframe.old {
  position: relative;
  margin-top: 2rem;
  left: 10%;
  transform: rotate3d(1, 1, 1, -45deg);
  z-index: 0;
}
@media (min-width: 1024px) {
  iframe.old {
    position: relative;
    margin-top: -8rem;
    left: -9%;
    transform: rotate3d(1, 1, 1, -45deg);
    z-index: 0;
    /* justify-self: end; */
    align-self: end;
  }
}
@media (max-width: 768px) {
  main {
    font-size: 1.5rem;
    padding-top: 0;
  }
  h1 {
    font-size: 12vw;
    font-size: min(4rem, 12vw);
  }
  iframe.old {
    position: relative;
    top: 67%;
    right: -13%;
    height: 10rem;
  }
}
</style>