<script setup>
import { useQuery } from '@vue/apollo-composable';
import gql from 'graphql-tag';
import { ref, computed } from 'vue';
import Image from './Image.vue';

const props = defineProps({
  photoId: {
    type: String,
    required: true,
  },
});

const { result } = useQuery(
gql`
  query PressPhoto($id: String!) {
    PressPhoto(id: $id) {
      url
      caption
      rights
      sizes {
        _480p {
          url
          width
          height
        }
        _640p {
          url
          width
          height
        }
        _960p {
          url
          width
          height
        }
        _1280p {
          url
          width
          height
        }
        _1920p {
          url
          width
          height
        }
        _2560p {
          url
          width
          height
        }
      }
    }
  }
`,
{
  id: props.photoId,
},
);
const photo = computed(() => result?.value?.PressPhoto)
const downloadSizes = computed(() => {
  const res = photo.value?.sizes;
  if (!res) return [];
  return Object.keys(res).map((key) => ({
    label: key.replace('_', ''),
    downloadFilename: formatName(photo.value, res[key]),
    url: res[key].url,
  }));
});
const container = ref(null);

const formatName = (photo, size) => {
  let name = photo?.caption || photo?.rights || 'photo';
  name = name.replace(/[^a-z0-9]/gi, '_').toLowerCase();
  name = `walls_and_birds_${name}.jpg`
  if (size) name = name.replace('.jpg', `_${size.width}x${size.height}.jpg`);
  return name;
};
</script>

<template>
  <div ref="container" class="container">
    <Image
      :image="photo"
      :srcSet="[
        { size: '_480p', width: 480 },
        { size: '_640p', width: 640 },
        { size: '_960p', width: 960 },
        { size: '_1280p', width: 1280 },
        { size: '_1920p', width: 1920 },
      ]"
      :sizes="[
        '80vw',
      ]"
      class="preview"
    />
    <div class="bar">
      <div>{{ photo?.caption }}, © {{ photo?.rights }}</div>
      <div v-for="size in downloadSizes" :key="size.url">
        <a :href="size.url" :download="size.downloadFilename" target="_blank">
          {{ size.label }}
        </a>
      </div>
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
  color: grey;
}
.bar > * {
  padding: .5rem;
}
.container:hover .bar,
.container.highlight .bar {
  opacity: 1;
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
.preview {
  width: 100%;
}
</style>