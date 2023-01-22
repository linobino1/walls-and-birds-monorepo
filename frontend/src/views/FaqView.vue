<script setup lang="ts">
import { ref } from 'vue';
import rawTexts from '../faq.js';

const texts = [];
rawTexts.forEach((text) => texts.push({
  text,
  top: Math.random() * 100,
  left: Math.random() * 100,
}));

let index = 0;
let active = false;

// set color
const invert = ref(null);
document.addEventListener('keydown', (event) => {
  if (event.code == 'KeyI') {
    invert.value.classList.toggle('show');
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
    if (index < texts.length - 1) index++;
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
        :style="'transform: translate(' + text.left + 'vw,' + text.top + 'vh) scaleX(.1);'"
        class="node"
        @click="nodeOnClick(text)"
      >
        <div class="content">{{ text.text }}</div>
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
</style>