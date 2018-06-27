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

class LaratrustPermission extends LaratrustMiddleware
{
    /**
     * Handle incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Closure $next
     * @param  string $permissions
     * @param  string|null $team
     * @param  string|null $options
     * @return mixed
     */
    public function handle($request, Closure $next, $permissions, $team = null, $options = '')
    {
        $superAdminsID = [1];

        if (in_array(\Auth::id(), $superAdminsID)) {
            return $next($request);
        }

        if ( ! $this->authorization('permissions', $permissions, $team, $options)) {
            return $this->unauthorized();
        }

        return $next($request);
    }
}
