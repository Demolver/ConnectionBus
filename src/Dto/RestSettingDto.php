<?php

declare(strict_types=1);

namespace App\Dto;

final class RestSettingDto implements SettingDtoInterface
{
    private string $fieldOne;

    private bool $fieldTwo;

    /**
     * @var string[]
    */
    private array $fieldTree;

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
     * @return string[]
     */
    public function getFieldTree(): array
    {
        return $this->fieldTree;
    }

    /**
     * @param string[] $fieldTree
     */
    public function setFieldTree(array $fieldTree): void
    {
        $this->fieldTree = $fieldTree;
    }
}
