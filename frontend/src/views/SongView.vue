<script setup>
import { computed } from 'vue';
import { RouterLink, useRoute } from 'vue-router';
import gql from 'graphql-tag';
import { useQuery } from '@vue/apollo-composable';
import { transpose } from '../songbook.js';

const route = useRoute();
const title = route.query.title;

// Shows
const { result } = useQuery(
  gql` 
    query song($title: String) {
      Songs(where: { title: { equals: $title }}) {
        docs {
          title
          by
          content
          key
        }
      }
    }
  `,
  {
    title,
  }
);
const song = computed(() => result.value?.Songs?.docs[0]);

</script>

<template>
  <main ref="main">
    <RouterLink :to="{ name: 'songbook' }">back</RouterLink>

    <div v-if="song">
      <h1>
        {{ song.by }} - {{ song.title }}
      </h1>

      <p>
        <span>tom: </span>
        <button @click="transpose(-1)">-</button>
        <span data-transpose>&nbsp;{{ song.key }}&nbsp;</span>
        <button @click="transpose(1)">+</button>
      </p>

      <br />

      <div data-transpose class="song">{{ song.content }}</div>
    </div>

  </main>
</template>

<style scoped>
html,
body {
  background-color: #fff;
}
main {
	font-family: Courier, monospace;
	Padding: 2em;
	font-size: .8em;
  background-color: #fff;
  color: #000;
}
pre {
	font-family: Courier, monospace;
	line-height: 50%;
	font-size: 0.8rem;
}
h1 {
	font-family: Courier, monospace;
	font-size: 1rem;
	font-weight:bold;
}
.song {
  white-space: pre;
  line-height: 130%;
}
button {
  appearance: none;
  border: 0;
  outline: none;
  background: none;
  cursor: pointer;
}
</style>