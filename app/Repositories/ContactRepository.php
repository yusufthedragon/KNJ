<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\BaseRepository;

/**
 * Class ContactRepository
 * @package App\Repositories
 * @version September 28, 2019, 1:22 am UTC
*/

class ContactRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'jenis',
        'contact',
        'keterangan'
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
        return Contact::class;
    }
}
