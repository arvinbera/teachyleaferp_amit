<?php

namespace App\Repositories;

use App\Models\Designations;
use App\Repositories\BaseRepository;

/**
 * Class DesignationsRepository
 * @package App\Repositories
 * @version October 25, 2021, 2:15 pm UTC
*/

class DesignationsRepository extends BaseRepository
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
        return Designations::class;
    }
}
