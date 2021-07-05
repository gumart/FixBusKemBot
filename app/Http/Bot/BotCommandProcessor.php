<?php
declare(strict_types=1);


namespace App\Http\Bot;


use App\Http\Bot\Commands\{CancelCommand, ChooseActionCommand, ChooseRouteCommand, GetScheduleCommand,
    SelectBusCommand, SelectMinibusCommand, SelectTramCommand, SelectTrolleybusCommand,
    SettingsCommand, StartCommand, StepBackCommand, UnsubscribeCommand};


class BotCommandProcessor
{
    private $commands = [
        1 => StartCommand::class, 2 => CancelCommand::class, 3 => ChooseActionCommand::class, 4 => ChooseRouteCommand::class,
        5 => GetScheduleCommand::class, 6 => SelectBusCommand::class, 7 => SelectMinibusCommand::class, 8 => SelectTramCommand::class,
        9 => SelectTrolleybusCommand::class, 10 => SettingsCommand::class, 11 => StepBackCommand::class, 12 => UnsubscribeCommand::class
    ];

    public function process(): string
    {

        return "false";
    }
}
