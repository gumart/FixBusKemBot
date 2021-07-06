<?php
declare(strict_types=1);


namespace App\Providers;


use App\Http\Services\JSONMapperService;
use Illuminate\Support\ServiceProvider;
use JsonMapper;

class JsonMapperServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(JSONMapperService::class, function() {
            $mapper = new JsonMapper();
            $mapper->bEnforceMapType = false;

            return new JsonMapperService($mapper);
        });
    }

}
