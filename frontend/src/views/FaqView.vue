<script setup lang="ts">
import { useQuery } from '@vue/apollo-composable';
import gql from 'graphql-tag';
import { ref, computed } from 'vue';

const { result } = useQuery(
  gql`
    query faq {
      Faq {
        questions {
          id
          question
        }
      }
    }
  `
);
const items = computed(() => result?.value?.Faq.questions);

let index = 0;
let active = false;

// set color
const invert = ref(null);
document.addEventListener('keydown', (event) => {
  if (event.code == 'KeyI') {
    invert.value?.classList.toggle('show');
  }
});

document.addEventListener('keydown', (event) => {
  if (event.code == 'Space') {
    anyClick();
  }
});
function anyClick() {
  active = !active;
  if (active) {
    activate(items.value[index]);
  } else {
    deactivate(items.value[index]);
    if (index < items.value.length - 1) index++;
  }
}
function activate(item) {
  const active = document.getElementById(item.id);
  active && active.classList.add('active');
}
function deactivate(item) {
  const active = document.getElementById(item.id);
  active && active.classList.remove('active');
}
</script>

<template>
  <main @keydown.space="anyClick()" @click="anyClick()">
    <div class="wrapper">
      <div
        v-for="item in items"
        :key="item"
        :id="item.id"
        :style="'transform: translate(' + (Math.random() * 100) + 'vw,' + (Math.random() * 100) + 'vh) scaleX(.1);'"
        class="node"
      >
        <div class="content">{{ item.question }}</div>
      </div>
    </div>
    <div ref="invert" class="invert" />
  </main>
</template>

<style scoped>
main {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: #000;
  z-index: 100;
}
.wrapper {
  width: 100%;
  height: 100%;
  transform: translateX(-44%);
}
.node {
  font-size: 0.21rem;
  position: absolute;
  color: #fff;
  transition: transform .5s;
  /* max-width: 45vw; */
  text-align: center;
  width: 90vw;
  white-space: pre-wrap;
}
.node.active {
  font-size: 1.5rem;
  transform: translate(50vw, 50vh) scale(1) !important;
  z-index: 1000;
}
.node .content {
  display: inline;
  transition: background-color .5s step-end;
}
.node.active .content {
  background-color: #000;
}
.invert {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 100000;
  backdrop-filter: invert(1);
}
.invert.show {
  display: block;
}
@media (max-width: 768px) {
  .node:not(.active) {
    font-size: 3px;
  }
  
}
</style>