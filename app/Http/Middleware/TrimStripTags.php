<?php

namespace App\Http\Middleware;

use Closure;

class TrimStripTags
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $data = $request->all(); // если нужно все данные обрабатывать

        // данные которые не нужно обрабатывать (название колонок в базе данных)
        // в данном случае не обрабатываются колонки `description`
        $except = ['description', 'content', 'timetable', 'password', 'password_confirmation'];
        $data = $request->except($except);

        array_walk_recursive($data, function (&$value) {
            if (is_string($value)) {
                $value = strip_tags(trim($value));
            }
        });

        $request->merge($data);



        return $next($request);
    }
}
