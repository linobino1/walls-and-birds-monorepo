# build stage
FROM node:18-alpine as base

FROM base as build-stage

ARG PAYLOAD_PUBLIC_HOST_BACKEND
ENV PAYLOAD_PUBLIC_HOST_BACKEND=${PAYLOAD_PUBLIC_HOST_BACKEND}

ARG PAYLOAD_PUBLIC_HOST_FRONTEND
ENV PAYLOAD_PUBLIC_HOST_FRONTEND=${PAYLOAD_PUBLIC_HOST_FRONTEND}

WORKDIR /home/node
COPY package*.json ./

COPY . .
RUN yarn install
RUN yarn build

# production stage
FROM base as production-stage

ENV PAYLOAD_CONFIG_PATH=/home/node/dist/payload.config.js

WORKDIR /home/node
COPY package*.json  ./

RUN yarn install --production
COPY --from=build-stage /home/node/dist ./dist
COPY --from=build-stage /home/node/build ./build

EXPOSE 3000

CMD ["node", "dist/server.js"]