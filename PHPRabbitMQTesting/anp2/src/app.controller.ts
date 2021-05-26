import { Controller, Get, Inject, Injectable } from "@nestjs/common";
import { AppService } from './app.service';
import { ClientProxy, Ctx, MessagePattern, Payload, RmqContext } from "@nestjs/microservices";
import { RabbitRPC, RabbitSubscribe } from "@golevelup/nestjs-rabbitmq";

@Controller()
@Injectable()
export class AppController {
  constructor(
    private readonly appService: AppService,
  ) {
    console.log("CALLED");
  }




  @Get()
  getHello(): string {
    return this.appService.getHello();
  }
}
