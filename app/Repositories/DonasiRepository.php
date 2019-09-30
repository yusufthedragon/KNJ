<?php

namespace App\Repositories;

use App\Models\Donasi;
use App\Models\User;
use App\Repositories\BaseRepository;

/**
 * Class DonasiRepository
 * @package App\Repositories
 * @version September 28, 2019, 3:38 pm WIB
*/

class DonasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Donasi::class;
    }

    /**
     * Create new donatur
     *
     * @param  array  $data
     */
    public function createDonatur($data)
    {
        $check = User::where('email', $data['email'])->first();

        if ($check === null) {
            User::create([
                'nama' => $data['nama'],
                'email' => $data['email'],
                'no_telepon' => $data['no_telepon'],
                'role' => 'donatur',
                'password' => ''
            ]);
        }
    }
}
