<script setup>
import { useQuery } from '@vue/apollo-composable';
import gql from 'graphql-tag';
import { computed } from 'vue';
import PressText from '../../components/PressText.vue';
import PressPhoto from '../../components/PressPhoto.vue';

const { result } = useQuery(
  gql`
    query info {
      Info {
        photos {
          photo {
            id
          }
        }
      }
    }
  `,
);
const info = computed(() => result?.value?.Info)
</script>

<template>
  <main ref="main">
    <h1>
      <div>Walls & Birds</div>
      <div>Press Info</div>
    </h1>
    
    <section>
      <h2>Contact</h2>
      <ul>
        <li>
          <a href="mailto:judy@wallsandbirds.com">judy@wallsandbirds.com</a>
        </li>
      </ul>
    </section>

    <section>
      <h2>Info</h2>
      <PressText>"Less than a kilometer away" is Walls & Birds new three song release on the Berlin record label Beatbude. Available now on vinyl, .wav and video. join in for news and shows: wallsandbirds.com</PressText>
    </section>

    <section>
      <h2>Latest Release "Less than a kilometer away"</h2>
      <p>
        <a href="https://www.youtube.com/playlist?list=PLqoBupXjXKWNH5gI9MfMJUt8sXxdtZ4I5" target="_blank">https://www.youtube.com/playlist?list=PLqoBupXjXKWNH5gI9MfMJUt8sXxdtZ4I5</a>
      </p>
      <h3>Press Release (short)</h3>
      <PressText>2023: Walls & Birds is coming back with a new record on the Berlin record label Beatbude. The two song vinyl release with a limited first edition of 250 copies is accompanied by a digital bonus track and a consecutive music video. Join in for news and shows at <a href="https://wallsandbirds.com">wallsandbirds.com</a>.</PressText>
      <h3>Press Release (long)</h3>
      <PressText>
        2023: Walls & Birds is coming back with a new record on the berlin record label beatbude. Much like their previous releases, "Less than a kilometer away" is Walls & Birds new take on popular music today. Recorded with the aid of "The Whitest Boy Alive" keyboarder Daniel Nentwig at the local Butterama studios, the three song release features a limited edition of 250 7" vinyl copys, a fold-out poster and a consecutive music video.The first song "Wearing a dress" touches on the theme of modern clothing habits, while questioning relationship patterns still widespread in popular music lyrics. The surpising element of new found love is also one of the themes of the B-Side “Heads || Tales ? '❤️' : '' telling the story of a late night after work taxi ride with the chorus contemplating about the eternal either or question, plainly answered with: love. The cheerful upbeat digital bonus track "Summer 2002" is as meaningless as any really nice pop song up to this day. 
        Walls & Birds are known for their smooth and dreamy yet amiable approach to both instruments and audience, a combination of poetry, humour, seriousness and amusement, which makes them lovely to everyone who can let go into this kind of (atmo-)sphere. 
      </PressText>
    </section>
    
    <section>
      <h2>Photos</h2>
      <PressPhoto
        v-for="item in info?.photos"
        :key="item.photo.id"
        :photo-id="item.photo.id"
        class="photo"
      />
    </section>
  </main>
</template>

<style scoped>
main {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  row-gap: 1rem;
  transition: color 4s;
  padding-top: 4rem;
  max-width: min(90vw, 800px);
  margin: 0 auto;
  font-size: 120%;
}
h1 {
  font-size: 6rem;
  font-family: 'Cooper', serif;
  text-align: center;
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
.photo {
  margin-block-end: 1rem;
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