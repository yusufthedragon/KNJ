<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Followers
 * @package App\Models
 * @version September 28, 2019, 2:01 pm WIB
 *
 * @property string nama
 * @property string domisili
 * @property string jenis_kelamin
 * @property string no_telepon
 * @property string email
 * @property string password
 * @property int status_member
 * @property string foto
 * @property int divisi_id
 * @property string nama_divisi
 * @property string tanggal_lahir
 * @property string alamat
 */
class Followers extends Model
{
    use SoftDeletes;

    public $table = 'followers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'domisili', // Jakarta Barat, Jakarta Selatan, Jakarta Timur, Jakarta Utara, Jakarta Pusat, Luar Jakarta
        'jenis_kelamin',
        'no_telepon',
        'email',
        'password',
        'status_member',
        'foto',
        'divisi_id',
        'nama_divisi',
        'tanggal_lahir',
        'alamat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'domisili' => 'string',
        'jenis_kelamin' => 'string',
        'no_telepon' => 'string',
        'email' => 'string',
        'password' => 'string',
        'foto' => 'string',
        'nama_divisi' => 'string',
        'tanggal_lahir' => 'date',
        'alamat' => 'string'
    ];
}
