<script setup>
import { RouterLink } from 'vue-router';
import { useQuery } from '@vue/apollo-composable';
import gql from 'graphql-tag';
import { computed } from 'vue';

const { result } = useQuery(
  gql`
    query songbook {
      Songs(limit:500 sort: "title" where: { by: { equals: "Walls & Birds" }}) {
        docs {
          slug
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
        :to="{ name: 'song', params: { song: song.slug }}"
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
@media (max-width: 768px) {
  main {
    font-size: 1.5rem;
    padding-top: 0;
  }
  h1 {
    font-size: 12vw;
    font-size: min(4rem, 12vw);
  }
}
</style>