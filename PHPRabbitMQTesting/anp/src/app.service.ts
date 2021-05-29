import { Injectable } from '@nestjs/common';
import { ConsumeMessage } from "amqplib";
import { MQMessage } from "./decorators/mq-message.decorator";
import { MQEvent } from "./decorators/mq-event.decorator";
import { Nack } from "@golevelup/nestjs-rabbitmq";


@Injectable()
export class AppService {
  getHello(): string {
    return 'Hello World!';
  }

/*  @RabbitSubscribe({
    exchange: 'orka.requestreply',
    routingKey: 'user.getNotification',
  })*/

  @MQEvent('user', 'updated')
  public async handleUserUpdated(msg: {}, amqpMsg: ConsumeMessage) {
    console.log(msg);
    console.log("Event 1 called");
  }
}


