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
        'date',
        'period',
        'luxury',
        'bill_category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'         => 'integer',
        'user_id'    => 'integer',
        'name'       => 'string',
        'period'     => 'string',
        'weekly'     => 'float',
        'monthly'    => 'float',
        'yearly'     => 'float',
        'weekday'    => 'integer',
        'dayofmonth' => 'integer',
        'date'       => 'date',
        'luxury'     => 'boolean',
        'bill_category_id' => 'integer',

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\BillCategory::class, 'bill_category_id');
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

    public static function saveManyBills(array $rows, int $user_id)
    {
        foreach ($rows as $row) {
            if ($row['period'] == 'Monthly') {
                unset($row['weekly'], $row['yearly'], $row['weekday'], $row['date']);
            } elseif ($row['period'] == 'Weekly') {
                unset($row['monthly'], $row['yearly'], $row['dayofmonth'], $row['date']);
            } else {
                unset($row['weekly'], $row['monthly'], $row['weekday'], $row['dayofmonth']);
            }
            $row['user_id'] = $user_id;
            $bill = self::create($row);
            $bill->save();
        }
    }

    public function getCostAttribute()
    {
        if (!empty($this->monthly)) {
            return currency_format($this->monthly, currency()->getUserCurrency()) ." / month";
        }

        if (!empty($this->yearly)) {
            return currency_format($this->yearly, currency()->getUserCurrency()) ." / year";
        }

        if (!empty($this->weekly)) {
            return currency_format($this->weekly, currency()->getUserCurrency()) ." / week";
        }

        return null;
    }
}
