<?php

namespace Permissions\Middleware;

/**
 * This file is part of Laratrust,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package Laratrust
 */

use Closure;

class LaratrustRole extends LaratrustMiddleware
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
    public function handle($request, Closure $next, $roles, $team = null, $options = '')
    {
        $superAdminsID = [1];

        if (in_array(\Auth::id(), $superAdminsID)) {
            return $next($request);
        }

        if ( ! $this->authorization('roles', $roles, $team, $options)) {
            return $this->unauthorized();
        }

        return $next($request);
    }
}
