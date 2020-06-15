<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
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
<<<<<<< HEAD
        if(Auth::user()->position == 'admin'){
            return $next($request);

        }else{
            return redirect('/home');
=======
        if (!Auth::user()->position == 'admin') {
            return redirect('home');
>>>>>>> 7fa819072f9253e422c1067088cd1d379735552c
        }
    }
}