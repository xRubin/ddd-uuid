<?php declare(strict_types=1);

namespace ddd\uuid\values;

use ddd\domain\values\AbstractDomainValue;
use Webmozart\Assert\Assert;

class UUID extends AbstractDomainValue
{
    private string $value;

    /**
     * UUID constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::uuid($value, 'INVALID_UUID');
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return static
     * @throws \Exception
     */
    public static function next(): self
    {
        return new static(\Ramsey\Uuid\Uuid::uuid4()->toString());
    }
}