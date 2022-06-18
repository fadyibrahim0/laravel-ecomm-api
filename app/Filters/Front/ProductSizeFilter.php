<?php

namespace App\Filters\Front;

use App\Interfaces\Front\FilterInterface;
use Closure;

class ProductSizeFilter implements FilterInterface
{
    public function handle($query, Closure $next)
    {
        if(request()->has('size')) {
            $sizes = explode(',', request()->input('size'));
            $sizes = array_diff($sizes, [",", " ", ""]);

            $query->whereHas('sizes', function ($q) use($sizes) {
                $q->whereIn('size_id', $sizes);
            });
        }
        return $next($query);
    }
}
