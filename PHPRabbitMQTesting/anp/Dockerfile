FROM node:alpine

RUN apk update && \
    apk add --no-cache g++ make python3

WORKDIR /app

ADD package.json /app/package.json
ADD package-lock.json /app/package-lock.json

RUN npm install

ADD tsconfig.json /app/tsconfig.json
ADD tsconfig.build.json /app/tsconfig.build.json

ADD . /app

CMD ["npm", "run", "start:debug"]