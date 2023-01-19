import { ApolloClient, HttpLink, InMemoryCache } from '@apollo/client/core';

const apiHost = import.meta.env.VITE_HOST_API ?? 'http://localhost:3000';
const cache = new InMemoryCache({
  addTypename: false,
});

const apollo = new ApolloClient({
  cache,
  link: new HttpLink({
    uri: `${apiHost}/api/graphql`,
  }),
});

export default apollo;
