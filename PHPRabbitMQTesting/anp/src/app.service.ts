import { Injectable } from '@nestjs/common';
import { ConsumeMessage } from "amqplib";
import { MQEvent } from "./decorators/mq-event.decorator";
import {MQMessage} from "./decorators/mq-message.decorator";

@Injectable()
export class AppService {
  getHello(): string {
    return 'Hello World!';
  }

  @MQEvent('user', 'updated')
  public async handleUserUpdated(msg: {}, amqpMsg: ConsumeMessage) {
    console.log(msg);
    console.log("Event 1 called");
  }

  @MQMessage('user', 'sendNotification')
  public async sendNotification(msg: {}, amqpMsg: ConsumeMessage) {
    return {data: '{notification data}'};
  }
}


