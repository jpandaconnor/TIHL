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
<<<<<<< HEAD
  public async handleAnotherConsumer(msg: {}, amqpMsg: ConsumeMessage) {
    console.log("ANP - Consumer 1 called");

    console.log(msg);
=======
  public async handleUserUpdated(msg: {}, amqpMsg: ConsumeMessage) {
    console.log(msg);
    console.log("Event 1 called");
  }

  @MQMessage('user', 'sendNotification')
  public async sendNotification(msg: {}, amqpMsg: ConsumeMessage) {
    return {data: '{notification data}'};
>>>>>>> c898d00bc7985380e970bae86e988cf08b105235
  }
}


