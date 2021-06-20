import {Injectable} from "@nestjs/common";
import {AmqpConnection} from "@golevelup/nestjs-rabbitmq";

@Injectable()
export class MQService {
    constructor(private readonly amqpConnection: AmqpConnection) {}

    public async publish(service: string, cmd: string, data: any) {
        await this.amqpConnection.publish(
            EXCHANGE_NAME_EVENT,
            MQService.createEventPattern(service, cmd), data);
    }

    public async send(service: string, cmd: string, data: any, returnAs: any = {}, timeout: number = 5000) {
        return await this.amqpConnection.request<typeof returnAs>({
            exchange: EXCHANGE_NAME_CMD,
            routingKey: MQService.createMessagePattern(service, cmd),
            payload: data,
            timeout
        });
    }

    public static createEventPattern(service: string, cmd: string): string {
        return service + '.event.' + cmd;
    }

    public static createMessagePattern(service: string, cmd: string): string {
        return service + '.cmd.' + cmd;
    }
}

export const EXCHANGE_NAME_EVENT = 'orka.event';
export const EXCHANGE_NAME_CMD = 'orka.cmd';