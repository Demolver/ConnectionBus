<?php

declare(strict_types=1);

namespace App\Factory;

use App\Dto\HttpSettingDto;
use App\Dto\RestSettingDto;
use App\Dto\SettingDtoInterface;
use App\Service\HttpClientService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class SettingRestClient implements ClientConnectionInterface
{
    private HttpClientService $client;

    private SerializerInterface $serializer;

    private string $host;

    /**
     * SettingRestClient constructor.
     *
     * @param HttpClientService   $client
     * @param SerializerInterface $serializer
     * @param string              $host
     */
    public function __construct(HttpClientService $client, SerializerInterface $serializer, string $host)
    {
        $this->client = $client;
        $this->serializer = $serializer;
        $this->host = $host;
    }

    /**
     * @param RestSettingDto $dto
     */
    public function setSettings(SettingDtoInterface $dto): void
    {
        $this->client->buildRequest($this->host, Request::METHOD_PUT, [
            'fieldOne' => $dto->isFieldOne(),
            'fieldTwo' => $dto->getFiledTwo(),
            'fieldThree' => $dto->getFieldThree(),
        ]);
    }

    /**
     * @return RestSettingDto
     */
    public function getSettings(): SettingDtoInterface
    {
        $response = $this->client->buildRequest($this->host, Request::METHOD_GET);

        /**@var RestSettingDto $result*/
        $result = $this->serializer->deserialize($response, HttpSettingDto::class, JsonEncoder::FORMAT);

        return $result;
    }
}
