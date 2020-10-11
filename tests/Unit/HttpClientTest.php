<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Dto\HttpSettingDto;
use App\Factory\SettingHttpClient;
use App\Service\HttpClientService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Serializer\Serializer;

class HttpClientTest extends KernelTestCase
{
    private SettingHttpClient $settingHttpClient;

    protected function setUp(): void
    {
        $httpClient = $this->getMockBuilder(HttpClientService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $httpClient->method('buildRequest')->willReturn('{"fieldOne":true,"filedTwo":4,"fieldThree":["test"]}');

        self::bootKernel();
        /**
         * @var Serializer $cleanRobotService
         */
        $serializer = static::$kernel->getContainer()->get('serializer');
        $this->settingHttpClient = new SettingHttpClient($httpClient, $serializer, '');
    }

    public function testGetSetting()
    {
        $dto = $response = $this->settingHttpClient->getSettings();

        $this->assertInstanceOf(HttpSettingDto::class, $dto);
        $this->assertEquals($dto->getFiledTwo(), 4);
        $this->assertEquals($dto->isFieldOne(), true);
        $this->assertEquals($dto->getFieldThree(), [
            'test'
        ]);
    }
}
