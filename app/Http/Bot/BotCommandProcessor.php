<?php
declare(strict_types=1);


namespace App\Http\Bot;


use App\Http\Bot\Commands\{CancelCommand, ChooseActionCommand, ChooseRouteCommand, GetScheduleCommand,
    SelectBusCommand, SelectMinibusCommand, SelectTramCommand, SelectTrolleybusCommand,
    SettingsCommand, StartCommand, StepBackCommand, UnsubscribeCommand};


class BotCommandProcessor
{
    private $commands = [
        StartCommand::class, CancelCommand::class, ChooseActionCommand::class, ChooseRouteCommand::class,
        GetScheduleCommand::class, SelectBusCommand::class, SelectMinibusCommand::class, SelectTramCommand::class,
        SelectTrolleybusCommand::class, SettingsCommand::class, StepBackCommand::class, UnsubscribeCommand::class
    ];

    public function process(): bool
    {
        foreach($this->commands as $command){

        }
    }
}
