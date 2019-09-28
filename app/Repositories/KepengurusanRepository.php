<?php

namespace App\Repositories;

use App\Models\Kepengurusan;
use App\Repositories\BaseRepository;

/**
 * Class KepengurusanRepository
 * @package App\Repositories
 * @version September 28, 2019, 1:09 pm WIB
*/

class KepengurusanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'jabatan',
        'pendapat',
        'foto'
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
        return Kepengurusan::class;
    }
}
