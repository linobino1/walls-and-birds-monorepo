<script setup lang="ts">
import { ref } from 'vue';
import rawTexts from './texts.js';

const texts = [];
rawTexts.forEach((text) => texts.push({
  text,
  left: Math.random() * 100,
  right: Math.random() * 100,
}));

let index = 0;
let active = false;

// set color
const invert = ref(null);
let inverted = false;
document.addEventListener('keydown', (event) => {
  if (event.code == 'KeyI') {
    inverted = !inverted;
    invert.value.style.display = inverted ? 'block' : 'none';
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
    activateNode(texts[index]);
  } else {
    deactivateNode(texts[index]);
    index++;
  }
}
function activateNode(node) {
  const active = document.getElementById(node.text);
  active.classList.add('active');
}
function deactivateNode(node) {
  const active = document.getElementById(node.text);
  active.classList.remove('active');
}
</script>

<template>
  <main @keydown.space="anyClick()" @click="anyClick()">
    <div class="wrapper">
      <div
        v-for="text in texts"
        :key="text"
        :id="text.text"
        :style="'transform: translate(' + text.left + 'vw,' + text.right + 'vw) scaleX(.1);'"
        class="node"
        @click="nodeOnClick(text)"
      >{{ text.text }}</div>
    </div>
    <div ref="invert" class="invert" />
  </main>
</template>

<style>
:root {
  --bg: #000;
  --fg: #fff;
}
</style>
<style scoped>
main {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: var(--bg);
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
  color: var(--fg);
  transition: transform .5s;
  /* max-width: 45vw; */
  text-align: left;
  width: 90vw;
  white-space: pre-wrap;
}
.node.active {
  font-size: 1.5rem;
  transform: translate(50vw, 50vh) scale(1) !important;
  z-index: 1000;
  background: var(--bg);
}
.invert {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 100000;
  backdrop-filter: invert(1);
}
</style>