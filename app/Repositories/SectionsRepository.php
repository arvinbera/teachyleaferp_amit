<?php

namespace App\Repositories;

use App\Models\Sections;
use App\Repositories\BaseRepository;

/**
 * Class SectionsRepository
 * @package App\Repositories
 * @version October 23, 2021, 3:31 pm UTC
*/

class SectionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Sections::class;
    }
}
