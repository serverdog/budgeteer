<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BillCategory
 * @package App\Models
 * @version March 31, 2020, 12:26 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection billItems
 * @property \Illuminate\Database\Eloquent\Collection bills
 * @property string name
 */
class BillCategory extends Model
{
    use SoftDeletes;

    public $table = 'bill_categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function billItems()
    {
        return $this->hasMany(\App\Models\BillItem::class, 'bill_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bills()
    {
        return $this->hasMany(\App\Models\Bill::class, 'bill_category_id');
    }
}
