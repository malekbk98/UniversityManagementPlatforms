<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class TeacherMiddleware
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
        if(Auth::user()->position == 'teacher'){
            return $next($request);
=======
        if (!Auth::user()->position == 'teacher') {
            return redirect('home');
        }
        return $next($request);
>>>>>>> 7fa819072f9253e422c1067088cd1d379735552c

        }else{
            return redirect('/home');
        }
    }
}