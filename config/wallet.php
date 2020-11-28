<?php

use Bavix\Wallet\Objects\Bring;
use Bavix\Wallet\Objects\Cart;
use Bavix\Wallet\Objects\EmptyLock;
use Bavix\Wallet\Objects\Operation;
use Bavix\Wallet\Services\ExchangeService;
use Bavix\Wallet\Services\CommonService;
use Bavix\Wallet\Services\WalletService;
use Bavix\Wallet\Services\LockService;
use Bavix\Wallet\Models\Transaction;
use Bavix\Wallet\Models\Transfer;
use Bavix\Wallet\Models\Wallet;
use Bavix\Wallet\Simple\Rate;
use Bavix\Wallet\Simple\Store;
use Bavix\Wallet\Simple\BCMath;
use Bavix\Wallet\Simple\Math;

$bcLoaded = extension_loaded('bcmath');

return [
    /**
     * This parameter is necessary for more accurate calculations.
     * PS, Arbitrary Precision Calculations
     */
    'math' => [
        'scale' => 64,
    ],

    /**
     * The parameter is used for fast packet overload.
     * You do not need to search for the desired class by code, the library will do it itself.
     */
    'package' => [
        'rateable' => Rate::class,
        'storable' => Store::class,
        'mathable' => $bcLoaded ?
            BCMath::class :
            Math::class,
    ],

    /**
     * Lock settings for highload projects
     *
     * If you want to replace the default cache with another,
     * then write the name of the driver cache in the key `wallet.lock.cache`.
     * @see https://laravel.com/docs/6.x/cache#driver-prerequisites
     *
     * @example
     *  'cache' => 'redis'
     */
    'lock' => [
        'cache' => null,
        'enabled' => false,
        'seconds' => 1,
    ],

    /**
     * Sometimes a slug may not match the currency and you need the ability to add an exception.
     * The main thing is that there are not many exceptions)
     *
     * Syntax:
     *  'slug' => 'currency'
     *
     * @example
     *  'my-usd' => 'USD'
     */
    'currencies' => [],

    /**
     * Services are the main core of the library and sometimes they need to be improved.
     * This configuration will help you to quickly customize the library.
     */
    'services' => [
        'exchange' => ExchangeService::class,
        'common' => CommonService::class,
        'wallet' => WalletService::class,
        'lock' => LockService::class,
    ],

    'objects' => [
        'bring' => Bring::class,
        'cart' => Cart::class,
        'emptyLock' => EmptyLock::class,
        'operation' => Operation::class,
    ],

    /**
     * Transaction model configuration.
     */
    'transaction' => [
        'table' => 'user_transactions',
        'model' => \Modules\User\Models\Wallet\Transaction::class,
        'casts' => [
            'amount' => $bcLoaded ? 'string' : 'int',
        ],
    ],

    /**
     * Transfer model configuration.
     */
    'transfer' => [
        'table' => 'user_transfers',
        'model' => Transfer::class,
        'casts' => [
            'fee' => $bcLoaded ? 'string' : 'int',
        ],
    ],

    /**
     * Wallet model configuration.
     */
    'wallet' => [
        'table' => 'user_wallets',
        'model' => Wallet::class,
        'casts' => [
            'balance' => $bcLoaded ? 'string' : 'int',
        ],
        'default' => [
            'name' => 'Default Wallet',
            'slug' => 'default',
        ],
    ],
];
