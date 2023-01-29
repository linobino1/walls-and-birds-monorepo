<script setup>
import { ref } from 'vue';

const formUrl = import.meta.env.VITE_MAILING_LIST_FORM_URL;
const listId = import.meta.env.VITE_MAILING_LIST_ID;

// Dealing with Input width
const widthMachine = ref(null);
const input = ref(null);

function resize() {
  widthMachine.value.innerHTML = input.value.value || 'email*';
}
</script>

<template>
  <form method="post" :action="formUrl">
    <h3>newsletter:</h3>
    <input type="hidden" name="nonce" />
    <input id="147a9" type="hidden" name="l" checked :value="listId" />

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
  flex-wrap: wrap;
  justify-content: center;
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
  max-width: 90vw;
  overflow-x: auto;
}
input,
button {
  margin: 0;
  border: 0;
  height: 2.6rem;
  background: transparent !important;
  color: inherit;
  font-size: inherit;
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
  background: #fff !important;
  outline: 2px solid white;
  color: #000;
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