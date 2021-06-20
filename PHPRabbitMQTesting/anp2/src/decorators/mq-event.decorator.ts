import { RabbitSubscribe } from "@golevelup/nestjs-rabbitmq";

export function MQEvent (service: string, topic: string): any {
  const routingKey = service + '.event.' + topic;

  const queue = service + '-' +
      topic.replace('.', '-').toLowerCase() + '-queue';

  const fullQueueName = process.env.SERVICE_NAME ? process.env.SERVICE_NAME + ';' + queue : queue;


  return RabbitSubscribe({
    exchange: 'orka.event',
    routingKey: routingKey,
<<<<<<< HEAD
    // queue: queue,
=======
    queue: fullQueueName,
>>>>>>> c898d00bc7985380e970bae86e988cf08b105235
    queueOptions: {
      durable: true,
      autoDelete: true,
    }
  });
}