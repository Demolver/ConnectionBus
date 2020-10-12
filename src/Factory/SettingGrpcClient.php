<?php

declare(strict_types=1);

namespace App\Factory;

use App\Dto\GrpcSettingDto;
use App\Dto\SettingDtoInterface;
use Grpc\ChannelCredentials;
use GrpcServices\GrpcClientClient;
use GrpcServices\GrpcRequest;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class SettingGrpcClient implements ClientConnectionInterface
{
    private GrpcClientClient $client;

    private SerializerInterface $serializer;

    /**
     * SettingGrpcClient constructor.
     *
     * @param SerializerInterface $serializer
     * @param string              $host
     */
    public function __construct(SerializerInterface $serializer, string $host)
    {
        $this->serializer = $serializer;
        $this->client = new GrpcClientClient($host, [
            'credentials' => ChannelCredentials::createInsecure(),
        ]);
    }

    /**
     * @param GrpcSettingDto $dto
     */
    public function setSettings(SettingDtoInterface $dto): void
    {
        $grpcRequest = new GrpcRequest();
        $grpcRequest->setFieldOne($dto->getFieldOne());
        $grpcRequest->setFieldTwo($dto->isFieldTwo());
        $grpcRequest->setFieldThree($dto->getFieldThree());

        $this->client->set($grpcRequest);
    }

    /**
     * @return GrpcSettingDto
     */
    public function getSettings(): SettingDtoInterface
    {
        $feature = $this->client->get()->wait();

        /**@var GrpcSettingDto $result */
        $result = $this->serializer->deserialize($feature, GrpcSettingDto::class, JsonEncoder::FORMAT);

        return $result;
    }
}
