import { buildConfig } from 'payload/config';
import path from 'path';
import Users from './collections/Users';
import Shows from './collections/Shows';

let cors: string[] = [];
if (process.env.PAYLOAD_PUBLIC_CORS) {
  cors = cors.concat(
    process.env.PAYLOAD_PUBLIC_CORS.split(',').map((s) => s.trim())
  );
} else {
  cors.push('http://localhost:5173');
}

export default buildConfig({
  serverURL: process.env.PAYLOAD_PUBLIC_SERVER_URL || 'http://localhost:3000',
  cors,
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
