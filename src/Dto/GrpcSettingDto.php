<?php

declare(strict_types=1);

namespace App\Dto;

final class GrpcSettingDto implements SettingDtoInterface
{
    private string $fieldOne;

    private bool $fieldTwo;

    private int $fieldThree;

    /**
     * @return string
     */
    public function getFieldOne(): string
    {
        return $this->fieldOne;
    }

    /**
     * @param string $fieldOne
     */
    public function setFieldOne(string $fieldOne): void
    {
        $this->fieldOne = $fieldOne;
    }

    /**
     * @return bool
     */
    public function isFieldTwo(): bool
    {
        return $this->fieldTwo;
    }

    /**
     * @param bool $fieldTwo
     */
    public function setFieldTwo(bool $fieldTwo): void
    {
        $this->fieldTwo = $fieldTwo;
    }

    /**
     * @return int
     */
    public function getFieldThree(): int
    {
        return $this->fieldThree;
    }

    /**
     * @param int $fieldThree
     */
    public function setFieldThree(int $fieldThree): void
    {
        $this->fieldThree = $fieldThree;
    }
}
