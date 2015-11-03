<?php namespace FrenchFrogs\Demultiplexer;

use Closure;

class DemultiplexerMiddleware
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
        // if he has a get parameter d
        if($request->has('d')) {
            $d = Demultiplexer::getByToken($request->input('d'));
            // if demultiplexer with this token exists it replace parameter d by all parameter for the request
            if($d->params) {
                $request->replace(json_decode($d->params, true));
            }
        }
        return $next($request);
    }
}
