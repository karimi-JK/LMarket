<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models\Admin
 * @version January 2, 2019, 10:39 am UTC
 *
 * @property string parent
 * @property string text
 * @property string icon
 * @property string position
 * @property string description
 */
class Category extends Model
{
    use SoftDeletes;

    public $table = 'categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'parent',
        'text',
        'icon',
        'position',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'parent' => 'string',
        'text' => 'string',
        'icon' => 'string',
        'position' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parent' => 'required',
        'text' => 'required',
        'icon' => 'required',
        'position' => 'required',
        'description' => 'required'
    ];

    /**
     * Validation api rules
     *
     * @var array
     */
    public static $apiRules = [
         
    ];

    
}
