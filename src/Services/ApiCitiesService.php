<?php 

namespace App\Services;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiCitiesService 
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getCities()
     {
        $response = $this->client->request(
            'GET',
            'https://raw.githubusercontent.com/lutangar/cities.json/master/cities.json'
        );
        
        return $response->toArray();
     }
}