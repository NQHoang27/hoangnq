<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * DatabaseFacade
 *
 * @method static mixed|string prettyTime($seconds)
 * @method static mixed|string getQuerySql($model)
 * @method static float getDayOffNumbers($startAt, $endAt)
 *
 * @see \App\Helpers\DateTimeHelper
 */
class DemoHelloWorld extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'demo_hello_world_helper';
    }
}
