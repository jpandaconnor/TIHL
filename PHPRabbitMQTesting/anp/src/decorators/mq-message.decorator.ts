import { RabbitSubscribe } from "@golevelup/nestjs-rabbitmq";

export function MQMessage (cmd: string): any {

  
  return RabbitSubscribe({
    exchange: 'orka.requestreply',
    routingKey: 'user.getOneNotification',
  });
}