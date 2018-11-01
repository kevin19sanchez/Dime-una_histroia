<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class story
 * @package App\Models
 * @version October 14, 2018, 3:43 am UTC
 *
 * @property \App\Models\Category category
 * @property \Illuminate\Database\Eloquent\Collection Section
 * @property string name
 * @property integer state
 * @property integer id_category
 */
class story extends Model
{
    use SoftDeletes;

    public $table = 'story';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'state',
        'id_category'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'state' => 'integer',
        'id_category' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class,'id_category','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function sections()
    {
        return $this->hasMany(\App\Models\Section::class,'id_story','id');
    }
}
