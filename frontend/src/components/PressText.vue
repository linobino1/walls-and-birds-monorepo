<script setup>
import { ref, onMounted } from 'vue';

const color = ref('lightgrey')
const container = ref(null);
const text = ref(null);
const count = ref(null);

onMounted(() => {
    const plainText = text.value?.textContent || text.value?.innerText || "";
    const length = plainText.length || '';
    count.value.textContent = `${length} characters`;
});

const copyPlain = () => {
    const plainText = text.value?.textContent || text.value?.innerText || "";
    navigator.clipboard.writeText(plainText);

    highlight();
};
const copyHtml = () => {
    let html = text.value?.innerHTML || "";

    // remove vue identifiers
    html = html.replace(/ data-v-.*\=""/g, '');

    navigator.clipboard.writeText(html);

    highlight();
};
const highlight = () => {
    container.value.classList.add('highlight');
    setTimeout(() => {
        container.value.classList.remove('highlight');
    }, 500);
};
</script>

<template>
    <div ref="container" class="container">
        <p ref="text">
            <slot />
        </p>
        <div class="bar">
            <div ref="count" class="number" />
            <button @click="copyPlain">copy plaintext</button>
            <button @click="copyHtml">copy HTML</button>
        </div>
    </div>
</template>

<style scoped>
p {
    margin-bottom: 0;
    border-width: 1px;
    border-style: solid;
    border-color: transparent;
    transition: border-color .2s;
}
.bar {
    opacity: 0;
    transition: opacity .2s;
    display: flex;
    justify-content: end;
    align-items: center;
    font-size: small;
    color: v-bind(color);
}
.bar > * {
    padding: .5rem;
}
.container:hover p {
    border-color: v-bind(color);
}
.container:hover .bar,
.container.highlight .bar {
    opacity: 1;
}
.container.highlight p {
    border-color: green;
}
button {
    appearance: none;
    border: 0;
    outline: 0;
    font: inherit;
    color: inherit;
    background: transparent;
    cursor: pointer;
}
</style>