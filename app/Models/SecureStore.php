<?php

namespace App;

use App\Scopes\LoggedInUserScope;
use Illuminate\Database\Eloquent\Model;

class SecureStore extends Model
{
    use SoftDeletes;

    public $table = 'secure_stores';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'storable_type',
        'storable_id',
        'user_id',
        'value',
        'name',
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
    
    public function store()
    {
        return $this->morphTo('store');
    }
}
