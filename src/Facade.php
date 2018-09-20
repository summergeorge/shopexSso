<?php

namespace Shopex\Sso;


class Facade extends Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shopexsso';
    }

}