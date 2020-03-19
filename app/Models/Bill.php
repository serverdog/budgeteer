<?php

namespace App\Models;

use Eloquent as Model;
use App\Scopes\LoggedInUserScope;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bill
 * @package App\Models
 * @version March 17, 2020, 5:00 pm UTC
 *
 * @property \App\Models\User user
 * @property integer user_id
 * @property string name
 * @property number weekly
 * @property number monthly
 * @property number yearly
 */
class Bill extends Model
{
    use SoftDeletes;

    public $table = 'bills';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'name',
        'weekly',
        'monthly',
        'yearly',
        'weekday',
        'dayofmonth',
        'date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'name' => 'string',
        'weekly' => 'float',
        'monthly' => 'float',
        'yearly' => 'float',
        'weekday' => 'integer',
        'dayofmonth' => 'integer',
        'date' => 'date',

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

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
    

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function getMonthlyCostAttribute()
    {
        if (!empty($this->monthly)) {
            return $this->monthly;
        }

        if (!empty($this->yearly)) {
            return $this->yearly / 12;
        }

        if (!empty($this->weekly)) {
            return $this->weekly * 4;
        }

        return null;
    }
}
