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


  @MQMessage('user', 'sendNotification')
  public async getNotifications(msg: {}, amqpMsg: ConsumeMessage) {
    console.log("Get Notifications called");
    console.log(amqpMsg);
  }


  @MQMessage('user', 'getOneNotification')
  public async getNotificationsFunction2(msg: {}, amqpMsg: ConsumeMessage) {
    console.log(msg);
    return {'message': 'I got a response'};
  }

  @MQEvent('user', 'updated')
  public async handleAnotherConsumer(msg: {}, amqpMsg: ConsumeMessage) {
    console.log("ANP - Consumer 2 called");


    console.log(msg);
  }
}

