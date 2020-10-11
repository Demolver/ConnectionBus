<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Enum\ClientTypeEnum;
use App\Factory\SettingClientFactory;
use App\Factory\SettingGrpcClient;
use App\Factory\SettingHttpClient;
use App\Factory\SettingRestClient;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    private SettingClientFactory $settingClientFactory;

    protected function setUp(): void
    {
        $settingGrpcClient = $this->getMockBuilder(SettingGrpcClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $settingHttpClient = $this->getMockBuilder(SettingHttpClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $settingRestClient = $this->getMockBuilder(SettingRestClient::class)
            ->disableOriginalConstructor()
            ->getMock();


        $this->settingClientFactory = new SettingClientFactory(
            $settingRestClient,
            $settingGrpcClient,
            $settingHttpClient
        );
    }

    public function testGetRestFactory(): void
    {
        $client = $this->settingClientFactory->create(ClientTypeEnum::REST_CLIENT);

        $this->assertInstanceOf(SettingRestClient::class, $client);
    }

    public function testGetHttpFactory(): void
    {
        $client = $this->settingClientFactory->create(ClientTypeEnum::HTTP_CLIENT);

        $this->assertInstanceOf(SettingHttpClient::class, $client);
    }

    public function testGetGrpcFactory(): void
    {
        $client = $this->settingClientFactory->create(ClientTypeEnum::GRPS_CLIENT);

        $this->assertInstanceOf(SettingGrpcClient::class, $client);
    }
}
