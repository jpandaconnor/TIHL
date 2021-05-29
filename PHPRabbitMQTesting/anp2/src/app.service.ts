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

  @MQEvent('user', 'updated')
  public async handleAnotherConsumer(msg: {}, amqpMsg: ConsumeMessage) {
    console.log("ANP - Consumer 2 called");

    console.log(msg);
  }
}

