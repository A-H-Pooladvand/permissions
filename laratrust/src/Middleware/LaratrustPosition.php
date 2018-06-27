<?php

namespace Laratrust\Middleware;

/**
 * This file is part of Laratrust,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package Laratrust
 */

use Closure;

class LaratrustPosition extends LaratrustMiddleware
{
    /**
     * Handle incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Closure $next
     * @param  string $roles
     * @param  string|null $team
     * @param  string|null $options
     * @return mixed
     */
    public function handle($request, Closure $next, $positions, $team = null, $options = '')
    {
        if ( ! $this->authorization('positions', $positions, $team, $options)) {
            return $this->unauthorized();
        }

        return $next($request);
    }
}
