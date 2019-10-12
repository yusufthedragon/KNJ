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
 * @property string jenis_donasi
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
        'jenis_donasi',
        'bank',
        'tanggal_transfer',
        'bukti_transfer',
        'nominal',
        'no_telepon',
        'email',
        'user_id',
        'catatan',
        'daftar_solia',
        'project_id',
        'nama_project',
        'status_persetujuan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'jenis_donasi' => 'string',
        'nama' => 'string',
        'bank' => 'string',
        'tanggal_transfer' => 'date',
        'bukti_transfer' => 'string',
        'nominal' => 'integer',
        'no_telepon' => 'string',
        'email' => 'string',
        'user_id' => 'integer',
        'catatan' => 'string',
        'daftar_solia' => 'string',
        'project_id' => 'integer',
        'nama_project' => 'string',
        'status_persetujuan' => 'integer'
    ];

    /**
     * Get the project that owns the donasi.
     *
     * @return void
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }
}
