<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Resaler
 * @package App\Models\Admin
 * @version December 17, 2018, 11:09 am UTC
 *
 * @property string name
 * @property string company
 * @property string email
 * @property string avatar
 * @property string last_acc
 * @property string policy
 * @property string state
 * @property string activate_code
 * @property string mobile
 * @property string password
 */
class Resaler extends Model
{
    use SoftDeletes;

    public $table = 'resalers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'company',
        'email',
        'avatar',
        'last_acc',
        'policy',
        'state',
        'activate_code',
        'mobile',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'company' => 'string',
        'email' => 'string',
        'avatar' => 'string',
        'last_acc' => 'string',
        'policy' => 'string',
        'state' => 'string',
        'activate_code' => 'string',
        'mobile' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'email',
        'state' => 'required',
        'mobile' => 'required',
        'password' => 'required'
    ];

    
}
