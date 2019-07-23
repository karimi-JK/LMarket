<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comment
 * @package App\Models\Admin
 * @version December 18, 2018, 6:33 pm UTC
 *
 * @property string version_id
 * @property string user_id
 * @property string text
 * @property string rate
 * @property string state
 */
class Comment extends Model
{
    use SoftDeletes;

    public $table = 'comments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'version_id',
        'user_id',
        'text',
        'rate',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'version_id' => 'string',
        'user_id' => 'string',
        'text' => 'string',
        'rate' => 'string',
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'version_id' => 'required',
        'user_id' => 'required',
        'text' => 'required',
        'rate' => 'required',
        'state' => 'required'
    ];

    
}
