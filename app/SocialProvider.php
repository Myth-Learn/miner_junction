<?php

namespace miner_junction;

use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
    protected $fillable = [
        'provider_id', 'provider',
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
