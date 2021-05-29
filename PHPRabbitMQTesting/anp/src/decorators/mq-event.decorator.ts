import { RabbitSubscribe } from "@golevelup/nestjs-rabbitmq";

export function MQEvent (service: string, topic: string): any {
  const routingKey = service + '.event.' + topic;

  const queue = service + '-' +
    topic.replace('.', '-').toLowerCase() + '-queue';

  const fullQueueName = process.env.SERVICE_NAME ? process.env.SERVICE_NAME + ';' + queue : queue;


  return RabbitSubscribe({
    exchange: 'orka.fanout',
    routingKey: routingKey,
    queue: fullQueueName,
    queueOptions: {
      durable: true,
      autoDelete: true,
    }
  });
}



