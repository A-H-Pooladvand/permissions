<?php

namespace Laratrust\Models;

/**
 * This file is part of Laratrust,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package Laratrust
 */

use Laratrust\Contracts\LaratrustPositionInterface;
use Laratrust\Contracts\LaratrustRoleInterface;
use Laratrust\Traits\LaratrustPositionTrait;
use Laratrust\Traits\LaratrustRoleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Watson\Validating\ValidatingTrait;

class LaratrustPosition extends Model implements LaratrustPositionInterface
{
    use LaratrustPositionTrait, ValidatingTrait;

    /**
     * Database connection.
     *
     * @var string $connection
     */
    protected $connection = 'hr';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Creates a new instance of the model.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('database.connections.' . $this->connection . '.database') . '.' . $this->getTable();
//        $this->table = Config::get('laratrust.tables.roles');
    }
}
