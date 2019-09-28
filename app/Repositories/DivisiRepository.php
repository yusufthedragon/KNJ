<?php

namespace App\Repositories;

use App\Models\Divisi;
use App\Repositories\BaseRepository;

/**
 * Class DivisiRepository
 * @package App\Repositories
 * @version September 28, 2019, 8:56 am WIB
*/

class DivisiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
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
        return Divisi::class;
    }
}
