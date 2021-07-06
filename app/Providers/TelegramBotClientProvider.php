<?php

namespace App\Providers;

use App\Http\Clients\TelegramBotClient;
use App\Http\Services\JSONMapperService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class TelegramBotClientProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TelegramBotClient::class, function () {
            $client = new Client([
                'base_uri' => config('telegram.bot_api_url') . 'bot' . config('telegram.token') . '/'
            ]);

            $jsonMapperService = app(JSONMapperService::class);

            return new TelegramBotClient($client, $jsonMapperService);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
