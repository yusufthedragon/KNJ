<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;

/**
 * Class FollowersRepository
 * @package App\Repositories
 * @version September 28, 2019, 2:01 pm WIB
*/

class FollowersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'domisili',
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
