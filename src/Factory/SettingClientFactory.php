<?php

declare(strict_types=1);

namespace App\Factory;

use App\Enum\ClientTypeEnum;
use App\Exception\ClientTypeNotExistException;
use Exception;

class SettingClientFactory
{
    private SettingRestClient $restClient;

    private SettingGrpcClient $grpcClient;

    private SettingHttpClient $httpClient;

    /**
     * SettingClientFactory constructor.
     *
     * @param SettingRestClient $restClient
     * @param SettingGrpcClient $grpcClient
     * @param SettingHttpClient $httpClient
     */
    public function __construct(
        SettingRestClient $restClient,
        SettingGrpcClient $grpcClient,
        SettingHttpClient $httpClient
    ) {
        $this->restClient = $restClient;
        $this->grpcClient = $grpcClient;
        $this->httpClient = $httpClient;
    }


    /**
     * @param int $type
     *
     * @return ClientConnectionInterface
     * @throws Exception
     */
    public function create(int $type): ClientConnectionInterface
    {
        switch ($type) {
            case ClientTypeEnum::REST_CLIENT:
                return $this->restClient;
            case ClientTypeEnum::GRPS_CLIENT:
                return $this->grpcClient;
            case ClientTypeEnum::HTTP_CLIENT:
                return $this->httpClient;
            default:
                throw new ClientTypeNotExistException();
        }
    }
}
