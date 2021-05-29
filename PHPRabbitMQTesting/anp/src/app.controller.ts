import { Controller, Get, Injectable } from "@nestjs/common";
import { AppService } from './app.service';
import {MQService} from "./utilities/mq.service";

@Controller()
@Injectable()
export class AppController {
  constructor(
    private readonly appService: AppService,
    private readonly mqService: MQService,
  ) {}

  @Get()
  async getHello() {
    await this.mqService.publish('user', 'updated', {message: 'data'});
    return this.appService.getHello();
  }
}
