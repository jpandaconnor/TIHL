import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { RabbitMQModule } from "@golevelup/nestjs-rabbitmq";

@Module({
  imports: [
    RabbitMQModule.forRoot(RabbitMQModule, {
      exchanges: [
        {
          name: 'orka.requestreply',
          type: 'direct',
        },
      ],
      uri: 'amqp://guest:guest@rabbitmq:5672',
      connectionInitOptions: { wait: false },
    }),
  ],
  controllers: [AppController],
  providers: [
    AppService,
  ],
})
export class AppModule {}
