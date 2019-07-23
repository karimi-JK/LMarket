<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 * @package App\Models\Admin
 * @version December 16, 2018, 10:58 am UTC
 *
 * @property string name
 * @property string email
 * @property string credit
 * @property string mobile
 * @property string status
 * @property string last_login
 * @property string password
 */
class Client extends Model
{
    use SoftDeletes;

    public $table = 'clients';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'credit',
        'mobile',
        'status',
        'last_login',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'credit' => 'string',
        'mobile' => 'string',
        'status' => 'string',
        'last_login' => 'string',
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
        'status' => 'required',
        'password' => 'password'
    ];

    
}
