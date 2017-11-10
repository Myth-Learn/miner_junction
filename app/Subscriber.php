<?php

namespace miner_junction;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subscription_code', 'full_name', 'email', 'phone_number',
    ];
}
