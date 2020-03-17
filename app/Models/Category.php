<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version March 2, 2020, 4:10 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection accounttypes
 * @property string name
 * @property string description
 */
class Category extends Model
{
    use SoftDeletes;

    public $table = 'account_categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function accounttypes()
    {
        return $this->hasMany(\App\Models\Accounttype::class, 'account_category_id');
    }
}
