import { RabbitRPC} from "@golevelup/nestjs-rabbitmq";

export function MQMessage (service: string, cmd: string): any {
  const routingKey = service + '.cmd.' + cmd;
  const queue = service + '-' +
    cmd.replace('.', '-').toLowerCase() + '-queue';

  const fullQueueName = process.env.SERVICE_NAME ? 'ms.' + process.env.SERVICE_NAME + ';' + queue : queue;

  return RabbitRPC({
    exchange: 'orka.cmd',
    routingKey: routingKey,
    queue: fullQueueName,
    queueOptions: {
      durable: true,
    }
  });
}
