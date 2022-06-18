<?php

namespace App\Filters\Front;

use App\Interfaces\Front\FilterInterface;
use Closure;

class ProductColorFilter implements FilterInterface
{
    public function handle($query, Closure $next)
    {
        if(request()->has('color')) {
            $colors = explode(',', request()->input('color'));
            $colors = array_diff($colors, [",", " ", ""]);

            $query->whereHas('colors', function ($q) use($colors) {
                $q->whereIn('color_id', $colors);
            });
        }
        return $next($query);
    }
}
