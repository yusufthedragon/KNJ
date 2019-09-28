<?php

namespace App\Repositories;

use App\Models\Artikel;
use App\Repositories\BaseRepository;

/**
 * Class ArtikelRepository
 * @package App\Repositories
 * @version September 28, 2019, 3:51 pm WIB
*/

class ArtikelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'judul',
        'deskripsi',
        'wilayah',
        'cover',
        'gallery',
        'nama_solia',
        'usia',
        'pekerjaan',
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
        return Artikel::class;
    }
}
