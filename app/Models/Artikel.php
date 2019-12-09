<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Artikel
 * @package App\Models
 * @version September 28, 2019, 3:51 pm WIB
 *
 * @property string judul
 * @property string deskripsi
 * @property string wilayah
 * @property string cover
 * @property string gallery
 * @property string nama_solia
 * @property integer usia
 * @property string pekerjaan
 * @property string alamat
 */
class Artikel extends Model
{
    use SoftDeletes;

    public $table = 'artikels';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'judul',
        'deskripsi',
        'wilayah',
        'cover',
        'gallery',
        'nama_solia',
        'usia',
        'pekerjaan',
        'alamat',
        'highlight'
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
        'wilayah' => 'string',
        'cover' => 'string',
        'gallery' => 'string',
        'nama_solia' => 'string',
        'usia' => 'integer',
        'pekerjaan' => 'string',
        'alamat' => 'string',
        'highlight' => 'string'
    ];
}
