<?php

namespace App\Providers;

use App\Http\Clients\TelegramBotClient;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TelegramBotClient::class, function () {
            $client = new Client([
                'base_uri' => config('telegram.bot_api_url') . 'bot' . config('telegram.token') . '/'
            ]);

            return new TelegramBotClient($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
