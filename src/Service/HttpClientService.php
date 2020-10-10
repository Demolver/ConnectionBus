<?php

declare(strict_types=1);

namespace App\Service;

use App\Enum\ResponseStatusCodeEnum;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class HttpClientService
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $url
     * @param string $method
     *
     * @return string
     * @throws GuzzleException
     */
    public function buildRequest(string $url, string $method, array $parrams = []): string
    {
        $response = $this->client->request(
            $method,
            $url,
            $parrams
        );

        if ($response->getStatusCode() !== ResponseStatusCodeEnum::SUCCESS) {
            throw new BadRequestException();
        }

        return $response->getBody()->getContents();
    }
}
