<?php
namespace zorancco\ApiClients;

use \GuzzleHttp\Client as Client;

class TrelloApi
{
    private $client;
    private $apiUrlBase = 'https://api.trello.com/1/boards/';
    private $apiUrlSuffix = '/checklists/?key=b450fa0aae7ff518ab65d67a94164781&token=49b72281294286abaf5f8bba0ac3c7942cd3c60e8a4f0fb1b74ed32d00596450&checklists=all&checklist_fields=all&organization=false';
    private $data;

    public function __construct()
    {
//        $this->client = new Client([
//            'defaults' => [
//                'headers' => ['Content-Type' => 'application/json'],
//            ]
//        ]);
    }

    public function getBoardData( $boardId )
    {
        $this->client = new Client();
//        $request = new \GuzzleHttp\Psr7\Request('GET', $this->apiUrlBase . $boardId . $this->apiUrlSuffix);

//        $promise = $this->client->sendAsync($request)->then(function ($response) {
//            $this->data = $response->getBody();
//            return json_decode($this->data);
//        });
//
//        $promise->wait();

        $response = $this->client->get($this->apiUrlBase . $boardId . $this->apiUrlSuffix);
        $this->data = $response->getBody();
        return json_decode($this->data);
    }

    public function saveData($filename)
    {
        file_put_contents( $filename, $this->data );
    }
}
