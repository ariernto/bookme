<?php

namespace Bavix\Wallet\Services;

use Bavix\Wallet\Interfaces\Rateable;
use Bavix\Wallet\Interfaces\Wallet;

class ExchangeService
{
    /**
     * @param Wallet $from
     * @param Wallet $to
     * @return int|float
     */
    public function rate(Wallet $from, Wallet $to)
    {
        return app(Rateable::class)
            ->withAmount(1)
            ->withCurrency($from)
            ->convertTo($to);
    }
}
