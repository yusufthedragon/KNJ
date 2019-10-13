<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 * @package App\Models
 * @version September 28, 2019, 1:22 am UTC
 *
 * @property string nama
 * @property string jenis
 * @property string contact
 * @property string keterangan
 */
class Contact extends Model
{
    use SoftDeletes;

    public $table = 'contacts';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nama',
        'jenis',
        'contact',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'jenis' => 'string',
        'contact' => 'string',
        'keterangan' => 'string'
    ];
}
