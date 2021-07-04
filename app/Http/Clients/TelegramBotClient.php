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

    public function getRequest(string $methodName, ?array $params = null): array
    {
        // $request = $this->client->get($methodName, [
        //     'query' => $params
        // ]);

        // $request = $this->client->request('GET', $methodName, [
        //     'query' => $params
        // ]);

        // $request = $this->client->request('GET', 'getUpdates', [
        //     'query' => [
        //         'offset' => -1,
        //     ]
        // ]);

        return ['done' => 'yes'];

        // return json_decode($request->getBody()->getContents(), true);
    }
}
