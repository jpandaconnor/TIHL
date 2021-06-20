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
  public async handleAnotherConsumer(msg: {}, amqpMsg: ConsumeMessage) {
    console.log("ANP - Consumer 1 called");

    console.log(msg);
  }
}


