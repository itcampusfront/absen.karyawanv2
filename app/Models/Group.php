<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'groups';

    /**
     * Fill the model with an array of attributes.
     *
     * @param  array  $attributes
     * @return $this
     *
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    protected $fillable = ['name'];

    /**
     * Get the users for the group.
     */
    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }

    /**
     * Get the offices for the group.
     */
    public function offices()
    {
        return $this->hasMany(\App\Models\Office::class);
    }

    /**
     * Get the positions for the group.
     */
    public function positions()
    {
        return $this->hasMany(\App\Models\Position::class);
    }
}
