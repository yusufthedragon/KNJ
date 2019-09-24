<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Donasi
 * @package App\Models
 * @version September 24, 2019, 7:18 am UTC
 *
 * @property string jenis
 * @property string nama
 * @property string bank
 * @property integer nominal
 * @property string bukti
 * @property integer no_urut_solia
 * @property string catatan
 * @property string no_hp
 * @property string email
 * @property string tanggal
 */
class Donasi extends Model
{
    use SoftDeletes;

    public $table = 'donasis';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'jenis',
        'nama',
        'bank',
        'nominal',
        'bukti',
        'no_urut_solia',
        'catatan',
        'no_hp',
        'email',
        'tanggal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'jenis' => 'string',
        'nama' => 'string',
        'bank' => 'string',
        'nominal' => 'integer',
        'bukti' => 'string',
        'no_urut_solia' => 'integer',
        'catatan' => 'string',
        'no_hp' => 'string',
        'email' => 'string',
        'tanggal' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'jenis' => 'required',
        'nama' => 'required',
        'bank' => 'required',
        'nominal' => 'required',
        'bukti' => 'required|mimes:jpg,png,jpeg|max:2048',
        'no_urut_solia' => 'required',
        'catatan' => 'required',
        'email' => 'required|unique:users,email',
        'tanggal' => 'required'
    ];

    
}
