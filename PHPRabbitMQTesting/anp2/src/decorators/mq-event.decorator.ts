import { RabbitSubscribe } from "@golevelup/nestjs-rabbitmq";

export function MQEvent (service: string, topic: string): any {
  const routingKey = service + '.event.' + topic;
  const queue = service + '-' +
    topic.replace('.', '-').toLowerCase() + '-queue';

  return RabbitSubscribe({
    exchange: 'orka.fanout',
    routingKey: routingKey,
    // queue: queue,
    queueOptions: {
      durable: true,
    }
  });
}



