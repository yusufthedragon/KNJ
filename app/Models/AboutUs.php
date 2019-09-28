<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AboutUs
 * @package App\Models
 * @version September 28, 2019, 10:37 am WIB
 *
 * @property string judul
 * @property string deskripsi
 * @property string gambar
 */
class AboutUs extends Model
{
    use SoftDeletes;

    public $table = 'about_us';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'judul',
        'deskripsi',
        'gambar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'judul' => 'string',
        'deskripsi' => 'string',
        'gambar' => 'string'
    ];
}
