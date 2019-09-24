<?php

namespace App\Repositories;

use App\Models\Donasi;
use App\Repositories\BaseRepository;

/**
 * Class DonasiRepository
 * @package App\Repositories
 * @version September 24, 2019, 7:18 am UTC
*/

class DonasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
}
