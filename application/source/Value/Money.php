<?php

declare(strict_types=1);

namespace Acme\Value;

use Acme\Exception\InvalidMoney;

final class Money
{
    /**
     * @throws InvalidMoney
     */
    public function __construct(private string $amount = '0')
    {
        if ($this->amount < 0) {
            throw InvalidMoney::negativeValue($amount);
        }
    }

    public function add(Money $money): Money
    {
        return new Money(bcadd($this->amount, $money->amount));
    }

    public function subtract(Money $money): Money
    {
        return new Money(bcsub($this->amount, $money->amount));
    }

    public function half(): Money
    {
        return new Money(bcdiv($this->amount, '2', 3));
    }

    public function isLess(Money $money): bool
    {
        return bccomp($this->amount, $money->amount) === -1;
    }

    public function __toString(): string
    {
        return $this->amount;
    }
}
