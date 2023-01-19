<script setup lang="ts">
import { ref, inject } from 'vue';

const MAILING_LIST_ID = inject('MAILING_LIST_ID');

// Dealing with Input width
const widthMachine = ref(null);
const input = ref(null);

function resize() {
  widthMachine.value.innerHTML = input.value.value || 'email*';
}
</script>

<template>
  <form method="post" action="http://localhost:9000/subscription/form">
    <h3>newsletter:</h3>
    <input type="hidden" name="nonce" />
    <input id="147a9" type="hidden" name="l" checked :value="MAILING_LIST_ID" />

    <div class="controls">
      <span id="autowidth">
        <span ref="widthMachine" aria-hidden="true">email*</span>
        <input ref="input" @input="resize()" type="email" name="email" required placeholder="email*" />
      </span>
      <!-- <input type="text" name="name" placeholder="name" /> -->
      <button type="submit" value="Subscribe" title="subscribe">&crarr;</button>
    </div>
  </form>
</template>

<style scoped>
form {
  display: flex;
  flex-direction: row;
  align-items: center;
  row-gap: 1rem;
  column-gap: 1rem;
}
h3 {
  font-size: inherit;
  font-weight: normal;
  line-height: inherit;
  margin: 0;
}
input {
  appearance: none;
  border: 0;
}

.controls {
  display: flex;
  flex-direction: row;
  width: fit-content;
  border-bottom: 1px solid;
}
input,
button {
  margin: 0;
  border: 0;
  height: 3rem;
  background: transparent !important;
  color: inherit;
  font-size: inherit;
  border-radius: 5px;
}
input::placeholder {
  color: inherit;
}
input:active,
input:focus-visible,
input:focus {
  border: 0;
  outline: 2px solid white;
  box-shadow: 0;
}
button:hover {
  background-color: #000;
  color: #fff;
  cursor: pointer;
}

/** auto resize input */
#autowidth {
  position: relative;
}
#autowidth input {
  position: absolute !important;
  width: 100% !important;
  left: 0;
}
#autowidth span {
  /*   Sort of a magic number to add extra space for number spinner */
  padding: 0 1rem;
  visibility: hidden;
}
</style>