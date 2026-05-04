<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;


class LegacyProductService{

    private HttpClientInterface $client;
    private string $baseUrl;

    public function __construct(HttpClientInterface $client){
    
        $this->client =$client;
        $this->baseUrl = $_ENV['API_URL'];

    }

    public function indexProduct():array {
        $response = $this->client->request('GET', $this->baseUrl . '/api/products');


        return $response->toArray(false);
    }

    public function showProduct(int $id): array{

        $response = $this->client->request('GET', $this->baseUrl . "/api/products/$id");

        return $response->toArray(false);   
    }

    public function createProduct(array $data): array{
       
        $response = $this->client->request('POST', $this->baseUrl . '/api/products', ['body' => $data,]);

        return $response->toArray(false);
        
    }

}