<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Profile
 * @package App\Models
 * @version September 23, 2019, 11:58 am UTC
 *
 * @property string deskripsi
 * @property string sejarah
 * @property string aktivitas
 * @property string visi_misi
 * @property string kepengurusan
 */
class Profile extends Model
{
    use SoftDeletes;

    public $table = 'profiles';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'deskripsi',
        'sejarah',
        'aktivitas',
        'visi_misi',
        'kepengurusan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'deskripsi' => 'string',
        'sejarah' => 'string',
        'aktivitas' => 'string',
        'visi_misi' => 'string',
        'kepengurusan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
