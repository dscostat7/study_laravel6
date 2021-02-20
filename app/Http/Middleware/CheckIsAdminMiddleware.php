<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdminMiddleware
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
        $user = auth()->user();
        if (!in_array($user->email, ['daniamerico@fillable.com', 'diegosouzagestor@gmail.com'])) {
            return redirect('/');
        }
        return $next($request);
    }
}
