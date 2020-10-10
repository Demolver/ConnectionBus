<?php

declare(strict_types=1);

namespace App\Dto;

final class HttpSettingDto implements SettingDtoInterface
{
    private bool $fieldOne;

    private int $filedTwo;

    /**
     * @var string[]
    */
    private array $fieldThree;

    /**
     * @return bool
     */
    public function isFieldOne(): bool
    {
        return $this->fieldOne;
    }

    /**
     * @param bool $fieldOne
     */
    public function setFieldOne(bool $fieldOne): void
    {
        $this->fieldOne = $fieldOne;
    }

    /**
     * @return int
     */
    public function getFiledTwo(): int
    {
        return $this->filedTwo;
    }

    /**
     * @param int $filedTwo
     */
    public function setFiledTwo(int $filedTwo): void
    {
        $this->filedTwo = $filedTwo;
    }

    /**
     * @return string[]
     */
    public function getFieldThree(): array
    {
        return $this->fieldThree;
    }

    /**
     * @param string[] $fieldThree
     */
    public function setFieldThree(array $fieldThree): void
    {
        $this->fieldThree = $fieldThree;
    }
}
