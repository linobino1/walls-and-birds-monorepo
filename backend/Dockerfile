# build stage
FROM node:18-alpine as base

FROM base as build-stage

ARG PAYLOAD_PUBLIC_SERVER_URL
ENV PAYLOAD_PUBLIC_SERVER_URL=${PAYLOAD_PUBLIC_SERVER_URL}

ARG PAYLOAD_PUBLIC_CORS
ENV PAYLOAD_PUBLIC_CORS=${PAYLOAD_PUBLIC_CORS}

WORKDIR /app
COPY package*.json ./

COPY . .
RUN yarn install
RUN yarn build

# production stage
FROM base as production-stage

ENV PAYLOAD_CONFIG_PATH=/app/dist/payload.config.js

WORKDIR /app
COPY package*.json  ./

RUN yarn install --production
COPY --from=build-stage /app/dist ./dist
COPY --from=build-stage /app/build ./build

EXPOSE 3000

CMD ["node", "dist/server.js"]
