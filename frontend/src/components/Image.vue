<script setup>
import { computed } from 'vue';

const props = defineProps({
  image: {
    type: Object,
  },
  srcSet: {
    type: Array,
  },
  sizes: {
    type: Array,
  },
})
const image = computed(() => props.image)

/**
 * get srcSet string from srcSet array
 * @returns "https://example.com/2560x1706.jpg 2560w, https://example.com/1920x1280.jpg 1920w"
 */
const srcSet = computed(() => {
  return (props.srcSet || []).map((item) => {
    if (
      image.value?.sizes === undefined
      || image.value?.sizes[item.size] === undefined
      || image.value?.sizes[item.size]?.url === undefined
      || typeof image.value?.sizes[item.size]?.url !== 'string'
    ) {
      return undefined;
    }
    return `${image.value?.sizes[item.size]?.url} ${image.value?.sizes[item.size]?.width}w`;
  }).filter(Boolean).join(', ');
});

/**
 * get sizes string from sizes array
 * @returns "95vw, 50vw"
 */
const sizes = computed(() => props.sizes?.join(', ') || '');

</script>

<template>
    <img
      v-if="image"
      :src="image?.url"
      :srcSet="srcSet"
      :sizes="sizes"
    />
</template>