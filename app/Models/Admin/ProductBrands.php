<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductBrands
 * @package App\Models\Admin
 * @version June 30, 2019, 5:57 am UTC
 *
 * @property string Name
 * @property string Region
 * @property string logo
 * @property string description
 */
class ProductBrands extends Model
{
    use SoftDeletes;

    public $table = 'product_brands';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Name',
        'Region',
        'logo',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Name' => 'string',
        'Region' => 'string',
        'logo' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
