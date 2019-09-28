<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kepengurusan
 * @package App\Models
 * @version September 28, 2019, 1:09 pm WIB
 *
 * @property string nama
 * @property string jabatan
 * @property string pendapat
 * @property string foto
 */
class Kepengurusan extends Model
{
    use SoftDeletes;

    public $table = 'kepengurusans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'jabatan',
        'pendapat',
        'foto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'jabatan' => 'string',
        'pendapat' => 'string',
        'foto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'jabatan' => 'required',
        'pendapat' => 'required',
        'foto' => 'required|max:2048|mimes:jpg,png,jpeg'
    ];

    
}
