<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version September 23, 2019, 6:00 am UTC
 *
 * @property string nama
 * @property string email
 * @property string domisili
 * @property string jenis_kelamin
 * @property string no_telepon
 * @property string role
 * @property string|\Carbon\Carbon email_verified_at
 * @property string password
 * @property string remember_token
 * @property string foto
 * @property int divisi_id
 * @property string nama_divisi
 * @property string tanggal_lahir
 * @property string alamat
 */
class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nama',
        'email',
        'domisili',
        'jenis_kelamin',
        'no_telepon',
        'role',
        'email_verified_at',
        'password',
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
        'role' => 'string',
        'email' => 'string',
        'password' => 'string',
        'domisili' => 'string',
        'jenis_kelamin' => 'string',
        'no_telepon' => 'string',
        'foto' => 'string',
        'divisi_id' => 'integer',
        'nama_divisi' => 'string',
        'tanggal_lahir' => 'string',
        'alamat' => 'string'
    ];

    /**
     * Encrypt User's password.
     *
     * @param  string  $password
     * @return void
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Get the donasi record associated with the user.
     *
     * @return void
     */
    public function donasi()
    {
        return $this->hasMany('App\Models\Donasi', 'user_id');
    }
}
