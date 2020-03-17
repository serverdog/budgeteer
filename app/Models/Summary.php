<?php

namespace App\Models;

use App\Scopes\LoggedInUserScope;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'name' => 'string',
        'total' => 'float'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new LoggedInUserScope);
    }
}
