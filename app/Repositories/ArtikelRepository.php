<?php

namespace App\Repositories;

use App\Models\Artikel;
use App\Repositories\BaseRepository;

/**
 * Class ArtikelRepository
 * @package App\Repositories
 * @version September 24, 2019, 7:26 am UTC
*/

class ArtikelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'judul',
        'jenis',
        'deskripsi',
        'gambar',
        'cover'
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
        return Artikel::class;
    }
}
