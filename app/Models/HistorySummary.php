<?php

namespace App\Models;

use App\Scopes\LoggedInUserScope;
use Illuminate\Database\Eloquent\Model;

class HistorySummary extends Model
{
    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
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
