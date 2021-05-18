import { Injectable } from '@nestjs/common';
import { RabbitSubscribe } from "@golevelup/nestjs-rabbitmq";

@Injectable()
export class AppService {
  getHello(): string {
    return 'Hello World!';
  }

  // @MessagePattern('env.user.sendMessage')
  @RabbitSubscribe({
    exchange: 'orka.pubsub',
    routingKey: 'env.user.sendMessage',
    queue: 'cats_queue',
  })
  public async getNotifications(msg: {}) {
    console.log(msg);
  }
}
