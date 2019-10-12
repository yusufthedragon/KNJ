<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project
 * @package App\Models
 * @version September 28, 2019, 10:06 am WIB
 *
 * @property string judul
 * @property string deskripsi
 * @property string cover
 * @property string kode_donasi
 * @property string daftar_solia
 * @property string timeline
 */
class Project extends Model
{
    use SoftDeletes;

    public $table = 'projects';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'judul',
        'deskripsi',
        'cover',
        'kode_donasi',
        'daftar_solia',
        'timeline'
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
        'cover' => 'string',
        'kode_donasi' => 'string',
        'daftar_solia' => 'string',
        'timeline' => 'string'
    ];
}
