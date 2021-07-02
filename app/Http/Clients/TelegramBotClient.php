<?php
declare(strict_types=1);


namespace App\Http\Clients;


use GuzzleHttp\Client;

class TelegramBotClient
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function postRequest(string $methodName, ?array $params = null): array
    {
        $response = $this->client->post($methodName, [
            'form_params' => $params
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
