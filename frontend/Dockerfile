# build stage
FROM node:18-alpine as build-stage

ARG VITE_HOST_BACKEND
ENV VITE_HOST_BACKEND=${VITE_HOST_BACKEND}

ARG VITE_MAILING_LIST_FORM_URL
ENV VITE_MAILING_LIST_FORM_URL=${VITE_MAILING_LIST_FORM_URL}

ARG VITE_MAILING_LIST_ID
ENV VITE_MAILING_LIST_ID=${VITE_MAILING_LIST_ID}

WORKDIR /home/node

COPY package*.json .

RUN npm install

COPY . .

RUN npm run build

# production stage
FROM nginx:latest as production-stage

# overwrite default nginx configuration
COPY ./.nginx/nginx.conf /etc/nginx/nginx.conf
RUN rm -rf /usr/share/nginx/html/*

COPY --from=build-stage /home/node/dist /usr/share/nginx/html

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]