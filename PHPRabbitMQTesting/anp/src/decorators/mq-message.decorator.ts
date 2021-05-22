import { RabbitRPC, RabbitSubscribe } from "@golevelup/nestjs-rabbitmq";

export function MQMessage (service: string, cmd: string): any {
  const routingKey = service + '.cmd.' + cmd;
  const queue = service + '-' +
    cmd.replace('.', '-').toLowerCase() + '-queue';

  return RabbitRPC({
    exchange: 'orka.cmd',
    routingKey: routingKey,
    queue: queue,
  });
}
