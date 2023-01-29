import { CollectionConfig } from 'payload/types';
import slugify from 'slugify';

function createSlug(s: string): string {
  if (!s) return s;
  return slugify(s, {
    lower: true,
  });
}

function addSlugField(forField: string, collection: CollectionConfig): CollectionConfig {
  const res = collection;

  if (!('hooks' in res)) {
    res.hooks = {};
  }
  if (!('beforeValidate' in res.hooks)) {
    res.hooks.beforeValidate = [];
  }
  res.hooks?.beforeValidate?.push(
    ({ data }) => {
      const modifiedData = data;
      if (!data?.slug) {
        modifiedData.slug = createSlug(data?.[forField]);
      }
      return modifiedData;
    },
  );

  const index = res.fields.findIndex((x) => 'name' in x && x.name === forField);
  if (index === -1) {
    throw Error('SlugField forField does not exist');
  }
  res.fields.splice(index + 1, 0, {
    name: 'slug',
    type: 'text',
    unique: true,
    index: true,
    required: true,
    validate: (data) => !!data || 'please enter a slug manually',
    admin: {
      position: 'sidebar',
    },
  });

  return res;
}

export {
  createSlug,
  addSlugField,
};
