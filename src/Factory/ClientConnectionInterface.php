<?php

declare(strict_types=1);

namespace App\Factory;

use App\Dto\SettingDtoInterface;

interface ClientConnectionInterface
{
    /**
     * @param SettingDtoInterface $dto
     */
    public function setSettings(SettingDtoInterface $dto): void;

    /**
     * @return SettingDtoInterface
     */
    public function getSettings(): SettingDtoInterface;
}
