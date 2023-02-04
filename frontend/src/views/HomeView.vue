<script setup lang="ts">
import { ref } from 'vue';
import { RouterLink } from 'vue-router';
import NewsletterForm from '../components/NewsletterForm.vue';
import apollo from '../apollo.js';
import gql from 'graphql-tag';
import format from 'date-fns/format';
import { enUS } from 'date-fns/esm/locale';

// Shows
const from = new Date(new Date().setDate(new Date().getDate() - 7));  // 1 week ago
const shows = ref([]);
apollo.query({
  query: gql` 
    query upcomingShows($from: DateTime!) {
      Shows (sort: "date", where: { date: { greater_than: $from } }) {
        docs {
          date
          location
          link
        }
      }
    }
  `,
  variables: {
    from,
  }
})
.then((res) => {
  shows.value = res.data.Shows.docs;
})
.catch(() => {});

function showOnClick(show) {
  if (!show.link) return;
  window.open(show.link, '_blank');
}
</script>

<template>
  <main ref="main">

    <h1>Walls & Birds</h1>


    <a href="https://wallsandbirds.bandcamp.com">albums</a>
    <a href="https://www.youtube.com/@wallsandbirds" target="_blank">music videos</a>
    <a href="https://soundcloud.com/wallsandbirds">outtakes</a>

    <NewsletterForm />

    <hr />

    <h2>live</h2>
    <ul class="shows">
      <template v-if="shows.length">
        <li
          v-for="show in shows"
          :key="show"
          @click="showOnClick(show)"
          :class="show.link && 'clickable'"
        >
        {{ format(new Date(show.date), 'PP', { locale: enUS }) }} | {{ show.location }}
        </li>
      </template>
      <li v-else>no upcoming shows</li>
    </ul>
    
    <hr />

    <a href="mailto:judy@wallsandbirds.com">contact</a>

    <RouterLink :to="{ name: 'faq' }">faq</RouterLink>
    <RouterLink :to="{ name: 'songbook' }">songbook</RouterLink>

    <iframe class="old" src="https://firetruck.wallsandbirds.com" width="300px" height="400px" />

  </main>
</template>

<style scoped>
.spacer {
  height: 10rem;
}
main > * {
  z-index: 1;
  background-color: var(--color-bg);
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
  cursor: none;
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
ul.shows {
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