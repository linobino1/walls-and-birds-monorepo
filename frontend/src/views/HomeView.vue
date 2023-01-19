<script setup lang="ts">
import { ref } from 'vue';
import NewsletterForm from '../components/NewsletterForm.vue';
import apollo from '../apollo.js';
import gql from 'graphql-tag';
import format from 'date-fns/format';
import { enUS } from 'date-fns/esm/locale';

// const colors = [
//   'darkgreen',
//   'darkgrey',
//   'thistle',
// ];
// const main = ref(null);
// let i = 0;
// window.setInterval(() => {
//   if (main.value) {
//     main.value.style.color = colors[i];
//   }
//   i++;
//   i %= colors.length;
// }, 6000);

// Shows
const shows = ref([]);
apollo.query({
  query: gql` 
    query upcomingShows {
      Shows {
        docs {
          date
          location
          link
        }
      }
    }
  `,
})
.then((res) => {
  shows.value = res.data.Shows.docs;
})
.catch((err) => {

});
function showOnClick(show) {
  if (!show.link) return;
  window.open(show.link, '_blank');
}
</script>

<template>
  <main ref="main">

    <h1>Walls & Birds</h1>

    <iframe class="old" src="https://wallsandbirds.com" width="300px" height="400px" />

      <a href="https://wallsandbirds.bandcamp.com">albums</a>
      <a href="https://www.youtube.com/@wallsandbirds" target="_blank">music videos</a>
      <a href="https://soundcloud.com/wallsandbirds">outtakes</a>
    <NewsletterForm />

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
}
h1 {
  font-size: 4rem;
  font-family: 'Cooper', serif;
  color: #fff;
  cursor: none;
}
h2 {
  font-size: inherit;
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
ul.shows li {
  background-color: var(--color-theme);
}
.old {
  position: absolute;
  right: 10%;
  top: 70%;
  transform: rotate3d(1, 1, 1, -45deg);
}

.clickable:hover {
  text-decoration: underline;
  cursor: pointer;
}

@media (max-width: 768px) {
  main {
    font-size: 1.5rem;
  }
  h1 {
    font-size: 13vw;
    font-size: min(4rem, 13vw);
  }
  .old {
    top: 93%;
  }
}
</style>