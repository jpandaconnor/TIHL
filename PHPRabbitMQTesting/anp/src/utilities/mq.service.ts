import {Injectable} from "@nestjs/common";
import {AmqpConnection} from "@golevelup/nestjs-rabbitmq";

@Injectable()
export class MQService {
    constructor(private readonly amqpConnection: AmqpConnection) {}

    public async publish(service: string, topic: string, data: any) {
        console.log(this.amqpConnection);
        await this.amqpConnection.publish(
            EXCHANGE_NAME_EVENT,
            MQService.createMessageTopic(service, topic), data);
    }

    public static createMessageTopic(service: string, topic: string) {
        return service + '.event.' + topic;
    }
}

export const EXCHANGE_NAME_EVENT = 'orka.event';