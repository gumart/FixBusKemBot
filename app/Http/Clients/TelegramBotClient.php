<?php
declare(strict_types=1);


namespace App\Http\Clients;


use App\Http\Entities\TelegramBotUpdatesEntity;
use App\Http\Services\JSONMapperService;
use GuzzleHttp\Client;

class TelegramBotClient
{
    private Client $client;
    private JSONMapperService $jsonMapperService;

    public function __construct(Client $client, JSONMapperService $jsonMapperService)
    {
        $this->client = $client;
        $this->jsonMapperService = $jsonMapperService;
    }

    private function postRequest(string $methodName, ?array $params = null): array
    {
        $response = $this->client->post($methodName, [
            'form_params' => $params
        ]);

        return json_decode($response->getBody()->getContents(), true)['result'];
    }

    public function sendMessage(?array $params = null) : array
    {
        return $this->postRequest('sendMessage', $params);
    }

    public function getMessages(?array $params = null) : array
    {
        return $this->jsonMapperService->decodeArrayOfEntitiesFromArray(
            $this->postRequest('getUpdates', $params),
            new TelegramBotUpdatesEntity()
        );
    }
}
