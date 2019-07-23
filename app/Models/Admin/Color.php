<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Color
 * @package App\Models\Admin
 * @version January 23, 2019, 11:56 am UTC
 *
 * @property string name
 * @property string color
 */
class Color extends Model
{
    use SoftDeletes;

    public $table = 'colors';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'color'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'color' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'color' => 'required'
    ];

    
}
