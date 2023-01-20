import { buildConfig } from 'payload/config';
import path from 'path';
import Users from './collections/Users';
import Shows from './collections/Shows';

export default buildConfig({
  serverURL: process.env.PAYLOAD_PUBLIC_HOST_BACKEND || 'http://localhost:3000',
  cors: [
    process.env.PAYLOAD_PUBLIC_HOST_FRONTEND || 'http://localhost:5173',
  ],
  admin: {
    user: Users.slug,
  },
  collections: [
    Users,
    Shows,
  ],
  typescript: {
    outputFile: path.resolve(__dirname, 'payload-types.ts'),
  },
  graphQL: {
    schemaOutputFile: path.resolve(__dirname, 'generated-schema.graphql'),
  },
});
