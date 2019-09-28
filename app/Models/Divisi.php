<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Divisi
 * @package App\Models
 * @version September 28, 2019, 8:56 am WIB
 *
 * @property string nama
 */
class Divisi extends Model
{
    use SoftDeletes;

    public $table = 'divisis';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required'
    ];

    
}
