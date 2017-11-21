<?php
namespace Bravist\CnvexWhiteFinance\Facade;

use Illuminate\Support\Facades\Facade;

class CnvexWhiteFinance extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cnvex_white_finance';
    }
}
