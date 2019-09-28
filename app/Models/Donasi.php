<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Donasi
 * @package App\Models
 * @version September 28, 2019, 3:38 pm WIB
 *
 * @property string nama
 * @property string bank
 * @property string tanggal_transfer
 * @property string bukti_transfer
 * @property integer nominal
 * @property string no_telepon
 * @property string email
 * @property string catatan
 */
class Donasi extends Model
{
    use SoftDeletes;

    public $table = 'donasis';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'bank',
        'tanggal_transfer',
        'bukti_transfer',
        'nominal',
        'no_telepon',
        'email',
        'catatan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'bank' => 'string',
        'tanggal_transfer' => 'date',
        'bukti_transfer' => 'string',
        'nominal' => 'integer',
        'no_telepon' => 'string',
        'email' => 'string',
        'catatan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'bank' => 'required',
        'tanggal_transfer' => 'required',
        'bukti_transfer' => 'required',
        'nominal' => 'required',
        'no_telepon' => 'required',
        'email' => 'required',
        'catatan' => 'required'
    ];

    
}
