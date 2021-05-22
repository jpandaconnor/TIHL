import { Injectable } from '@nestjs/common';
import { RabbitSubscribe } from "@golevelup/nestjs-rabbitmq";
import { ConsumeMessage } from "amqplib";
import { MQMessage } from "./decorators/mq-message.decorator";


@Injectable()
export class AppService {
  getHello(): string {
    return 'Hello World!';
  }

/*  @RabbitSubscribe({
    exchange: 'orka.requestreply',
    routingKey: 'user.getNotification',
  })*/

  @MQMessage('user', 'sendNotification')
  public async getNotifications(msg: {}, amqpMsg: ConsumeMessage) {
    console.log("Get Notifications called");
    console.log(amqpMsg);
  }


  @MQMessage('user', 'getOneNotification')
  public async getNotificationsFunction2(msg: {}, amqpMsg: ConsumeMessage) {
    console.log(msg);
    return {'hello': 'sdasdas'};
  }
}
