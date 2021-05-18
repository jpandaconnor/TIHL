import { Controller, Get, Inject } from "@nestjs/common";
import { AppService } from './app.service';
import { ClientProxy, Ctx, MessagePattern, Payload, RmqContext } from "@nestjs/microservices";
import { RabbitRPC, RabbitSubscribe } from "@golevelup/nestjs-rabbitmq";

@Controller()
export class AppController {
  constructor(
    @Inject('EVENT_CLIENT') private readonly client: ClientProxy,
    private readonly appService: AppService,
  ) {}

  // @MessagePattern('env.user.sendMessage')
  @RabbitSubscribe({
    exchange: 'exchange1',
    routingKey: 'env.user.sendMessage',
    queue: 'dogs_queue',
  })
  public async getNotifications(msg: {}) {
    console.log(msg);
  }

  @Get()
  getHello(): string {
    return this.appService.getHello();
  }
}
