<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait QueryParamsTrait
{
    protected function getDataTableParams()
    {
        $limit = request()->query('limit') ? request()->query('limit') : 20;
        $order = request()->query('order') ? request()->query('order') : '-id';
        $sortBy = ltrim($order, '-');
        $dir = str_starts_with($order, '-') ? 'DESC' : 'ASC';
        $search = request()->query('search') ? request()->query('search') : null;

        return [$limit, $sortBy, $dir, $search];
    }
}
