import { RabbitSubscribe } from "@golevelup/nestjs-rabbitmq";

export function MQMessage (service: string, cmd: string): any {
  const routingKey = service + '.cmd.' + cmd;
  const queue = service + '-' +
    cmd.replace('.', '-').toLowerCase() + '-queue';

  return RabbitSubscribe({
    exchange: 'orka.requestreply',
    routingKey: routingKey,
    queue: queue,
  });
}
