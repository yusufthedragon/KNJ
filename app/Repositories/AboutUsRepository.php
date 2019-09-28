<?php

namespace App\Repositories;

use App\Models\AboutUs;
use App\Repositories\BaseRepository;

/**
 * Class AboutUsRepository
 * @package App\Repositories
 * @version September 28, 2019, 10:37 am WIB
*/

class AboutUsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'judul',
        'deskripsi',
        'gambar'
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
        return AboutUs::class;
    }
}
