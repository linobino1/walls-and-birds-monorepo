import { CollectionConfig } from 'payload/types';
import { addSlugField } from '../fields/slug';

const Songs: CollectionConfig = addSlugField('title', {
  slug: 'songs',
  admin: {
    defaultColumns: [
      'title',
    ],
  },
  access: {
    read: () => true,
  },
  fields: [
    {
      name: 'title',
      type: 'text',
      required: true,
      unique: true,
    },
    {
      name: 'key',
      type: 'text',
      required: true,
    },
    {
      name: 'by',
      type: 'text',
      required: true,
      defaultValue: 'Walls & Birds',
    },
    {
      name: 'content',
      type: 'textarea',
      required: true,
    },
  ],
});

export default Songs;