import { NestFactory } from '@nestjs/core';
import { AppModule } from './app.module';
import { NestExpressApplication } from "@nestjs/platform-express";
import { Transport } from "@nestjs/microservices";

export const msOptions = {
  transport: Transport.RMQ,
  options: {
    urls: ['amqp://rabbitmq:5672'],
    queue: 'cats_queue',
    queueOptions: {
      durable: true
    },
  },
};

async function bootstrap() {
  const app: NestExpressApplication = await NestFactory.create<NestExpressApplication>(
    AppModule,
    {
      logger: console,
    },
  );


  await app.startAllMicroservicesAsync();
  await app.listenAsync(4000);
}
bootstrap();
