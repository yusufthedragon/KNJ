<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Artikel
 * @package App\Models
 * @version September 24, 2019, 7:26 am UTC
 *
 * @property string judul
 * @property string jenis
 * @property string deskripsi
 * @property string gambar
 * @property string cover
 */
class Artikel extends Model
{
    use SoftDeletes;

    public $table = 'artikels';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'judul',
        'jenis',
        'deskripsi',
        'gambar',
        'cover'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'judul' => 'string',
        'jenis' => 'string',
        'deskripsi' => 'string',
        'gambar' => 'string',
        'cover' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'judul' => 'required',
        'jenis' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'required',
        'gambar.*' => 'mimes:jpg,png,jpeg|max:2048',
        'cover' => 'required|mimes:jpg,png,jpeg|max:2048'
    ];
}
