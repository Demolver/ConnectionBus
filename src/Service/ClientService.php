<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\RequestDtoInterface;
use App\Dto\SettingDtoInterface;
use App\Factory\SettingClientFactory;

class ClientService
{
    private SettingClientFactory $clientFactory;

    /**
     * ClientService constructor.
     *
     * @param SettingClientFactory $clientFactory
     */
    public function __construct(SettingClientFactory $clientFactory)
    {
        $this->clientFactory = $clientFactory;
    }

    /**
     * @param int  $type
     * @param SettingDtoInterface $dto
     */
    public function setSetting(int $type, SettingDtoInterface $dto): void
    {
        $client = $this->clientFactory->create($type);
        $client->setSettings($dto);
    }

    /**
     * @param int  $type
     *
     * @return  SettingDtoInterface $dto
     */
    public function getSetting(int $type): SettingDtoInterface
    {
        $client = $this->clientFactory->create($type);
        return $client->getSettings();
    }
}
